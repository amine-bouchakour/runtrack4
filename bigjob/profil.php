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
    ?>  
    <h2>Vos demandes d'autorisations</h2>
    <section>
    <!-- TABLEAU UTILISATEURS -->
    <table class="table table-hover table-bordered table-dark" id="table">
    <thead>
    <tr>
    <th scope="col" style="padding:1.2%;" class="Info link bg-warning" id="intitule">Demandes</th>
    <th scope="col" style="padding:1.2%;">Date de réservation</th>
    <th scope="col" style="padding:1.2%;">Demande fait le</th>
    <th scope="col" style="padding:1.2%;">Statut</th>
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
            <tr><th scope="row" style="padding:1.2%;"><?php echo $i++ ?></th> 
        <?php
        foreach($res as $info){
            ?><td class="text-warning" style="padding:1.2%;"> <?php
            echo $info;
            ?> </td>
            <?php
        }
        ?>
        <td>
            <div style="padding:1.2%;"> En Attente</div>
        </td> 
            </tr> 
        <?php
    } 
    ?>

</tbody>
</table>
    </section>

    <h2>Les réponses</h2>
    <section>
    <!-- // REPONSE DEMANDE -->
    <table class="table table-hover table-bordered table-dark" id="table">
    <thead>
    <tr>
    <th scope="col" style="padding:1.2%;" class="Info link bg-warning" id="intitule">Réponses</th>
    <th scope="col" style="padding:1.2%;">Date de réservation</th>
    <th scope="col" style="padding:1.2%;">Formateur</th>
    <th scope="col" style="padding:1.2%;">Status</th>
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
            <tr><th scope="row" style="padding:1.2%;"><?php echo $i++ ?></th> 
        <?php

        $res ->date_reservation = $date;
        $dateResa = $res ->date_reservation;

        $sqlVerif = ("SELECT * FROM reservation WHERE login='".$_SESSION['login']."' AND date_reservation='".$dateResa."'");
        $reqVerif = $DB -> query($sqlVerif);
        $resVerif = $reqVerif -> fetch(PDO::FETCH_OBJ);

        $reponse = $resVerif ->reponse;

        foreach($res as $info){
            ?>
            <td <?php 
            if(isset($reponse)){ 
                if($reponse == "yes"){
                    echo "id='reponseYes'";
                } 
                if($reponse == "no"){
                    echo "id='reponseNo'";
                }
            }?> style="padding:1.2%;"> 
            <?php
            echo $info;
            ?> 
            </td>
            <?php
        }
        ?>
        <td>
            <?php 

            if($reponse == "yes"){
               ?> <div id="reponseYes" style="padding:1.2%;"> Accepter</div> <?php
            }
            
            if($reponse =="no"){
                ?> <div id="reponseNo" style="padding:1.2%;"> Refuser</div> <?php
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
        <input type="submit" style="padding:0.6%;" name="effacer" class="bg-dark text-light" id="effaceHisto" value="Effacer historique refus"><br><br>
        <input type="submit" style="padding:0.6%;" name="effacerDate" class="bg-dark text-light" id="effaceHisto" value="Effacer date dépassé">
    </form>
    </section>

    <?php
        if(isset($_POST['effacer'])){
            $sqlDelete = ("DELETE FROM `reservation` WHERE login='".$_SESSION['login']."' AND reponse='no'");
            $reqDelete = $DB -> query($sqlDelete);
            // header('Location:profil.php');
        }
        if(isset($_POST['effacerDate'])){
            $dateActuelle = date("Y-m-d");
            $sqlDeleteDate = ("DELETE FROM `reservation` WHERE login='".$_SESSION['login']."' AND date_reservation<'".$dateActuelle."'");
            $reqDeleteDate = $DB -> query($sqlDeleteDate);
            // header('location:profil.php');
        }
}

else{
    header("location:connexion.php");
} ?>

</body>
</html>