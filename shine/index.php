<!DOCTYPE html>
<html>
    <head>
        <title>Shine</title>
    </head>
    <body>
        <?php


  //setting header to json
  $servername = "10.14.2.76";
$username = "adamsbala";
$password = "adamsbala";
$dbname = "PHP";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
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
