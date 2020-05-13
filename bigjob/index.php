<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Big Job</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/index.css">
    <script src="js/Jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

</head>

<?php include('header.php'); ?>

<body class="Info link bg-light">

    <h2>Bienvenue sur l'application de réservation dédiée aux plateformeurs</h2>
    <br><br>
    <h3>Voici les différentes fonctionnalitées proposées : </h3>
    <br>

    <section id="fonctionnalites">



        <!-- USERS -->
        <?php if(isset($_SESSION['id_droits']) && $_SESSION['id_droits']=="2" || isset($_SESSION['id_droits']) && $_SESSION['id_droits']=="3"){ ?>
            <div id="divFonctionnalites">
            <h4><b> Pour les utilisateurs :</b></h4>
            <?php } else{ ?>
                    <div id="divFonctionnalites" <?php if(!isset($_SESSION['id_droits']) || isset($_SESSION['id_droits']) && $_SESSION['id_droits']=="1"){echo "class='realign'";} ?> >
                    <h4><b> Les Plateformeurs :</b></h4>
                <?php } ?>
            - Vous inscrire et de vous connecter à l'application<br>
            - Faire une demande de réservation d'une ou plusieurs dates<br>
            - Visualiser vos demandes ainsi que leurs réponses
        </div>


        <?php if(isset($_SESSION['id_droits']) && $_SESSION['id_droits']=="2"){ ?>
        <!-- MODO -->
        <div id="divFonctionnalites">
            <h4><b>Pour les modérateurs :</b></h4>
            - Répondre aux demandes de réservations des plateformeurs<br>
            - Contacter un utilisateur via son email<br>
            - Supprimer un compte utilisateur
        </div>
        <?php } ?>


        <?php if(isset($_SESSION['id_droits']) && $_SESSION['id_droits']=="3"){ ?>
        <!-- ADMIN -->
        <div id="divFonctionnalites">
            <h4><b>Pour les modérateurs :</b></h4>
            - Répondre aux demandes de réservations des plateformeurs<br>
            - Contacter un utilisateur via son email<br>
            - Supprimer un compte utilisateur
        </div>
        <div id="divFonctionnalites">
            <h4><b>Pour les administrateurs :</b></h4>
            - Répondre aux demandes de réservations des plateformeurs<br>
            - Contacter un utilisateur via son email<br>
            - Supprimer un compte utilisateur<br>
            - Ajouter ou supprimer un modérateur ou un admnistrateur<br>
            - Modifier les droits d'accès des gestionnaires du site
        </div>
        <?php } ?>

    </section>
        <br>
        <img src="assets/plateDesc.png" alt=""><br>
        <small>Pour plus d'informations, <a href="https://laplateforme.io/">le site complet</a> </small>


</body>

</html>