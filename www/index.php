<?php

include 'vendor/autoload.php';

use App\Tickets;
use App\MakeArray;
use App\WriteCsv;

$ticketsObj = new Tickets('vuviy', 'mBopV5V6SA5LO6EACwG', 'vova1995avatar');
$tickets = $ticketsObj->getTickets();

$arr = new MakeArray();
$ticketsArray = $arr->ticketsArray($tickets, $ticketsObj); // В метод ticketsArray передається два аргумента: 1 - результат роботи методу getTickets застосований до екземпляра класу Tickets, 2 - екземпляр класу Tickets;

$csv = new WriteCsv();
$csv->create($ticketsArray); // create приймає масив і створю з нього файл csv;