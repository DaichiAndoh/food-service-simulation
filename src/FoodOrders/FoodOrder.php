<?php
namespace FoodOrders;

use DateTime;

class FoodOrder {
  private array $items;
  private DateTime $orderTime;

  public function __construct(array $items, DateTime $orderTime) {
    $this->items = $items;
    $this->orderTime = $orderTime;
  }

  public function getItems(): array {
    return $this->items;
  }

  public function getOrderTime(): DateTime {
    return $this->orderTime;
  }

  public function calcTotalPrice(): float {
    $totalPrice = 0.0;

    for ($i = 0; $i < count($this->items); $i++) {
      $totalPrice += $this->items[$i]->getPrice();
    }

    return $totalPrice;
  }

  public function calcTotalCookingTime(): int {
    $totalCookingTime = 0.0;

    for ($i = 0; $i < count($this->items); $i++) {
      $totalCookingTime += $this->items[$i]->getCookingTime();
    }

    return $totalCookingTime;
  }
}
