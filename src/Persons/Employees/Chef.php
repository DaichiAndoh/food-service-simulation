<?php
namespace Persons\Employees;

use Persons\Employees\Employee;
use FoodOrders\FoodOrder;

class Chef extends Employee {
  public function __construct(string $name, int $age, string $address, int $employeeId, float $salary) {
    parent::__construct($name, $age, $address, $employeeId, $salary);
  }

  public function prepareFood(FoodOrder $foodOrder): void {
    $items = $foodOrder->getItems();

    for ($i = 0; $i < count($items); $i++) {
      echo $this->getName() . ' was cooking ' . $items[$i]->getName() . '.' . PHP_EOL;
    }

    echo $this->getName() . ' took ' . $foodOrder->calcTotalCookingTime() . ' minutes to cook.' . PHP_EOL;
  }
}
