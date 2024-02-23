<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listes des employés</title>
    <?php include("views/parts/head.inc.php"); ?>
</head>

<body>
    <?php if (isset($_GET["employe_supprime"])) : ?>
        <p class="msg succes">L'employé est supprimé(e).</p>
    <?php endif; ?>
    <?php if (isset($_GET["echec_modification_employe"])) : ?>
        <p class="msg succes">
            L'employé n'a pas été modifié
        </p>
    <?php endif; ?>
    <?php if (isset($_GET["succes_modification_employe"])) : ?>
        <p class="msg succes">
            L'employé a été modifié
        </p>
    <?php endif; ?>

    <div class="employes">
        <h1>Liste de tous les employés</h1>
        <div class="liens">
            <div>
                <a class="btn btn-gestion" href="tout-gerer">
                    Page de gestion
                </a>
            </div>
            <div>
                <a class="btn btn-creer" href="employe-ajouter">
                    Ajoutez un employé
                </a>
            </div>
            <div>
                <a class="btn btn-deconnecter" href="deconnecter">
                    Déconnecter
                </a>
            </div>
        </div>
        <div class="cartes-employe">


            <?php foreach ($employes as $employe) : ?>
                <div class="carte">
                    <div class="carte-header">
                        <p class="carte-nom"> Nom: <?= $employe->nom; ?></p>
                        <p class="carte-label">Prénom: <?= $employe->prenom; ?></p>
                    </div>
                    <div class="carte-info">
                        <p class="carte-label">Courriel:<?= $employe->courriel; ?></p>
                        <span class="carte-role"><?= $employe->role; ?></span>
                    </div>
                    <div class="carte-actions">
                        <a class="btn btn-modifier" href="employe-modifier?id=<?= $employe->id; ?>">Modifier</a>
                        <a class="btn btn-supprimer" href="employe-supprimer?id=<?= $employe->id; ?>">Supprimer</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>