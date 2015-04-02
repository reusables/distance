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

  // TODO can I use constants for keys?
  /**
   * Lookup table for conversion factors to meters
   * @var array
   */
  protected $factors = array(
    "TERAMETERS" => 1000000000000,
    "GIGAMETERS" => 1000000000,
    "MEGAMETERS" => 1000000,
    "KILOMETERS" => 1000,
    "HECTOMETERS" => 100,
    "DECAMETERS" => 10,
    "METERS" => 1,
    "DECIMETERS" => 0.1,
    "CENTIMETERS" => 0.01,
    "MILLIMETERS" => 0.001,
    "MICROMETERS" => 0.000001,
    "NANOMETERS" => 0.000000001,
    "PICOMETERS" => 0.000000000001,
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
   */
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
    return $this->value / $this->factors[$unit];
  }
}
