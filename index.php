<!DOCTYPE html>
<html>
	<head>
		<title>Maze Project</title>
	</head>
	
	<body>
        <?php 
            include ('enemy.php'); 
            $food = new Enemy('Foodie Monster', 50, 50);
            echo $food->greet();
        ?>
	</body>
</html>