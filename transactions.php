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
<!-- //+++++++++++++++++++++++++++ -->

 <form id="transactionForm" action="transactions.php" method="POST">
     <h2>Formulaire Transaction</h2>
        
        <label for="montant">Montant :</label>
        <input type="text" id="montant" name="montant" required><br><br>

        <label for="type" >Type :</label>
        <select name="type">
            <option value="Crédit">Crédit</option>
            <option value="Débit">Débit</option>
        </select>
        
        <button type="submit" name="envoyer">Envoyer</button>
        <button><a href="affichertransaction.php">transfier</a></button>
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

    //++++++++++++++++++++++++++++creation de la table+++++++++++++++++++++++++++++++++

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


  
    ?>
</body>
</html>
