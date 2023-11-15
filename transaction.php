<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Transaction</title>
</head>
<body>
    <form id="transactionForm" action="transaction.php" method="POST">
        <h2>Formulaire Transaction</h2>
        <label for="id">ID :</label>
        <input type="text" id="id" name="id" required><br><br>

        <label for="montant">Montant :</label>
        <input type="text" id="montant" name="montant" required><br><br>

        <label for="type">Type :</label>
        <select id="type" name="type" required>
            <option value="debit">Débit</option>
            <option value="credit">Crédit</option>
        </select><br><br>

        <label for="compte_id">ID du Compte :</label>
        <input type="text" id="compte_id" name="compte_id" required><br><br>

        <div id="errorMessages"></div>

        <button type="submit" name="envoyer">Envoyer</button>
    </form>

    <?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "gestion bancaire";

    $connected = mysqli_connect($host, $user, $password, $db);

    if (!$connected) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["envoyer"])) {
            $id = $_POST["id"];
            $montant = $_POST["montant"];
            $type = $_POST["type"];
            $compte_id = $_POST["compte_id"];

            $sql = "INSERT INTO transactions (id, montant,compte_id) VALUES ('$id', '$montant', '$type', '$compte_id')";

            if (mysqli_query($connected, $sql)) {
                echo "Record inserted successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($connected);
            }
        }
    }

    mysqli_close($connected);
    ?>
</body>
</html>


