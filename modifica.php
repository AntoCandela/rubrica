<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rubrica";

    if (isset($_POST['id'])) $id = $_POST['id']; else $id = null;
    if (isset($_POST['nome'])) $nome= $_POST['nome']; else $nome = null;
    if (isset($_POST['cognome'])) $cognome = $_POST['cognome']; else $cognome = null;
    if (isset($_POST['email'])) $email = $_POST['email']; else $email = null;
    if (isset($_POST['telefono'])) $telefono = $_POST['telefono']; else $telefono = null;
    if (isset($_POST['dataNascita'])) $dataNascita = $_POST['dataNascita']; else $dataNascita = null;

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    //id da stringa a numero
    $id = (int) $id;

    $sql = "UPDATE contatto SET Nome = '$nome', Cognome = '$cognome', DataNascita = '$dataNascita', Telefono = '$telefono', Mail = '$email' WHERE ID = $id";

    mysqli_query($conn, $sql);

    mysqli_close($conn);
?>