<?php

namespace Controller;

use Base\Controller;
use Model\Categorie;
use Model\Plat;
use Model\Section;

class PlatController extends Controller {

    public function voirMenu() {
        // Récupérer tous les plats
        $plats = (new Plat)->tout();
        
        // Récupérer toutes les catégories
        $categories = (new Categorie)->tout();
        
        // Récupérer toutes les sections
        $sections = (new Section)->tout();

        include("views/menu.view.php");
    }

    public function creer() {
        if (empty($_SESSION["employe_id"])) {
            // Rediriger vers la page de connexion si l'identifiant de l'employé est vide
            header("location: connexion");
            exit();
        }

        // Récupérer toutes les catégories
        $categories = (new Categorie)->tout();
        
        // Récupérer toutes les sections
        $sections = (new Section)->tout();

        include("views/plats-creer.view.php");
    }

    public function enregistrer() {
        if (empty($_SESSION["employe_id"])) {
            // Rediriger vers la page de connexion si l'identifiant de l'employé est vide
            header("location: connexion");
            exit();
        }
        if (
            empty($_POST["nom"]) ||
            empty($_POST["description"]) ||
            empty($_POST["prix"]) ||
            empty($_POST["section_id"]) ||
            empty($_POST["categorie_id"])
        ) {
            // Rediriger vers la page "plat-creer" avec un paramètre indiquant des informations manquantes
            header("location: plat-creer?infos_absentes=1");
            exit();
        }

        // Ajouter un nouveau plat avec les informations fournies
        $succes = (new Plat)->ajouter(
            $_POST["nom"],
            $_POST["description"],
            $_POST["prix"],
            $_POST["section_id"],
            $_POST["categorie_id"]
        );

        if (!$succes) {
            // Rediriger vers la page "plats-creer" avec un paramètre indiquant un échec d'ajout de plat
            header("location: plats-creer?echec_ajout_plat");
            exit();
        }
        // Rediriger vers la page "plats" avec un paramètre indiquant un succès d'ajout de plats
        header("location: plats?succes_ajout_plats=1");
        exit();
    }

    public function afficher() {
        if (empty($_SESSION["employe_id"])) {
            // Rediriger vers la page de connexion si l'identifiant de l'employé est vide
            header("location: connexion");
            exit();
        }

        // Récupérer tous les plats
        $plats = (new Plat)->tout();

        include("views/plats.view.php");
    }

    public function supprimer()
    {
        if (empty($_SESSION["employe_id"])) {
            // Rediriger vers la page de connexion si l'identifiant de l'employé est vide
            header("location: connexion");
            exit();
        }
        if (empty($_SESSION["employe_id"])) {
            // Rediriger vers la page de connexion si l'identifiant de l'employé est vide
            header("location: connexion");
            exit();
        }
        if (empty($_GET["id"])) {
            // Rediriger vers la page "plats" avec un paramètre indiquant un plat inexistant
            header("location: plats?plat_inexistante=1");
            exit();
        }

        // Supprimer le plat spécifié par l'ID
        $succes = (new Plat)->supprimer($_GET["id"]);

        if (!$succes) {
            // Rediriger vers la page "plats" avec un paramètre indiquant un échec de suppression
            header("location: plats?echec_suppression=1");
            exit();
        }
        // Rediriger vers la page "plats" avec un paramètre indiquant une suppression réussie
        header("location: plats?succes_suppression=1");
        exit();
    }
    
    public function modifier() {
        if (empty($_SESSION["employe_id"])) {
            // Rediriger vers la page de connexion si l'identifiant de l'employé est vide
            header("location: connexion");
            exit();
        }
        if (empty($_GET["id"])) {
            // Rediriger vers la page "plats" avec un paramètre indiquant un plat inexistant
            header("location: plats?plat_inexistante=1");
            exit();
        }

        // Récupérer le plat spécifié par l'ID
        $plat = (new Plat)->parId($_GET["id"]);
        
        // Récupérer toutes les catégories
        $categories = (new Categorie)->tout();
        
        // Récupérer toutes les sections
        $sections = (new Section)->tout();

        include("views/plats-modifier.view.php");
    }
    
    public function reviser() {
        if (empty($_SESSION["employe_id"])) {
            // Rediriger vers la page de connexion si l'identifiant de l'employé est vide
            header("location: connexion");
            exit();
        }

        if (empty($_POST["id"])) {
            // Rediriger vers la page "plats" avec un paramètre indiquant un plat inexistant
            header("location: plats?plat_inexistant=1");
            exit();
        }

        if (
            empty($_POST["nom"]) ||
            empty($_POST["description"]) ||
            empty($_POST["prix"]) ||
            empty($_POST["section_id"]) ||
            empty($_POST["categorie_id"])
        ) {
            // Rediriger vers la page "plats-modifier" avec un paramètre indiquant des informations manquantes et l'ID du plat
            header("location: plats-modifier?infos_absentes=1&id=" . $_POST["id"]);
            exit();
        }

        // Convertir l'ID du plat en entier
        $id_plat = intval($_POST["id"]);

        // Récupérer le plat spécifié par l'ID
        $plat = (new Plat)->parId(($id_plat));

        // Mettre à jour les informations du plat avec les nouvelles valeurs
        $plat->nom = $_POST["nom"];
        $plat->description = $_POST["description"];
        $plat->prix = $_POST["prix"];
        $plat->section_id = $_POST["section_id"];
        $plat->categorie_id = $_POST["categorie_id"];

        // Modifier le plat dans la base de données
        $succes = (new Plat)->modifier($plat);

        if (!$succes) {
            // Rediriger vers la page "plats-modifier" avec un paramètre indiquant un échec de modification et l'ID du plat
            header("location: plats-modifier?echec_modification_plat=1&id=" . $_POST["id"]);
            exit();
        }
        // Rediriger vers la page "plats" avec un paramètre indiquant une modification réussie du plat
        header("location: plats?succes_modification_plat=1");
        exit();
    }
}
