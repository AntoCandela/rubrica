<html>    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="style/style.css">

        <title>Inserimento contatto</title>
    </head>

    <body>
    
        <?php

            if (isset($_POST['name'])) $name= $_POST['name']; else $name = null;
            if (isset($_POST['surname'])) $surname = $_POST['surname']; else $surname = null;
            if (isset($_POST['email'])) $email = $_POST['email']; else $email = null;
            if (isset($_POST['cellphonenumber'])) $cellphonenumber = $_POST['cellphonenumber']; else $cellphonenumber = null;
            if (isset($_POST['birthdate'])) $birthdate = $_POST['birthdate']; else $birthdate = null;

            //cambiare parametri in base alla macchina che si hosta
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "rubrica";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            //insert into database
            $sql = "INSERT INTO contatto (Nome, Cognome, DataNascita, telefono, Mail)  VALUES ('$name', '$surname', '$birthdate', '$cellphonenumber', '$email')";

            if (mysqli_query($conn, $sql)) {
                echo "<p style='font-size : 40px; text-align: center ; margin-top: 200px'>Nuovo contatto inserito corretamente</p>";
                echo "<p style='font-size : 20px; text-align: center ; margin-top: 200px'>Aspetta di essere reindirizzato</p>";

                header('refresh:2; url= index.html');
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);

        ?> 
    </body>
</html>