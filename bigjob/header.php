<?php session_start(); ?>
<link rel="stylesheet" href="styles/reservation.css">
<header>

    <?php if(isset($_SESSION['login'])){ ?>
        <div id="flexR">
            <div><a href="index.php">Acceuil</a></div>
            <div><a href="reservation.php">Réservation</a></div>
            <div><a href="profil.php">Profil</a></div>
            <div><a href="deconnexion.php">Déconnexion</a></div>
        </div>
    <?php } 
    
    else{
    ?>
    <div id="flexR">
        <div><a href="index.php">Index</a></div>
        <div><a href="connexion.php">Connexion</a></div>
        <div><a href="inscription.php">Inscription</a></div>
    </div>
    <?php } ?>

</header>