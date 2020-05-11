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

    <!-- <section class="formulaire">
        <form method="POST" id="flex">
            <input type="text" minlength="3" required name="login" placeholder="<?php echo $infoUser->login; ?>">
            <input type="password" minlength="3" required name="password" placeholder="password">
            <input type="password" minlength="3" required name="confPassword" placeholder="confirmation Password">
            <input type="submit" id="valider" name="modifProfil" placeholder="Modifier profil">
        </form><br>
        
        <?php  if(isset($_POST['modifProfil'])){
            updateProfil($_POST['login'],$_POST['password'],$_POST['confPassword']);
        } ?>
    </section> -->


    <br><br><br>
    <!-- TABLEAU UTILISATEURS -->
    <h2>Vos demandes d'autorisations</h2>
    <table class="table table-hover table-bordered table-dark">
    <thead>
    <tr>
    <th scope="col">#</th>
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

        ?>
            <tr><th scope="row"><?php echo $i++ ?></th> 
        <?php
        foreach($res as $info){
            ?><td> <?php
            echo $info;
            ?> </td>
            <?php
        }
        ?>
        <td>
            <div id="reponseAttente"> En Attente</div>
        </td> 
            </tr> 
        <?php
    } ?>




    <!-- // REPONSE DEMANDE -->
    <table class="table table-hover table-bordered table-dark">
        <br><br><br>
        <h2>Les réponses</h2>
    <thead>
    <tr>
    <th scope="col">#</th>
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
        
        ?>
            <tr><th scope="row"><?php echo $i++ ?></th> 
        <?php
        foreach($res as $info){
            ?><td> <?php
            echo $info;
            ?> </td>
            <?php
        }
        ?>
        <td>
            <?php 
            $dateResa = $res ->date_reservation;
            
            $sqlVerif = ("SELECT * FROM reservation WHERE login='".$_SESSION['login']."' AND date_reservation='".$dateResa."'");
            $reqVerif = $DB -> query($sqlVerif);
            $resVerif = $reqVerif -> fetch(PDO::FETCH_OBJ);

            $reponse = $resVerif ->reponse;
            
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
    }

else{
    echo header("location:connexion.php");
} ?>

</body>
</html>