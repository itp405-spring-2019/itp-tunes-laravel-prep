<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Invoice;

class InvoicesController extends Controller
{
  public function index(Request $request)
  {
    $query = DB::table('invoices')
      ->select(
        'InvoiceDate',
        'Total',
        'customers.FirstName as CustomerFirstName',
        'customers.LastName as CustomerLastName',
        'Email'
      )
      ->join('customers', 'customers.CustomerId', '=', 'invoices.CustomerId');

    if ($request->query('search')) {
      $query->where('CustomerFirstName', '=', $request->query('search'));
      $query->orWhere('CustomerLastName', '=', $request->query('search'));
    }

    $invoices = $query->get();

    return view('invoices', [
      'invoices' => $invoices,
      'search' => $request->query('search'),
      'total' => Invoice::total($invoices)
    ]);
  }
}
