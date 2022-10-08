# rubrica

Rubrica telefonica.

## Dati autore

Antonio Tobias de Oliveira Candela

- GitHub [link](https://github.com/AntoCandela).

## risorse usate

- Font: ROBOTO [link](https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap).
- HTML
- CSS
- JavaScript
- PHP
- Jquery [link](https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js).
- AJAX

## Come orientarsi sul codice

### Creare il database

Dentro alla cartella `rubrica/database` si trovano i file `createDB.sql` e `popola.sql`.

- Dentro al file `createDB.sql` sono presenti i commandi per creare il database e la sua tabella.
- Dentro al file `popola.sql` si trovano alcuni `insert into` già pronti per delle prove.

### Index

Il sito si apre nella pagina index che ha presente due pulsanti;

1. Inserisci un nuovo contatto  →   `inserisci.html`.
2. Visualizza la tua rubbrica   →   `elenco.php`.

### Inserisci un nuovo contatto

In questa pagina (`inserisci.html`) è presente un form. Il form manda i dati in _post_ al file php `inserisciContatto.php`. Il codice dentro a `inserisciContatto.php` crea una conessione con il nostro database e inserisce i dati all'interno.

> **_IMPORTANTE:_**  CAMBIARE I SEGUENTI VALORI DENTRO A `inserisciContatto.php` IN BASE ALLA MACCHINA CHE GIRA IL SERVER DB.

```PHP
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rubrica";
```

Una volta inserito il contatto, dopo 2 secondi l'utente viene ridirezzionato alla home page `index.html`.

### Visualizza la tua rubbrica

Dentro a questa pagina (`elenco.php`) troviamo un primo form di ricerca per cognome, dove in base a ciò che viene dato in input mostra sulla tabella soltanto i risultati simili (`LIKE`) presenti nel DataBase. Lo script che esegue questa ricerca e ritorna la tabella filtrata è presente dentro al file `script/ricercaCognome.js`, scritto in ajax;

```javascript
let xmlhttp = new XMLHttpRequest();
    
xmlhttp.onreadystatechange = function() {
    if (this.readyState==4 && this.status==200) {
        document.getElementById("tabella-visualizza-ricerca").innerHTML=this.responseText;
    }
}

xmlhttp.open("POST", "ricerca.php", true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send("cognomePost="+cognome);
```
Come si nota dentrneo al codice, i dati in _post_ vengono mandati alla pagina `ricerca.php`, dove ha presente la query di ricerca e ritorna la tabella filtrata.

### Modifica

Dentro alla pagina stessa `elenco.php`, tramitte Jquery, posso modificare i dati di una riga tramitte un form, che appare dopo che il tasto _modifica_ è stato schiacciato.
Una volta schiacciato _modifica_ e modificato i dati, possiamo aggiornare la tabella con i campi aggiornati, e viene aggiornato anche sul database con il codice.

```javascript
$("body").on("click", ".tasto-aggiorna", function(){  
        let id = $(this).parents("tr").attr('id');  
        let nome = $(this).parents("tr").find("input[name='edit_name']").val();    
        let cognome = $(this).parents("tr").find("input[name='edit_cognome']").val();
        let dataNascita = $(this).parents("tr").find("input[name='edit_dataNascita']").val();
        let numero = $(this).parents("tr").find("input[name='edit_numero']").val();
        let email = $(this).parents("tr").find("input[name='edit_email']").val();
        
        //mando in post i valori pescati nel form. Guardare modifica.php!!!
        $.post( "modifica.php", {id: id, nome: nome, cognome: cognome, dataNascita: dataNascita, telefono: numero, email: email} );

        $(this).parents("tr").find("td:eq(1)").text(nome);  
        $(this).parents("tr").find("td:eq(2)").text(cognome);
        $(this).parents("tr").find("td:eq(3)").text(dataNascita);  
        $(this).parents("tr").find("td:eq(4)").text(numero);  
        $(this).parents("tr").find("td:eq(5)").text(email); 
     
        $(this).parents("tr").find(".tasto-annulla").remove();
        $(this).parents("tr").find(".tasto-modifica").show();  
        $(this).parents("tr").find(".tasto-aggiorna").remove();  
         
});

```

Come visto i dati vengono mandati in _post_ al file `modifica.php`.

```PHP
$sql = "UPDATE contatto SET Nome = '$nome', Cognome = '$cognome', DataNascita = '$dataNascita', Telefono = '$telefono', Mail = '$email' WHERE ID = $id";
```

Passo anche l'id.

Una volta mandati i dati aggiornati, la tabella torna nel suo stato precedente con la riga aggiornata.
