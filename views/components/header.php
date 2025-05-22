  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">EcoRide</a>
        <button class="navbar-toggler" type="button" href="index.php?controller=acceuil&action=index" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" href="index.php?controller=acceuil&action=index">Acceuil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">Covoiturage</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="pages/Contact.php">Contact</a>
            </li>
            
            <?php
              if(isset($_SESSION['user_id'])) {
                echo '<li class="nav-item"><a class="nav-link active" href="index.php?controller=user&action=profil">Profil</a></li>';
                echo '<li class="nav-item"><a class="nav-link active" href="index.php?controller=user&action=logout">Deconnexion</a></li>';
                 
              } else {
                    echo '<li class="nav-item"><a class="nav-link active" href="index.php?controller=user&action=login">Connexion</a></li>';
                }
                ?>
            
          </ul>
        </div>
      </div>
    </nav>
  </header>



