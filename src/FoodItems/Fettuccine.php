<?php
namespace FoodItems;

use FoodItems\FoodItem;

class Fettuccine extends FoodItem {
  private static $CATEGORY = 'Pasta';

  public function __construct() {
    parent::__construct('Fettuccine', '', 12.5, 5);
  }

  public static function getCategory(): string {
    return self::$CATEGORY;
  }
}
