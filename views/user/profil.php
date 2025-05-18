<h2>Mon Profil</h2>

<p><strong>Pseudo :</strong> <?= htmlspecialchars($_SESSION['pseudo']) ?></p>
<p><strong>Rôle :</strong> <?= htmlspecialchars($_SESSION['role']) ?></p>

<a href="modifier_profil.php">Modifier mes informations</a> |
<a href="historique.php">Voir mon historique</a> |
<a href="logout.php">Se déconnecter</a>

<?php require_once("views/components/footer.php"); ?>

