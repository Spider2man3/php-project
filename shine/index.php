<!DOCTYPE html>
<html>
    <head>
        <title>Shine</title>
    </head>
    <body>
        <?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CPTR319SampleData";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
