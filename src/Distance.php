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
   * Lookup table for conversion factors to meters
   *
   * Divide by factor to convert to meters.
   * Multiply by factor to convert from meters.
   *
   * @var array
   */
  protected static $factors = array(
    self::TERAMETERS => 1000000000000,
    self::GIGAMETERS => 1000000000,
    self::MEGAMETERS => 1000000,
    self::KILOMETERS => 1000,
    self::HECTOMETERS => 100,
    self::DECAMETERS => 10,
    self::METERS => 1,
    self::DECIMETERS => 0.1,
    self::CENTIMETERS => 0.01,
    self::MILLIMETERS => 0.001,
    self::MICROMETERS => 0.000001,
    self::NANOMETERS => 0.000000001,
    self::PICOMETERS => 0.000000000001,
  );

  /**
   * Original value
   * @var number
   */
  protected $value = 0;

  /**
   * Original unit
   * @var constant
   */
  protected $unit = self::METERS;

  /**
   * Constructor
   * @param number $value Distance
   * @param constant $unit One of the Distance class constants
   */
  public function __construct($value, $unit = self::METERS) {
    $this->value = $value;
    $this->unit = $unit;
  }

  public function to($unit) {
    $meters = $this->value * self::$factors[$this->unit];
    return $meters / self::$factors[$unit];
  }
}
