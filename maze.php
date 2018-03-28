<!DOCTYPE html>
<html>
    <head>
        <title>Maze</title>
    </head>
    <body>
        <?php 
            include ('enemy.php'); 
            $food = new Enemy('Foodie Monster', 50, 50);
            echo '<h1>Welcome to the LEAP Maze!</h1>';
            echo $food->greet();
        ?>
	</body>
</html>