<!DOCTYPE html>
<html lang="fr">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation</title>
    <script src="js/Jquery.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/reservation.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</head>



<body class="Info link bg-light">



<?php
include('header.php');

if(isset($_SESSION['login'])){

  if(!isset($_SESSION['dejaVu'])){

?>

<div id="titrePageOr" class="bg-warning" ><h2>Planning et Réservations</h2></div>
<br><br>

<!-- RESERVATION CRENEAU -->
<div id="titrePage">
  <h2>Conditions d'acceuil</h2><br>

  <b>En cette période de déconfinement nous vous rappellons qu'il faut :</b> </br><br>
  - Respectez les distances appropriées d'un mètre minimum. </br>
  - Porter un masque et se laver régulièrement les mains. <br>
  - Tousser ou éternuer dans le plis de votre coudes. </br><br>
  - Les places seront limitées jusqu'à nouvelle ordre pour éviter la propagation du virus. <br><br>
  - En cas de maladie, ou d'autres difficultées (connexion etc...), </br> merci de nous tenir informé de votre situation.
</div>
<medium>Plus de détails sur le protocole à suivre <a href="https://covid.students-laplateforme.io/">Ici</a></medium><br><br>

<button type="button" class="btn btn-primary" style="font-size: 1.1vw" data-toggle="modal" data-target="#exampleModalCenter">Faire une demande de réservation</button>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="padding">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Demande d'autorisation d'accès à la Plateforme_</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalResa">
        Après avoir fait votre demande, nous vous demandons d'être patient. <br>
        Nous vous répondrons au plus vite. </br>La reponse sera en fonction du nombre de places disponibles. <br>
        Elle sera visible sur votre profil, pensé à aller vérifier de temps à autre. <br><br>
        Merci de votre compréhension.</br> Bon retour à la norme et à très bientôt !
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
        <form method="POST">
          <button type="button" class="btn btn-primary" onclick="window.location.href = 'calendrier.php';">Continuer</button>
        </form>
      </div>

    </div>
  </div>
</div>





<?php

}
else{
  header("Location:calendrier.php");
}
}
else{
    header("location:connexion.php");
}
?>

</body>
</html>