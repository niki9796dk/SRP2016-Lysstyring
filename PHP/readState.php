<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Settings:
$stateDic = "C:\Users\KFU24KLMP\Dropbox\Public/arduino.txt";

//Setup:
$stateFile = fopen($stateDic, "r");

//Program:
$stateRAW = fread($stateFile, filesize($stateDic));
$state = explode(":", $stateRAW);
$LEDCount = count($state);

fclose($stateFile);