<?php
for ($i = 1; $i<=100; $i++){
    if ($i % 3 == 0 && $i % 5 == 0){

        echo "ToucanTech \n";
    }
    elseif ($i % 3 == 0){

        echo "Toucan \n";
    }
    elseif ($i % 5 == 0){
        echo "Tech \n";

    }else{
        echo "Unknown \n";

    }
 
}