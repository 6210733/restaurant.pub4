<?php

$routes = [
    // Route vers Accueil => [controller, méthode]
    "index" => ["AccueilController", "index"],

    // Route vers Menu 
    "menu" => ["PlatController", "voirMenu"],
    
    // Route vers À propos
    "apropos" => ["AproposController", "apropos"],
    
    // Traitement de la connexion
    "connexion" => ["EmployeController", "connecter"],
    
        // Gestion du compte employé
    "compte-valider" => ["EmployeController", "valider"],
    
    // Gestion du restaurant
    "tout-gerer" => ["EmployeController", "gerer"], 
    
    // Formulaire de création de compte
    "employe-ajouter" => ["EmployeController", "ajouterEmploye"],
    
    // Affichage de la liste des employés 
    "employe-afficher" => ["EmployeController", "afficher"],
    
    // Traitement de la création de compte employé 
    "compte-enregistrer" => ["EmployeController", "enregistrer"],
    
    // Traitement de la déconnexion 
    "deconnecter" => ["EmployeController", "deconnecter"],
    
    // Route modification employé 
    "employe-modifier" => ["EmployeController", "modifier"],
    
    // Traitement de la modification d'un employé (update) 
    "employe-reviser" => ["EmployeController", "reviser"],
    
    // Supprimer un employé
    "employe-supprimer" => ["EmployeController", "supprimerEmploye"],
    
    // formulaire d'ajout plat
    "plat-creer" => ["PlatController", "creer"],
    
    // Traitement de l'ajout d'un plat 
    "plat-enregistrer" => ["PlatController", "enregistrer"],
    
    // Affichage de la liste des plats 
    "plats" => ["PlatController", "afficher"],
    
    // Traitement de la suppression d'un plat 
    "plats-supprimer" => ["PlatController", "supprimer"],
    
    // Modifier un plat 
    "plats-modifier" => ["PlatController", "modifier"],
    
    // Traitement de la modification d'un plat 
    "plats-reviser" => ["PlatController", "reviser"],
    
    // Formulaire d'adhésion client 
    "clients-adherer" => ["ClientController", "adherer"],
    
    // Traitement du formulaire d'adhésion client
    "client-adherer-traitement" => ["ClientController", "traiterFormulaireAdhesion"], 
];
