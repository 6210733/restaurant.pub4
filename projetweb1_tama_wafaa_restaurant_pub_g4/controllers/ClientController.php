<?php
namespace Controller;

use Base\Controller;
use Model\Client;

class ClientController extends Controller
{
    public function adherer()
    {
        include("views/parts/footer.inc.php");
    }
    
    public function traiterFormulaireAdhesion()
    {
        if (
            empty($_POST["nom"]) ||
            empty($_POST["prenom"]) ||
            empty($_POST["courriel"])
        ) {
            header("Location:index?infos_absentes=1");
            exit();
        }
        
        // Envoie les infos au modèle
        $succes = (new Client)->ajouter(
            $_POST["nom"],
            $_POST["prenom"],
            $_POST["courriel"]
        );

        // Redirection
        if (!$succes) {
            header("Location:index?echec_ajout_compte=1");
            exit();
        }
        
        header("Location:index?succes_ajout_compte=1");
        exit();
    }
}
?>
