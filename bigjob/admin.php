<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/admin.css">
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
include("header.php");

if($_SESSION['id_droits'] == "2" || $_SESSION['id_droits'] == "3"){

include("functions.php");


?>
<br><br>
<!-- TABLEAU DEMANDE D'ACCES -->
    <h2>Les demandes de réservations</h2>
<section>
<table class="table table-hover table-bordered table-dark" id="table">
<thead>
<tr class="text-light">
  <th scope="col" class="Info link bg-warning" id="intitule">Demande</th>
  <th scope="col">Login</th>
  <th scope="col">Date de réservation</th>
  <th scope="col">Demande fait le</th>
  <th scope="col">Autorisez / Refuser</th>
</tr>
</thead>
<tbody>

<?php

// REQUETE TOUTES LES DEMANDES D'AUTORISATION EN COURS
$sql = ('SELECT login,date_reservation,date_demande FROM `demande_autorisation` ORDER BY date_reservation');
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
        <form method="POST">
            <input type="hidden" name="droitDate" value="<?php $res ->date_reservation = $date; echo $res->date_reservation ?>">
            <input type="hidden" name="droitLogin" value="<?php echo $res->login ?>">
            <input type="submit" name="accepter" id="reponseYes" value="Accepter">
            <input type="submit" name="refuser" id="reponseNo" value="Refuser">
        </form>
    </td> 
        </tr> 
    <?php
}

if(isset($_POST['accepter'])){
    
    $res ->date_demande = $date1;

    $date2 = $_POST['droitDate'];
    $login = $_POST['droitLogin'];

    $sqlVerif = ("SELECT * FROM reservation WHERE login='".$login."' AND date_reservation='".$date2."'");
    $req = $DB -> query($sqlVerif);
    $res = $req -> fetch(PDO::FETCH_OBJ);

    if(!$res){
        $sql = ("INSERT INTO `reservation` (`login`,`date_reservation`,`admin_user`,`reponse`) VALUE ('".$login."','".$date2."','".$_SESSION['login']."','yes')");
        $req = $DB -> query($sql);

        $sqlDelete = ("DELETE FROM `demande_autorisation` WHERE login='".$login."' AND date_reservation='".$date2."'");
        $reqDelete = $DB -> query($sqlDelete);
        header('location:admin.php');
    }
}

if(isset($_POST['refuser'])){
    $date = $_POST['droitDate'];
    $login = $_POST['droitLogin'];

    $sql = ("INSERT INTO `reservation` (`login`,`date_reservation`,`admin_user`,`reponse`) VALUE ('".$login."','".$date."','".$_SESSION['login']."','no')");
        $req = $DB -> query($sql);

    $sqlDelete = ("DELETE FROM `demande_autorisation` WHERE login='".$login."' AND date_reservation='".$date."'");
    $reqDelete = $DB -> query($sqlDelete);
    header('location:admin.php');
}


?>
</tbody>
</table>

</section>

    <h2>Les droits d'accès (Admnistration du site)</h2>
<section>
<!-- TABLEAU ADMNISTRATEUR -->
<table class="table table-hover table-bordered bg-info" id="table">
<thead>
<tr class="text-light">
  <th scope="col" class="Info link bg-warning" id="intitule">Accès</th>
  <th scope="col">Login</th>
  <th scope="col">Droits</th>
  <th scope="col">Date ajout</th>
  <th scope="col">Ajouter par</th>

  <?php if($_SESSION['id_droits'] == "3" ){
    ?>
        <th scope="col">Confirmer</th>
    <?php
    }
    ?>
</tr>
</thead>
<tbody>

