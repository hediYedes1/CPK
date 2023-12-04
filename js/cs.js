
function validerNom() {
  var nom = document.getElementById('nom'); // Remplacez 'nom' par l'ID de votre champ de nom
  var nomValue = nom.value.trim();
  
  // Le nom peut contenir des lettres et des espaces, avec une longueur maximale de 40 caractères
  var nomPattern = /^[A-Za-z\s]{1,40}$/;

  var msgNom = document.getElementById('mynom'); // Remplacez 'mynom' par l'ID de votre message d'erreur
  
  if (nomValue === '') {
      msgNom.innerHTML = '<span style="color: red">Ce champ est obligatoire.</span>';
      return false; // La validation a échoué, empêche la soumission du formulaire
  } else if (nomPattern.test(nomValue)) {
      msgNom.innerHTML = '<span style="color: green">Correct</span>';
      return true; // La validation est réussie, permet la soumission du formulaire
  } else {
      msgNom.innerHTML = '<span style="color: red">Le nom ne doit contenir que des lettres et des espaces, avec une longueur maximale de 40 caractères.</span>';
      return false; // La validation a échoué, empêche la soumission du formulaire
  }
}

var form = document.getElementById('form-work');

form.addEventListener('submit', function(e) {
       // Empêcher la soumission du formulaire par défaut

    if (!validerNom()  ) {
        e.preventDefault(); // Empêche la soumission du formulaire si la validation échoue
    }
});



function validertype() {
    var type = document.getElementById('type'); // Remplacez 'type' par l'ID de votre champ de type
    var typeValue = type.value.trim();
    
    // Le type peut contenir des lettres et des espaces, avec une longueur maximale de 40 caractères
    var typePattern = /^[A-Za-z\s]{1,40}$/;
  
    var msgtype = document.getElementById('mytype'); // Remplacez 'mytype' par l'ID de votre message d'erreur
    
    if (typeValue === '') {
        msgtype.innerHTML = '<span style="color: red">Ce champ est obligatoire.</span>';
        return false; // La validation a échoué, empêche la soumission du formulaire
    } else if (typePattern.test(typeValue)) {
        msgtype.innerHTML = '<span style="color: green">Correct</span>';
        return true; // La validation est réussie, permet la soumission du formulaire
    } else {
        msgtype.innerHTML = '<span style="color: red">Le type ne doit contenir que des lettres et des espaces, avec une longueur maximale de 40 caractères.</span>';
        return false; // La validation a échoué, empêche la soumission du formulaire
    }
  }
  
  var form = document.getElementById('form-work');
  
  form.addEventListener('submit', function(e) {
         // Empêcher la soumission du formulaire par défaut
  
      if (!validertype()  ) {
          e.preventDefault(); // Empêche la soumission du formulaire si la validation échoue
      }
  });
  


//   function validerImage() {
//     var image = document.getElementById('image'); // Remplacez 'image' par l'ID de votre champ de image
//     var imageValue = image.value.trim();
    
//     // L'image peut contenir des lettres et des espaces, avec une longueur maximale de 40 caractères
//     var imagePattern = /^[A-Za-z\s]{1,40}$/;
  
//     var msgImage = document.getElementById('myimage'); // Remplacez 'myimage' par l'ID de votre message d'erreur
    
//     if (ImageValue === '') {
//         msgImage.innerHTML = '<span style="color: red">Ce champ est obligatoire.</span>';
//         return false; // La validation a échoué, empêche la soumission du formulaire
//     } else if (imagePattern.test(imageValue)) {
//         msgImage.innerHTML = '<span style="color: green">Correct</span>';
//         return true; // La validation est réussie, permet la soumission du formulaire
//     } else {
//         msgImage.innerHTML = '<span style="color: red">image ne doit contenir que des lettres et des espaces, avec une longueur maximale de 40 caractères.</span>';
//         return false; // La validation a échoué, empêche la soumission du formulaire
//     }
//   }
  
//   var form = document.getElementById('form-work');
  
//   form.addEventListener('submit', function(e) {
//          // Empêcher la soumission du formulaire par défaut
  
