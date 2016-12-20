<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include $_SERVER['DOCUMENT_ROOT']."/SRP1/PHP/readState.php";

//Settings:
$presetDic = $_SERVER['DOCUMENT_ROOT']."/SRP1/PHP/presets.txt";

//Setup:
$presetFile = fopen($presetDic, "r");
$presetCount = 0;

//Program:

//Gem hver linje som et preset
while (($line = fgets($presetFile)) !== false) {
    
    //Preset design:
    //*NAME*-*PRESET*-
    
    $presetList[$presetCount] = explode("-", $line);
    
    $presetTrim = explode(":", $presetList[$presetCount][1]);
    
    if (count($presetTrim) == $LEDCount){ //Sikre sig at kun kompitable presets kan anvendes
        $presetCount++; //Tæller antal presets
    }
    
    
}

fclose($presetFile);