<link href="css/profil.css" rel="stylesheet">

<?php require_once("views/components/header.php"); ?>

<h1>Mon Profil</h1>

<div class="container">

    <div>
        <p><strong>Pseudo :</strong> <?= htmlspecialchars($_SESSION['pseudo']) ?></p>
        <p><strong>Rôle :</strong> <?= htmlspecialchars($_SESSION['role']) ?></p>
        <p> <?php echo $note_user[0]; ?> </p>
        <p> <?php echo $user["credit"]; ?> crédits</p>
    </div>

    <div>
        <input type="checkbox" class="btn-check" id="btn_chauffeur">
        <label class="btn btn-outline-primary" for="btn_chauffeur" data-exist-voiture="<?php echo $_SESSION['voiture_exist']; ?>">Chauffeur</label>

        <input type="checkbox" class="btn-check" id="btn_passager" checked autocomplete="on">
        <label class="btn btn-outline-primary" for="btn_passager">Passager</label>
    </div>

    <div id="page_chauffeur">
        <div class="pt-3">
            <p>Un trajet de prévue ? <a <?php if($vehicules) { echo 'href="index.php?controller=trajet&action=creation"';} else { echo 'href="index.php?controller=voiture&action=enregistrer"';}?> >Créez-le maintenant</a></p>
        </div>


        <div >
            <h2>Vos véhicules</h2>
            <button id="btn_voiture"> <a href="index.php?controller=voiture&action=enregistrer">ajouter voitures</a> </button>
            <?php
            if($vehicules) {
                foreach($vehicules as $voiture) {
                    echo "<button>". $voiture['plaque_immatriculation'] ."</button>"; 
                }
            }
            ?>
        </div>

        <div class="pt-3">
            <h2>Vos préferences</h2>
            <?php
                if($preferences_user) {
                    foreach($preferences_user as $preference) {
                        echo "<button>". $preference ."</button>"; 
                }
                }
            ?>
            <button>Ajouter</button>
        </div>
    </div>

    <div class="pt-3">
        <h2>Historiques covoiturages</h2>

        <nav>
            <ul class="nav nav-underline" >
                <li class="nav-item">
                    <a class="nav-link"  href="#" onclick="afficheTab('trajet', event)" id="lien_trajet">Trajets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="afficheTab('reservation', event)" id="lien_reservation">Réservations</a>
                </li>
            </ul>
        </nav>
        
        <div class="tab" id="tab_trajet">
            <h3>Mes trajets</h3>
            <?php 
                if ($trajet_user) {
                    echo "<ul>";
                    foreach ($trajet_user as $trajet) {
                        echo "<li>". $trajet['date_depart'] . "\n" . $trajet['lieu_depart'] . " → " . $trajet['lieu_arrivee'] . " le " . " à " . $trajet['heure_depart'] . "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>Aucun trajet créé.</p>";
                }
           ?>
        </div>

        <div class="tab" id="tab_reservation">
            <h3>Mes réservations</h3>
            <?php 
                if ($reservation_user) {
                    echo "<ul>";
                    foreach ($reservation_user as $trajet) {
                        echo "<li>". $trajet['lieu_depart'] . " → " . $trajet['lieu_arrivee'] . " le " . $trajet['date_depart'] . " à " . $trajet['heure_depart'] . "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>Aucune réservation.</p>";
                }
           ?>
        </div>
        
    </div>

    <a href="modifier_profil.php">Modifier mes informations</a> |
    <a href="historique.php">Voir mon historique</a> |
    <a href="logout.php">Se déconnecter</a>

</div>

<script src="js/profil.js"></script>
<?php require_once("views/components/footer.php"); ?>

