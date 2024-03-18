
     
    // controle des saisies //

    document.getElementById('nom').addEventListener('input', function(e){
        let nomformat = /^[a-zA-Z-\s]+$/;
        
        if(nomformat.test(nom.value) == false){
            let Erreurnom = document.getElementById('erreurnom');
           
            Erreurnom.innerHTML= "Le nom doit comporter uniquement des lettres";
            Erreurnom.style.color= 'red';
            e.preventDefault();
        }else{
            let Erreurnom = document.getElementById('erreurnom');
           
            Erreurnom.innerHTML= "Champ valide !";
            Erreurnom.style.color= 'green';
        }    
        });
        
        document.getElementById('prenom').addEventListener('input', function(e){
        let nomformat = /^[a-zA-Z-\s]+$/;
        
        if(nomformat.test(prenom.value) == false){
            let Erreurprenom = document.getElementById('erreurprenom');
           
            Erreurprenom.innerHTML= "Le nom doit comporter uniquement des lettres";
            Erreurprenom.style.color= 'red';
            e.preventDefault();
        }else{
            let Erreurprenom = document.getElementById('erreurprenom');
           
            Erreurprenom.innerHTML= "Champ valide !";
            Erreurprenom.style.color= 'green';
        }    
        });
    
        document.getElementById('tel').addEventListener('input', function (e){
        let formatel =  /^[0]{2}[0-9]*$/;
    
        if (formatel.test(tel.value) == false){
        let Erreurtel = document.getElementById('erreurtel');
        Erreurtel.innerHTML ="Ce champ doit composer des chiffres, et commence par un indicatif ! ";
        Erreurtel.style.color ='red';
        e.preventDefault();
        }else {
            let Erreurtel = document.getElementById('erreurtel');
            Erreurtel.innerHTML ="Champ valide !";
            Erreurtel.style.color ='green';
        }
        });
    
        document.getElementById('email').addEventListener('input', function (e){
        let emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,3}$/;
        
        if (emailRegex.test(email.value) == false){
        let Erreurmail = document.querySelector('#erreuremail');
    
        Erreurmail.innerHTML ="Format email invalide !";
        Erreurmail.style.color ='red';
        e.preventDefault();
        }else {
            let Erreurmail = document.querySelector('#erreuremail');
            Erreurmail.innerHTML ="Champ valide !";
            Erreurmail.style.color ='green';
        }
        });
    
        document.getElementById('password').addEventListener('input', function (e){
        let passRegex = /^[a-zA-Z+[0-9]+[#?!@$%^&*-]+$/;
        
        if (passRegex.test(password.value) == false){
        let Erreurpassword = document.querySelector('#erreurpassword');
    
        Erreurpassword.innerHTML ="Invalide!Ce champ comporte des lettres et chiffres et au moins un caractère spécial à la fin";
        Erreurpassword.style.color ='red';
        e.preventDefault();
        }else {
            let Erreurpassword = document.querySelector('#erreurpassword');
            Erreurpassword.innerHTML ="Champ valide !";
            Erreurpassword.style.color ='green';
        }
        });
    
      
        // verification remplissage des champs//
    
    let Form_inscription = document.getElementById('form_inscription');
        
    Form_inscription.addEventListener('submit',function(e){
    
            let Civilite = document.getElementById('civil')
            let Name = document.getElementById('nom')
            let Prenom = document.getElementById('prenom')
            let Tel = document.getElementById('tel')
            let Age = document.getElementById('age')
            let Nationalite = document.getElementById('nationalite')
            let Email = document.getElementById('email')
            let Password = document.getElementById('password')
    
    
            if (Civilite.value.trim() ==""){
                let Erreurcivilite = document.getElementById('erreurcivilite');
                Erreurcivilite.innerHTML = "Champ obligatoire !";
                Erreurcivilite.style.color = 'red';
                e.preventDefault();
            }
            if (Name.value.trim() ==""){
                let Erreurnom = document.getElementById('erreurnom');
                Erreurnom.innerHTML = "Le Nom est obligatoire!";
                Erreurnom.style.color = 'red';
                e.preventDefault();
            }
            if (Prenom.value.trim() ==""){
                let Erreurprenom = document.getElementById('erreurprenom');
                Erreurprenom.innerHTML =" Champ obligatoire!";
                Erreurprenom.style.color ='red';
                e.preventDefault();
            }
            if (Age.value.trim() ==""){
                let Erreurage = document.getElementById('erreurage');
                Erreurage.innerHTML = "Champ obligatoire!";
                Erreurage.style.color = 'red';
                e.preventDefault();
            }
            if (Nationalite.value.trim() ==""){
                let Erreurnat = document.getElementById('erreurnat');
                Erreurnat.innerHTML = "Champ obligatoire!";
                Erreurnat.style.color = 'red';
                e.preventDefault();
            }
            if (Tel.value.trim() ==""){
                let Erreurtel = document.getElementById('erreurtel');
                Erreurtel.innerHTML = "Champ obligatoire!";
                Erreurtel.style.color = 'red';
                e.preventDefault();         
            }
            if (email.value.trim() ==""){
                let Erreurmail = document.getElementById('erreuremail');
                Erreurmail.innerHTML = "Votre Email est obligatoire!";
                Erreurmail.style.color = 'red';
                e.preventDefault(); 
            } 
            if (Password.value.trim() ==""){
                let Erreurpassword = document.getElementById('erreurpassword');
                Erreurpassword.innerHTML = "Le champ mot de pass est obligatoire!";
                Erreurpassword.style.color = 'red';
                e.preventDefault();
            }
            else{
            alert('Vous êtes sur le point de valider votre inscription...')
             }
        })