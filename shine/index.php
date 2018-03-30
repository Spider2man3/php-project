<!DOCTYPE html>
<html>
    <head>
        <title>Shine</title>
    </head>
    <body>
        <?php

            $serverName = "localhost";
            $username = "adamsbala";
            $port = "1433";
            $password = "adamsbala";
            $dbname = "PHP";
            $connectionInfo = array("Database"=>$dbname,
                                    "Uid"=>$username,
                                    "PWD"=>$password);
            // Create connection
            $conn = sqlsrv_connect($serverName, $connectionInfo);
            // Check connection
            if( $conn ) {
                echo "Connection established.<br />";
            }else{
                echo "Connection could not be established.<br />";
                die( print_r( sqlsrv_errors(), true));
            }
            $sql = "SELECT * from student";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<br> id: ". $row["ID"]. " - Name: ". $row["name"]. " " . $row["dept_name"] . "<br>";
                }
            } else {
                echo "0 results";
            }

            //$conn->close();
        ?>
        <!-- Footer -->
        <footer>
            <a href="../index.php">Home</a>
            <a href="../maze/index.php">Maze Project</a>
        </footer>
	</body>
</html>
