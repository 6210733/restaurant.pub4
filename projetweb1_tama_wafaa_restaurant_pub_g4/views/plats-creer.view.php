<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créez un plat</title>
    <?php include("views/parts/head.inc.php"); ?>
</head>

<body>
    <?php if (isset($_GET["infos_absentes"])) : ?>
        <p class="msg erreur"> Tous les champs sont requis</p>
    <?php endif; ?>

    <?php if (isset($_GET["echec_ajout_plat"])) : ?>
        <p class="msg erreur">L'ajout du plat a échoué. Recommencez</p>
    <?php endif; ?>

    <div class="plan">
        <section class="form">

            <form class="plat-creer" action="plat-enregistrer" method="POST" enctype="multipart/form-data">
                <h3>Ajoutez un plat</h3>

                <div>
                    <label for="nom">Nom du plat</label>
                    <input type="text" placeholder="Nom" id="nom" name="nom">
                </div>

                <div>
                    <label for="description">Description</label>
                    <input type="text" placeholder="Description" id="description" name="description">
                </div>

                <div>
                    <label for="prix">Prix</label>
                    <input type="number" step="0.01" placeholder="Prix" id="prix" name="prix">
                </div>
                <div>
                    <label for="section_id">Section</label>
                    <select name="section_id" id="section_id">
                        <?php foreach ($sections as $section) : ?>
                            <option value="<?= $section->id ?>">
                                <?= $section->nom ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="categorie_id">Catégorie</label>
                    <select name="categorie_id" id="categorie_id">
                        <?php foreach ($categories as $categorie) : ?>
                            <option value="<?= $categorie->id ?>">
                                <?= $categorie->nom ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="submit" value="Créer">

                <div>
                    <a class="btn btn-liste" href="plats">
                        Voir liste des plats
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
            </form>
        </section>
    </div>
</body>

</html>