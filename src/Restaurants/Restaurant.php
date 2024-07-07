<?php
namespace Restaurants;

use Invoices\Invoice;
use Persons\Employees\Cashier;
use Persons\Employees\Chef;

class Restaurant {
  private array $menu;
  private array $employees;

  public function __construct(array $menu, array $employees) {
    $this->menu = $menu;
    $this->employees = $employees;
  }

  public function getMenu(): array {
    return $this->menu;
  }

  private function getChef(): Chef {
    for ($i = 0; count($this->employees); $i++) {
      if ($this->employees[$i] instanceof Chef) {
        return $this->employees[$i];
      }
    }
    throw new Exception('Chef does not exist.');
  }

  private function getCashier(): Cashier {
    for ($i = 0; count($this->employees); $i++) {
      if ($this->employees[$i] instanceof Cashier) {
        return $this->employees[$i];
      }
    }
    throw new Exception('Cashier does not exist.');
  }

  public function order(array $orderFoods): Invoice {
    $chef = $this->getChef();
    $cashier = $this->getCashier();

    $foodOrder = $cashier->generateOrder($orderFoods, $this);
    $chef->prepareFood($foodOrder);
    return $cashier->generateInvoice($foodOrder);
  }
}
