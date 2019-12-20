<?php

namespace App;

/**
 * Class DefinedEvents
 * @package App
 * de events zoals ze staan in: https://jmsyst.com/libs/serializer/master/event_system
 */
final class DefinedEvents
{
  const PRE_SERIALIZE = 'serializer.pre_serialize';
  const POST_SERIALIZE = 'serializer.post_serialize';
  const PRE_DESERIALIZE = 'serializer.pre_deserialize';
  const POST_DESERIALIZE = 'serializer.post_deserialize';
}
