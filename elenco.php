<html>
   
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="style/style.css">

        <title>Rubrica</title>
    </head>   
    
    <body>

        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "rubrica";


            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT ID, Nome, Cognome, DataNascita, Telefono, Mail FROM contatto";

            $result = mysqli_query($conn, $sql);


            if (mysqli_num_rows($result) > 0) {
                echo "<table class=\"tabella-visualizza\">";

                echo"<tr><th>ID</th> <th>Nome</th> <th>Cognome</th> <th>Data Nascita</th> <th>Numero</th> <th>Mail</th> </tr>";

                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";

                    echo "<td>".$row['ID']."</td>" ;
                    echo "<td>".$row['Nome']."</td>" ;
                    echo "<td>".$row['Cognome']."</td>" ;
                    echo "<td>".$row['DataNascita']."</td>";
                    echo "<td>".$row['Telefono']."</td>";
                    echo "<td>".$row['Mail']."</td>";

                    echo "</tr>";
                }

                echo "</table>";
                
            } else {
                echo "0 results";
            }

            mysqli_close($conn);
        ?> 
    </body>   
</html>