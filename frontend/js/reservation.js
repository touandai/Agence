
let reservation = document.getElementById('reservation');
        
reservation.addEventListener('submit',function(e){
    
    let Nombre = document.getElementById('nombre')
    let Reglement = document.getElementById('reglement')
        alert('Assurez vous d\'avoir rempli tous les champs!')
    if(Nombre.value && Reglement.value !==""){
        alert ('Vous pouvez suivre l\'état de votre réservation sur votre espace client')
    } 

});