//       if (!validerImage()  ) {
//           e.preventDefault(); // Empêche la soumission du formulaire si la validation échoue
//       }
//   });




  


  function validerPrix() {
    var prix = document.getElementById('prix'); // Remplacez 'prix' par l'ID de votre champ de prix
    var prixValue = prix.value.trim();
    
    // Le prix peut contenir des chiffres, avec une longueur maximale de 40 caractères
    var prixPattern = /^[0-9]{1,40}$/;
  
    var msgPrix = document.getElementById('myprix'); // Remplacez 'myprix' par l'ID de votre message d'erreur
    
    if (prixValue === '') {
        msgPrix.innerHTML = '<span style="color: red">Ce champ est obligatoire.</span>';
        return false; // La validation a échoué, empêche la soumission du formulaire
    } else if (prixPattern.test(prixValue)) {
        msgPrix.innerHTML = '<span style="color: green">Correct</span>';
        return true; // La validation est réussie, permet la soumission du formulaire
    } else {
        msgPrix.innerHTML = '<span style="color: red">Le prix ne doit contenir que des chiffres, avec une longueur maximale de 40 caractères.</span>';
        return false; // La validation a échoué, empêche la soumission du formulaire
    }
  }
  
  var form = document.getElementById('form-work');
  
  form.addEventListener('submit', function(e) {
         // Empêcher la soumission du formulaire par défaut
  
      if (!validerPrix()  ) {
          e.preventDefault(); // Empêche la soumission du formulaire si la validation échoue
      }
  });

  

  
  function validerDescription() {
    var description = document.getElementById('description'); // Remplacez 'description' par l'ID de votre champ de description
    var descriptionValue = description.value.trim();
    
    // La description peut contenir des lettres et des espaces, avec une longueur maximale de 40 caractères
    var descriptionPattern = /^[A-Za-z\s]{1,40}$/;
  
    var msgDescription = document.getElementById('mydescription'); // Remplacez 'mydescription' par l'ID de votre message d'erreur
    
    if (descriptionValue === '') {
        msgDescription.innerHTML = '<span style="color: red">Ce champ est obligatoire.</span>';
        return false; // La validation a échoué, empêche la soumission du formulaire
    } else if (descriptionPattern.test(descriptionValue)) {
        msgDescription.innerHTML = '<span style="color: green">Correct</span>';
        return true; // La validation est réussie, permet la soumission du formulaire
    } else {
        msgDescription.innerHTML = '<span style="color: red">La description ne doit contenir que des lettres et des espaces, avec une longueur maximale de 40 caractères.</span>';
        return false; // La validation a échoué, empêche la soumission du formulaire
    }
  }
  
  var form = document.getElementById('form-work');
  
  form.addEventListener('submit', function(e) {
         // Empêcher la soumission du formulaire par défaut
  
      if (!validerDescription()  ) {
          e.preventDefault(); // Empêche la soumission du formulaire si la validation échoue
      }
  });



  function validerQuantite() {
    var quantite = document.getElementById('quantite'); // Remplacez 'quantite' par l'ID de votre champ de quantite
    var quantiteValue = quantite.value.trim();
    
    // La quantite peut contenir des chiffres, avec une longueur maximale de 40 caractères
    var quantitePattern = /^[0-9]{1,40}$/;
  
    var msgQuantite = document.getElementById('myquantite'); // Remplacez 'myquantite' par l'ID de votre message d'erreur
    
    if (quantiteValue === '') {
        msgQuantite.innerHTML = '<span style="color: red">Ce champ est obligatoire.</span>';
        return false; // La validation a échoué, empêche la soumission du formulaire
    } else if (quantitePattern.test(quantiteValue)) {
        msgQuantite.innerHTML = '<span style="color: green">Correct</span>';
        return true; // La validation est réussie, permet la soumission du formulaire
    } else {
        msgQuantite.innerHTML = '<span style="color: red">La quantite ne doit contenir que des chiffres, avec une longueur maximale de 40 caractères.</span>';
        return false; // La validation a échoué, empêche la soumission du formulaire
    }
  }
  
  var form = document.getElementById('form-work');
  
  form.addEventListener('submit', function(e) {
         // Empêcher la soumission du formulaire par défaut
  
      if (!validerQuantite()  ) {
          e.preventDefault(); // Empêche la soumission du formulaire si la validation échoue
      }
  });

  


