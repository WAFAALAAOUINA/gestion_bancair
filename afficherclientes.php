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

    <div class="container mx-auto my-8">


        <?php
        
        require "db.php";
         
        $host = "localhost";
        $user = "root";
        $password = "";
        $myDB = "myB";

        $connected = new mysqli($host, $user, $password, $myDB);
        $selectQuery = "SELECT * FROM clients";
        $result = $connected->query($selectQuery);

        if ($result->num_rows > 0) {
            echo "<h2 class='text-2xl font-bold mb-4'>Données des Clients</h2>";
            echo "<table class='w-full border border-collapse'>";
            echo "<tr class='bg-blue-500 text-white'><th class='p-2 border'>ID</th><th class='p-2 border'>Nom</th><th class='p-2 border'>Prénom</th><th class='p-2 border'>Date de naissance</th><th class='p-2 border'>Nationalité</th><th class='p-2 border'>Genre</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr class='border'>";
                echo "<td class='p-2 border'>" . $row["id"] . "</td>";
                echo "<td class='p-2 border'>" . $row["nom"] . "</td>";
                echo "<td class='p-2 border'>" . $row["prenom"] . "</td>";
                echo "<td class='p-2 border'>" . $row["date_naissance"] . "</td>";
                echo "<td class='p-2 border'>" . $row["nationalite"] . "</td>";
                echo "<td class='p-2 border'>" . $row["genre"] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
            echo "<a href=" . "clientes.php>" . "submit</button>";
        } else {
            echo "<p class='text-lg'>Aucune donnée trouvée</p>";
        }

        $connected->close();
        ?>
    </div>

</body>
</html>
