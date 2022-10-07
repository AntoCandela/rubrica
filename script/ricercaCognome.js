function ricercaCognome(cognome) {
    
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