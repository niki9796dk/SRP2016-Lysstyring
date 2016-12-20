<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="5">
        <title></title>
        <link href="CSS/design.css" rel="stylesheet">
    </head>
    <body>
        
        <?php
        include('php/readState.php');
        include('php/readPresets.php');
        
        echo "<div class='LED'>";
        for ($i = 0; $i < $LEDCount; $i++){
            
            if ($state[$i] == "1"){
                $LEDState = "ON";
                $color = "green";
            }else{
                $LEDState = "OFF";
                $color = "red";
            }
            
            echo "<form action='PHP/LED.php' method='POST'>".
                 "<button name='LED' value='".$i."'>LED".$i.": <color style='color: ".$color."'>".$LEDState."</color></button>".
                 "</form>";
        }
        echo "</div>";
        
        echo "<div class='presets'>";
        for ($i = 0; $i < $presetCount; $i++){
            
            echo "<form action='PHP/presets.php' method='POST'>".
                 "<button name='preset' value='".$i."'>Preset: ".$presetList[$i][0]."</button>".
                 "</form>";
        }
        echo "</div>";
        
        ?>

    </body>
</html>
