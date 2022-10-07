function ricercaCognome(cognome) {
    
  //usando ajax mi collego al server web mandando in post il paramentro cognome, sul quale verrà eseguita una query di ricerca e ritornerà una tabella con i dati del nostro interesse --> guardare ricerca.php
  let xmlhttp = new XMLHttpRequest();
    
  xmlhttp.onreadystatechange = function() {
    if (this.readyState==4 && this.status==200) {
        document.getElementById("tabella-visualizza-ricerca").innerHTML=this.responseText;
    }
  }

  xmlhttp.open("POST", "ricerca.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("cognomePost="+cognome);

  }