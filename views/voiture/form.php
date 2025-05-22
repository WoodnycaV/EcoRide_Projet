<?php // verifier que les erreurs fonctionnent

    if(isset($error)) { 

?>
    <p> <? htmlspecialchars($error) ?> </p>

<?php } ?>

<?php require_once("views/components/header.php"); ?>

<form method="POST" action="index.php?controller=voiture&action=enregistrer">
    <div class="mt-3 p-3 col-md-6 offset-md-3">

        <h1 class="text-center pb-3">Enregistrer votre véhicule</h1>
        

        <div class="mb-3">
            <label for="input_plaque_imma" class="form-label">Plaque d'immatriculation</label>
            <input type="text" class="form-control" id="input_plaque_imma" name="plaque_imma" placeholder="XX-000-XX, XX 000 XX, ..." aria-describedby="plaque_immaHelp" required>
        </div>

        <div class="mb-3">
            <label for="input_date_imma" class="form-label">Date première immatriculation</label>
            <input type="date" class="form-control" id="input_date_imma" name="date_imma" aria-describedby="date_immaHelp" required>
        </div>

        <div class="mb-3">
            <label for="input_marque" class="form-label">Marque</label>
            <input type="text" id="input_marque" class="form-control" name="marque" placeholder="Renault, Peugeot, Kia, ..." aria-describedby="marqueHelp" required />
        </div>

        <div class="mb-3">
            <label for="input_modele" class="form-label">Modèle</label>
            <input type="text" id="input_modele" class="form-control" name="modele" placeholder="Scenic, 206, Picanto, ..." aria-describedby="modeleHelp" required />
        </div>

        <div class="mb-3">
            <label for="input_couleur" class="form-label">Couleur</label>
            <input type="text" class="form-control" id="input_couleur" name="couleur" placeholder="bleu, rouge, noir, ..." aria-describedby="couleurHelp" required>
        </div>

        <div class="mb-3">
            <label for="input_energie" class="form-label">Energie</label>
            <input type="text" class="form-control" id="input_energie" name="energie" placeholder="Diesel, Essence, Hybride, Electrique" aria-describedby="energieHelp" required>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer votre voiture</button>
    </div>
  
</form >

<form method="POST" action="index.php?controller=preference&action=ajouter">

</form>

<?php require_once("views/components/footer.php"); ?>