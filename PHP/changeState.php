<?php

// Denne fil har til formål holde alle nødvendige kommandoere til at ændre API'ens data og dermed ændre lysstadiet

// Inkludere readState.php og readPresets.php for at få tilgang til nødvendig data om lysstadiet og presets.

include $_SERVER['DOCUMENT_ROOT']."/SRP1/PHP/readState.php";
include $_SERVER['DOCUMENT_ROOT']."/SRP1/PHP/readPresets.php";

// Denne funktion ændre stadiet for en specifik LED med ID gemt i variablen $LED.
function changeStateLED($LED){
    
    // Henter den globale variable $state fra readState.php
    global $state;
    
    // Hvis LED'en er slukket, tænd den og omvendt.
    if ($state[$LED] == "0"){
        
        $state[$LED] = "1";
        // Kører funktionen setState() som overfører data til API'en
        setState($state);
        
    }else if($state[$LED] == "1"){
        
        $state[$LED] = "0";
        setState($state);
    }else{
        
        // System fejl
        // I tilfælde af problemer skriv følgende beskrivelse til indentifikation af problemet
        $message = "Either the LED ID {".$LED."} is wrong or the control document is broken";
        echo "<script type='text/javascript'>alert('$message');</script>";
        
    }
    
}

// Funktionen changeStatePreset() har til formål at ændre alle LED'er til et preset
function changeStatePreset($presetID){
    
    //Preset design:
    //*NAME*-*PRESET*
    
    // Henter den globale variable $presetList fra readPresets.php
    global $presetList;
    
    // Adskil og læs dataen i variablen $presetList
    $preset = explode(":", $presetList[$presetID][1]);
    
    // Kører funktionen setState() som overfører data til API'en
    setState($preset);
}


// Funktionen setState har til formål at overføre data fra serveren til API'en
function setState($stateNew){
    
    // Henter den globale variable $staticDic fra readState.php
    global $stateDic;
    
    // Åben API'en til skrivning
    $stateFile = fopen($stateDic, "w");
    
    // Formater data til API format
    $stateTxt = implode(":", $stateNew);
    
    // Skriv data til API'en
    fwrite($stateFile, $stateTxt);
    
    // Luk API for at spare på hukommelsen
    fclose($stateFile);
    
}
