<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("views/parts/head.inc.php"); ?>
    <title>Modifier l'employé</title>
</head>

<body>
    <?php if (isset($_GET["infos_absentes"])) : ?>
        <p class="msg erreur">Toutes les informations sont requises</p>
    <?php endif; ?>
    <div class="plan">
        <section class="form">
            <?php if (isset($employe) && is_object($employe)) : ?>
                <form action="employe-reviser" method="post">
                    <h3>Modifier un employé</h>
                        <input type="hidden" name="id" value="<?= $employe->id; ?>">
                        <label for="nom">Nom:</label>
                        <input type="text" name="nom" value="<?= $employe->nom; ?>"><br>

                        <label for="prenom">Prénom:</label>
                        <input type="text" name="prenom" value="<?= $employe->prenom; ?>"><br>

                        <label for="courriel">Courriel:</label>
                        <input type="email" name="courriel" value="<?= $employe->courriel; ?>"><br>

                        <label for="role">Rôle:</label>
                        <select name="role">
                            <option value="Employé" <?= ($employe->role == 'Employé') ? 'selected' : ''; ?>>Employé</option>
                            <option value="Gestionnaire" <?= ($employe->role == 'Gestionnaire') ? 'selected' : ''; ?>>Gestionnaire</option>
                        </select><br>

                        <label for="nouveau_mdp">Nouveau mot de passe:</label>
                        <input type="password" name="nouveau_mdp"><br>

                        <input type="submit" value="Enregistrer les modifications">
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
                </form>
            <?php else : ?>
                <p>Employé non trouvé.</p>
            <?php endif; ?>
        </section>
    </div>
</body>

</html>