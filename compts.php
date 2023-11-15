<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Compte</title>
</head>
<body>
    <form id="compteForm" action="compts.php" method="POST">
        <h2>Formulaire Compte</h2>
        <label for="id">ID :</label>
        <input type="text" id="id" name="id" required><br><br>

        <label for="balance">Balance :</label>
        <input type="text" id="balance" name="balance" required><br><br>

        <label for="devise">Devise :</label>
        <input type="text" id="devise" name="devise" required><br><br>
        
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
            $balance = $_POST["balance"];
            $devise = $_POST["devise"];

            $sql = "INSERT INTO comptes (id, balance, devise) VALUES ('$id', '$balance', '$devise')";

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
