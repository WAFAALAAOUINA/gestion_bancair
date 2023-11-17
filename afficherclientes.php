
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
        }

        nav {
            background-color: #3498db;
            padding: 10px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav a {
            color: white;
            margin-right: 10px;
            text-decoration: none;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
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

        p {
            font-size: 1.2em;
        }

        a.button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }
        .submit{
            display: inline-block;
            padding: 10px 15px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
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
        </div>
    </nav>

    <div class="container">
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
                
                echo "<h2>Données des Clients</h2>";
                echo "<table>";
                echo "<tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Date de naissance</th><th>Nationalité</th><th>Genre</th></tr>";

                while ($row = $result->fetch_assoc()) {
                
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nom"] . "</td>";
                    echo "<td>" . $row["prenom"] . "</td>";
                    echo "<td>" . $row["date_naissance"] . "</td>";
                    echo "<td>" . $row["nationalite"] . "</td>";
                    echo "<td>" . $row["genre"] . "</td>";
                    echo "<td><form action='compts.php' method='post'>
                            <input type='hidden' name='client_id' value='" . $row["id"] . "'>
                            <button  class='submit' type='submit'>Ajouter compt</button>
                            </form>
                            <form action='afficherlescomptes.php' method='post'>
                            <input type='hidden' name='client_id' value='" . $row["id"] . "'>
                            <button  class='submit'type='submit'>Afficher comptes</button>

                          </form>
                        </td>";
                    
        
                    
                }

                echo "</table>";
                echo "<a href='clientes.php' class='button'>Ajouter clients</a>";
            } else {
                echo "<p>Aucune donnée trouvée</p>";
            }

            $connected->close();
        ?>
    </div>

</body>
</html>
