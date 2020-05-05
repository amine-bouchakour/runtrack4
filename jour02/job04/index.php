<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body style="margin: 0% 1% 0%">

    <header>
        <nav class="z-depth-4">
            <div class="row container">

                <div class="col s3 center">
                    <a href="index.php">Acceuil</a>
                </div>
                <div class="col s3 center">
                    <a href="index.php">Inscription</a>
                </div>
                <div class="col s3 center">
                    <a href="index.php">Connexion</a>
                </div>
                <div class="col s3 center">
                    <a href="index.php">Rechercher</a>
                </div>

            </div>
        </nav>
    </header>

    <br>
    <form action="">
        <div class="#fbe9e7 deep-orange lighten-3 black-text text-black row">
            <div class="col s4 center">
                <label for="M" class="black-text text-black">M.</label>
                <input type="radio" id="M" name="civilité" value="M"><br>
            </div>

            <div class="col s4 center">
                <label for="Mme" class="black-text text-black">Mme</label>
                <input type="radio" id="Mme" name="civilité" value="Mme"><br>
            </div>
            <div class="col s4 center">
                <label for="Mlle" class="black-text text-black">Mlle</label>
                <input type="radio" id="Mlle" name="civilité" value="Mlle"><br><br>
            </div>

            <i class="material-icons col s12 center">person</i>
            <input type="text" name="" class="center" placeholder="Nom"><br>

            <i class="material-icons col s12 center">person</i>
            <input type="text" name="" class="center" placeholder="Prenom"><br>

            <i class="material-icons col s12 center">map</i>
            <input type="text" name="" class="center" placeholder="Adresse"><br>

            <i class="material-icons col s12 center">email</i>
            <input type="email" name="" class="center" placeholder="Email"><br>

            <i class="material-icons col s12 center">vpn_key</i>
            <input type="password" name="" class="center" placeholder="Password"><br>

            <i class="material-icons col s12 center">vpn_key</i>
            <input type="password" name="" class="center" placeholder="Confirm Pawword"><br><br>


            <div class=" col s6 center">
                <i class="material-icons medium">local_airport</i>
                <input type="checkbox" name="Voyages" placeholder="">
                <label for="Voyages" class="black-text text-black">Voyages</label><br>
            </div>

            <div class=" col s6 center">
                <i class="material-icons medium">computer</i>
                <input type="checkbox" name="Informatique" placeholder="">
                <label for="Informatique" class="black-text text-black">Informatique</label><br>
            </div>

            <div class=" col s6 center">
                <i class="material-icons medium">directions_bike</i>
                <input type="checkbox" name="Sport" placeholder="">
                <label for="Sport" class="black-text text-black">Sport</label><br>
            </div>


            <div class=" col s6 center">
                <i class="material-icons medium">book</i>
                <input type="checkbox" name="Lecture" placeholder="">
                <label for="Lecture" class="black-text text-black">Lecture</label><br>
            </div>

            <button type="submit" class="col s12 center">Valider</button><br><br>
        </div>
    </form>


    <footer class="card-panel orange lighten-2 z-depth-4">

        <div class="row container">

            <div class="col s3 center">
                <a href="index.php" class="white-text lighten-5">Acceuil</a>
            </div>
            <div class="col s3 center">
                <a href="index.php" class="white-text lighten-5">Inscription</a>
            </div>
            <div class="col s3 center">
                <a href="index.php" class="white-text lighten-5">Connexion</a>
            </div>
            <div class="col s3 center">
                <a href="index.php" class="white-text lighten-5">Rechercher</a>
            </div>

        </div>
    </footer>
</body>

</html>