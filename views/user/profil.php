<?php require_once("views/components/header.php"); ?>

<h1>Mon Profil</h1>

<div class="container">

    <div>
        <p><strong>Pseudo :</strong> <?= htmlspecialchars($_SESSION['pseudo']) ?></p>
        <p><strong>Rôle :</strong> <?= htmlspecialchars($_SESSION['role']) ?></p>
        <p> <?php echo $note_user[0]; ?> </p>
        <p> <?php echo $user["credit"];  ?> crédits</p>

    </div>

        <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
        <label class="btn btn-outline-primary" for="btn-check-outlined">Chauffeur</label>

        <input type="checkbox" class="btn-check" id="btn-check-2-outlined" checked autocomplete="on">
        <label class="btn btn-outline-primary" for="btn-check-2-outlined">Passager</label>

    <div>

    <div>
        <p>Un trajet de prévue ? <a href="index.php?controller=trajet&action=creation">Créez-le maintenant</a></p>
    </div>

    <div>
        <h2>Vos véhicules</h2>
        <button>ajouter voitures</button>
        <?php
            var_dump($vehicules);
        ?>

    </div>

    <div>
        <h2>Vos préferences</h2>
        <?php
            //methode pour afficher preferences
        ?>
        <button>Ajouter</button>
    </div>

    <div>
        <h2>Historiques covoiturages</h2>
        <?php
            //methode pour afficher historique
        ?>
    </div>

    </div>
</div>





<a href="modifier_profil.php">Modifier mes informations</a> |
<a href="historique.php">Voir mon historique</a> |
<a href="logout.php">Se déconnecter</a>

<?php require_once("views/components/footer.php"); ?>

