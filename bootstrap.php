<?php

final class Car
{
  private $model;

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

  public function toJson()
  {
    return json_encode(get_object_vars($this));
  }

  public function toXml()
  {
    return <<<XML
  <result>
    <model><![CDATA[$this->model]]></model>
    <brand><![CDATA[$this->brand]]></brand>
  </result>
 XML;
  }

  public static function fromArray(array $data): self
  {
    if (!isset($data['brand']) || !isset($data['model'])) {
      $message = "Missing data. Could not instantiate a Car object";
      throw new InvalidArgumentException($message);
    }

    return new self($data['brand'], $data['model']);
  }
}
