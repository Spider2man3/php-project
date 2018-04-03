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
 $values = array();
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
                    $values[] = $row;
                   }
               }
               $list = array();

               foreach ($values as $key => $value) {
                  $values[$key] = $values[$value];
               }
               echo "<pre>";
               print_r($values);

               $img_width=450;
               $img_height=300;
               $margins=20;


               # ---- Find the size of graph by substracting the size of borders
               $graph_width=$img_width - $margins * 2;
               $graph_height=$img_height - $margins * 2;
               $img=imagecreate($img_width,$img_height);


               $bar_width=20;
               $total_bars=count($values);
               $gap= ($graph_width- $total_bars * $bar_width ) / ($total_bars +1);


               # -------  Define Colors ----------------
            //   $bar_color=imagecolorallocate($img,0,64,128);
               $bar_color=imagecolorallocate($img,0,64,128);
               $background_color=imagecolorallocate($img,240,240,255);
               $border_color=imagecolorallocate($img,200,200,200);
               $line_color=imagecolorallocate($img,220,220,220);

               # ------ Create the border around the graph ------

               imagefilledrectangle($img,1,1,$img_width-2,$img_height-2,$border_color);
               imagefilledrectangle($img,$margins,$margins,$img_width-1-$margins,$img_height-1-$margins,$background_color);


               # ------- Max value is required to adjust the scale -------
               $max_value=max($values);

               $ratio= $graph_height / $max_value;


               # -------- Create scale and draw horizontal lines  --------
               $horizontal_lines=20;
               $horizontal_gap=$graph_height/$horizontal_lines;

               for($i=1;$i<=$horizontal_lines;$i++){
                   $y=$img_height - $margins - $horizontal_gap * $i ;
                   imageline($img,$margins,$y,$img_width-$margins,$y,$line_color);
                   $v=intval($horizontal_gap * $i /$ratio);
                   imagestring($img,0,5,$y-5,$v,$bar_color);

               }


               # ----------- Draw the bars here ------
               for($i=0;$i< $total_bars; $i++){
                   # ------ Extract key and value pair from the current pointer position
                   list($key,$value)=each($values);
                   $x1= $margins + $gap + $i * ($gap+$bar_width) ;
                   $x2= $x1 + $bar_width;
                   $y1= $margins + $graph_height - intval($value * $ratio) ;
                   $y2= $img_height-$margins;
                   imagestring($img,0,$x1+3,$y1-10,$value,$bar_color);imagestring($img,0,$x1+3,$img_height-15,$key,$bar_color);
                   imagefilledrectangle($img,$x1,$y1,$x2,$y2,$bar_color);
               }
               header("Content-type:image/png");
               imagepng($img);
               $_REQUEST['asdfad']=234234;



        ?>
        <!-- Footer -->
        <footer>
            <a href="C:/wamp64/www/index.php">Home</a>
            <a href="C:/wamp64/www/maze/index.php">Maze Project</a>
        </footer>
	</body>
</html>
