<?php

include 'vendor/autoload.php';

use App\Tickets;
use App\MakeArray;
use App\WriteCsv;

$ticketsObj = new Tickets('your_domain', 'api_kay', 'your_password');
$tickets = $ticketsObj->getTickets();

$arr = new MakeArray();
$ticketsArray = $arr->ticketsArray($tickets, $ticketsObj); // В метод ticketsArray передається два аргумента: 1 - результат роботи методу getTickets застосований до екземпляра класу Tickets, 2 - екземпляр класу Tickets;

$csv = new WriteCsv();
$csv->create($ticketsArray); // create приймає масив і створю з нього файл csv;
