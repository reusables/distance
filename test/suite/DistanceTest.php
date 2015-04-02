<?php

use \Reusables\Unit\Distance;

class DistanceTest extends PHPUnit_Framework_TestCase {

  /**
   * @dataProvider conversionsProvider
   */
  public function test_shouldConvertToAndFromVariousUnits($value, $from, $expected, $to) {
    // arrange
    $distance = new Distance($value, $this->unit($from));

    // act
    $actual = $distance->to($this->unit($to))->value();

    // assert
    $this->assertEquals($expected, $actual);
  }

  public function conversionsProvider() {
    return array_merge(
      $this->loadProviderJson('conversions/to_meters'),
      $this->loadProviderJson('conversions/from_meters'),
      $this->loadProviderJson('conversions/meters_to_english'),
      $this->loadProviderJson('conversions/english_to_meters'),
      $this->loadProviderJson('conversions/english_to_english')
    );
  }

  /**
   * @dataProvider additionsProvider
   */
  public function test_shouldAddDistancesTogether($value1, $unit1, $value2, $unit2, $expected) {
    // arrange
    $distance1 = new Distance($value1, $unit1);
    $distance2 = new Distance($value2, $unit2);

    // act
    $actual = $distance1->add($distance2);

    // assert
    $this->assertEquals($expected, $actual->value());
    $this->assertEquals($unit1, $actual->unit());
  }

  public function additionsProvider() {
    return $this->loadProviderJson('additions');
  }

  /**
   * @dataProvider subtractionsProvider
   */
  public function test_shouldSubtractDistances($value1, $unit1, $value2, $unit2, $expected) {
    // arrange
    $distance1 = new Distance($value1, $unit1);
    $distance2 = new Distance($value2, $unit2);

    // act
    $actual = $distance1->subtract($distance2);

    // assert
    $this->assertEquals($expected, $actual->value());
    $this->assertEquals($unit1, $actual->unit());
  }

  public function subtractionsProvider() {
    return $this->loadProviderJson('subtractions');
  }


  protected function loadProviderJson($name) {
    $json = file_get_contents(__DIR__ . '/../providers/' . $name . '.json');
    return json_decode($json);
  }

  protected function unit($unit) {
    return constant('\\Reusables\\Unit\\Distance::' . $unit);
  }
}
