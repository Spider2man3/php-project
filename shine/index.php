<!DOCTYPE html>
<html>
    <head>
        <title>Shine</title>

    </head>
    <body>

      <canvas id="myCanvas" style="background: white;"></canvas>
    <legend for="myCanvas"></legend>
  <script type="text/javascript" src="script.js"></script>

        <?php


$serverName = "localhost";
$port = "1433";
$username = "adamsbala";
$password = "adamsbala";
$dbname = "PHP";
$connectionInfo = array("Database"=>$dbname,
                        "UID"=>$username,
                        "PWD"=>$password);
// Create connection
$conn = sqlsrv_connect($serverName, $connectionInfo);
 $values = array()
// Check connection
if( $conn ) {
     //echo "Connection established.<br />";
   }
   else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
   }

 $sql = "select Ratio.dept_name,Ratio.ratio
from (
	select department.dept_name, department.building, sum(credits) / instructorCount.total_instructor as ratio
	from department,course, (select department.dept_name, count(id) as total_instructor
		from instructor,department
		where instructor.dept_name = department.dept_name
		group by department.dept_name) as instructorCount
	where department.dept_name = course.dept_name and department.dept_name = instructorCount.dept_name
	group by department.dept_name,building,instructorCount.total_instructor
	) as Ratio
Order by dept_name";
 $result = sqlsrv_query($conn, $sql);
               if ($result == FALSE) {
                   echo "0 results <br>";
               }
               else {
                   // output data of each row
                   while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                    //   echo ("<div style='display:none;'>". "<div>ID: ". $row["ID"]. " - Name: ". $row["name"]. " - Department: " . $row["dept_name"] . "</p></div>");
                    $values[] = row;
                   }
               }

       }


        ?>
        <!-- Footer -->
        <footer>
            <a href="C:/wamp64/www/index.php">Home</a>
            <a href="C:/wamp64/www/maze/index.php">Maze Project</a>
        </footer>
	</body>
</html>
