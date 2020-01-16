<?php

namespace App;

use Car;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\ObjectEvent;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;
use JMS\Serializer\EventDispatcher\PreSerializeEvent;

class CarEventSubscriber implements EventSubscriberInterface
{
  /**
   * @return array|void
   * @inheritDoc
   */
  public static function getSubscribedEvents()
  {
    //format =>json
    return [
      [
        'event' => DefinedEvents::PRE_SERIALIZE,
        'method' => 'onPreSerialize',
        'class' => Car::class,
        'priority' => 0,
      ],[
        'event' => DefinedEvents::POST_SERIALIZE,
        'method' => 'onPostSerialize',
        'class' => Car::class,
        'priority' => 0,
      ],[
        'event' => DefinedEvents::PRE_DESERIALIZE,
        'method' => 'onPreDeserialize',
        'class' => Car::class,
        'priority' => 0,
      ],[
        'event' => DefinedEvents::POST_DESERIALIZE,
        'method' => 'onPostDeserialize',
        'class' => Car::class,
        'priority' => 0,
      ],
    ];
  }


  public function onPreSerialize(PreSerializeEvent $event)
  {
    echo __FUNCTION__ . ' ON ' . get_class($event->getObject());
    echo __FILE__ . ':' . __LINE__ . PHP_EOL;
    echo '<hr>';
  }

  public function onPostSerialize(ObjectEvent $event)
  {
    echo __FUNCTION__ . ' ON ' . get_class($event->getObject());
    echo __FILE__ . ':' . __LINE__ . PHP_EOL;
    echo '<hr>';
  }

  public function onPreDeserialize(PreDeserializeEvent $event)
  {
    echo __FUNCTION__;
    echo '<br>';
    echo  print_r($event->getData());
    echo __FILE__ . ':' . __LINE__ . PHP_EOL;
    echo '<hr>';
  }

  public function onPostDeserialize(ObjectEvent $event)
  {
//    echo __FUNCTION__ . ' ON ' . get_class($event->getObject());
    echo __FILE__ . ':' . __LINE__ . PHP_EOL;
    echo '<hr>';
  }
}
