<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/inscription.css">
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

if(!isset($_SESSION['login'])){

    include('functions.php'); 

    ?>
    <section id="animCo">
        <form method="POST" class="col">
            <div id="titreForm"> Formulaire d'inscription</div>
            <div class="form-group">
                <input type="text" class="alignCenter" minlength="3" required name="login" placeholder="login">
            </div>
            <div class="form-group">
                <input type="password" class="alignCenter" minlength="3" required name="password" placeholder="password">
            </div>
            <div class="form-group">
                <input type="password" class="alignCenter" minlength="3" required name="confPassword" placeholder="Confirmation password">
            </div>
            <div class="form-group">
                <input type="email" class="alignCenter" minlength="3" required name="email" placeholder="Email">
            </div>
            <input type="submit" style="padding:0.4% 0.8%;" id="button" name="inscription" value="valider">
        </form>

        <div id="animBut">
        <?php  if(isset($_POST['inscription'])){
            inscription($_POST['login'],$_POST['password'],$_POST['confPassword'],$_POST['email']);
        } ?>
        </div>
    </section>
    <?php }

else{
    header('location:index.php');
}
?>

    <?php


?>

</body>

</html>