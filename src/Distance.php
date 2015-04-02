<?php

namespace Reusables\Unit;

class Distance {

  // metric
  const TERAMETERS = 'TERAMETERS';
  const GIGAMETERS = 'GIGAMETERS';
  const MEGAMETERS = 'MEGAMETERS';
  const KILOMETERS = 'KILOMETERS';
  const HECTOMETERS = 'HECTOMETERS';
  const DECAMETERS = 'DECAMETERS';
  const METERS = 'METERS';
  const DECIMETERS = 'DECIMETERS';
  const CENTIMETERS = 'CENTIMETERS';
  const MILLIMETERS = 'MILLIMETERS';
  const MICROMETERS = 'MICROMETERS';
  const NANOMETERS = 'NANOMETERS';
  const PICOMETERS = 'PICOMETERS';

  /**
   * Original value in meters
   * @var number
   */
  protected $value = 0;

  /**
   * Constructor
   * @param number $value Distance in meters
   */
  public function __construct($value) {
    $this->value = $value;
  }

  public function to($unit) {
    switch ($unit) {
      case self::TERAMETERS:
        return $this->value / 1000000000000;
      case self::GIGAMETERS:
        return $this->value / 1000000000;
      case self::MEGAMETERS:
        return $this->value / 1000000;
      case self::KILOMETERS:
        return $this->value / 1000;
      case self::HECTOMETERS:
        return $this->value / 100;
      case self::DECAMETERS:
        return $this->value / 10;
      case self::METERS:
        return $this->value;
      case self::DECIMETERS:
        return $this->value / 0.1;
      case self::CENTIMETERS:
        return $this->value / 0.01;
      case self::MILLIMETERS:
        return $this->value / 0.001;
      case self::MICROMETERS:
        return $this->value / 0.000001;
      case self::NANOMETERS:
        return $this->value / 0.000000001;
      case self::PICOMETERS:
        return $this->value / 0.000000000001;
    };
  }
}
