<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Javascripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <!-- Project Files -->
    <link rel="stylesheet" href="js/jquery.bootstrap.year.calendar.css">
    <script src="js/jquery.bootstrap.year.calendar.js"></script>
    <!--Title-->
    <title>Jquery Bootstrap Year Calendar - Basic Example</title>
</head>

<body>
<?php 
include("header.php");
include('functions.php'); 

if(isset($_SESSION['login'])){
    $infoUser= infoUser($_SESSION['login']);
    ?>

<div class="container">
    <div class="calendar"></div>
</div>


<!-- Modal confirmation information -->
<div class="modal fade" id="choixHeure" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div id="date" name="date"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="retour" data-dismiss="modal">Retour</button>
        <form method="POST">
            <input type="hidden" name="jour" id="jourHidden" value="">
            <input type="hidden" name="mois" id="moisHidden" value="">
            <input type="hidden" name="annee" id="anneeHidden" value="">
            <button type="submit" name="valider" id="validerResa" class="btn btn-primary">Recommencer</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php

 if(isset($_POST['valider'])){
    date_default_timezone_set("Europe/Paris");
    
    $dateDemande =  date('Y-m-d');
    $dateResa = $_POST['annee']."-".$_POST['mois']."-".$_POST['jour'];

    $sqlVerif = ("SELECT * FROM demande_autorisation WHERE login='".$_SESSION['login']."' AND date_reservation='".$dateResa."'");
    $reqVerif = $DB -> query($sqlVerif);
    $res = $reqVerif -> fetch(PDO::FETCH_ASSOC);


    $sqlVerif2 = ("SELECT * FROM reservation WHERE login='".$_SESSION['login']."' AND date_reservation='".$dateResa."'");
    $reqVerif2 = $DB -> query($sqlVerif2);
    $res2 = $reqVerif2 -> fetch(PDO::FETCH_ASSOC);
    
    if(!$res && !$res2){
        $sql = ("INSERT INTO `demande_autorisation` (`login`,`date_reservation`,`date_demande`) VALUE ('".$_SESSION['login']."','".$dateResa."','".$dateDemande."')");
        $req = $DB-> query($sql);
    }
    else{
        ?>
        <!-- Modal confirmation information -->
        <div class="modal fade show" style="display:block" id="erreurModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Attention</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            Vous avez déjà fait une demande d'autorisation pour ce jour.</br>Elle à été peut être valider, jeter un coup d'oeil à votre profil.</br></br>Dans le cas contraire, merci de patienter</br> vous aurez une réponse dans les plus brefs délais</br>
                </div>
                <div class="modal-footer">
                    <button type="button" id="erreur" class="btn btn-secondary" data-dismiss="modal">J'ai compris</button>
                <form method="POST">
                </form>
            </div>
            </div>
        </div>
        </div>
        <?php

    }

 }

?>
    
    <?php }

else{
    echo header("location:connexion.php");
} ?>

<script src="js/calendrier.js"></script>
</body>
</html>