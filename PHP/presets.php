<?php

// Denne fil har til formål at ændre lysstadiet til et specifikt preset
// Starter output buffer som sikkerhed.
ob_start();

// Inkludere changeState.php for at få tilgang til funktionen changeStatePreset().
include($_SERVER['DOCUMENT_ROOT']."/SRP1/PHP/changeState.php");

// Anvender funktionen changeStatePreset() fra changeState.php til at ændre lys stadiet til det specifikke preset
// Preset ID er overført via variablen $_POST["preset"] fra index.php
changeStatePreset($_POST["preset"]);

// Sålænge data findes i bufferen - Slet det
while (ob_get_status()) 
{
    ob_end_clean();
}

// Gå tilbage til forsiden
// Denne kommando fungere ikke hvis et output er blevet smidt fra serveren, og derfor anvendes output bufferen som sikkerhed.
header( "Location: ../index.php" );
