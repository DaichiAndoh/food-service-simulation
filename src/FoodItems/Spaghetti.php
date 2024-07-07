<?php
namespace FoodItems;

use FoodItems\FoodItem;

class Spaghetti extends FoodItem {
  private static $CATEGORY = 'Pasta';

  public function __construct() {
    parent::__construct('Spaghetti', '', 11, 3);
  }

  public static function getCategory(): string {
    return self::$CATEGORY;
  }
}
