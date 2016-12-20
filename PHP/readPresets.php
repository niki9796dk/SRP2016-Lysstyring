<?php

// Denne fil har til formål at hente og tjekke alle gemte presets - til senere brug.


// Inkluder readState.php for at få tilgang til relevant data.
include $_SERVER['DOCUMENT_ROOT']."/SRP1/PHP/readState.php";

//Settings:
$presetDic = $_SERVER['DOCUMENT_ROOT']."/SRP1/PHP/presets.txt"; // Lokalisationen af filen der indeholder preset indstillinger

//Setup:
// Forbereder programmet og sætter relevante variabler

// Åbner preset fil til læsning
$presetFile = fopen($presetDic, "r");
// Sætter antal målte presets til 0 - Dette tillader simpel optælling senere.
$presetCount = 0;

//Program:

//Gem hver linje som et preset
while (($line = fgets($presetFile)) !== false) {
    
    //Preset design:
    //*NAME*-*PRESET*-
    
    // Adskil og læs dataen i variablen $line
    $presetList[$presetCount] = explode("-", $line);
    
    // Adskil og læs dataen i variablen $presetList
    $presetTrim = explode(":", $presetList[$presetCount][1]);
    
    // Sikkerhedstjek
    if (count($presetTrim) == $LEDCount){ //Sikre sig at kun kompitable presets kan anvendes
        $presetCount++; //Tæller antal presets
    }

}

// Lukker preset fil, for at spare på hukommelsen
fclose($presetFile);
