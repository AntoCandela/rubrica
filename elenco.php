<html>
   
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="style/style.css">
        <script src="script/ricercaCognome.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="script/modifica.js"></script>

        <title>Rubrica</title>
    </head>   
    
    <body>
            
        <header>
            <h1>Rubrica telefonica</h1>
        </header>

        <!-- Form di ricerca per cognome -->
        <form class="form-ricerca">
            <div class="user-input">
                <label for="email">Ricerca per cognome:</label>
                <input type="text" size="30" onkeyup="ricercaCognome(this.value)">
            </div>
        </form>

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
                echo "0 results";
            }

            mysqli_close($conn);
        ?>
        <div class="tasto-torna" style="margin-top: 2vh;">
                <button type="button" onclick="location.href='index.html'">Torna Indietro</button>
        </div>
    </body>   
</html>