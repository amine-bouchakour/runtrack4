<!DOCTYPE html>
<html lang="fr">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
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

$tabJour = ["","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","Dimanche"];
$tabHeure = ["08h","09h","10h","11h","12h","13h","14h","15h","16h","17h","18h"];

?>
<div class="row  justify-content-center">

<div class="col-12 p-2 bg-warning" id="alignCenter"> <h1>Planning et Réservations</h1></div>

    <table class="table table-hover table-dark col-8 m-2 p-2" id="border-radius">

        <thead>
            <tr>
                <?php
                    for($i = 0; $i < count($tabJour); $i++ ){
                    ?>
                        <!-- JOUR DE LA SEMAINE EN HAUT -->
                        <th scope="col" id="alignCenter" class="p-3"><h4><?php echo $tabJour[$i] ?></h4></th>
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
                <th scope="row" id="alignCenter" class="p-3 bg-warning"><?php echo $tabHeure[$j]; ?>
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
                                <div id="alignCenter" class="p-2">
                            <?php
                            // contenu du planning
                            echo "<h6>Libre</h6>";

                            ?>
                                </div>
                            <?php
                        }
                        else{
                            echo "Pas libre";
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



</body>
</html>