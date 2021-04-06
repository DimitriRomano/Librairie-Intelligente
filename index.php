<?php
require "./models/LivreManager.php";
require "./models/EmpruntManager.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Accueil</title>
</head>
<body>
<nav>
  <ul class="menu">
    <li class="logo"><a href="#">Librairie intelligente</a></li>
    <li class="item"><a href="#">Home</a></li>
    <li class="item"><a href="#">Recherche</a></li>
    <li class="item"><a href="#">Session utilisateur</a></li>
    <li class="item"><a href="#">About</a></li>
    
    <li class="item button"><a href="#">Log In</a></li>
    <li class="item button secondary"><a href="#">Sign Up</a></li>
    <li class="toggle"><a href="#"><i class="fas fa-bars"></i></a></li>
  </ul>
</nav>

<!-- Section livres recents    -->

<?php 

$LivreManager = new LivreManager();
$LivreManager->chargementLivres();
$livres = $LivreManager->getLivres();
$livresrecent = $LivreManager->getRecentLivres(5);
?>
<section class="section-recent">
<div class="row">
          <div class="col">
            <h2 class="display-3 text-center bg-info py-4 ">Livres les plus récents </h2>
          </div>
 <div class=" row mx-3">
   
<?php
for($i=0;$i<count($livresrecent);$i++):
?>
<div class="card col-sm px-0">
  <img
    src="https://mdbootstrap.com/img/new/standard/city/062.jpg"
    class="card-img-top"
    alt="..."
  />
  <div class="card-body">
    <h5 class="card-title"><?=$livresrecent[$i]->getTitre() ?></h5>
    <p class="card-text d">
    <?=$livresrecent[$i]->getResume() ?>
    </p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?=$livresrecent[$i]->getAuteur() ?></li>
    <li class="list-group-item"><?=$livresrecent[$i]->getGenre() ?></li>
    <li class="list-group-item"><?=$livresrecent[$i]->getAnnee_edition() ?>s</li>
  </ul>
</div>
<?php
endfor;
?>
</div>
</section>


<!-- Section livres populaires  -->

<?php
  $EmpruntManager = new EmpruntManager();
  $EmpruntManager->chargementEmprunts();
  $livresPopulaires = $EmpruntManager->getIdLivresPopulaires(5);
  $list = $EmpruntManager->PropositionsLivres(1);
  
?>

<section class="section-populaire">
<div class="row">
          <div class="col">
            <h2 class="display-3 text-center bg-info py-4 ">Livres populaires </h2>
          </div>
 <div class=" row mx-3">
<?php
for($i=0;$i<count($livresPopulaires);$i++):
?>
<div class="card col-sm px-0">
  <img
    src="https://mdbootstrap.com/img/new/standard/city/062.jpg"
    class="card-img-top"
    alt="..."
  />
  <div class="card-body">
    <h5 class="card-title"><?=$livresPopulaires[$i]->getTitre() ?></h5>
    <p class="card-text d">
    <?=$livresPopulaires[$i]->getResume() ?>
    </p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?=$livresPopulaires[$i]->getAuteur() ?></li>
    <li class="list-group-item"><?=$livresPopulaires[$i]->getGenre() ?></li>
    <li class="list-group-item"><?=$livresPopulaires[$i]->getAnnee_edition() ?>s</li>
  </ul>
</div>
<?php
endfor;
?>
</div> 
</section>


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="nav.js"></script>
</body>
</html>