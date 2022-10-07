$(document).ready(function(){  
      
    // modifica

    $("table").on("click", ".tasto-modifica", function(){  
        let nome = $(this).parents("tr").attr('data-nome');  
        let cognome = $(this).parents("tr").attr('data-cognome');
        let dataNascita = $(this).parents("tr").attr('data-dataNascita');  
        let numero = $(this).parents("tr").attr('data-numero');  
        let email = $(this).parents("tr").attr('data-email');  

      
        $(this).parents("tr").find("td:eq(1)").html('<input class="input-modifica" name="edit_name" value="'+nome+'">');  
        $(this).parents("tr").find("td:eq(2)").html('<input class="input-modifica" name="edit_cognome" value="'+cognome+'">');
        $(this).parents("tr").find("td:eq(3)").html('<input class="input-modifica" name="edit_dataNascita" value="'+dataNascita+'">');  
        $(this).parents("tr").find("td:eq(4)").html('<input class="input-modifica" name="edit_numero" value="'+numero+'">');  
        $(this).parents("tr").find("td:eq(5)").html('<input class="input-modifica" name="edit_email" value="'+email+'">');  

        $(this).parents("tr").find("td:eq(6)").prepend("<button class='tasto-aggiorna'>✓</button><button class='tasto-cancella'>✗</button>") 
         
        $(this).hide();  
    });  
     
    // cancella

    $("body").on("click", ".tasto-cancella", function(){  
        let nome = $(this).parents("tr").attr('data-nome');  
        let cognome = $(this).parents("tr").attr('data-cognome');
        let dataNascita = $(this).parents("tr").attr('data-dataNascita');  
        let numero = $(this).parents("tr").attr('data-numero');  
        let email = $(this).parents("tr").attr('data-email');  
      
        $(this).parents("tr").find("td:eq(1)").text(nome);  
        $(this).parents("tr").find("td:eq(2)").text(cognome);
        $(this).parents("tr").find("td:eq(3)").text(dataNascita);  
        $(this).parents("tr").find("td:eq(4)").text(numero);  
        $(this).parents("tr").find("td:eq(5)").text(email); 
     
        $(this).parents("tr").find(".tasto-modifica").show();  
        $(this).parents("tr").find(".tasto-aggiorna").remove();  
        $(this).parents("tr").find(".tasto-cancella").remove();  
    });  
     
    //aggiorna (sul DB)

    $("body").on("click", ".tasto-aggiorna", function(){  
        let id = $(this).parents("tr").attr('id');  
        let nome = $(this).parents("tr").find("input[name='edit_name']").val();    
        let cognome = $(this).parents("tr").find("input[name='edit_cognome']").val();
        let dataNascita = $(this).parents("tr").find("input[name='edit_dataNascita']").val();
        let numero = $(this).parents("tr").find("input[name='edit_numero']").val();
        let email = $(this).parents("tr").find("input[name='edit_email']").val();
        
        $.post( "modifica.php", {id: id, nome: nome, cognome: cognome, dataNascita: dataNascita, telefono: numero, email: email} );

        $(this).parents("tr").find("td:eq(1)").text(nome);  
        $(this).parents("tr").find("td:eq(2)").text(cognome);
        $(this).parents("tr").find("td:eq(3)").text(dataNascita);  
        $(this).parents("tr").find("td:eq(4)").text(numero);  
        $(this).parents("tr").find("td:eq(5)").text(email); 
     
        $(this).parents("tr").find(".tasto-cancella").remove();
        $(this).parents("tr").find(".tasto-modifica").show();  
        $(this).parents("tr").find(".tasto-aggiorna").remove();  
         
    });  
  
});

// TEST //
 
