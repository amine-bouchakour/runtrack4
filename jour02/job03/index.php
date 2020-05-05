<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../materialize.min.css">
</head>

<body style="margin: 1%">

    <header>
        <nav>
            <div class="row container ">

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
        <div>
            <label for="M">M.</label>
            <input type="radio" id="M" name="civilité" value="M"><br>
        </div>
        <div>
            <label for="Mme">Mme</label>
            <input type="radio" id="Mme" name="civilité" value="Mme"><br>
        </div>
        <div>
            <label for="Mlle">Mlle</label>
            <input type="radio" id="Mlle" name="civilité" value="Mlle"><br><br>
        </div>

        <input type="text" name="" placeholder="Nom"><br>
        <input type="text" name="" placeholder="Prenom"><br>
        <input type="text" name="" placeholder="Adresse"><br>
        <input type="email" name="" placeholder="Email"><br>
        <input type="password" name="" placeholder="Password"><br>
        <input type="password" name="" placeholder="Confirm Pawword"><br><br>

        <input type="checkbox" name="Voyages" placeholder="">
        <label for="Voyages">Voyages</label><br>
        <input type="checkbox" name="Informatique" placeholder="">
        <label for="Informatique">Informatique</label><br>
        <input type="checkbox" name="Sport" placeholder="">
        <label for="Sport">Sport</label><br>
        <input type="checkbox" name="Lecture" placeholder="">
        <label for="Lecture">Lecture</label><br><br>
        <button type="submit">Valider</button><br><br>
    </form>


    <footer class="card-panel orange lighten-2">

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