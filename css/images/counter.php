<?php
        $fp = fopen("counter.txt", "r+");
        $counter = fgets($fp, 80);
        $counter = doubleval($counter) + 1;
        fseek($fp, 0);
        fputs($fp, $counter);
        $n = strlen("$counter");
        for ($i=0; $i<$n; $i++) 
        {
                $gra_counter = substr($counter, $i, 1);
                $image = $image . "<img src = 'images/" . $gra_counter . ".gif'>"; 
                
        }
        echo $image;
        fclose($fp);
?>
