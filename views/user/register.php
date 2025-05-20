<?php // verifier que les erreurs fonctionnent

    if(isset($error)) { 

?>
    <p> <? htmlspecialchars($error) ?> </p>

<?php } ?>


<form method="POST" action="index.php?controller=user&action=register">
    <div class="mt-3 p-3 col-md-6 offset-md-3">

        <h1 class="text-center pb-3">Inscription</h1>
        <h2>Réservez votre prochain trajet et profitez de 20 crédit offert</h2>

        <div class="mb-3">
            <label for="input_pseudo" class="form-label">Pseudo</label>
            <input type="text" class="form-control" id="input_pseudo" name="pseudo" placeholder="Entrer un pseudo" aria-describedby="pseudoHelp" required>
        </div>

        <div class="mb-3">
            <label for="input_email" class="form-label">Email</label>
            <input type="text" class="form-control" id="input_email" name="email" placeholder="Entrer votre email" aria-describedby="emailHelp" required>
        </div>

        <div class="mb-3">
            <label for="input_password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="input_password" name="password" placeholder="Mot de passe" required>
        </div>

        <div class="mb-3">
            <label for="input_password_confirm" class="form-label">Confirmer votre mot de passe</label>
            <input type="password" class="form-control" id="input_password_confirm" name="password_confirm" placeholder="Confirmer votre mot de passe" required>
        </div>

        <p>Vous avez déja un compte ? <a href="index.php?controller=user&action=register">Connectez-vous !</a></p>
        <button type="submit" class="btn btn-primary">Créer un compte</button>
    </div>
  
</form>

<?php require_once("views/components/footer.php"); ?>