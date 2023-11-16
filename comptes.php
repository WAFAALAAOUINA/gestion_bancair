
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
<!-- //++++++++++++++++++++++ -->

  <form id="compteForm" action="comptes.php" method="POST">
        <h2>Formulaire compts</h2>
        
        <label for="RIB">RIB :</label>
        <input type="text" id="RIB" name="RIB" required><br><br>

        <label for="balance">Balance :</label>
        <input type="text" id="balance" name="balance" required><br><br>

        <label for="devise">Devise :</label>
        <input type="text" id="devise" name="devise" required><br><br>
        
        <div id="errorMessages"></div>

        <button type="submit" name="envoyer">Envoyer</button>
        <button><a href="affichercomptes.php">transfier</a></button>
</form>
    </form>
 

<?php
require "db.php";

$host = "localhost";
$user = "root";
$password = "";
$myDB = "myB";


//+++++++++++++++++++++++++++++++++creation de tablaux++++++++++++++++++++++++++++

$connected = new mysqli($host, $user, $password, $myDB);

if ($connected->connect_error) {
    die("Connection failed: " . $connected->connect_error);
}



$createTableQuery = "CREATE TABLE IF NOT EXISTS compts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    RIB FLOAT NOT NULL,
    balance FLOAT NOT NULL,
    devise VARCHAR(10) NOT NULL
)";

if ($connected->query($createTableQuery)) {
    echo "Table created successfully";
} else {
    die("Error creating table: " . $connected->error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["envoyer"])) {
    $balance = $_POST["balance"];
    $devise = $_POST["devise"];
    $RIB = $_POST["RIB"];

    $sqlk = "INSERT INTO compts (balance, devise, RIB) VALUES ('$balance', '$devise', '$RIB')";

    if ($connected->query($sqlk)) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sqlk . "<br>" . $connected->error;
    }
}


?>
</body>
</html>
