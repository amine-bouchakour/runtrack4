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

<body class="bg-light">

<?php
include("header.php");
include("functions.php");
?>


<!-- TABLEAU UTILISATEURS -->
<h2>Les demandes de réservations</h2>
<table class="table table-hover table-bordered table-dark">
<thead>
<tr>
  <th scope="col">#</th>
  <th scope="col">Login</th>
  <th scope="col">Date de réservation</th>
  <th scope="col">Demande fait le</th>
  <th scope="col">Autorisez / Refuser</th>
</tr>
</thead>
<tbody>

<?php




// REQUETE TOUTES LES DEMANDES D'AUTORISATION EN COURS
$sql = ('SELECT login,date_reservation,date_demande FROM `demande_autorisation` ORDER BY date_demande');
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
        <form method="POST">
            <input type="hidden" name="droitDate" value="<?php echo $res->date_reservation ?>">
            <input type="hidden" name="droitLogin" value="<?php echo $res->login ?>">
            <input type="submit" name="accepter" value="Accepter">
            <input type="submit" name="refuser" value="Refuser">
        </form>
    </td> 
        </tr> 
    <?php
}

if(isset($_POST['accepter'])){
    $date = $_POST['droitDate'];
    $login = $_POST['droitLogin'];

    $sqlVerif = ("SELECT * FROM reservation WHERE login='".$login."' AND date_reservation='".$date."'");
    $req = $DB -> query($sqlVerif);
    $res = $req -> fetch(PDO::FETCH_OBJ);

    if(!$res){
        $sql = ("INSERT INTO `reservation` (`login`,`date_reservation`,`admin_user`,`reponse`) VALUE ('".$login."','".$date."','".$_SESSION['login']."','yes')");
        $req = $DB -> query($sql);

        $sqlDelete = ("DELETE FROM `demande_autorisation` WHERE login='".$login."' AND date_reservation='".$date."'");
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






<!-- TABLEAU ADMNISTRATEUR -->
<table class="table table-hover table-bordered bg-info">
    <h2>Les droits d'accès et de modification</h2>
<thead>
<tr>
  <th scope="col">#</th>
  <th scope="col">Login</th>
  <th scope="col">Droits</th>
  <th scope="col">Date ajout</th>
  <th scope="col">Modifier droits</th>
</tr>
</thead>
<tbody>
<tr>
    <th scope="row">Ajout</th>
    <td><input type="text"></td>
    <td><input type="text"></td>
    <td>XXXXXXXXXXXXXXXXX</td>
    <td><input type="text"></td>
</tr>
<?php

// REQUETE TOUTES LES PERSONNES ETANT DANS L'ADMNISTRATION DU SITE
$sql = ('SELECT * FROM `admin`');
$req = $DB -> query($sql);

while($res = $req -> fetch(PDO::FETCH_OBJ)){
    ?>
        <tr><th scope="row">1</th> 
    <?php
    foreach($res as $info){
        ?><td> <?php
        echo $info;
        ?> </td> <?php
    }
    ?>
        <td>
            <form method="POST">
                <input type="hidden" name="droits" value="<?php echo $res->login ?>">
                <input type="submit" name="retrograder" value="Rétrograder">
                <input type="submit" name="promotion" value="Promotion">
            </form>
        </td> 
        </tr> 
    <?php

}

?>
  </tbody>
</table>

</body>
</html>