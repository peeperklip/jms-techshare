<?php
/** @noinspection ALL */
require_once __DIR__ . '/bootstrap.php';

//Serialize. Maak van object een json of XML
$opelAstra = new Car('Opel', 'Astra');
$jsonData = $serializer->serialize($opelAstra, 'json');
$xmlData = $serializer->serialize($opelAstra, 'xml');

//Schrijf het resultaat naar een file
file_put_contents("xmldata.xml", $xmlData);
file_put_contents("jsondata.json", $jsonData);

// Deserialize. Maak van json of XML data een object
$objectOne = $serializer->deserialize(file_get_contents('jsondata.json'), Car::class,'json');
$objectTwo = $serializer->deserialize(file_get_contents('xmldata.xml'), Car::class,'xml');

echo $objectOne;
echo PHP_EOL;
echo $objectTwo;
