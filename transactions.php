<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Transaction</title>
</head>
<body>
    <form id="transactionForm" action="transactions.php" method="POST">
        <h2>Formulaire Transaction</h2>
        
        <label for="montant">Montant :</label>
        <input type="text" id="montant" name="montant" required><br><br>

        <label for="type">Type :</label>
        <input type="text" name="type">

        <button type="submit" name="envoyer">Envoyer</button>
    </form>

    <?php
    // Connexion à la base de données
    require "db.php";
 
    $host = "localhost";
    $user = "root";
    $password = "";
    $myDB = "myB";

    $connected = new mysqli($host, $user, $password, $myDB);

    if ($connected->connect_error) {
        die("Connection failed: " . $connected->connect_error);
    }

    // Création de la table transactions
    $createTableQuery = "CREATE TABLE IF NOT EXISTS transactions (
        id INT AUTO_INCREMENT PRIMARY KEY,
        Montant VARCHAR(10) NOT NULL,
        Type ENUM('Débit', 'Crédit') NOT NULL
    )";

    if ($connected->query($createTableQuery)) {
        echo "Table created successfully";
    } else {
        die("Error creating table: " . $connected->error);
    }

    // Insertion des données dans la base de données
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Montant = $_POST["montant"];
        $type = $_POST["type"];

        $sqlk = "INSERT INTO transactions (Montant, Type) VALUES ('$Montant', '$type')";

        if ($connected->query($sqlk)) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . $sqlk . "<br>" . $connected->error;
        }
    }

    // Affichage des données de la base de données
    $selectQuery = "SELECT * FROM transactions";
    $result = $connected->query($selectQuery);

    if ($result->num_rows > 0) {
        echo "<h2>Données des Transactions</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Montant</th><th>Type</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["Montant"] . "</td>";
            echo "<td>" . $row["Type"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>Aucune donnée trouvée</p>";
    }

    $connected->close();
    ?>
</body>
</html>


