<?php
namespace Invoices;

use DateTime;

class Invoice {
  private float $finalPrice;
  private DateTime $orderTime;
  private int $estimatedTimeInMinutes;

  public function __construct(float $finalPrice, DateTime $orderTime, int $estimatedTimeInMinutes) {
    $this->finalPrice = $finalPrice;
    $this->orderTime = $orderTime;
    $this->estimatedTimeInMinutes = $estimatedTimeInMinutes;
  }

  public function printInvoice() {
    echo '------------------------------' . PHP_EOL;
    echo 'Date: ' . $this->orderTime->format('Y-m-d H:i:s') . PHP_EOL;
    echo 'Final Price: $' . $this->finalPrice . PHP_EOL;
    echo '------------------------------' . PHP_EOL;
  }
}
