<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Page</title>
    <style>
       body {
    background-color: #f2f2f2;
    font-family: Arial, sans-serif;
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
    margin-left: 10px; /* Ajustez la marge si nécessaire */
    text-decoration: none;
}



.container {
    margin: 0 auto;
    padding: 20px;
}

img {
    width: 100%;
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 10px;
    position: absolute;
    bottom: 0;
    width: 100%;
}

.flex {
    display: flex;
    justify-content: space-between;
}

.column {
    width: 48%;
}

.column img {
    margin-bottom: 20px;
}

.content-box {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

h2 {
    font-size: 1.5rem;
    font-weight: bold;
    margin-bottom: 10px;
}
table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        h2 {
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <nav>

        <p>Logo</p>
            <div>
            <a href="index1.php" class="text-white">home</a>
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

            $connected = new mysqli($host, $user, $password, $myDB);
            $id=$_POST['client_id'];
            $selectQuery = "SELECT * from compts where compts.client_id='$id'";

            $result = $connected->query($selectQuery);

            if ($result->num_rows > 0) {
                echo "<h2>Données des Comptes</h2>";
                echo "<table>";
                

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

    <footer>
        <p>&copy; 2023 Mon Site. Tous droits réservés.</p>
    </footer>
</body>

</html>

