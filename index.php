<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
    include('php/readState.php');
    include('php/readPresets.php');
    
    function lightbulb($i){
        global $state;
        if ($state[$i] == "1"){echo "ON";}else{echo "OFF";}
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="CSS/grundplan.css" rel="stylesheet">
    </head>
    <body>
        
        <div class="houseOuter">
            <div class="grund innerShadow <?php lightbulb(7) ?>">

                <div class="left innerShadow">
                    <div class="top">
                        <div id="Room0" class="L0 innerShadow <?php lightbulb(0) ?>">
                            <div class="lightbulb">
                                <form action='PHP/LED.php' method='POST'>
                                    <input name="LED" value="0" type="image" src="IMG/<?php lightbulb(0) ?>.png" height="100%" border="0" alt="Submit" />
                                </form>
                            </div>
                        </div>
                        <div class="R0">
                            <div id="bryg" class="L1 innerShadow <?php lightbulb(1) ?>">
                                <div class="lightbulb">
                                    <form action='PHP/LED.php' method='POST'>
                                        <input name="LED" value="1" type="image" src="IMG/<?php lightbulb(1) ?>.png" height="100%" border="0" alt="Submit" />
                                    </form>
                                </div>
                            </div>
                            <div id="entre" class="R1 innerShadow <?php lightbulb(2) ?>">
                                <div class="lightbulb">
                                    <form action='PHP/LED.php' method='POST'>
                                        <input name="LED" value="2" type="image" src="IMG/<?php lightbulb(2) ?>.png" height="100%" border="0" alt="Submit" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="middle">
                        <div id="bath0" class="L0 innerShadow <?php lightbulb(3) ?>">
                            <div class="lightbulb">
                                <form action='PHP/LED.php' method='POST'>
                                    <input name="LED" value="3" type="image" src="IMG/<?php lightbulb(3) ?>.png" height="100%" border="0" alt="Submit" />
                                </form>
                            </div>
                        </div>
                        <div id="hall0" class="R0 innerShadow <?php lightbulb(4) ?>">
                            <div class="lightbulb">
                                <form action='PHP/LED.php' method='POST'>
                                    <input name="LED" value="4" type="image" src="IMG/<?php lightbulb(4) ?>.png" height="100%" border="0" alt="Submit" />
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="bottom">
                        <div id="room1" class="L0 innerShadow <?php lightbulb(5) ?>">
                            <div class="lightbulb">
                                <form action='PHP/LED.php' method='POST'>
                                    <input name="LED" value="5" type="image" src="IMG/<?php lightbulb(5) ?>.png" height="100%" border="0" alt="Submit" />
                                </form>
                            </div>
                        </div>
                        <div id="room2" class="R0 innerShadow <?php lightbulb(6) ?>">
                            <div class="lightbulb">
                                <form action='PHP/LED.php' method='POST'>
                                    <input name="LED" value="6" type="image" src="IMG/<?php lightbulb(6) ?>.png" height="100%" border="0" alt="Submit" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="right innerShadow">
                    <div id="kitchen" class="L0">
                        <div class="lightbulb">
                            <form action='PHP/LED.php' method='POST'>
                                <input name="LED" value="7" type="image" src="IMG/<?php lightbulb(7) ?>.png" height="100%" border="0" alt="Submit" />
                            </form>
                        </div>
                    </div>

                    <div class="R0">
                        <div class="T0 innerShadow">
                            <div class="L1">
                                <div id="bath1" class="T1 innerShadow2 <?php lightbulb(9) ?>">
                                    <div class="lightbulb">
                                        <form action='PHP/LED.php' method='POST'>
                                            <input name="LED" value="9" type="image" src="IMG/<?php lightbulb(9) ?>.png" height="100%" border="0" alt="Submit" />
                                        </form>
                                    </div>
                                </div>
                                <div id="hall1" class="B1 innerShadow2 <?php lightbulb(10) ?>">
                                    <div class="lightbulb">
                                        <form action='PHP/LED.php' method='POST'>
                                            <input name="LED" value="10" type="image" src="IMG/<?php lightbulb(10) ?>.png" height="100%" border="0" alt="Submit" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="master" class="R1 innerShadow2 <?php lightbulb(11) ?>">
                                <div class="lightbulb">
                                    <form action='PHP/LED.php' method='POST'>
                                        <input name="LED" value="11" type="image" src="IMG/<?php lightbulb(11) ?>.png" height="100%" border="0" alt="Submit" />
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="livingRoom" class="B0 <?php lightbulb(8) ?>">
                            <div class="lightbulb">
                                <form action='PHP/LED.php' method='POST'>
                                    <input name="LED" value="8" type="image" src="IMG/<?php lightbulb(8) ?>.png" height="100%" border="0" alt="Submit" />
                                </form>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
            
            <div class="presets">
                <div class="content">
                    <h2>Presets</h2>
                    <hr>
                    <br>
                    <?php
                    
                        for ($i = 0; $i < $presetCount; $i++){
            
                            echo "<form action='PHP/presets.php' method='POST'>".
                                 "<button name='preset' value='".$i."'>Preset: ".$presetList[$i][0]."</button>".
                                 "</form>";
                        }
                    
                    ?>
                </div>
            </div>
            
        </div>
    </body>
</html>
