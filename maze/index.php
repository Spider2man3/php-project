<!DOCTYPE html>
<html>
    <head>
        <title>Maze</title>
    </head>
    <body>
        <?php 
            /*foreach (glob("*.php") as $filename) {
                include $filename;
            }*/
            include ('enemy.php'); 
            
            $food = new Enemy('Foodie Monster', 50, 50);

            echo '<div style="margin:auto;width:20%;text-align:center;position:relative;">';
                echo '<h1>Welcome to the LEAP Maze!</h1>';
                echo '<h3>By Thomas Manu</h3>';
                echo $food->greet();
            echo '</div>'
        ?>
        <!-- Footer -->
        <footer>
            <a href="../index.php">Home</a>
            <a href="../shine/index.php">Shine Project</a>
        </footer>
	</body>
</html>