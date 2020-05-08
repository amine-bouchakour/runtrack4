$('document').ready(function(){

  var tabCitation = [
    "T’endors pas c’est l’heure de mourir.",
    "C’est dur de pas pouvoir se gratter là où ça démange.",
    "Un flic quand il quitte le métier il n’est plus personne.",
    "Avez-vous déjà désactivé un humain par erreur ?",
    "Étrange sensation que de vivre dans la peur… voila ce que c’est d’être un esclave.",
    "J’ai vu tant de choses, que vous, humains, ne pourriez pas croire… De grands navires en feu surgissant de l’épaule d’Orion, j’ai vu des rayons fabuleux, des rayons C, briller dans l’ombre de la Porte de Tannhaüser.",
    "Tous ces moments se perdront dans l’oubli, comme les larmes dans la pluie. Il est temps de mourir."
  ];


  var tabpagination = [
    "Bonjour, Papillon !",
    "Papillon 1 : La petite tortue",
    "Papillon 2 : Le citron",
    "Papillon 3 : Le moro-sphinx",
    "Papillon 4 : Le vulcain"
  ];

  var tabRef = [
    "Si les papillons sont si nombreux autour des plantes de votre jardin, c est que celles-ci leur fournissent leur propre nourriture, par le nectar de leurs fleurs, ainsi que celle de leurs chenilles, avec les feuillages. Et comme chaque espèce est quasiment inféodée à une plante spécifique, cela devient mathématique : autant de plantes différentes, autant de papillons différents!",
    "Elle est si commune qu’elle est banale, à la ville comme à la campagne. Mais sa vie est un roman : elle ne mange que des orties, vit très longtemps (près de 10 mois), entreprend de grandes migrations et hiverne dans les greniers des hommes, avant de sortir dès les premiers rayons de soleil printanier.",
    "Il vit plus de 8 mois. Un record pour les papillons qui, habituellement, ne survivent que quelques semaines. Les adultes naissent en juillet et alternent périodes d’activité et périodes de repos, y compris en hiver où ils apparaissent dès les premiers beaux jours. D’ailleurs, on dit qu’ils annoncent le printemps.",
    "Il ne fait rien comme tout le monde : bien qu’appartenant à une famille de papillons nocturnes, il sort le jour ; et en plus, il bat si vite des ailes qu’on ne les voit pas ! Son vol sur place lui permet de butiner les fleurs sans se poser, on dirait un oiseau-mouche. Autrefois très commun, il devient hélas rare.",
    "Deux bandes rouge vif coupent ses ailes noir velouté : ce sont les symboles des feux de l’enfer, dont le dieu s’appelait jadis Vulcain ! Heureusement, quelques petites taches blanches rendent ce beau papillon très attrayant. Sa chenille a l’habitude de s’enrouler dans une feuille d’ortie avant de la dévorer !"
  ];

  var countPagination = tabpagination.length;





  // REBOOTER LE MONDE CITATION BLADE RUNNER MODIFICATION DU JUMBOTRON
  $('#changeJumbotronTexte').click('click',event=>{
    var countCitation = tabCitation.length;
    var Citation = Math.floor(Math.random() * Math.floor(countCitation));

    $('#titreJumbotron').text("Blade Runner (1982)");
    $('#texteJumbotron').text(tabCitation[Citation]);
  })






  // PAGINATION MODIFICATION DU JUMBOTRON
  $('#pagination1').click('click',event=>{

    $('#titreJumbotron').text(tabpagination[1]);
    $('#texteJumbotron').text(tabRef[1]);

  })

  $('#pagination2').click('click',event=>{

    $('#titreJumbotron').text(tabpagination[2]);
    $('#texteJumbotron').text(tabRef[2]);

  })

  $('#pagination3').click('click',event=>{

    $('#titreJumbotron').text(tabpagination[3]);
    $('#texteJumbotron').text(tabRef[3]);

  })

 
  // PAGINATION >>
  $('#paginationPlus').click('click',event=>{

    var titre = $('#titreJumbotron').text();

    if(titre == "Bonjour, monde !" || titre == "Blade Runner (1982)"){
      $('#titreJumbotron').text(tabpagination[1]);
      $('#texteJumbotron').text(tabRef[1]);

    }
    for(var i=0; i<countPagination; i++){
      if(titre == tabpagination[i]){
        $('#titreJumbotron').text(tabpagination[i+1]);
        $('#texteJumbotron').text(tabRef[i+1]);

      }
    }
  })

  // PAGINATION <<
  $('#paginationMoins').click('click',event=>{

    var titre = $('#titreJumbotron').text();
    
    if(titre == "Page 1"){
      $('#titreJumbotron').text(tabpagination[0]);
      $('#texteJumbotron').text(tabRef[0]);
      console.log('toto');
    }

    for(var i=0; i<countPagination; i++){

      if(titre == tabpagination[i]){
        $('#titreJumbotron').text(tabpagination[i-1]);
        $('#texteJumbotron').text(tabRef[i-1]);
      }

    }

  })




  // LORS DU CLIC SUR LA DIV DE DROITE 
  
    $("#Luxure").click(function(event)
    {
      document.getElementById("Luxure").classList.add("active");
    })
    $("#Limbes").click(function(event)
    {
      document.getElementById("Limbes").classList.add("active");
    })
    $("#Gourmandise").click(function(event)
    {
      document.getElementById("Gourmandise").classList.add("active");
    })
    $("#Avarice").click(function(event)
    {
      document.getElementById("Avarice").classList.add("active");
    })
    $("#Colère").click(function(event)
    {
      document.getElementById("Colère").classList.add("active");
    })
    $("#Heresie").click(function(event)
    {
      document.getElementById("Heresie").classList.add("active");
    })
    $("#Violence").click(function(event)
    {
      document.getElementById("Violence").classList.add("active");
    })
    $("#Ruse-et-Tromperie").click(function(event)
    {
      document.getElementById("Ruse-et-Tromperie").classList.add("active");
    })
    $("#Trahison").click(function(event)
    {
      document.getElementById("Trahison").classList.add("active");
    })
    $("#Internet-Explorer").click(function(event)
    {
      document.getElementById("Internet-Explorer").classList.add("active");
    })




  // BARRE DE PROGRESSION

  // Augmentation
  $('#progressPlus').click(function(event){
    console.log("Barre plus activé");

    var rech = document.getElementById('barreProgression');

    rech.style.width = (parseInt(rech.style.width, 10) + 10) + '%';

  })

  // Diminution
  $('#progressMoins').click(function(event){
    console.log("Barre moins activé");

    var rech = document.getElementById('barreProgression');

    rech.style.width = (parseInt(rech.style.width, 10) - 10) + '%';
  })



  // BOUTON D,G,C ET MODAL

  tabToucheClavier = [];
  tabTrue= ["D","G","C"];

  document.addEventListener('keydown',(event)=>{
    tabToucheClavier.push(event.key);

    var countTabTouche = tabToucheClavier.length;

    for(var i = 0; i < countTabTouche-2; i++){
    
        if(tabTrue[0] == tabToucheClavier[i] && tabTrue[1] == tabToucheClavier[i+1] && tabTrue[2] == tabToucheClavier[i+2]){

          // Réinitialisation tableau touche clavier
          tabToucheClavier = [];

          var login = document.getElementById("inputLogin").value;
          var password = document.getElementById("inputPassword").value;
          var url2 = document.getElementById("inputUrl").value;
          var url21 = document.getElementById("inputUrlBis").value;
          console.log(login);
          console.log(password);
          console.log(url2);
          console.log(url21);

          document.getElementById("login").innerHTML = 'Votre login : @' + login;
          document.getElementById("password").innerHTML = 'Votre password : ' + password + "@example.com";
          document.getElementById("url").innerHTML = 'Url 2 : DogeCoin' + url2 + ".00";
          document.getElementById("urlBis").innerHTML = 'Url 2.1 Beta : Https://l33.lptf/dkwb/berslusconimkt/' + url21;

          var divModif = document.getElementById("Modaltest");
          divModif.classList.add("show");
          divModif.style.display = "block";

          $("#fermer").click(function(event){
            var divModif = document.getElementById("Modaltest");
            divModif.classList.remove("show");
          })
          $("#fermerBis").click(function(event){
            var divModif = document.getElementById("Modaltest");
            divModif.classList.remove("show");
          })

        }
    }







  })






})