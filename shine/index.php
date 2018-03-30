<!DOCTYPE html>
<html>
    <head>
        <title>Shine</title>
        <script type="text/javascript" src="script.js"></script>
    </head>
    <body>
      <canvas id="myCanvas" style="background: white;"></canvas>
    <legend for="myCanvas"></legend>

        <?php


$serverName = "10.14.2.76";
$port = "1433";
$username = "adamsbala";
$password = "adamsbala";
$dbname = "PHP";
$connectionInfo = array("Database"=>$dbname,
                        "UID"=>$username,
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
               $result = sqlsrv_query($conn, $sql);
               if ($result == FALSE) {
                   echo "0 results <br>";
               } else {
                   // output data of each row
                   while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                       echo ("<p>ID: ". $row["ID"]. " - Name: ". $row["name"]. " - Department: " . $row["dept_name"] . "</p>");
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
