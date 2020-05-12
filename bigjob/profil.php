<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/profil.css">
    <script src="js/Jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
</head>


<body class="Info link bg-light">

<?php 
include('header.php');
include('functions.php'); 

if(isset($_SESSION['login'])){
    $infoUser= infoUser($_SESSION['login']);
    ?>  
        <?php  if(isset($_POST['modifProfil'])){
            updateProfil($_POST['login'],$_POST['password'],$_POST['confPassword']);
        } ?>
    </section>


    <br><br><br>
    <!-- TABLEAU UTILISATEURS -->
    <h2>Vos demandes d'autorisations</h2>
    <table class="table table-hover table-bordered table-dark" style="border-radius:2em; border:2px white solid;">
    <thead>
    <tr>
    <th scope="col" class="Info link bg-warning" style="border:0.5px white solid; color:black;">Demande</th>
    <th scope="col">Date de réservation</th>
    <th scope="col">Demande fait le</th>
    <th scope="col">Statut</th>
    </tr>
    </thead>
    <tbody>

    <?php




    // REQUETE TOUTES LES DEMANDES D'AUTORISATION EN COURS
    $sql = ("SELECT date_reservation,date_demande FROM `demande_autorisation` WHERE login='".$_SESSION['login']."' ORDER BY date_reservation");
    $req = $DB -> query($sql);
    $i=1;

    while($res = $req -> fetch(PDO::FETCH_OBJ)){
        $date = $res ->date_reservation;
        $newDate = $date[8].$date[9]."/".$date[5].$date[6]."/".$date[0].$date[1].$date[2].$date[3];
        $res ->date_reservation = $newDate;

        $date1 = $res ->date_demande;
        $newDate1 = $date1[8].$date1[9]."/".$date1[5].$date1[6]."/".$date1[0].$date1[1].$date1[2].$date1[3];
        $res ->date_demande = $newDate1;

        ?>
            <tr><th scope="row"><?php echo $i++ ?></th> 
        <?php
        foreach($res as $info){
            ?><td class="text-warning"> <?php
            echo $info;
            ?> </td>
            <?php
        }
        ?>
        <td>
            <div> En Attente</div>
        </td> 
            </tr> 
        <?php
    } ?>

</tbody>
</table>


    <!-- // REPONSE DEMANDE -->
    <table class="table table-hover table-bordered table-dark" style="border-radius:2em; border:2px white solid;">
        <br><br><br>
        <h2>Les réponses</h2>
    <thead>
    <tr>
    <th scope="col" class="Info link bg-warning" style="border:0.5px white solid; color:black;">Réponse</th>
    <th scope="col">Date de réservation</th>
    <th scope="col">Formateur</th>
    <th scope="col">Réponse</th>
    </tr>
    </thead>
    <tbody>

    <?php


     // REQUETE TOUTES LES DEMANDES D'AUTORISATION EN COURS
    $sql = ("SELECT date_reservation,admin_user FROM `reservation` WHERE login='".$_SESSION['login']."' ORDER BY date_reservation");
    $req = $DB -> query($sql);
    $i=1;
    while($res = $req -> fetch(PDO::FETCH_OBJ)){
        $date = $res ->date_reservation;
        $newDate = $date[8].$date[9]."/".$date[5].$date[6]."/".$date[0].$date[1].$date[2].$date[3];
        $res ->date_reservation = $newDate;
        ?>
            <tr><th scope="row"><?php echo $i++ ?></th> 
        <?php

        $res ->date_reservation = $date;
        $dateResa = $res ->date_reservation;

        $sqlVerif = ("SELECT * FROM reservation WHERE login='".$_SESSION['login']."' AND date_reservation='".$dateResa."'");
        $reqVerif = $DB -> query($sqlVerif);
        $resVerif = $reqVerif -> fetch(PDO::FETCH_OBJ);

        $reponse = $resVerif ->reponse;

        foreach($res as $info){
            ?><td <?php 
            if(isset($reponse)){ 
                if($reponse == "yes"){
                    echo "id='reponseYes'";
                } 
                if($reponse == "no"){
                    echo "id='reponseNo'";
                }
            }?> style="font-size:1.1vw"> 
            <?php
            echo $info;
            ?> </td>
            <?php
        }
        ?>
        <td>
            <?php 

            if($reponse == "yes"){
               ?> <div id="reponseYes"> Accepter</div> <?php
            }
            
            if($reponse =="no"){
                ?> <div id="reponseNo"> Refuser</div> <?php
            }
            
            ?>

        </td> 
            </tr> 
        <?php
    }
    ?>
    </tbody>
    </table>

    <form method="POST">
        <input type="submit" name="effacer" id="reponseNo" class="bg-dark text-light" style="border-radius: 0.3em; font-size:1.2vw; padding:0.4%;" value="Effacer historique refus">
    </form>

    <?php
        if(isset($_POST['effacer'])){
            $sqlDelete = ("DELETE FROM `reservation` WHERE login='".$_SESSION['login']."' && reponse='no'");
            $reqDelete = $DB -> query($sqlDelete);
            // header('location:profil.php');
        }
}

else{
    echo header("location:connexion.php");
} ?>

</body>
</html>