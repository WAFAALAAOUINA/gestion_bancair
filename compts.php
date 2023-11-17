<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #3498db;
            padding: 10px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav p {
            color: white;
            margin: 0;
        }

        nav a {
            color: white;
            margin-left: 10px;
            text-decoration: none;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form h2 {
            text-align: center;
            color: #333;
        }

        form label {
            display: block;
            margin: 10px 0 5px;
            color: #333;
        }

        form input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid black;
        }

        form button {
            background-color: #3498db;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        form button a {
            color: white;
            text-decoration: none;
        }

        #errorMessages {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body class="bg-gray-200 font-sans">

    <nav>
        <p>Logo</p>
        <div>
            <a href="afficherclientes.php" class="text-white">Clients</a>
            <a href="affichercomptes.php" class="text-white">Comptes</a>
            <a href="affichertransaction.php" class="text-white">Transactions</a>
        </div>
    </nav>

    <form id="compteForm" action="compts.php" method="POST">
        <h2>Formulaire compts</h2>

        <label for="RIB">RIB :</label>
        <input type="text" id="RIB" name="RIB" required><br><br>

        <label for="balance">Balance :</label>
        <input type="text" id="balance" name="balance" required><br><br>

        <label for="devise">Devise :</label>
        <input type="text" id="devise" name="devise" required><br><br>
        <input  type="hidden" name="client_id" value="<?php echo $_POST['client_id']?>">
        <div id="errorMessages"></div>

        <button type="submit" name="envoyer">Envoyer</button>
        <!-- <button><a href="affichercomptes.php">transfier</a></button> -->
    </form>

    <?php
    require "db.php";

    $host = "localhost";
    $user = "root";
    $password = "";
    $myDB = "myB";
    $ab= $_POST["client_id"];

    $connected = new mysqli($host, $user, $password, $myDB);
    if ($connected->connect_error) {
        die("Connection failed: " . $connected->connect_error);
    }

    $createTableQuery = "CREATE TABLE IF NOT EXISTS compts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        RIB FLOAT NOT NULL,
        balance FLOAT NOT NULL,
        devise VARCHAR(10) NOT NULL,
        client_id INT,
        FOREIGN KEY (client_id) REFERENCES clients(id)
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
       $ab=$_POST['client_id'];
        echo $_POST['client_id'];

    
        $sqlk = "INSERT INTO compts (balance, devise, RIB,client_id) VALUES ('$balance', '$devise', '$RIB','$ab')";

        if ($connected->query($sqlk)) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . $sqlk . "<br>" . $connected->error;
        }
    }

    $connected->close();
    ?>
</body>
</html>
