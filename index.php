<?php
/** @noinspection ALL */
require_once __DIR__ . '/bootstrap.php';

//Serialize
$car1 = new Car('Opel', 'Astra');
$car2 = new Car('Audi', 'A3');
$jsonData = $serializer->serialize($car1, 'json');
$xmlData = $serializer->serialize($car2, 'xml');

//Schrijf het resultaat naar een file
file_put_contents("xmldata.xml", $xmlData);
file_put_contents("jsondata.json", $jsonData);

// Deserialize
$objectOne = $serializer->deserialize(file_get_contents('jsondata.json'), Car::class,'json');
$objectTwo = $serializer->deserialize(file_get_contents('xmldata.xml'), Car::class,'xml');

echo $objectOne;
echo PHP_EOL;
echo $objectTwo;
