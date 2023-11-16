
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
$selectQuery = "SELECT * FROM compts";
$result = $connected->query($selectQuery);

if ($result->num_rows > 0) {
    echo "<h2>Données des Comptes</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>RIB</th><th>Balance</th><th>Devise</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["RIB"] . "</td>";
        echo "<td>" . $row["balance"] . "</td>";
        echo "<td>" . $row["devise"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "<a href=" . "comptes.php>" . "submit</button>";
} else {
    echo "<p>Aucune donnée trouvée</p>";
}

$connected->close();
?>
</body>
</html>