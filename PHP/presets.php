<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

ob_start();

//Include de nødvendige filer
include($_SERVER['DOCUMENT_ROOT']."/SRP1/PHP/changeState.php");

changeStatePreset($_POST["preset"]);

while (ob_get_status()) 
{
    ob_end_clean();
}

header( "Location: ../index.php" );