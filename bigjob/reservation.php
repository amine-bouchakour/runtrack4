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

$tabJour = ["","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","Dimanche"];
$tabHeure = ["08h","09h","10h","11h","12h","13h","14h","15h","16h","17h","18h"];

?>
<div id="titrePage" class="col-12 p-2 bg-warning" >Planning et Réservations</div>
<br>

<!-- RESERVATION CRENEAU -->

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Faire une demande de réservation</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Avant propos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Provident placeat aspernatur quos ipsam delectus aliquid eius. Minus laborum quas debitis reprehenderit eligendi animi ipsam culpa eveniet laboriosam. Praesentium quas pariatur aut deserunt laborum ab ea, voluptatum beatae ipsam quisquam tempora sunt numquam nisi totam unde dolore voluptatibus quae odit, iure dignissimos aspernatur eum inventore voluptates. Minima at dolor aut repudiandae fuga, libero numquam assumenda ratione consequuntur natus accusamus, rerum inventore. Minima accusantium repellat, fugiat veniam maiores beatae possimus excepturi totam, eius similique officiis voluptatem eveniet eligendi! Consequuntur modi temporibus iste obcaecati in sequi accusamus incidunt? Totam voluptate minima aperiam cupiditate.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-dismiss="modal" data-target="#exampleModalCenter2">Accepter</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Demande d'autorisation d'accès à la Plateforme_</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reiciendis consequuntur labore tenetur earum soluta ea magni aliquam, blanditiis distinctio et est alias, enim in dolor. In vitae, numquam quod non, eos consectetur beatae quam veritatis animi optio odio aspernatur libero nihil vel illum a delectus? Vel sapiente, voluptatem sunt quis deserunt reiciendis, beatae earum similique exercitationem dolorem accusamus, commodi consectetur?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
        <form method="POST">
          <button type="button" class="btn btn-primary" onclick="window.location.href = 'calendrier.php';">Choisir votre date</button>
        </form>
        <?php if(isset($_POST['goCalender'])){header("location:calendrier.php");} ?>
      </div>

    </div>
  </div>
</div>


<div class="">


    <table id="table" class="table-hover table-dark  " id="border-radius">

        <thead>
            <tr>
                <?php
                    for($i = 0; $i < count($tabJour); $i++ ){
                    ?>
                        <!-- JOUR DE LA SEMAINE EN HAUT -->
                        <th id="tailleJour" scope="col"><?php echo $tabJour[$i] ?></th>
                    <?php
                    }
                ?>
            </tr>
        </thead>


        <tbody>

                <?php
                for($j = 0; $j < count($tabHeure); $j++){
                    $nbHeure = count($tabHeure);
                    ?>

            <tr>
                <!-- HEURE A GAUCHE -->
                <th scope="row" id="tailleHeure" class="bg-warning"><?php echo $tabHeure[$j]; ?>
                    <?php

                    for($k = 1; $k < count($tabJour); $k++){
                        ?>
                </th>
                            
                    <!-- JOUR ET HEURE DANS PLANNING     -->
                    <td id="<?php echo $tabJour[$k]."-".$tabHeure[$j] ?>"><?php
                        
                        // VERIFICATION CRENEAU LIBRE

                        $libre ="ok";

                        if($libre == "ok"){
                            ?>
                                <div id="divCrenauLibre">
                            <?php
                            // contenu du planning
                            echo "Libre";

                            ?>
                                </div>
                            <?php
                        }
                        else{
                            ?>
                            <div id="divCrenau">
                            <?php
                            // contenu du planning
                            echo "Libre";

                            ?>
                                </div>
                            <?php
                        }
                            ?> 
                    </td>      

                            <?php
                    }
                    
                }
                ?>

            </tr>
        </tbody>

    </table>
</div>



<?php }
else{
    header("location:connexion.php");
}
?>

<!-- <script src="js/calendrier.js"></script> -->
</body>
</html>