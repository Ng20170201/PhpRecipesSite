
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }
  
  
  function validateForm() {
    var naziv = document.forms["unosRecepta"]["naziv"].value;
    var ocena = document.forms["unosRecepta"]["ocena"].value;
    var opis = document.forms["unosRecepta"]["opis"].value;
    if (naziv == "" || ocena == "" || opis == "") {
      alert("Polja ne smeju biti prazna! ");
      return false;
    }
  }
  
  