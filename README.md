# rubrica
rubrica telefonica. HTML, CSS, JavaScript, PHP, Jquery, AJAX

---
title: rubrica
author: Antonio Tobias de Oliveira Candela
date: 07/10/2022
---
## risorse usate:
- Jquery [link](https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js).
- Font: ROBOTO [link](https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap).

## Come orientarsi sul codice
### Creare il database
Dentro alla cartella `rubrica -> database` si trovano i file `createDB.sql` e `popola.sql`.
- Dentro al file `createDB.sql` sono presenti i commandi per creare il database e la sua tabella.
- Dentro al file `popola.sql` si trovano alcuni `insert into` già pronti per delle prove.

### Index
Il sito si apre nella pagina index che ha presente due pulsanti;
1. Inserisci un nuovo contatto
2. Visualizza la tua rubbrica

### 1. Inserisci un nuovo contatto
In questa pagina è presente un form. Il form manda i dati in post al file php `inserisciContatto.php`. Il codice dentro a `inserisciContatto.php` crea una conessione con il nostro database e inserisce i dati all'interno.

> **_NOTE:_**  CAMBIARE I SEGUENTI VALORI IN BASE ALlA MACCHINA CHE SI GIRA IL SERVER DB 
```
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rubrica";
```

