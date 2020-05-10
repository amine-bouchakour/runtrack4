$('document').ready(function(){

    $('.calendar').calendar();

    $('.jqyc-not-empty-td').click(function(event){

        // recuperation date actuelle
        var now = new Date();
        var annee = now.getFullYear();
        var mois = now.getMonth()+1;
        var jour = now.getDate();


        // affichage modal
        var modalHeure = document.getElementById('choixHeure');
        modalHeure.classList.add("show");
        modalHeure.style.display = "block";


        // recuperation date choisit
        var dayOfMonth = $(this).attr('data-day-of-month');
        var month = $(this).attr('data-month');
        var year = $(this).attr('data-year');

        
       
        
        
        // date choisie ajout de 0 si inférieur à 10    
        if(dayOfMonth.length < 2){
            dayOfMonth = "0" + dayOfMonth;
        }
        if(month.length < 2){
            month = "0" + month;
        }

        
        // Date actuelle ajout de 0 si inférieur à 10
        if(mois < 10){
            mois = "0" + mois;
        }
        if(jour < 10){
            jour = "0" + jour;
        }
        var dateChoisie = dayOfMonth + "/" + month + "/" + year;
        var dateActuelle = jour + "/" + mois + "/" + annee;

        console.log(dateChoisie);
        console.log(dateActuelle);
        
        if(year >= annee){

            if(month == mois){

                if(dayOfMonth >= jour){
                        // affichage date choisie dans modal
                        $("#date").text("La date choisie est le " + dateChoisie);

                        var jourHidden = document.getElementById("jourHidden");
                        jourHidden.value = dayOfMonth;

                        var moisHidden = document.getElementById("moisHidden");
                        moisHidden.value = month;

                        var anneeHidden = document.getElementById("anneeHidden");
                        anneeHidden.value = year;

                        var inputResa = document.getElementById("validerResa");
                        inputResa.textContent= "Confirmer et valider la demande";
                        console.log(inputResa);
                        
                }
                
                else{
                    $("#date").text("La date " + dateChoisie + " est inférieur au jour actuelle (Nous sommes le " + jour + "), la réservation est donc impossible.");
                }
                
            }
            else{
                $("#date").text("La date " + dateChoisie + " est inférieur au mois actuelle, la réservation est donc impossible.");
            }
            if(month > mois){
                // affichage date choisie dans modal
                $("#date").text("La date choisie est le " + dateChoisie);

                var jourHidden = document.getElementById("jourHidden");
                jourHidden.value = dayOfMonth;

                var moisHidden = document.getElementById("moisHidden");
                moisHidden.value = month;

                var anneeHidden = document.getElementById("anneeHidden");
                anneeHidden.value = year;

                var inputResa = document.getElementById("validerResa");
                inputResa.textContent= "Confirmer et valider la demande";
                console.log(inputResa);
            }
         

        }
        else{
            $("#date").text("La date " + dateChoisie + " est inférieur à l'année actuelle, la réservation est donc impossible.");
        }
        
    })

    // fermeture des fenêtres
    $("#erreur").click(function(event){
        var erreur = document.getElementById('erreurModal');
        erreur.classList.remove("show");
        erreur.style.display="none";
    })

    $("#retour").click(function(event){
        var erreur = document.getElementById('choixHeure');
        erreur.classList.remove("show");
        erreur.style.display="none";

    })

})