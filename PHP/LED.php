<?php

// Denne fil har til formål at ændre lysstadiet for en specifik LED

// Starter output buffer som sikkerhed.
ob_start();

// Inkludere changeState.php for at få tilgang til funktionen changeStateLED().
include($_SERVER['DOCUMENT_ROOT']."/SRP1/PHP/changeState.php");

// Anvender funktionen changeStateLED() fra changeState.php til at ændre lys stadiet for den valgte LED
// LED ID er overført via variablen $_POST["LED"] fra index.php
changeStateLED($_POST["LED"]);

// Sålænge data findes i bufferen - Slet det
while (ob_get_status()) 
{
    ob_end_clean();
}

// Gå tilbage til forsiden
// Denne kommando fungere ikke hvis et output er blevet smidt fra serveren, og derfor anvendes output bufferen som sikkerhed.
header( "Location: ../index.php" );
