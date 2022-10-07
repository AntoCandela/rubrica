$(document).ready(function(){  
      
    // modifica

    $("table").on("click", ".tasto-modifica", function(){  
        // prendo i dati da dentro la riga della tabella
        let nome = $(this).parents("tr").attr('data-nome');  
        let cognome = $(this).parents("tr").attr('data-cognome');
        let dataNascita = $(this).parents("tr").attr('data-dataNascita');  
        let numero = $(this).parents("tr").attr('data-numero');  
        let email = $(this).parents("tr").attr('data-email');  

        //sostituisco il plain text con un input field
        $(this).parents("tr").find("td:eq(1)").html('<input class="input-modifica" name="edit_name" value="'+nome+'">');  
        $(this).parents("tr").find("td:eq(2)").html('<input class="input-modifica" name="edit_cognome" value="'+cognome+'">');
        $(this).parents("tr").find("td:eq(3)").html('<input class="input-modifica" name="edit_dataNascita" value="'+dataNascita+'">');  
        $(this).parents("tr").find("td:eq(4)").html('<input class="input-modifica" name="edit_numero" value="'+numero+'">');  
        $(this).parents("tr").find("td:eq(5)").html('<input class="input-modifica" name="edit_email" value="'+email+'">');  

        //aggiungo i due tasti, per aggiornare il database con il nuovo dato, oppure per annullare  l'operazione
        $(this).parents("tr").find("td:eq(6)").prepend("<button class='tasto-aggiorna'>✓</button><button class='tasto-annulla'>✗</button>") 
         
        $(this).hide();  
    });  
     
    // annulla

    $("body").on("click", ".tasto-annulla", function(){  

        let nome = $(this).parents("tr").attr('data-nome');  
        let cognome = $(this).parents("tr").attr('data-cognome');
        let dataNascita = $(this).parents("tr").attr('data-dataNascita');  
        let numero = $(this).parents("tr").attr('data-numero');  
        let email = $(this).parents("tr").attr('data-email');  
        
        //rimetto dentro alla riga i valore
        $(this).parents("tr").find("td:eq(1)").text(nome);  
        $(this).parents("tr").find("td:eq(2)").text(cognome);
        $(this).parents("tr").find("td:eq(3)").text(dataNascita);  
        $(this).parents("tr").find("td:eq(4)").text(numero);  
        $(this).parents("tr").find("td:eq(5)").text(email); 
        
        // torno con il solo tasto modifica
        $(this).parents("tr").find(".tasto-modifica").show();  
        $(this).parents("tr").find(".tasto-aggiorna").remove();  
        $(this).parents("tr").find(".tasto-annulla").remove();  
    });  
     
    //aggiorna (sul DB)

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
  
});

// TEST //
 
