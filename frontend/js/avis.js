
document.querySelector('#pseudo').addEventListener('input', function(e){
    let nomformat = /^[a-zA-Z-\s]+$/;
    
    if(nomformat.test(pseudo.value) == false){
        let ErreurName = document.getElementById('erreur')
        ErreurName.innerHTML= "Le nom doit comporter uniquement des lettres";
        ErreurName.style.color ='red';
        e.preventDefault();
    }else{
        let ErreurName = document.getElementById('erreur');
        ErreurName.innerHTML= "Champ valide !";
        ErreurName.style.color= 'green';
    }    
    });

let Myform = document.getElementById('myform');
    Myform.addEventListener('submit',function(e){

        let inputName = document.getElementById('pseudo')
        let inputNote = document.getElementById('note')
        let Commentaire = document.getElementById('commentaire')
        let myRegex = /^[a-zA-Z]+$/;

        if (inputName.value ==""){
            let Erreur = document.getElementById('erreur');
            Erreur.innerHTML ="Veuillez saisir votre nom";
            Erreur.style.color ='red';
            e.preventDefault();
        }
        if (inputNote.value ==""){
            let Erreur2 = document.getElementById('erreur2');
            Erreur2.innerHTML ="Veuillez choisir une note";
            Erreur2.style.color = 'red';
            e.preventDefault();
        } 
        if (Commentaire.value ==""){
            let Erreur3 = document.getElementById('erreur3');
            Erreur3.innerHTML ="Veuillez indiquer votre message";
            Erreur3.style.color = 'red';
            e.preventDefault();
        }
});