<?php

use \Reusables\Unit\Distance;

class DistanceTest extends PHPUnit_Framework_TestCase {

  public function conversionsProvider() {
    $json = file_get_contents(__DIR__ . '/../providers/conversions.json');
    return json_decode($json);
  }

  /**
   * @dataProvider conversionsProvider
   */
  public function test_shouldConvertFromOneUnitToAnother($input, $from, $expected, $to) {
    // arrange
    $distance = new Distance($input, $this->unit($from));

    // act
    $actual = $distance->to($this->unit($to));

    // assert
    $this->assertEquals($expected, $actual);
  }

  protected function unit($unit) {
    return constant('\\Reusables\\Unit\\Distance::' . $unit);
  }
}
