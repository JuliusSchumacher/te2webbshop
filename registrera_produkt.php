<?php

//Ta emot värden för registrering
$titel = $_POST["titel"];
$pris = $_POST["pris"];
$beskrivning = $_POST["beskrivning"];
$lagersaldo = $_POST["lagersaldo"];
$bildfil = $_POST["bildfil"];

//Variabler för databaskoppling
$dbhost     = "localhost";
$dbname     = "te2imdb";
$dbuser     = "root";
$dbpass     = "";

//Koppla till databasen
$DBH = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

// Välj felhantering (här felsökningsläge)
$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

// Förbered databasfråga med placeholders (markerade med : i början)
$STH = $DBH->prepare("SELECT * FROM tbl_produkter WHERE id = :id");

// Koppla placeholder med ett variabelvärde.
$STH->bindParam(":id", $produktid);

// Utför databasfrågan.
$STH->execute();

// Stäng dbkoppling
$DBH = null;

// Hämtar värden
$result = $STH->fetch();

?>
