


<?php
            require "db.php";
            $host = "localhost";
            $user = "root";
            $password = "";
            $myDB = "myB";

            $connected = new mysqli($host, $user, $password, $myDB);
            $id=$_POST['compt_id'];
            $selectQuery = "SELECT * from transactions  where transactions.compts_id='$id'";

            $result = $connected->query($selectQuery);

            if ($result->num_rows > 0) {
                echo "<h2>Données des TRANSACTIONS .</h2>";
                echo "<table>";
                

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