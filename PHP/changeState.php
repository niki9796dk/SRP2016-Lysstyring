<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include $_SERVER['DOCUMENT_ROOT']."/SRP1/PHP/readState.php";
include $_SERVER['DOCUMENT_ROOT']."/SRP1/PHP/readPresets.php";

function changeStateLED($LED){
    
    global $state;
    
    if ($state[$LED] == "0"){
        
        $state[$LED] = "1";
        setState($state);
        
    }else if($state[$LED] == "1"){
        
        $state[$LED] = "0";
        setState($state);
    }else{
        
        $message = "Either the LED ID {".$LED."} is wrong or the control document is broken";
        echo "<script type='text/javascript'>alert('$message');</script>";
        
    }
    
}

function changeStatePreset($presetID){
    
    //Preset design:
    //*NAME*-*PRESET*
    
    global $presetList;
    
    $preset = explode(":", $presetList[$presetID][1]);
    
    setState($preset);
}

function setState($stateNew){
    
    global $stateDic;
    
    $stateFile = fopen($stateDic, "w");
    
    $stateTxt = implode(":", $stateNew);
    
    fwrite($stateFile, $stateTxt);
    
    fclose($stateFile);
    
}