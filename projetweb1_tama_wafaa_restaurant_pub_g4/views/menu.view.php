<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include("views/parts/head.inc.php"); ?>
  <title>Menu Restaurant Pub G4</title>

</head>

<body>
  <div class="conteneur">
    <?php include("views/parts/header.inc.php"); ?>
    <div class="menu">

      <div class="titre">
        <h1>Notre Menu</h1>
        <p>*Peut contenir des traces de noix et de fruits de mer</p>
      </div>
      <div class="chef">
        <img src="public/img/chef.jpg" alt="">
      </div>

    </div>
    <div class="categories-menu">
      <a href="#entrees">Entrées</a>
      <a href="#repas">Repas</a>
      <a href="#desserts">Desserts</a>
    </div>

    <div class="menu-entree" id="entrees">
      <div class="image">
        <img id="plat-image" src="public/img/entrees/salade_du_jour.jpg" alt="Plat">
      </div>

      <div class="menu-details">
        <h2>LES ENTRÉES</h2>
        <hr>
        <?php foreach ($plats as $plat) : ?>
          <?php if ($plat->nom_section === 'entrée') : ?>
            <div class="table">
              <div class="cell-nom">
                <h4><?= $plat->nom; ?></h4>
              </div>
              <div class="cell-description">
                <p><?= $plat->description; ?></p>
              </div>
              <div class="cell-prix">
                <h4><?= $plat->prix; ?></h4>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>

      </div>
    </div>

    <div class="menu-repas" id="repas">
      <div class="menu-details">
        <h2>LES REPAS</h2>
        <hr>
        <?php foreach ($plats as $plat) : ?>
          <?php if ($plat->nom_section === 'repas') : ?>
            <div class="table">
              <div class="cell-nom">
                <h4><?= $plat->nom; ?></h4>
              </div>
              <div class="cell-description">
                <p><?= $plat->description; ?></p>
              </div>
              <div class="cell-prix">
                <h4><?= $plat->prix; ?></h4>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>

      </div>
      <div class="image">
        <img id="plat-image" src="public/img/repas/filets_de_poulet.jpg" alt="Plat">
      </div>
    </div>

    <div class="menu-dessert" id="desserts">
      <div class="image">
        <img id="plat-image" src="public/img/desserts/gateau_fromage_caramel.jpg" alt="Plat">
      </div>
      <div class="menu-details">
        <h2>LES DESSERTS</h2>
        <hr>
        <?php foreach ($plats as $plat) : ?>
          <?php if ($plat->nom_section === 'dessert') : ?>
            <div class="table">
              <div class="cell-nom">
                <h4><?= $plat->nom; ?></h4>
              </div>
              <div class="cell-description">
                <p><?= $plat->description; ?></p>
              </div>
              <div class="cell-prix">
                <h4><?= $plat->prix; ?></h4>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
    <?php include("views/parts/footer.inc.php"); ?>
  </div>
</body>

</html>