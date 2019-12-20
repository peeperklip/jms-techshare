<?php

namespace App;

use Car;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\PreSerializeEvent;

class CarEventSubscriber implements EventSubscriberInterface
{
  /**
   * @return array|void
   * @inheritDoc
   */
  public static function getSubscribedEvents()
  {
    return [
      [
        'event' => DefinedEvents::PRE_SERIALIZE,
        'method' => 'onPreSerialize',
        'class' => Car::class,
        'format' => 'json',
        'priority' => 0,
      ]
    ];
  }


  public function onPreSerialize(PreSerializeEvent $event)
  {
    echo __FUNCTION__ . ' ON ' . get_class($event->getObject());
    echo __FILE__ . ':' . __LINE__ . PHP_EOL;
  }
}
