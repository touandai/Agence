


        let Form = document.getElementById('form');
       
       
        Form.addEventListener('submit',(e)=>{
            
            let Motif = document.getElementById('motif');
            let inputNom = document.getElementById('nom');
            let inputEmail = document.getElementById('email');
            let inputTel = document.getElementById('tel');
            let Message = document.getElementById('message');

           let nomformat = /^[a-zA-Z-\s]+$/;
           let mailformat = /^[a-z]+@\.]+$/;
           let telforformat = /^[0-9]+$/;

            //controle saisie champ obligatoire motif// 
            if (Motif.value.trim() ==""){
               let Erreurtype = document.getElementById('erreurtype');
               Erreurtype.innerHTML = "Choississez un type obligatoire !";
               Erreurtype.style.color = 'red';
            e.preventDefault();
            }
            //controle saisie champ obligatoire nom// 
            if (inputNom.value.trim() ==""){
               let Erreurname = document.getElementById('erreurname');
               Erreurname.innerHTML = "Le nom est obligatoire !";
               Erreurname.style.color = 'red';
            e.preventDefault();
            }else if(nomformat.test(inputNom.value) == false){
                let Erreurname = document.getElementById('erreurname');
                Erreurname.innerHTML= "Le nom doit comporter uniquement des lettres";
                Erreurname.style.color= 'red';
                e.preventDefault();
            }
            if (inputEmail.value.trim() ==""){
                let Erreurmail = document.getElementById('erreurmail');
                Erreurmail.innerHTML = "Votre Email est obligatoire !";
                Erreurmail.style.color = 'red';
                e.preventDefault();
            }else if (mailformat.test(inputEmail.value) == false){
                let Erreurmail = document.getElementsById('erreurmail');
                Erreurmail.innerHTML ="Le champ email doit comporter que de lettres miniscules";
                Erreurmail.style.color ='red';
                e.preventDefault();
            }
            if (telforformat.test(inputTel.value) == false){
                let Erreurtel = document.getElementById('erreurtel');
                Erreurtel.innerHTML ="Ce champ doit composer que de chiffres ! ";
                Erreurtel.style.color ='red';
                e.preventDefault();
            }
            if (Message.value.trim() ==""){
                let Erreurmessage = document.getElementById('erreurmessage');
                Erreurmessage.innerHTML = "Veuillez saisir votre message !";
                Erreurmessage.style.color = 'red';
             e.preventDefault();
            }
        });