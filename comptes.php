<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Compte</title>
</head>
<body>
    <form id="compteForm" action="compts.php" method="POST">
        <h2>Formulaire compts</h2>
        
        <label for="RIB">RIB :</label>
        <input type="text" id="RIB" name="RIB" required><br><br>

        <label for="balance">Balance :</label>
        <input type="text" id="balance" name="balance" required><br><br>

        <label for="devise">Devise :</label>
        <input type="text" id="devise" name="devise" required><br><br>
        
        <div id="errorMessages"></div>

        <button type="submit" name="envoyer">Envoyer</button>
    </form>

    <?php
    require "db.php";

    $host = "localhost";
    $user = "root";
    $password = "";
    $myDB = "myB";

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

    // Commenté pour éviter la recréation à chaque chargement de la page
    // if ($connected->query($createTableQuery)) {
    //     echo "Table created successfully";
    // } else {
    //     die("Error creating table: " . $connected->error);
    // }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["envoyer"])) {
        $RIB = $_POST["RIB"];
        $balance = $_POST["balance"];
        $devise = $_POST["devise"];

        $sqlk = "INSERT INTO compts (RIB, balance, devise) VALUES ('$RIB', '$balance', '$devise')";

        if ($connected->query($sqlk)) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . $sqlk . "<br>" . $connected->error;
        }
    }

    // Afficher les données
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
    } else {
        echo "<p>Aucune donnée trouvée</p>";
    }

    $connected->close();
    ?>
</body>
</html>
