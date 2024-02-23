<?php

namespace Model;

use Base\Model;

class Employe extends Model {
    // Nom de la table associée au modèle
    protected $table = "employes";

    /**
     * Ajoute un nouvel employé
     *
     * @param string $nom
     * @param string $prenom
     * @param string $courriel
     * @param string $role
     * @param string $mdp
     * 
     * @return bool
     */
    public function ajouter($nom, $prenom, $courriel, $role, $mdp) {
        $sql = "INSERT INTO $this->table (nom, prenom, courriel, role, mot_de_passe)
                VALUES (:nom, :prenom, :courriel, :role, :mot_de_passe)";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":nom" => $nom,
            ":prenom" => $prenom,
            ":courriel" => $courriel,
            ":role" => $role,
            ":mot_de_passe" => $mdp
        ]);
    }

    /**
     * Récupère un employé en fonction d'un courriel spécifique
     * 
     * @param string $courriel 
     * @return mixed|false
     */
    public function parCourriel($courriel) {
        $sql = "SELECT *
                FROM $this->table
                WHERE courriel = :courriel";

        $requete = $this->pdo()->prepare($sql);

        $requete->execute([
            ":courriel" => $courriel
        ]);

        return $requete->fetch();
    }

    /**
     * Modifie les informations d'un employé
     *
     * @param int $id
     * @param string $nom
     * @param string $prenom
     * @param string $courriel
     * @param string $role
     * @param string|null $mdp
     * 
     * @return bool
     */
    public function modifier($id, $nom, $prenom, $courriel, $role, $mdp = null) {

        // Mettre à jour le mot de passe également
        $sql = "UPDATE $this->table
                SET nom = :nom,
                    prenom = :prenom,
                    courriel = :courriel,
                    role = :role,
                    mot_de_passe = :mot_de_passe
                WHERE id = :id";

        $requete = $this->pdo()->prepare($sql);
        
        // Lie les valeurs des paramètres
        $success = $requete->execute([
            ":id"=> $id,
            ":nom"=> $nom,
            ":prenom"=> $prenom,
            ":courriel"=> $courriel,
            ":role"=> $role,
            ":mot_de_passe"=>$mdp            
        ]);
    
        // Exécute la requête
        return $success;
    }
    
}
