<?php

namespace App;

class WriteCsv
{

  public function create($ticketsArray)
  {
    $file = fopen("tickets" . date("Y-m-d H:i:s") . ".csv", 'w');
    foreach ($ticketsArray as $line) {
      fputcsv($file, $line, ';');
    }
    fclose($file);
  }
}
