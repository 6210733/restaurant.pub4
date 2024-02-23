<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des plats</title>
    <?php include("views/parts/head.inc.php"); ?>
</head>

<body>
    <?php if (isset($_GET["succes_connexion"])) : ?>
        <p class="msg flash succes">Vous êtes connecté!</p>
    <?php endif; ?>

    <?php if (isset($_GET["succes_ajout_plats"])) : ?>
        <p class="msg flash succes">Le plat a été ajouté!</p>
    <?php endif; ?>

    <?php if (isset($_GET["plat_inexistante"])) : ?>
        <p class="msg flash erreur">Le plat n'existe pas</p>
    <?php endif; ?>

    <?php if (isset($_GET["echec_suppression"])) : ?>
        <p class="msg flash erreur">Le plat n'a pas pu être supprimé. Réessayez plus tard.</p>
    <?php endif; ?>

    <?php if (isset($_GET["succes_suppression"])) : ?>
        <p class="msg flash succes">
            Le plat a été supprimé!
        </p>
    <?php endif; ?>
    <?php if (isset($_GET["echec_modification_plat"])) : ?>
        <p class="msg succes">
            Le plat n'a pas été modifié
        </p>
    <?php endif; ?>
    <?php if (isset($_GET["succes_modification_plat"])) : ?>
        <p class="msg succes">
            Le plat a été modifié
        </p>
    <?php endif; ?>

    <div class="page-plats">
        <h1>Liste de tous les plats</h1>
        <div>
            <a class="btn btn-gerer" href="tout-gerer">
                Page de gestion
            </a>
        </div>
        <div>
            <a class="btn btn-ajout" href="plat-creer">
                Ajoutez un plat
            </a>
        </div>
        <div>
            <a class="btn btn-deconnexion" href="deconnecter">
                Déconnecter
            </a>
        </div>
        <div class="plats">
            <h2>LISTE DES ENTRÉES</h2>
            <div class="menu-entrees">
                <table>
                    <tr>
                        <th>Nom</th>
                        <th class="description">Description</th>
                        <th>Prix</th>
                        <th>Catégorie</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                    <?php foreach ($plats as $plat) : ?>
                        <?php if ($plat->nom_section === 'entrée') : ?>
                            <tr>
                                <td><?= $plat->nom; ?></td>
                                <td><?= $plat->description; ?></td>
                                <td><?= $plat->prix; ?></td>
                                <td><?= $plat->nom_categorie; ?></td>
                                <td>
                                    <a class="btn btn-modifier" href="plats-modifier?id=<?= $plat->id ?>">Modifier</a>
                                </td>
                                <td>
                                    <a class="btn btn-supprimer" href="plats-supprimer?id=<?= $plat->id ?>">Supprimer</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </table>
            </div>
            <h2>LISTE DES REPAS</h2>
            <div class="menu-repas">
                <table>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Catégorie</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                    <?php foreach ($plats as $plat) : ?>
                        <?php if ($plat->nom_section === 'repas') : ?>
                            <tr>
                                <td><?= $plat->nom; ?></td>
                                <td><?= $plat->description; ?></td>
                                <td><?= $plat->prix; ?></td>
                                <td><?= $plat->nom_categorie; ?></td>

                                <td>
                                    <a class="btn btn-modifier" href="plats-modifier?id=<?= $plat->id ?>">Modifier</a>
                                </td>
                                <td>
                                    <a class="btn btn-supprimer" href="plats-supprimer?id=<?= $plat->id ?>">Supprimer</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </table>
            </div>
            <h2>LISTE DES DESSERTS</h2>
            <div class="menu-desserts">

                <table>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Catégorie</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                    <?php foreach ($plats as $plat) : ?>
                        <?php if ($plat->nom_section === 'dessert') : ?>
                            <tr>
                                <td><?= $plat->nom; ?></td>
                                <td><?= $plat->description; ?></td>
                                <td><?= $plat->prix; ?></td>
                                <td><?= $plat->nom_categorie; ?></td>

                                <td>
                                    <a class="btn btn-modifier" href="plats-modifier?id=<?= $plat->id ?>">Modifier</a>
                                </td>
                                <td>
                                    <a class="btn btn-supprimer" href="plats-supprimer?id=<?= $plat->id ?>">Supprimer</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        </main>
</body>

</html>