<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un employé</title>
    <?php include("views/parts/head.inc.php"); ?>
</head>

<body>
    <?php if (isset($_GET["infos_absentes"])) : ?>
        <p class="msg erreur">Toutes les informations sont requises</p>
    <?php endif; ?>

    <?php if (isset($_GET["confirmation_mdp"])) : ?>
        <p class="msg erreur">Le mot de passe n'a pu être confirmé. Réessayez.</p>
    <?php endif; ?>

    <?php if (isset($_GET["erreur_creation_compte"])) : ?>
        <p class="msg erreur">Le Compte de l'employé n'a pas pu être créer</p>
    <?php endif; ?>
    <?php if (isset($_GET["succes_creation_compte"])) : ?>
        <p class="msg succes">Le Compte de l'employé est crée</p>
    <?php endif; ?>

    <div class="plan">
        <section class="form">
            <form action="compte-enregistrer" method="POST">
                <h3>Ajoutez un employé</h3>
                <div>
                    <label for="nom">Nom</label>
                    <input type="text" placeholder="Nom" id="nom" name="nom">
                    <label for="prenom">Prénom</label>
                    <input type="text" placeholder="Prénom" id="prenom" name="prenom">
                </div>
                <div>
                    <label for="courriel">Courriel</label>
                    <input type="email" placeholder="Courriel" id="courriel" name="courriel">
                </div>

                <div>
                    <label for="role">Rôle</label>
                    <select id="role" name="role">
                        <option value="gestionnaire">Gestionnaire</option>
                        <option value="employe">Employé</option>
                    </select>
                </div>
                <div>
                    <label for="mdp">Mot de passe</label>
                    <div class="mdp" id="mdp">
                        <input type="password" placeholder="Mot de passe" id="mdp" name="mdp" autocomplete="current-password">
                    </div>
                </div>
                <div>
                    <label for="confirmer-mdp">Confirmation du mot de passe</label>
                    <div class="mdp" id="confirmer">
                        <input type="password" placeholder="Confirmer le mot de passe" id="confirmer-mdp" name="confirmer_mdp" autocomplete="current-password">
                    </div>
                </div>

                <input type="submit" value="Créer" class="btn-creer">

            </form>
            <div>
                <a class="btn btn-liste" href="employe-afficher">
                    Liste des employés
                </a>
            </div>

            <div>
                <a class="btn btn-gestion" href="tout-gerer">
                    Page de gestion
                </a>
            </div>
            <div>
                <a class="btn btn-deconnecter" href="deconnecter">
                    Déconnecter
                </a>
            </div>

        </section>
    </div>
</body>

</html>