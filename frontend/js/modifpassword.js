

document.getElementById('email').addEventListener('input', function (e){
    let mailformat = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,3}$/
    
    if (mailformat.test(email.value) == false){
    let Erreurmail = document.querySelector('#erreuremail');

    Erreurmail.innerHTML ="Format email invalide !";
    Erreurmail.style.color ='red';
    e.preventDefault();
    }else {
        let Erreurmail = document.querySelector('#erreuremail');
        Erreurmail.innerHTML ="valide !";
        Erreurmail.style.color ='green';
    }
});