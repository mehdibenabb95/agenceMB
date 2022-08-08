<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="public/css/style.css">
  
  <link rel="stylesheet" href="./public/bootstrap-5/css/bootstrap.min.css" crossorigin="anonymous">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" data-auto-replace-svg="nest"></script>
  <script src="./public/js/script.js"></script>
  <title>Agence_de_voyage</title>
</head>





<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand"><img src="./public/img/app-logo.svg" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"  >
    <!-- aria-expanded="false" aria-label="Toggle navigation" -->
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto py-4 py-md-0">

        <li class="nav-item pl-4 pl-md-3 ml-0 ml-md-4">
          <a class="nav-link" href="./?path=main&action=accueil">Accueil</a>
        </li>
        <li class="nav-item pl-4 pl-md-3 ml-0 ml-md-4">
          <a class="nav-link" href="./?path=main&action=sejour">Séjour</a>
        </li>

        <li class="nav-item pl-4 pl-md-3 ml-0 ml-md-4">
          <a class="nav-link" href="./?path=main&action=Apropos">A propos</a>
        </li>

        <li class="nav-item pl-4 pl-md-3 ml-0 ml-md-4">
          <a class="nav-link" href="./?path=main&action=contact">Contact</a>
        </li>
        <li class="nav-item pl-4 pl-md-3 ml-0 ml-md-4">
          <a class="nav-link" href="./?path=main&action=livredor">Livre d'or</a>
        </li>
        <?php if (isset($_SESSION['role'])) : ?>
          <?php if ($_SESSION['role'] == "customer") : ?>
            <li class="nav-item pl-4 pl-md-3 ml-0 ml-md-4">
              <a class="nav-link" href="./?path=customer&action=mesreservations">Mes reservations</a>
            </li>
          <?php endif; ?>
        <?php endif; ?>
        <?php if (isset($_SESSION['role'])) : ?>
          <?php if ($_SESSION['role'] == "admin") : ?>
            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
              <a class="nav-link" href="./admin/index.php">Admin</a>
            </li>
          <?php endif; ?>
        <?php endif; ?>

        <?php if (!isset($_SESSION['role'])) : ?>

          <li id="profil pl-4 pl-md-3 ml-0 ml-md-4">
            <a class="seconnecter btn btn-warning  mt-2" value="submit" href="./?path=main&action=login">Se connecter</a>
          </li>

        <?php else : ?>
          <div class="app-utility-item app-user-dropdown dropdown">
            <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
              </svg>
            </a>
            <ul class="dropdown-menu " aria-labelledby="user-dropdown-toggle">
              <li><a class="dropdown-item" href="./?path=customer&action=profilcustomer">Mon compte</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="./?path=main&action=deconnexion">Déconnexion</a></li>

            </ul>
          <?php endif; ?>

          </div>
      </ul>
    </div>


  </nav>

</div>