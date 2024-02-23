<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de gestion</title>
    <?php include("views/parts/head.inc.php"); ?>
</head>

<body>
    <?php if (isset($_GET["succes_connexion"])) : ?>
        <p class="msg succes">Vous êtes connecté!</p>
    <?php endif; ?>
    <?php if (isset($_GET["acces-interdit"])) : ?>
        <p class="msg erreur">Vous n'êtes pas autorisé à ajouter un employé!</p>
    <?php endif; ?>

    <div class="plan">
        <div class="lien">
            <a href="employe-ajouter"> Ajouter Un Employé
            </a>
        </div>
        <div class="lien">
            <a href="plat-creer"> Ajouter Un plat
            </a>
        </div>
        <div class="lien deconnexion">
            <a href="deconnecter">Déconnecter
            </a>
        </div>
    </div>
</body>

</html>