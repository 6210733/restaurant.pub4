<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restaurant Pub G4</title>
  <?php include("views/parts/head.inc.php"); ?>
</head>

<body>
  <div class="erreur-message">

    <?php if (isset($_GET["infos_absentes"])) : ?>
      <p class="msg erreur">
        Merci de remplir tout les champs.</p>
    <?php endif; ?>

    <?php if (isset($_GET["echec_ajout_compte"])) : ?>
      <p class="msg erreur">
        L'ajout de vos informations a échoué. Veuillez réessayer plus tard.</p>
    <?php endif; ?>

    <?php if (isset($_GET["succes_ajout_compte"])) : ?>
      <p class="msg succes">
        Merci pour votre adhésion à notre infolettre ! Restez informé(e) et profitez d'avantages exclusifs.</p>
    <?php endif; ?>
  </div>
  <div class="conteneur">
    <?php include("views/parts/header.inc.php"); ?>
    <div class="appel-action">
      <img src="public/img/tartare_legume copie.png" alt="accueil">
      <div class="bienvenue">
        <h3>
          Bienvenue au PUB G4 Découvrez une cuisine raffinée, préparée avec passion et servi avec élégance.
        </h3>
        <a href="menu">
          <button>
            Découvrez Nos Plats
          </button>
        </a>
      </div>
    </div>

    <div class="presentation">
      <h1>
        Une cuisine vibrante et audacieuse
      </h1>
      <p>
        Nous mettons l'accent sur l'innovation et l'originalité. notre équipe de chefs talentueux repousse constamment
        les limites de la gastronomie en créant des plats uniques et savoureux. chaque assiette est une œuvre d'art
        culinaire, présentée avec soin et élégance.
      </p>
    </div>

    <div class="notre-menu">
      <a href="menu">Notre Menu</a>
    </div>

    <div class="galerie">
      <div class="g1">
        <div class="image">
          <img src="public/img/filets_de_poulet.jpg" alt="Image 1">
          <p>Filets de poulet, tendres et juteux, accompagnés de frites. </p>
        </div>
        <div class="image">
          <img src="public/img/tartare_legume.jpg" alt="Image 2">
          <p>Nachos croustillants, généreusement garnis, un régal irrésistible.</p>
        </div>
        <div class="image">
          <img src="public/img/potage_du_moment.jpg" alt="Image 3">
          <p>Potage frais et délicieux et savoureux.</p>
        </div>
      </div>

      <div class="g2">
        <div class="image">
          <img src="public/img/salade_du_jour.jpg" alt="Image 4">
          <p>Salade du jour.fraîche et colorée, pleine de saveurs.</p>
        </div>
        <div class="image">
          <img src="public/img/calamar.jpg" alt="Image 5">
          <p>Calamar tendre et succulent, délicatement grillé à la perfection.</p>
        </div>
        <div class="image">
          <img src="public/img/brownie.jpg" alt="Image 6">
          <p>Brownie moelleux et chocolaté, une gourmandise irrésistible</p>
        </div>
      </div>

      <div class="voir-notre-menu">
        <a href="menu">
          <button>Voir Notre Menu</button>
        </a>
      </div>
    </div>
    <div id="app">
      <div v-if="commentaire_actuel">
        <p>{{ commentaire_actuel.texte }}</p>
        <p>
          <template v-if="commentaire_actuel.note === 5">
            <i class="material-icons">star</i>
            <i class="material-icons">star</i>
            <i class="material-icons">star</i>
            <i class="material-icons">star</i>
            <i class="material-icons">star</i>
          </template>
          <template v-else-if="commentaire_actuel.note === 4.5">
            <i class="material-icons">star</i>
            <i class="material-icons">star</i>
            <i class="material-icons">star</i>
            <i class="material-icons">star</i>
            <i class="material-icons">star_half</i>
          </template>
          <template v-else-if="commentaire_actuel.note === 4">
            <i class="material-icons">star</i>
            <i class="material-icons">star</i>
            <i class="material-icons">star</i>
            <i class="material-icons">star</i>
          </template>
        </p>
      </div>
    </div>
    <?php include("views/parts/footer.inc.php"); ?>
  </div>
  <script src="public/js/main.js" type="module"></script>
</body>

</html>