<?php 
// REQUETE TOUTES LES PERSONNES ETANT DANS L'ADMNISTRATION DU SITE
$sql = ('SELECT login,droits,date_ajout,ajouter_par FROM `admin` ORDER BY droits DESC');
$req = $DB -> query($sql);
$i=1;
while($res = $req -> fetch(PDO::FETCH_OBJ)){
    $date = $res ->date_ajout;
    $newDate = $date[8].$date[9]."/".$date[5].$date[6]."/".$date[0].$date[1].$date[2].$date[3];
    $res ->date_ajout = $newDate;
    ?>
        <tr><th scope="row">#<?php echo $i++; ?></th> 
    <?php
    foreach($res as $info){
        if($res->droits == "2"){$res->droits = "Modérateur";}
        if($res->droits == "3"){$res->droits = "Administateur";}
        ?><td id="bold"> <?php
        echo $info;
        ?> </td> <?php
    }
    ?>
      <?php if($_SESSION['id_droits'] == "3" ){
    ?>
        <td>
            <form method="POST">
                <input type="hidden" name="loginDroits" value="<?php echo $res->login ?>">
                <input type="submit" name="retrograder" id="reponseNo" value="Rétrograder">
                <input type="submit" name="promotion" id="reponseYes" value="Promouvoir">
            </form>
        </td> 
        <?php
    }
    ?>
        </tr> 
    <?php
}

// PROMOTION
if(isset($_POST['promotion'])){
    $login = $_POST['loginDroits'];

    $sqlVerif = ("SELECT id_droits FROM `users` WHERE login='".$login."'");
    $reqVerif = $DB -> query($sqlVerif);
    $resVerif = $reqVerif -> fetch(PDO::FETCH_OBJ);

    $droits = $resVerif ->id_droits;

    if($droits < 3){
        $droits = $droits +1;
        $sqlUpdate = ("UPDATE `users`SET id_droits='".$droits."' WHERE login='".$login."'");
        $reqUpdate = $DB -> query($sqlUpdate);

        $sqlUpdateBis = ("UPDATE `admin`SET droits='".$droits."' WHERE login='".$login."'");
        $reqUpdateBis = $DB -> query($sqlUpdateBis);

        if($_SESSION['login'] == $login){
            $_SESSION['id_droits']=$droits;
        }
        header("location:admin.php");
    }

}

// RETROGRADATION
if(isset($_POST['retrograder'])){
    $login = $_POST['loginDroits'];

    $sqlVerif = ("SELECT id_droits FROM `users` WHERE login='".$login."'");
    $reqVerif = $DB -> query($sqlVerif);
    $resVerif = $reqVerif -> fetch(PDO::FETCH_OBJ);

    $droits = $resVerif ->id_droits;

    if($droits > 1){
        $droits = $droits -1;
        $sqlUpdate = ("UPDATE `users`SET id_droits='".$droits."' WHERE login='".$login."'");
        $reqUpdate = $DB -> query($sqlUpdate);

        $sqlUpdateBis = ("UPDATE `admin`SET droits='".$droits."' WHERE login='".$login."'");
        $reqUpdateBis = $DB -> query($sqlUpdateBis);

        if($_SESSION['login'] == $login){
            $_SESSION['id_droits']=$droits;
        }
        header("location:admin.php");
    }

    if($droits == 1){
        $sqlDelete = ("DELETE FROM `admin` WHERE login='".$login."'");
        $reqDelete = $DB -> query($sqlDelete);
    }   
}
?>




<!-- AJOUTER UN ADMINISTRATEUR -->
<?php if($_SESSION['id_droits'] == "3" ){
            ?>
<tr>
    <th scope="row" >Ajouter un gestionnaire</th>
    <form method="POST">
        <td><input type="text" name="login" class="realign" placeholder="Login"></td>
        <td><select name="droits" id="droits">
            <OPTION>Choisir Droits
            <OPTION>Modérateur
            <OPTION>Administateur
        </select></td>
        <td class="text-light" id="dateAjout"><?php echo date('d/m/Y'); ?></td>
        <td class="text-light"><?php echo $_SESSION['login'] ?></td>
        <td><input type="submit" name="ajouter" id="reponseYes" class="ajouterGest" value="Ajouter" class="bg-dark text-light"></td>
     
    </form>
</tr>
<?php 
        }
        ?>
