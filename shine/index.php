<!DOCTYPE html>
<html>
    <head>
        <title>Shine</title>
    </head>
    <body>
        <?php
            echo '<div style="margin:auto;width:20%;text-align:center;position:relative;">';
                echo '<h1>Welcome to the LEAP Shine!</h1>';
                echo '<h3>By Adams Bala</h3>';
            echo '</div>';

            //setting header to json
  header('Content-Type: application/json');

  //database
  define('DB_HOST', 'DESKTOP-ULNPIAH\JUSTICEFORHARAMBE');
  define('DB_USERNAME', '');
  define('DB_PASSWORD', '');
  define('DB_NAME', 'CPTR319SampleData');

  //get connection
  $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

  if(!$mysqli){
  	die("Connection failed: " . $mysqli->error);
  }

  //query to get data from the table
  $query = sprintf("select * from student");

  //execute query
  $result = $mysqli->query($query);

  //loop through the returned data
  $data = array();
  foreach ($result as $row) {
  	$data[] = $row;
  }

  //free memory associated with result
  $result->close();

  //close connection
  $mysqli->close();

  //now print the data
  print json_encode($data);
        ?>
        <!-- Footer -->
        <footer>
            <a href="../index.php">Home</a>
            <a href="../maze/index.php">Maze Project</a>
        </footer>
	</body>
</html>
