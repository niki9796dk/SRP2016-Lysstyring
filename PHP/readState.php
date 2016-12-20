<?php

// Denne fil har til formål at læse det nuværende lysstadie og gemme daten til senere brug.

//Settings:

// Gemmer lokalisationen af API'en
$stateDic = "C:\Users\KFU24KLMP\Dropbox\Public/arduino.txt";

//Setup:

// Åbner API'en til læsning
$stateFile = fopen($stateDic, "r");

//Program:

// Læs API'en og gem indholdet som rå data
$stateRAW = fread($stateFile, filesize($stateDic));

// Adskil og læs dataen i variablen $stateRaw
$state = explode(":", $stateRAW);

// Gem hvor mange LED'er der kontrolleres
$LEDCount = count($state);

// Luk API'en for at spare på hukommelsen
fclose($stateFile);
