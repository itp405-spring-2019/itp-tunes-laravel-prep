<?php

namespace App;

use DB;

class Invoice
{
  public static function total($invoices)
  {
    $total = 0;

    foreach($invoices as $invoice) {
      $total = $total + $invoice->Total;
    }

    return $total;
  }
}
