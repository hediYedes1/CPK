function validerNom() {
    var nom = document.getElementsById('name');
    var nomPattern = /^[a-zA-Z\s]+$/;
    var msg = document.getElementById('nomMsg');
    if (nom.value.match(nomPattern)) {
        msg.innerHTML = <span style="color:green">Correct</span>;
    } else {
        msg.innerHTML = <span style="color:red">Nom incorrect</span>;
    }
}
var form = document.getElementById('myForm');
form.addEventListener('submit', function (e) {  

    e.preventDefault();
    validerNom();
    validerAdresseLigne1();
    validerAdresseLigne2();
    validerVille();
    validerEtat();
    validerPays();
});
function toutesLesValidationsSontCorrectes() {

    return true;
}


function validerDateMatch(){
    var dateMatch = document.getElementById('date_match')
    if( dateMatch.value < "2024-01-01" || dateMatch.value > "2024-12-31" ){
        alert("Date invalide")
    } else {
        alert("Date valide")
    }
}

function validerTelephone(){
    var telephone = document.getElementById('telephone')

    var telPattern = /^[0-9]{8}$/

    var msg = document.getElementById('telephoneMsg')

    if(telephone.value.match(telPattern)){
        // msg.innerHTML="<i>Paragraphe à modifier</i>"
        msg.innerHTML = '<span style="color:green">Correct</span>'
    } else{
        msg.innerHTML = '<span style="color:red">Num tél incorrect</span>'
    }
}

function validerEmail(){
    var email = document.getElementById('email')

    var emailPattern = /^[a-zA-Z0-9._-]+@esprit\.tn$/

    var msg = document.getElementById('myEmail')

    if(email.value.match(emailPattern)){
        msg.innerHTML = '<span style="color:green">Correct</span>'
    } else{
        msg.innerHTML = '<span style="color:red">Incorrect</span>'
    }


}

var form = document.getElementById('myForm')

form.addEventListener('submit', function(e) {
    e.preventDefault()
    validerTelephone()
})
