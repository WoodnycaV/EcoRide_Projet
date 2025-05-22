<?php // verifier que les erreurs fonctionnent

    if(isset($error)) { 

?>
    <p> <? htmlspecialchars($error) ?> </p>

<?php } ?>

<?php require_once("views/components/header.php"); ?>

<form method="POST" action="index.php?controller=preference&action=ajouter">
    <div class="mt-3 p-3 col-md-6 offset-md-3">

        <h1 class="text-center pb-3">Ajouter vos preferences</h1>
        

        <div class="mb-3">
            <label for="input_nom" class="form-label">Nom de la préference</label>
            <input type="text" class="form-control" id="input_nom" name="nom" placeholder="non-fumeur, non-animal, ..." aria-describedby="nomHelp" required>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </div>

<?php require_once("views/components/footer.php"); ?>