
    document.getElementById('nom').addEventListener('input', function (e){
    let nomformat = /^[a-zA-Z-\s]+$/;
    
    if(nomformat.test(nom.value) == false){
        let Erreurname = document.getElementById('erreurname');
       
        Erreurname.innerHTML= "Le nom doit comporter uniquement des lettres";
        Erreurname.style.color= 'red';
        e.preventDefault();
    }else{
        let Erreurname = document.getElementById('erreurname');
       
        Erreurname.innerHTML= "Champ valide !";
        Erreurname.style.color= 'green';
    }    
    });
    
    document.getElementById('email').addEventListener('input', function (e){
    let mailformat = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,3}$/
    
    if (mailformat.test(email.value) == false){
    let Erreurmail = document.querySelector('#erreurmail');

    Erreurmail.innerHTML ="Format email invalide !";
    Erreurmail.style.color ='red';
    e.preventDefault();
    }else {
        let Erreurmail = document.querySelector('#erreurmail');
        Erreurmail.innerHTML ="email valide !";
        Erreurmail.style.color ='green';
    }
    });

    document.getElementById('tel').addEventListener('input', function (e){
    let telforformat =  /^[0]{2}[0-9]*$/;

    if (telforformat.test(tel.value) == false){
    let Erreurtel = document.getElementById('erreurtel');
    Erreurtel.innerHTML ="Ce champ doit composer des chiffres, et commence par un indicatif ! ";
    Erreurtel.style.color ='red';
    e.preventDefault();
    }else {
        let Erreurtel = document.getElementById('erreurtel');
        Erreurtel.innerHTML ="Telephone valide !";
        Erreurtel.style.color ='green';
    }

    });
   
   
   let Form = document.getElementById('form');
       
        Form.addEventListener('submit',(e) =>{
            
            let Motif = document.getElementById('motif');
            let inputNom = document.getElementById('nom');
            let inputEmail = document.getElementById('email');
            let inputTel = document.getElementById('tel');
            let Message = document.getElementById('message');

            //controle saisie champ obligatoire motif// 
            if (Motif.value.trim() ==""){
            let Erreurtype = document.getElementById('erreurtype');
            Erreurtype.innerHTML = "Vous devez choisir un type!";
            Erreurtype.style.color = 'red';
            e.preventDefault();
            }
            //controle saisie champ obligatoire nom// 
            if (inputNom.value.trim() ==""){
            let Erreurname = document.getElementById('erreurname');
            Erreurname.innerHTML = "Le nom est obligatoire !";
            Erreurname.style.color = 'red';
            e.preventDefault();
            }
            if (inputEmail.value.trim() ==""){
            let Erreurmail = document.getElementById('erreurmail');
            Erreurmail.innerHTML = "Votre Email est obligatoire !";
            Erreurmail.style.color = 'red';
            e.preventDefault();
            }
             //controle saisie champ telephone// 
            if (inputTel.value.trim() ==""){
            let Erreurtel = document.getElementById('erreurtel');
            Erreurtel.innerHTML = "Merci d'indiquer votre telephone!";
            Erreurtel.style.color = 'red';
            e.preventDefault();
            }
            if (Message.value.trim() ==""){
            let Erreurmessage = document.getElementById('erreurmessage');
            Erreurmessage.innerHTML = "Veuillez saisir votre message !";
            Erreurmessage.style.color = 'red';
            e.preventDefault();
            }
        })
                  


       