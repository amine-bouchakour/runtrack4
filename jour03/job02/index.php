<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootsrap</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="Jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
</head>

<body>

    <main Class="alert-dark">

        <!-- HEADER -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">LPTF</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="https://www.laplateforme.io" target="_blank">Acceuil <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Units</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Skills</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="row justify-content-center">
            <h1>LaPlateforme_</h1>
        </div>


        <div class="row p-3">
            <div class="col-2 p-3">
                <!-- DIV DE GAUCHE INFO PAPILLON -->
                <div class="card">
                    <img src="papillon.png" class="card-img-top"
                        alt="Un papillon multicolore posé sur une plante rose et bleu">
                    <div class="card-body">
                        <h5 class="card-title">Un papillon</h5>
                        <p class="card-text">Un papillon, c'est un peu comme une chenille, mais avec des ailes. Ne pas
                            ingérer.</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Commander votre propre Papillon</button>
                    </div>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirmation d'achat</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Un magnifique Papillon que vous choisisez-là !
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Acheter</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DIV CENTRALE -->
            <div class="col-8 p-3">
                <div class="jumbotron">
                    <h1 class="display-4" id="titreJumbotron">Bonjour, monde !</h1>
                    <div id="texteJumbotron">
                        <p class="lead">Il existe plusieurs visions du terme :</p>
                        <p class="lead">Le monde est la matière, l'espace et les phénomènes qui nous sont accessibles
                            par
                            les sens, l'expérience ou la raison.</p>
                        <p class="lead">Le sens le plus courant désigne notre planète, la Terre, avec ses habitants, et
                            son
                            environnement plus ou moins naturel.</p>
                    </div>
                    <hr class="my-4">
                    <p>Le sens étendu désigne l'univers dans son ensemble.</p>
                    <button type="button" id="changeJumbotronTexte" class="btn btn-danger">Rebooter le Monde</button>
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination col s4 offset-10">
                            <li class="page-item">
                                <a class="page-link" id="paginationMoins" href="#">
                                    <<</a> </li> <li class="page-item"><a class="page-link" id="pagination1"
                                            href="#">1</a></li>
                            <li class="page-item"><a class="page-link" id="pagination2" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" id="pagination3" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" id="paginationPlus" href="#">>></a></li>
                        </ul>
                    </nav>
                </div>

            </div>

            <!-- DIV DE DROITE-->
            <div class="col-2 p-3">
                <ul class="list-group">
                    <li class="list-group-item" id="Limbes">Limbes</li>
                    <li class="list-group-item" id="Luxure">Luxure</li>
                    <li class="list-group-item" id="Gourmandise">Gourmandise</li>
                    <li class="list-group-item" id="Avarice">Avarice</li>
                    <li class="list-group-item" id="Colère">Colère</li>
                    <li class="list-group-item" id="Heresie">Heresie</li>
                    <li class="list-group-item" id="Violence">Violence</li>
                    <li class="list-group-item" id="Ruse-et-Tromperie">Ruse et Tromperie</li>
                    <li class="list-group-item" id="Trahison">Trahison</li>
                    <li class="list-group-item" id="Internet-Explorer">Internet Explorer</li>
                </ul>
            </div>

        </div>


        <!-- PROGRESS BAR -->
        <div class="row justify-content-center m-0">
            <div class="col-2 offset-7">Installation de AI 9000</div>

            <div class="row col-9 justify-content-center">
                <div><svg class="bi bi-arrow-bar-left" id="progressMoins" style="margin-top:-12px" width="1em"
                        height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.854 4.646a.5.5 0 00-.708 0l-3 3a.5.5 0 000 .708l3 3a.5.5 0 00.708-.708L3.207 8l2.647-2.646a.5.5 0 000-.708z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M10 8a.5.5 0 00-.5-.5H3a.5.5 0 000 1h6.5A.5.5 0 0010 8zm2.5 6a.5.5 0 01-.5-.5v-11a.5.5 0 011 0v11a.5.5 0 01-.5.5z"
                            clip-rule="evenodd" />
                    </svg></div>
                <div class="progress col-10 p-0 m-0">
                    <div class="progress-bar progress-bar-striped bg-warning progress-bar-animated"
                        id="barreProgression" role="progressbar" style="width: 90%" aria-valuenow="75" aria-valuemin="0"
                        aria-valuemax="100">
                    </div>
                </div>
                <div><svg class="bi bi-arrow-bar-right" id="progressPlus" style="margin-top:-12px" width="1em"
                        height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.146 4.646a.5.5 0 01.708 0l3 3a.5.5 0 010 .708l-3 3a.5.5 0 01-.708-.708L12.793 8l-2.647-2.646a.5.5 0 010-.708z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M6 8a.5.5 0 01.5-.5H13a.5.5 0 010 1H6.5A.5.5 0 016 8zm-2.5 6a.5.5 0 01-.5-.5v-11a.5.5 0 011 0v11a.5.5 0 01-.5.5z"
                            clip-rule="evenodd" />
                    </svg></div>
            </div>
        </div>

        <!-- DIV EN BAS A GAUCHE -->
        <div class="row p-3">
            <div class="col-3 offset-2">
                <form>
                    <div class="form-row">
                        <div>
                            <h5> Recevez votre copie gratuite d'internet 2!</h5>
                        </div>

                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                            </div>
                            <input type="text" class="form-control" id="inputLogin" placeholder="Login">
                        </div>

                        <div class="input-group mb-2">
                            <input type="password" class="form-control" id="inputPassword" placeholder="Mot de passe">
                            <div class="input-group-prepend">
                                <div class="input-group-text">@example.com</div>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                        </div>
                    </div>

                    <div class="form-row">
                        <div>
                            <h6>Url des Internet 2 et 2.1 Beta</h6>
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">DogeCoin</div>
                            </div>

                            <input type="text" id="inputUrl" class="form-control">
                            <div class="input-group-prepend">
                                <div class="input-group-text">.00</div>
                            </div>
                        </div>

                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Https://l33.lptf/dkwb/berslusconimkt/</div>
                            </div>
                            <input type="text" id="inputUrlBis" class="form-control">
                        </div>

                    </div>
                </form>
            </div>





            <!-- DIV EN BAS A DROITE -->
            <div class="col-2 offset-3">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-12 p-5"></div>




                        <!-- TEST TEST TEST -->

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modaltest" style="display: none">
                Commander votre propre Papillon</button>


            <div class="modal fade" id="Modaltest" tabindex="-1" role="dialog" aria-labelledby="ModaltestLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModaltestLabel">Recevez votre copie gratuite d'internet 2 !</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div id="login">Votre Login : </div>
                            <div id="password">Votre Password : </div>
                            <div id="url">Url 2 : </div>
                            <div id="urlBis">Url 2.1 Beta : </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" id="fermer" class="btn btn-secondary" data-dismiss="modal">Retour</button>
                            <button type="button" id="fermerBis" class="btn btn-primary" data-dismiss="modal">Confirmer</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>
    <script src="script.js"></script>
</body>

</html>