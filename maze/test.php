<?php

    // if/elseif/else
    $a = 12;
    $b = 5;
    $c = 25;
    if ($a === 5) {
        echo "A is equal to 5";
    }
    elseif ($b === 5) {
        echo "B is equal to 5";
    }
    elseif ($b !== $c) {
        echo "B is not equal to C";
    }
    else {
        echo "Else statement reached";
    }
    
    // do-while loop
    $i = 0;
    do {
        echo $i;
    } while ($i > 0);
    
    // for
    for ($i = 1; $i <= 10; $i++) {
        echo $i;
    }
    
    // foreach
    $arr = array(1, 2, 3, 4);
    foreach ($arr as &$value) {
        $value = $value * 2;
    }
    
    // switch
    switch ($i) {
        case 0:
            echo "i equals 0";
            break;
        case 1:
            echo "i equals 1";
            break;
        case 2:
            echo "i equals 2";
            break;
    }
?>
