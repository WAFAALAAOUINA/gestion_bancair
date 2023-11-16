<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Transaction</title>
</head>
<body>
    <!-- //navbar// -->

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Page</title>
    <!-- Inclure le lien vers la feuille de style de Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200 font-sans">

    <nav class="bg-blue-500 p-4">
        <div class="container mx-auto">
            <div class="flex items-center justify-between">
                <div class="text-white text-lg font-bold">Logo</div>
                <div class="flex space-x-4">
                    <a href="afficherclientes.php" class="text-white">Clients</a>
                    <a href="affichercomptes.php" class="text-white">Comptes</a>
                    <a href="affichertransaction.php" class="text-white">Transactions</a>
                </div>
            </div>
        </div>
    </nav>
    

<!-- //+++++++++++++++++++++++ -->

<form id="contactForm" action="clientes.php" method="POST">
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

    <button id="Envoyer" name="envoyer">Envoyer</button>
    <button><a href="afficherclientes.php">transfier</a></button>
</form>


<?php

require "db.php";
 

$host = "localhost";
$user = "root";
$password = "";
$myDB = "myB";

$connected = new mysqli($host,$user,$password,$myDB);


if ($connected->connect_error) {
    die("Connection failed: " . $connected->connect_error);
}
// if($connected->query()){
//     echo "created";
// }
// else{
//     die($connected->error);
// }

//crate tablaux/++++++++++++++++++++++++++++

$createTableQuery = "CREATE TABLE IF NOT EXISTS clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    date_naissance DATE,
    nationalite VARCHAR(255),
    genre VARCHAR(10)
)";

   
if ($connected->query($createTableQuery)) {
    echo "Table created successfully";
} else {
    die("Error creating table: " . $connected->error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["envoyer"])) {
    $name = $_POST["name"];
    $prenom = $_POST["prenom"];
    $date_naissance = $_POST["date_naissance"];
    $nationalite = $_POST["nationalite"];
    $genre = $_POST["genre"];

    $sqlk = "INSERT INTO clients (nom, prenom, date_naissance, nationalite, genre) VALUES ('$name', '$prenom', '$date_naissance', '$nationalite', '$genre')";

    if ($connected->query($sqlk)) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sqlk . "<br>" . $connected->error;
    }
}








?>



</body>
</html>

