<?php session_start(); ?>

<header>

    <?php if(isset($_SESSION['login'])){ ?>
        <a href="index.php">Index</a>
        <a href="profil.php">Profil</a>
        <a href="deconnexion.php">Déconnexion</a>
        <a href="reservation.php">Réservation</a>
    <?php } 
    
    else{
    ?>
        <a href="index.php">Index</a>
        <a href="inscription.php">Inscription</a>
        <a href="connexion.php">Connexion</a>
    <?php } ?>

</header>