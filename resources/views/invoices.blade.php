@extends('layout')

@section('title', 'Invoices')

@section('main')
  <form action="/invoices" method="get">
    <input
      type="text"
      name="search"
      placeholder="Firstname or Lastname"
      value="{{$search}}">
    <button type="submit">Search</button>
    <a href="/invoices" class="btn btn-default">Clear</a>
  </form>
  <table class="table">
    <tr>
      <th>Date</th>
      <th>Total (${{$total}})</th>
      <th>Customer</th>
      <th colspan="2">Email</th>
    </tr>
    @forelse($invoices as $invoice)
      <tr>
        <td>{{$invoice->InvoiceDate}}</td>
        <td>${{$invoice->Total}}</td>
        <td>
          {{$invoice->CustomerFirstName}} {{$invoice->CustomerLastName}}
        </td>
        <td>{{$invoice->Email}}</td>
      </tr>
    @empty
      <tr>
        <td colspan="4">No records found.</td>
      </tr>
    @endforelse
  </table>
@endsection
