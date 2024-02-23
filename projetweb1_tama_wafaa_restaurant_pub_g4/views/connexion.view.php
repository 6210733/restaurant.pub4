<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compte Admin</title>
    <?php include("views/parts/head.inc.php"); ?>
</head>

<body>
    <?php if (isset($_GET["echec_connexion"])) : ?>
        <p class="msg erreur">Le mot de passe et l'adresse e-mail ne concordent pas.</p>
    <?php endif; ?>
    <?php if (isset($_GET["succes_deconnexion"])) : ?>
        <p class="msg succes">Vous avez été déconnecté(e) avec succès.</p>
    <?php endif; ?>
    <div class="plan">
        <section class="connexion form">
            <form action="compte-valider" method="POST">
                <h3>Connectez-vous!</h3>

                <label for="courriel">Courriel Employé</label>
                <input type="email" placeholder="Courriel" id="courriel" name="courriel">

                <label for="mdp">Mot de passe</label>
                <input type="password" placeholder="Mot de passe" id="mdp" name="mdp" autocomplete="current-password">


                <input type="submit" value="Connexion">

                <div class="logo">
                    <a href="index">
                        <img src="public/img/logo.png" alt="logo" style="width: 124px; height: 84px;">
                    </a>
                </div>
            </form>
        </section>
    </div>
</body>

</html>