<?php
namespace Persons\Customers;

use Persons\Person;
use Restaurants\Restaurant;
use Invoices\Invoice;

class Customer extends Person {
  private array $interestedFoodsMap;

  public function __construct(string $name, int $age, string $address, array $interestedFoodsMap) {
    parent::__construct($name, $age, $address);
    $this->interestedFoodsMap = $interestedFoodsMap;
  }

  public function order(Restaurant $restaurant): Invoice {
    $orderFoods = $this->getOrderFoods($restaurant);
    $this->printForOrder($orderFoods);

    return $restaurant->order($orderFoods);
  }

  private function getOrderFoods(Restaurant $restaurant): array {
    $menu = $restaurant->getMenu();
    $orderFoods = [];

    for ($i = 0; $i < count($menu); $i++) {
      $foodName = $menu[$i]->getName();
      if (array_key_exists($foodName, $this->interestedFoodsMap)) {
        $orderFoods[$foodName] = $this->interestedFoodsMap[$foodName];
      }
    }

    return $orderFoods;
  }

  private function printForOrder(array $orderFoods): void {
    $printList = [];
    foreach ($orderFoods as $foodName => $num) {
      array_push($printList, $foodName . ' * ' . $num);
    }

    echo $this->name . ' wanted to eat ' . implode(', ', array_keys($this->interestedFoodsMap)) . '.' . PHP_EOL;
    echo $this->name . ' was looking at the menu, and ordered ' . implode(', ', $printList) . '.' . PHP_EOL;
  }
}
