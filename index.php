<!DOCTYPE html>
<!--

Denne fil har tilformål at være den grafiske brugergrænseflade som brugeren møder og fremviser livedata for brugeren

-->

<!-- Forudkrævede handlinger for resten af koden kan fungere optimalt -->
<?php

    // Vi inkludere readState.php og readState.php for at læse lysstadiet og hente gemte presets
    include('php/readState.php');
    include('php/readPresets.php');
    
    // Funktionen lightbulb() har til formål at tjekke om en LED er tændt eller slukket
    // Funktionen bruges i resten af koden til at kunne anvende det rigtige billede i forhold til lystadiet.
    function lightbulb($i){
        global $state;
        if ($state[$i] == "1"){echo "ON";}else{echo "OFF";}
    }
?>

<!-- Starten af HTML koden -->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lysstyring</title>
        <!-- Her inkluderes style dokumentet grundplan.css for at give dokumentet et bedre design -->
        <link href="CSS/grundplan.css" rel="stylesheet">
    </head>
    <body>
        
        <!-- Første del af brugergrænsefladen er oversigten over boligen.
             Grundplanen er opbygget af et net af "div" som hver definere en slags kasse på siden -->
        <div class="houseOuter">
            
                                        <!-- Grundet opsætningen gives den yderste div klassen "ON" eller "OFF" alt efter LED 7
                                             Dette giver en lys eller mørk baggrund for det relaterede rum -->
            <div class="grund innerShadow <?php lightbulb(7) ?>">

                <div class="left innerShadow">
                    <div class="top">
                        <!-- For hvert rum sættes classen til "ON" eller "OFF" for at give en lys eller mørk baggrund -->
                        <div id="Room0" class="L0 innerShadow <?php lightbulb(0) ?>">
                            <div class="lightbulb">
                                <form action='PHP/LED.php' method='POST'>
                                    <!-- For hvert rum placeres et billede af en pære, og funktionen lightbulb() registere om lyset er tændt eller slukket, og sætter billedet således -->
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
            
            
            <!-- Anden del af brugergrænsefladen tilgangen til presets -->
            <div class="presets">
                <div class="content">
                    <h2>Presets</h2>
                    <hr>
                    <br>
                    <?php
                    
                        // For hvert preset oprettes en form med ID og en knap med preset navn inkluderet.
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