<?php

if(isset($_POST['ajouter'])){

    $sqlVerif = ("SELECT * FROM `admin` WHERE login='".$_POST['login']."'");
    $reqVerif = $DB -> query($sqlVerif);
    $resVerif = $reqVerif -> fetch(PDO::FETCH_OBJ);

    if(!$resVerif){

        $sqlVerif2 = ("SELECT * FROM users WHERE login='".$_POST['login']."'");
        $reqVerif2 = $DB -> query($sqlVerif2);
        $resVerif2 = $reqVerif2 -> fetch(PDO::FETCH_OBJ);

        $date = date("Y-m-d");

        if($resVerif2){

            if($_POST['droits'] != "Choisir Droits"){

                if($_POST['droits'] == "Modérateur"){
                    $droits = 2;
                }
                if($_POST['droits'] == "Administateur"){
                    $droits = 3;
                }

                $sqlAjout = ("INSERT INTO admin (`login`,`droits`,`date_ajout`,`ajouter_par`) VALUE ('".$_POST['login']."','".$droits."','".$date. "','".$_SESSION['login']."')");
                $reqAjout = $DB -> query($sqlAjout);

                $sqlUpdate = ("UPDATE `users`SET id_droits='".$droits."' WHERE login='".$_POST['login']."'");
                $reqUpdate = $DB -> query($sqlUpdate);
                header("location:admin.php");
            }
            else{
                echo "<h5 class='colRed'>Merci de choisir un droit d'accès pour cette utilisateur</h5>";
            }

        }
        else{
            echo "<h5 class='colRed'>L'utilisateur n'existe pas dans la base de donnée</h5>";
        }
    }
    else{
        echo "<h5 class='colRed'>L'utilisateur est déjà présent dans la gestion admninistrative du site</h5>";
    }


}


?>
  </tbody>
</table>
</section>




<h2>Les Utilisateurs du site</h2>
<section>
<!-- TABLEAU UTILISATEURS SITE -->
<table class="table table-hover table-bordered table-dark" id="table">
<thead>
<tr>
  <th scope="col" class="Info link bg-warning" id="intitule">Utilisateurs</th>
  <th scope="col">Login</th>
  <th scope="col">Email</th>
  <th scope="col">Droits</th>
  <th scope="col">Supprimer Compte</th>
</tr>
</thead>
<tbody>

<?php
// REQUETE TOUTES LES PERSONNES UTILISATEUR STANDARD DU SITE
$sql = ('SELECT login,email,id_droits FROM `users` WHERE id_droits=1');
$req = $DB -> query($sql);
$i=1;
while($res = $req -> fetch(PDO::FETCH_OBJ)){
    ?>
        <tr><th scope="row">#<?php echo $i++; ?></th> 
    <?php
    foreach($res as $info){
        if($res->id_droits == 1){ $res->id_droits = "Utilisateurs";}
        ?><td class="text-info"> <?php
        echo $info;
        ?> </td> <?php
    }
    ?>
      <?php if($_SESSION['id_droits'] == "3" || $_SESSION['id_droits'] == "2"){
    ?>
        <td>
            <form method="POST">
                <input type="hidden" name="login" value="<?php echo $res->login ?>">
                <input type="submit" name="supprimer" id="reponseNo" value="Supprimer">
            </form>
        </td> 
        <?php
    }
    ?>
        </tr> 
    <?php
}
?>
 </tbody>
</table>
</section>


<?php

// SUPPRESSION COMPTE
if(isset($_POST['supprimer'])){
    $login = $_POST['login'];

    $sqlDelete = ("DELETE FROM `users` WHERE login='".$login."'");
    $reqDelete = $DB -> query($sqlDelete);
}

}
else{
    header('location:connexion.php');
}
?>


</body>
</html>