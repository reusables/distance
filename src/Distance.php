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

  // english
  const MILE = 'MILE';
  const YARD = 'YARD';
  const FEET = 'FEET';
  const INCHES = 'INCHES';


  /**
   * Lookup table for conversion factors to meters
   *
   * The factor tells how many meters are in one of each unit.
   *
   * Multiply by factor to convert to meters.
   * Divide by factor to convert from meters.
   *
   * @var array
   */
  protected static $factors = array(
    // metric
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

    // english
    self::MILE => 1609.344,
    self::YARD => 0.9144,
    self::FEET => 0.3048,
    self::INCHES => 0.0254,
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

  /**
   * Convert to specified unit
   * @param  constant $unit One of the Distance class constants
   * @return Distance       Returns new Distance object
   */
  public function to($unit) {
    $meters = $this->value * self::$factors[$this->unit];
    return new self($meters / self::$factors[$unit], $unit);
  }

  /**
   * Add a distance to this distance
   * @param Distance $distance Another Distance object
   * @return Distance Returns a new Distance object of same unit as current Distance
   */
  public function add(Distance $distance) {
    $value = $this->value + $distance->to($this->unit)->value();
    return new Distance($value, $this->unit);
  }

  /**
   * Returns the current value
   * @return number
   */
  public function value() {
    return $this->value;
  }

  /**
   * Returns the current unit
   * @return constant One of the Distance class constants
   */
  public function unit() {
    return $this->unit;
  }
}
