<?php
namespace Model;

use Base\Model;

class Client extends Model {

    protected $table= "clients";
    public function ajouter($nom, $prenom, $courriel) {
        $sql = "INSERT INTO $this->table (nom, prenom, courriel)
                VALUES (:nom, :prenom, :courriel)";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":nom" => $nom,
            ":prenom" => $prenom,
            ":courriel" => $courriel,
        ]);
    }
}
