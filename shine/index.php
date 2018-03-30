<!DOCTYPE html>
<html>
    <head>
        <title>Shine</title>
    </head>
    <body>
        <?php


$serverName = "10.14.2.76";
$port = "1433";
$username = "adamsbala";
$password = "adamsbala";
$dbname = "PHP";
$connectionInfo = array( "UID"=>$username,
                         "PWD"=>$password,
                         "Database"=>$dbname);
// Create connection
$conn = sqlsrv_connect($serverName, $connectionInfo);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
  die("Connection successful");
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

$conn->close();
        ?>
        <!-- Footer -->
        <footer>
            <a href="../index.php">Home</a>
            <a href="../maze/index.php">Maze Project</a>
        </footer>
	</body>
</html>
