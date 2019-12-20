<?php
/** @noinspection ALL */
require_once __DIR__ . '/bootstrap.php';

//Serialize
$car = new Car('Opel', 'Astra');

//Schrijf het resultaat naar een file
file_put_contents("xmldata.xml", $car->toXml());
file_put_contents("jsondata.json", $car->toJson());

// Deserialize
// Lees de bestande uit en creeer een object
// Eerst van uit het json bestand
$jsonData = file_get_contents('jsondata.json');
echo Car::fromArray((array) json_decode($jsonData));

echo PHP_EOL;
//Daarna van uit het xml bestand
$xmlData = file_get_contents('xmldata.xml');
echo Car::fromArray((array) simplexml_load_string($xmlData));
