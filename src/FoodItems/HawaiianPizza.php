<?php
namespace FoodItems;

use FoodItems\FoodItem;

class HawaiianPizza extends FoodItem {
  private static $CATEGORY = 'Pizza';

  public function __construct() {
    parent::__construct('HawaiianPizza', '', 13.5, 10);
  }

  public static function getCategory(): string {
    return self::$CATEGORY;
  }
}
