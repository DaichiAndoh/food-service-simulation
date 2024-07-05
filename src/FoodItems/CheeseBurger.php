<?php
namespace FoodItems;

use FoodItems\FoodItem;

class CheeseBurger extends FoodItem {
  public function __construct() {
    parent::__construct('CheeseBurger', '', 9, 3);
  }

  public static function getCategory(): string {
    return 'Burger';
  }
}
