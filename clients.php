<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Transaction</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        nav {
            background-color: #3498db;
            padding: 10px;
            color: white;
            padding: 10px;
            color: white;
            display: flex; 
            justify-content: space-between; 
}

        

        nav a {
            justify-content: space-between; 
            flex-direction:
            display:flex;
            color: white;
            margin-right: 10px;
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
<body>

    <nav>
    <p>Logo</p>
            <div>
            <a href="index1.php" class="text-white">home</a>
                    <a href="afficherclientes.php">Clients</a>
                    <a href="affichercomptes.php">Comptes</a>
                    <a href="affichertransaction.php">Transactions</a>
                </div>
    
    </nav>

    <form id="contactForm" action="clients.php" method="POST">
        <h2>Contactez-nous</h2>
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br>

        <label for="date_naissance">Date de naissance :</label>
        <input type="text" id="date_naissance" name="date_naissance" required><br>

        <label for="nationalite">Nationalité :</label>
        <input type="text" id="nationalite" name="nationalite" required><br>

        <label for="genre">Genre :</label>
        <input type="text" id="genre" name="genre" required><br>

        <div id="errorMessages"></div>

        <button id="Envoyer" name="envoyer">Envoyer</button>
        <!-- <button><a href="afficherclientes.php">transfier</a></button> -->
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

    // Crate table
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
