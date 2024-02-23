<?php

namespace Model;

use Base\Model;

class Plat extends Model
{
    protected $table = "plats";

    /**
     * Ajoute un nouvel plat
     *
     * @param string $nom
     * @param string $description
     * @param float $prix
     * @param int $section_id
     * @param int $categorie_id
     * 
     * @return bool
     */
    public function ajouter($nom, $description, float $prix, $section_id, $categorie_id) {
        $sql = "INSERT INTO plats (nom, description, prix, section_id, categorie_id) 
                VALUES (:nom, :description, :prix, :section_id, :categorie_id)";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ':nom' => $nom,
            ':description' => $description,
            ':prix' => $prix,
            ':section_id' => $section_id,
            ':categorie_id' => $categorie_id
        ]);
    }

    /**
     * Récupère tous les plats avec les informations de section et de catégorie
     *
     * @return array
     */
    public function tout() {
        $sql = "SELECT plats.*, 
                    sections.nom AS nom_section, 
                    categories.nom AS nom_categorie
                FROM plats
                JOIN sections 
                    ON plats.section_id = sections.id
                JOIN categories 
                    ON plats.categorie_id = categories.id";

        $requete = $this->pdo()->prepare($sql);
        $requete->execute();

        return $requete->fetchAll();
    }

    /**
     * Supprime un plat
     *
     * @param int $id
     * 
     * @return bool
     */
    public function supprimer($id) {
        $sql = "DELETE FROM $this->table
                WHERE id = :id";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":id" => $id
        ]);
    }

    /**
     * Modifie les informations d'un plat
     *
     * @param object $plat
     * 
     * @return bool
     */
    public function modifier($plat) {
        $sql = "UPDATE $this->table 
                SET nom = :nom,
                    description = :description,
                    prix = :prix,
                    section_id = :section_id,
                    categorie_id = :categorie_id
                WHERE id = :id";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":nom" => $plat->nom,
            ":description" => $plat->description,
            ":prix" => $plat->prix,
            ":section_id" => $plat->section_id,
            ":categorie_id" => $plat->categorie_id,
            ":id" => $plat->id   
        ]);
    }   
}
