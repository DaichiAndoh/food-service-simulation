<?php
namespace Persons\Employees;

use Persons\Employees\Employee;
use Restaurants\Restaurant;
use FoodOrders\FoodOrder;
use Invoices\Invoice;
use DateTime;

class Cashier extends Employee {
  public function __construct(string $name, int $age, string $address, int $employeeId, float $salary) {
    parent::__construct($name, $age, $address, $employeeId, $salary);
  }

  public function generateOrder(array $orderFoods, Restaurant $restaurant): FoodOrder {
    echo $this->getName() . ' received the order.' . PHP_EOL;

    $menu = $restaurant->getMenu();
    $items = [];

    for ($i = 0; $i < count($menu); $i++) {
      $foodName = $menu[$i]->getName();
      if (array_key_exists($foodName, $orderFoods)) {
        for ($j = 0; $j < $orderFoods[$foodName]; $j++) {
          array_push($items, clone $menu[$i]);
        }
      }
    }

    return new FoodOrder($items, new DateTime());
  }

  public function generateInvoice(FoodOrder $foodOrder): Invoice {
    echo $this->getName() . ' made the invoice.' . PHP_EOL;

    return new Invoice(
      $foodOrder->calcTotalPrice(),
      $foodOrder->getOrderTime(),
      $foodOrder->calcTotalCookingTime(),
    );
  }
}
