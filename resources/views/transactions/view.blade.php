@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card bg-light">
                <div class="card-body">
                    <div class="container">
                        @if (count($transactions)>0)
                        <table class="table table-borderless">
                            @foreach ($transactions as $transaction)
                            <thead>
                              <tr>
                                <th>{{$transaction->created_at}}</th>
                                <th></th>
                                <th></th>
                                <th style="text-align: right;">Total: {{$transaction->total}}</th>
                              </tr>
                            </thead>
                            @foreach ($detailTransactions as $dt)
                                @if ($dt->transaction_id == $transaction->id)
                                    <tbody>
                                    <tr>
                                        <td>{{$dt->product->name}}</td>
                                        <td>Rp{{$dt->product->price}},00</td>
                                        <td>Quantity: {{$dt->quantity}}</td>
                                        <td>Sub Total: Rp{{$dt->subtotal}}</td>
                                    </tr>
                                    </tbody>
                                @endif
                            @endforeach
                            @endforeach
                        </table>
                        @else
                            <h5 class="card-title">You don't have any transaction</h5>
                        @endif
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
