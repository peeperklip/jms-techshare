<?php
/** @noinspection ALL */
require_once __DIR__ . '/bootstrap.php';

//Deserialize
$jsonData = file_get_contents(__DIR__ . '/car.json');
$car = $serializer->deserialize($jsonData, Car::class, 'json');
echo $car;
