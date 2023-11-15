<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<form id="contactForm" action="index.php" method="POST">
    <h2>Contactez-nous</h2>
    <label for="name">Nom :</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" required><br><br>

    <label for="date_naissance">Date de naissance :</label>
    <input type="text" id="date_naissance" name="date_naissance" required><br><br>

    <label for="nationalite">Nationalité :</label>
    <input type="text" id="nationalite" name="nationalite" required><br><br>

    <label for="genre">Genre :</label>
    <input type="text" id="genre" name="genre" required><br><br>

    <div id="errorMessages"></div>

    <button id="Envoyer" name="enovoyer">Envoyer</button>
</form>


<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "gestion bancaire";  // Note: Corrected the database name

$connected = mysqli_connect($host, $user, $password, $db);

if (!$connected) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if($_POST["envoyer"]){
    $name = $_POST["name"];
    $prenom = $_POST["prenom"];
    $date_naissance = $_POST["date_naissance"];
    $nationalite = $_POST["nationalite"];
    $genre = $_POST["genre"];

    $sql = "INSERT INTO clients (nom, prenom, date_naissance, nationalite, genre) VALUES ('$name', '$prenom', '$date_naissance', '$nationalite', '$genre')";

    if (mysqli_query($connected, $sql)) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connected);
    }}
}

mysqli_close($connected);
?>


</body>
</html>

