<?php
spl_autoload_extensions('.php'); 
spl_autoload_register(function($name) {
  $filepath = __DIR__ . '/' . str_replace('\\', '/', $name) . '.php';
  require_once $filepath;
});

$cheeseBurger = new FoodItems\CheeseBurger();
$fettuccine = new FoodItems\Fettuccine();
$hawaiianPizza = new FoodItems\HawaiianPizza();
$spaghetti = new FoodItems\Spaghetti();

$chef = new Persons\Employees\Chef('Tom', 30, 'New York', 1, 5000);
$cashier = new Persons\Employees\Cashier('John', 24, 'Los Angeles', 2, 3500);

$restaurant = new Restaurants\Restaurant(
  [$cheeseBurger, $fettuccine, $hawaiianPizza, $spaghetti],
  [$chef, $cashier],
);

$customer = new Persons\Customers\Customer('Bob', 28, 'San Diego', [
  'Margherita' => 1,
  'CheeseBurger' => 2,
  'Fettuccine' => 1,
]);
$invoice = $customer->order($restaurant);
$invoice->printInvoice();
