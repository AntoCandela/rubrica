<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rubrica";

    if (isset($_POST['cognomePost'])) $cognomePost = $_POST['cognomePost']; else $cognomePost = null;


    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    //uso like per la ricerca, % sta per tutti i char dopo
    $sql = "SELECT ID, Nome, Cognome, DataNascita, Telefono, Mail FROM contatto WHERE Cognome  LIKE '%$cognomePost%' ";

    /* STAMPO LA TABELLA */

    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {
        echo "<table class=\"tabella-visualizza\" id=\"tabella-visualizza-ricerca\">";

        echo"<tr><th>ID</th> <th>Nome</th> <th>Cognome</th> <th>Data Nascita</th> <th>Numero</th> <th>Mail</th> </tr>";

        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr id=\"".$row['ID']."\" data-nome=\"".$row['Nome']."\" data-cognome=\"".$row['Cognome']."\" data-dataNascita=\"".$row['DataNascita']."\" data-numero=\"".$row['Telefono']."\" data-email=\"".$row['Mail']."\">";

            echo "<td>".$row['ID']."</td>" ;
            echo "<td>".$row['Nome']."</td>" ;
            echo "<td>".$row['Cognome']."</td>" ;
            echo "<td>".$row['DataNascita']."</td>";
            echo "<td>".$row['Telefono']."</td>";
            echo "<td>".$row['Mail']."</td>";
            echo "<td><button class=\"tasto-modifica\">modifica</button></td>";

            echo "</tr>";
        }

        echo "</table>";
        
    } else {
        //senza risultati
    }

    mysqli_close($conn);
?>