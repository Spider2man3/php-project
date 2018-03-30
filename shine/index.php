<!DOCTYPE html>
<html>
    <head>
        <title>Shine</title>
    </head>
    <body>
        <?php

            $serverName = "localhost";
            $username = "adamsbala";
            $password = "adamsbala";
            $dbname = "PHP";
            $connectionInfo = array("Database"=>$dbname,
                                    "Uid"=>$username,
                                    "PWD"=>$password);
            // Create connection
            $conn = sqlsrv_connect($serverName, $connectionInfo);
            // Check connection
            if($conn == FALSE) {
                die( print_r( sqlsrv_errors(), true));
            }

            $sql = "SELECT * from student";
            $result = sqlsrv_query($conn, $sql);
            if ($result == FALSE) {
                echo "0 results <br>";
            } else {
                // output data of each row
                while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                    echo ("<p>id: ". $row["ID"]. " - Name: ". $row["name"]. " " . $row["dept_name"] . "</p>");
                }
            }

        ?>
        <!-- Footer -->
        <footer>
            <a href="../index.php">Home</a>
            <a href="../maze/index.php">Maze Project</a>
        </footer>
	</body>
</html>
