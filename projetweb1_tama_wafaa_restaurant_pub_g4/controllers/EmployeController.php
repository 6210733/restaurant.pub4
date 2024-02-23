<?php

namespace Controller;

use Base\Controller;
use Model\Employe;

class EmployeController extends Controller {

    public function connecter() {
        // Inclure la vue de connexion
        include("views/connexion.view.php");
    }

    public function ajouterEmploye() {
        //Vérifie si l'employé est connecté.
        if (empty($_SESSION["employe_id"])) {
            // Rediriger vers la page de connexion si l'identifiant de l'employé est vide
            header("location: connexion");
            exit();
        }
        // Vérifie si l'employé a le rôle de "Gestionnaire" pour pouvoir accéder à certaines fonctionnalité.
        if ($_SESSION["role"] !== "Gestionnaire") {
            // Rediriger vers la page "tout-gerer" avec un paramètre d'accès interdit si le rôle de l'employé n'est pas "Gestionnaire"
            header("Location: tout-gerer?acces-interdit=1");
            exit();
        }

        // Inclure la vue 
        include("views/employe-creer.view.php");
    }

    public function enregistrer() {
        if (empty($_SESSION["employe_id"])) {
            // Rediriger vers la page de connexion si l'identifiant de l'employé est vide
            header("location: connexion");
            exit();
        }

        if (
            empty($_POST["nom"]) ||
            empty($_POST["prenom"]) ||
            empty($_POST["courriel"]) ||
            empty($_POST["role"]) ||
            empty($_POST["mdp"]) ||
            empty($_POST["confirmer_mdp"])
        ) {
            // Rediriger vers la page "employe-ajouter" avec un paramètre indiquant des informations manquantes obligatoires ne sont pas fournies
            header("location: employe-ajouter?infos_absentes=1");
            exit();
        }

        if ($_POST["mdp"] != $_POST["confirmer_mdp"]) {
            // Rediriger vers la page "employe-ajouter" avec un paramètre indiquant une confirmation de mot de passe incorrecte si les mots de passe ne correspondent pas
            header("location: employe-ajouter?confirmation_mdp=1");
            exit();
        }

        // Crypter le mot de passe
        $mdp_encrypte = password_hash($_POST["mdp"], PASSWORD_DEFAULT);

        // Appeler la méthode "ajouter" de la classe "Employe" pour créer un nouvel employé avec les données fournies
        $succes = (new Employe)->ajouter(
            $_POST["nom"],
            $_POST["prenom"],
            $_POST["courriel"],
            $_POST["role"],
            $mdp_encrypte
        );

        if (!$succes) {
            // Rediriger vers la page "employe-ajouter" avec un paramètre indiquant une erreur de création de compte si la création échoue
            header("location: employe-ajouter?erreur_creation_compte=1");
            exit();
        }
        // Rediriger vers la page "employe-ajouter" avec un paramètre indiquant une création de compte réussie
        header("location: employe-ajouter?succes_creation_compte=1");
        exit();
    }

    public function valider() {
        if (empty($_POST["courriel"]) || empty($_POST["mdp"])) {
            // Rediriger vers la page de connexion avec un paramètre indiquant des informations manquantes si l'adresse e-mail ou le mot de passe sont vides
            header("location: connexion?infos_absentes=1");
            exit();
        }

        $employe = (new Employe)->parCourriel($_POST["courriel"]);

        // Validation et redirection
        if (!$employe || !password_verify($_POST["mdp"], $employe->mot_de_passe)) {
            // Rediriger vers la page de connexion avec un paramètre indiquant une échec de connexion si l'employé n'existe pas ou si le mot de passe est incorrect
            header("location: connexion?echec_connexion=1");
            exit();
        }

        $_SESSION["employe_id"] = $employe->id;
        $_SESSION["role"] = $employe->role;

        // Rediriger vers la page "tout-gerer" avec un paramètre indiquant une connexion réussie
        header("location: tout-gerer?succes_connexion=1");
        exit();
    }

    public function gerer() {
        if (empty($_SESSION["employe_id"])) {
            // Rediriger vers la page de connexion si l'identifiant de l'employé est vide
            header("location: connexion");
            exit();
        }
        // Inclure la vue de gestion
        include("views/gerer.view.php");
    }

    public function deconnecter() {
        if (empty($_SESSION["employe_id"])) {
            // Rediriger vers la page de connexion si l'identifiant de l'employé est vide
            header("location: connexion");
            exit();
        }

        unset($_SESSION["employe_id"]);
        // Rediriger vers la page de connexion avec un paramètre indiquant une déconnexion réussie
        header("location: connexion?succes_deconnexion=1");
        exit();
    }

