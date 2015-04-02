<?php

use \Reusables\Unit\Distance;

class DistanceTest extends PHPUnit_Framework_TestCase {

  /**
   * @dataProvider conversionsProvider
   */
  public function test_shouldConvertToAndFromVariousUnits($input, $from, $expected, $to) {
    // arrange
    $distance = new Distance($input, $this->unit($from));

    // act
    $actual = $distance->to($this->unit($to))->value();

    // assert
    $this->assertEquals($expected, $actual);
  }

  public function conversionsProvider() {
    return array_merge(
      $this->loadProviderJson('conversions/to_meters'),
      $this->loadProviderJson('conversions/from_meters')
    );
  }


  protected function loadProviderJson($name) {
    $json = file_get_contents(__DIR__ . '/../providers/' . $name . '.json');
    return json_decode($json);
  }

  protected function unit($unit) {
    return constant('\\Reusables\\Unit\\Distance::' . $unit);
  }
}
