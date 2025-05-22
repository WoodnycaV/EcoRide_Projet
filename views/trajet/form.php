<?php // verifier que les erreurs fonctionnent

    if(isset($error)) { 

?>
    <p> <? htmlspecialchars($error) ?> </p>

<?php } ?>

<?php require_once("views/components/header.php"); ?>

<form method="POST" action="index.php?controller=trajet&action=creation">
    <div class="mt-3 p-3 col-md-6 offset-md-3">

        <h1 class="text-center pb-3">Créer votre trajet</h1>
        

        <div class="mb-3">
            <label for="input_lieu_dep" class="form-label">Lieu de départ</label>
            <input type="text" class="form-control" id="input_lieu_dep" name="lieu_dep" placeholder="Paris, Bordeau ..." aria-describedby="lieu_depHelp" required>
        </div>

        <div class="mb-3">
            <label for="input_lieu_arr" class="form-label">Lieu d'arrivée</label>
            <input type="text" class="form-control" id="input_lieu_arr" name="lieu_arr" placeholder="Nantes, Lyon ..." aria-describedby="lieu_arrHelp" required>
        </div>

        <div class="mb-3">
            <label for="input_heure_dep" class="form-label">Heure de départ</label>
            <input type="time" id="input_heure_dep" class="form-control" name="heure_dep" aria-describedby="heure_depHelp" required />
        </div>

        <div class="mb-3">
            <label for="input_heure_arr" class="form-label">Heure d'arrivée</label>
            <input type="time" id="input_heure_arr" class="form-control" name="heure_arr" aria-describedby="Heure_arrHelp" required />
        </div>

        <div class="mb-3">
            <label for="input_date" class="form-label">Date</label>
            <input type="date" class="form-control" id="input_date" name="date" aria-describedby="dateHelp" required>
        </div>

        <div class="mb-3">
            <label for="input_prix" class="form-label">Prix</label>
            <input type="number" class="form-control" id="input_prix" name="prix" min="3" max="50" required>
        </div>

        <div class="mb-3">
            <label for="input_nb_place" class="form-label">Nombre de place disponibles</label>
            <input type="number" class="form-control" id="input_nb_place" name="nb_place" min="1" max="10" required>
        </div>

        <div class="mb-3">
            <label for="input_voiture" class="form-label">Sélectionnez une voiture :</label>
            <select class="form-control" name="voiture" id="input_voiture">

                <?php   
                    foreach($vehicules as $voiture) {
                        foreach($voiture as $plaque)
                       echo '<option value="'. $plaque.'">'.$plaque.'</option>';
                    }
                
                ?> 
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Publier le trajet</button>
    </div>
  
</form>

<?php require_once("views/components/footer.php"); ?>