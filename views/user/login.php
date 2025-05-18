<?php
    if(isset($error)) { ?>
       <p> <? htmlspecialchars($error) ?> </p>
<?php } ?>

<form method="POST" action="index.php?controller=user&action=login">
    <div class="mt-3 p-3 col-md-6 offset-md-3">

        <h2 class="text-center">Connexion</h2>

        <div class="mb-3">
            <label for="Identifiant" class="form-label">Identifiant</label>
            <input type="text" class="form-control" id="Identifiant" name="id" placeholder="Email ou pseudo" aria-describedby="emailHelp" required>
        </div>

        <div class="mb-3">
            <label for="input_password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="input_password" name="password" required>
        </div>
        <p>Pas encore de compte ? <a href="index.php?controller=user&action=register">Inscrivez-vous ici !</a></p>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </div>
  
</form>

<?php require_once("views/components/footer.php"); ?>
