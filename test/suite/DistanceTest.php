<?php

use \Reusables\Unit\Distance;

class DistanceTest extends PHPUnit_Framework_TestCase {

  /**
   * @dataProvider convertFromMetersProvider
   */
  public function test_shouldConvertFromMeters($input, $from, $expected, $to) {
    // arrange
    $distance = new Distance($input, $this->unit($from));

    // act
    $actual = $distance->to($this->unit($to));

    // assert
    $this->assertEquals($expected, $actual);
  }

  public function convertFromMetersProvider() {
    return $this->loadProviderJson('conversions/from_meters');
  }

  protected function loadProviderJson($name) {
    $json = file_get_contents(__DIR__ . '/../providers/' . $name . '.json');
    return json_decode($json);
  }

  protected function unit($unit) {
    return constant('\\Reusables\\Unit\\Distance::' . $unit);
  }
}
