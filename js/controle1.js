function verif1(ch)
{
var test=true;
	for (i = 0;i < ch.length ; ++i)
	{
		if((ch.charAt(i) < "a" || ch.charAt(i) > "z") && (ch.charAt(i) < "A" || ch.charAt(i) > "Z")&& ch.charAt(i)!=" ")
		{
			test=false;
		}
	}
   return test;
}

function verif(){
	if(f1.nom.value==""){
 alert('Vous devez saisir le nom du produit!');
   return false;
   }

   if(verif1(f1.nom.value)==false)
{         alert("Le champ doit etre composé de lettres et d'espaces !");
          return false;
   }
  
    
      if(f1.prix.value==""){
 alert('Vous devez saisir le prix!');
   return false;
   }
      if(isNaN(f1.prix.value))
{      alert("Le prix doit etre numerique!");
       return false;
   }
      if(f1.quantite.value==""){
 alert('Vous devez saisir quantite!');
   return false;
   }
      if(isNaN(f1.qunatite.value))
{      alert("La quantite doit etre numerique!");
       return false;
   }
}


if(f1.description.value==""){
   alert('Vous devez saisir description du produit!');
     return false;
     }
  
     if(verif1(f1.description.value)==false)
  {         alert("Le champ doit etre composé de lettres et d'espaces !");
            return false;
     }


     if(f1.image.value==""){
      alert('Vous devez saisir image du produit!');
        return false;
        }
     
        if(verif1(f1.image.value)==false)
     {         alert("Le champ doit etre composé d'un fichier !");
               return false;
        }

