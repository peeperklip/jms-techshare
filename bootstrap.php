<?php

use App\CarEventSubscriber;
use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\SerializerBuilder;

$loader = require_once __DIR__ . '/vendor/autoload.php';
AnnotationRegistry::registerLoader(array($loader, "loadClass"));

$serializer = SerializerBuilder::create()
  ->configureListeners(function (EventDispatcher $dispatcher) {
    $dispatcher->addSubscriber(new CarEventSubscriber());
  })
  ->build();

final class Car
{
  /** @Type("string") */
  private $model;

  /** @Type("string") */
  private $brand;

  public function __construct($brand, $model)
  {
    $this->brand = $brand;
    $this->model = $model;
  }

  public function __toString()
  {
    return $this->brand . ' ' . $this->model;
  }
}
