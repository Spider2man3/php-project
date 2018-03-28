<!DOCTYPE html>
<html>
    <head>
        <title>Maze</title>
    </head>
    <body>
        <?php 
            foreach (glob("*.php") as $filename) {
                include $filename;
            }
            
            $food = new Enemy('Foodie Monster', 50, 50);
            echo '<h1>Welcome to the LEAP Maze!</h1>';
            echo '<h3>By Thomas Manu</h3>';
            echo $food->greet();
        ?>
        <!-- Footer -->
        <footer>
            <a href="../index.php">Home</a>
            <a href="../shine/shine.php">Shine Project</a>
        </footer>
	</body>
</html>