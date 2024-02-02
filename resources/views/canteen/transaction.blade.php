@extends('layouts.admin')
@section('content')  

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-xl font-semibold">Daftar Transaksi</h1>
    </div>
    <div class="overflow-x-auto mb-8">
        <table class="table  bg-white">
            <!-- head -->
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Order ID</th>
                    <th>User</th>
                    <th>Produk</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($transactions as $date => $transaction)
                    <tr>
                        <td rowspan="{{ count($transaction) }}">{{ $date }}</td>
                        @foreach ($transaction as $index => $per_transaction)
                            @if ($index > 0)
                              </tr>
                              <tr>
                            @endif
                <td>{{ $per_transaction->order_id }}</td>
                <td>{{ $per_transaction->user->name }}</td>
                <td>{{ $per_transaction->product->name }}</td>
                <td>{{ $per_transaction->created_at}}</td>
                <td class="text-center">
                    @if($per_transaction->status == "taken")
                      <p class="bg-green-500 rounded-sm p-2">Diambil</p>
                    @elseif($per_transaction->status == "paid")
                      <p class="bg-yellow-500">Dibayar</p>
                    @endif
            
                </td>
                @endforeach
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