    public function afficher() {
        if (empty($_SESSION["employe_id"])) {
            // Rediriger vers la page de connexion si l'identifiant de l'employé est vide
            header("location: connexion");
            exit();
        }

        // Récupérer tous les employés
        $employes = (new Employe)->tout();

        // Inclure la vue d'affichage des employés
        include("views/employe.view.php");
    }

    public function supprimerEmploye() {
        if (empty($_SESSION["employe_id"])) {
            // Rediriger vers la page de connexion si l'identifiant de l'employé est vide
            header("location: connexion");
            exit();
        }

        if ($_SESSION["role"] !== "Gestionnaire") {
            // Rediriger vers la page "tout-gerer" avec un paramètre d'accès interdit si le rôle de l'employé n'est pas "Gestionnaire"
            header("Location: tout-gerer?acces-interdit=1");
            exit();
        }

        $id = $_GET["id"];

        $employe_model = new Employe();
        $employe_model->supprimer($id);

        // Rediriger vers la page "employe-afficher" avec un paramètre indiquant la suppression d'un employé
        header("Location: employe-afficher?employe_supprime=1");
        exit();
    }

    public function modifier() {
        if (empty($_SESSION["employe_id"])) {
            // Rediriger vers la page de connexion si l'identifiant de l'employé est vide
            header("location: connexion");
            exit();
        }
        if (empty($_GET["id"])) {
            // Rediriger vers la page "employe-ajouter" avec un paramètre indiquant un employé inexistant si l'identifiant de l'employé à modifier est vide
            header("location: employe-ajouter?employe_inexistant=1");
            exit();
        }

        if ($_SESSION["role"] !== "Gestionnaire") {
            // Rediriger vers la page "tout-gerer" avec un paramètre d'accès interdit si le rôle de l'employé n'est pas "Gestionnaire"
            header("Location: tout-gerer?acces-interdit=1");
            exit();
        }

        // Récupérer l'employé à modifier
        $employe = (new Employe)->parId($_GET["id"]);

        if (!$employe) {
            // Rediriger vers la page "employe-ajouter" avec un paramètre indiquant un employé inexistant si l'employé n'est pas trouvé
            header("location: employe-ajouter?employe_inexistant=1");
            exit();
        }
        // Inclure la vue de modification de l'employé
        include("views/employe-modifier.view.php");
    }

    public function reviser() {
        if (empty($_SESSION["employe_id"])) {
            // Rediriger vers la page de connexion si l'identifiant de l'employé est vide
            header("location: connexion");
            exit();
        }
        if (empty($_POST["id"])) {
            // Rediriger vers la page "employe-afficher" avec un paramètre indiquant un employé inexistant si l'identifiant de l'employé à réviser est vide
            header("location: employe-afficher?employe_inexistant=1");
            exit();
        }

        if (
            empty($_POST["id"]) ||
            empty($_POST["nom"]) ||
            empty($_POST["prenom"]) ||
            empty($_POST["courriel"]) ||
            empty($_POST["role"])
        ) {
            // Rediriger vers la page "employe-modifier" avec un paramètre indiquant des informations manquantes et l'identifiant de l'employé concerné
            header("location: employe-modifier?infos_absentes=1&id=" . $_POST["id"]);
            exit();
        }

        // Récupérer l'employé à réviser
        $employe_model = new Employe();
        $employe = $employe_model->parId($_POST["id"]);

        if (!$employe) {
            // Rediriger vers la page "employe-ajouter" avec un paramètre indiquant un employé inexistant si l'employé n'est pas trouvé
            header("location: employe-ajouter?employe_inexistant=1");
            exit();
        }

        // Mettre à jour les données de l'employé
        $employe->nom = $_POST["nom"];
        $employe->prenom = $_POST["prenom"];
        $employe->courriel = $_POST["courriel"];
        $employe->role = $_POST["role"];
        $nouveau_mdp = $_POST["nouveau_mdp"];

        if (!empty($nouveau_mdp)) {
            // Si un nouveau mot de passe est fourni, le crypter et le mettre à jour
            $mdp_hash = password_hash($nouveau_mdp, PASSWORD_DEFAULT);
            $employe->mot_de_passe = $mdp_hash;
        }

        // Appeler la méthode "modifier" de la classe "Employe" pour mettre à jour les données de l'employé
        $succes = $employe_model->modifier($employe->id, $employe->nom, $employe->prenom, $employe->courriel, $employe->role, $employe->mot_de_passe);

        if (!$succes) {
            // Rediriger vers la page "employe-modifier" avec un paramètre indiquant une erreur de modification de l'employé
            header("location: employe-modifier?erreur_modification_employe=1&id=" . $_POST["id"]);
            exit();
        }
        // Rediriger vers la page "employe-modifier" avec un paramètre indiquant une modification réussie de l'employé
        header("location: employe-afficher?succes_modification_employe=1&id=" . $_POST["id"]);
        exit();
    }
}
