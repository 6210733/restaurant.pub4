<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un plat</title>
    <?php include("views/parts/head.inc.php"); ?>
</head>

<body>
    <div class="plan">
        <form class="plat-creer- form" action="plats-reviser" method="POST" enctype="multipart/form-data">
            <h3>Modifiez un plat</h3>
            <input type="hidden" name="id" value="<?= $plat->id ?>">

            <div>
                <label for="nom">Nom du plat</label>
                <input type="text" placeholder="Nom" id="nom" name="nom" value="<?= $plat->nom ?>">
            </div>

            <div>
                <label for="description">Description</label>
                <input type="text" placeholder="Description" id="description" name="description" value="<?= $plat->description ?>">
            </div>

            <div>
                <label for="prix">Prix</label>
                <input type="number" step="0.01" placeholder="Prix" id="prix" name="prix" value="<?= $plat->prix ?>">
            </div>
            <div>
                <label for="section_id">Section</label>
                <select name="section_id" id="section_id">
                    <?php foreach ($sections as $section) : ?>
                        <option value="<?= $section->id ?>" <?= $section->id == $plat->section_id ? "selected" : "" ?>>
                            <?= $section->nom ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="categorie_id">Catégorie</label>
                <select name="categorie_id" id="categorie_id">
                    <?php foreach ($categories as $categorie) : ?>
                        <option value="<?= $categorie->id ?>" <?= $categorie->id == $plat->categorie_id ? "selected" : "" ?>>
                            <?= $categorie->nom ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="submit" value="Modifier">
            <a class="btn btn-liste" href="plats">Retour à la liste des plats</a>
        </form>
    </div>
</body>

</html>