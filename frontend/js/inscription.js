

    let Inscription = document.getElementById('inscription');
    
        Inscription.addEventListener('submit',function(e){

            let Civilite = document.getElementById('civilite')
            let Nom = document.getElementById('nom')
            let Prenom = document.getElementById('prenom')
            let Tel = document.getElementById('telephone')

            let inputRegex = /^[a-zA-Z]+$/; 
            let telRegex = /^[0-9]+$/; 

            if (Civilite.value.trim() ==""){
                let Erreurcivilite = document.getElementById('erreurcivilite');
                Erreurcivilite.innerHTML = "Ce champ est obligatoire !";
                Erreurcivilite.style.color = 'red';
                e.preventDefault();
            }
            if (Nom.value.trim() ==""){
                let Erreurnom = document.getElementById('erreurnom');
                Erreurnom.innerHTML = "le nom est obligatoire !";
                Erreurnom.style.color = 'red';
                e.preventDefault();
            }else if (inputRegex.test(Nom.value) == false){
                let Erreurnom = document.getElementById('erreurnom');
                Erreurnom.innerHTML ="Le Nom doit comporter uniquement des lettres et tirets";
                Erreurnom.style.color="red";
                e.preventDefault();
            }  
            if (Prenom.value.trim() ==""){
                let Erreurprenom = document.getElementById('erreurprenom');
                Erreurprenom.innerHTML =" Votre prenom est obligatoire!";
                Erreurprenom.style.color ='red';
                e.preventDefault();
            }else if (inputRegex.test(Prenom.value) == false){
                let Erreurprenom = document.getElementById('erreurprenom');
                Erreurprenom.innerHTML ="Ce champ doit comporter uniquement des lettres et tirets";
                Erreurprenom.style.color ='red';
                e.preventDefault();
            }
            if (Tel.value.trim() ==""){
                let Erreurtel = document.getElementById('erreurtel');
                Erreurtel.innerHTML = "le telephone est obligatoire !";
                Erreurtel.style.color = 'red';
                e.preventDefault();
            }else if (telRegex.test(Tel.value) == false){
                let Erreurpassword = document.getElementById('erreurpassword');
                Erreurpassword.innerHTML ="Votre telephone ne doit composer que de lettres espace ni tiret";
                Erreurpassword.style.color ='red';
                e.preventDefault();
        }       

    })    

