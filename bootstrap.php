<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\SerializerBuilder;

$loader = require_once __DIR__ . '/vendor/autoload.php';
AnnotationRegistry::registerLoader(array($loader, "loadClass"));

$serializer = SerializerBuilder::create()
  ->addMetadataDir(__DIR__ . '/configuration')
  ->setPropertyNamingStrategy(new IdenticalPropertyNamingStrategy())
  ->build();

final class Car
{
  /** @Type("string") */
  private $model;

  /** @Type("string") */
  private $brand;
  /**
   * @var Owner
   */
  private $owner;
  /**
   * @var ArrayCollection
   */
  private $previousOwners;

  public function __construct($brand, $model, Owner $owner, ArrayCollection $ownerCollection)
  {
    $this->brand = $brand;
    $this->model = $model;
    $this->owner = $owner;
    $this->previousOwners = $ownerCollection;
  }

  public function __toString()
  {
    $previousOwnerCount = count($this->previousOwners);
    $ending = 'owners';

    if ($previousOwnerCount === 1) {
      $ending = 'owner';
    }

    $first = sprintf("This %s %s belongs to %s and it had %d previous %s",
      $this->brand,
      $this->model,
      $this->owner,
      count($this->previousOwners),
      $ending
    );

    $second = '<br />';
    $second.= 'the previous owners where: ' . '<br />';
    /** @var Owner $owner */
    foreach ($this->previousOwners as $owner) {
      $second .= $owner->getOwner() . '<br />';
    }

    return $first . $second;
  }
}


final class Owner
{
  /** @var string */
  private $name;

  /**
   * @return string
   */
  public function getOwner(): string
  {
    return $this->name;
  }

  /**
   * @param string $name
   */
  public function updateOwner(string $name): void
  {
    $this->name = ucwords($name);
  }

  public function __toString()
  {
    return $this->getOwner();
  }
}
