@extends('layouts.admin')
@section('content')
<h1 class="text-xl font-semibold">Rekap Data</h1>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mt-4 shadow-sm">
    <div class="bg-white rounded-md p-4">
        <p class="text-lg font-semibold">Jumlah Transaksi Belanja</p>
        <p>{{ count($transactions) }}</p>
    </div>
    <div class="bg-white rounded-md p-4 shadow-sm">
        <p class="text-lg font-semibold">Jumlah User</p>
        <p>{{ count($users) }}</p>
    </div>
</div>
<div class="grid-cols-1">
    <p class="text-xl font-semibold mt-4 mb-4">Transaksi</p>
   <table class="table bg-white">
     <thead>
        <tr>
            <td>
               Id
            </td>
            <td>
                User
            </td>
            <td>
                Product
            </td>
            <td>
                Tanggal Pembelian
            </td>
        </tr>
     </thead>
     <tbody>
        @foreach($transactions as $key => $transaction)
              <tr>
                <td>
                    {{ $key + 1}}
                </td>
                <td>
                   {{ $transaction->user->name }} 
                </td>
                <td>
                    {{ $transaction->product->name }}
                </td>
                <td>
                    {{ $transaction->created_at }}
                </td>
             </tr> 
        @endforeach

     </tbody>
   </table>
</div>
<div class="grid-cols-1">
    <p class="text-xl font-semibold mt-4 mb-4">User</p>
   <table class="table bg-white mb-8">
     <thead>
        <tr>
            <td>
               Id
            </td>
            <td>
                User
            </td>
            <td>
                Role
            </td>
        </tr>
     </thead>
     <tbody>
        @foreach($users as $key => $user)
             <tr>
                <td>
                    {{ $key + 1}}
                </td>
                <td>
                    {{ $user->name }}
                </td>
                <td>
                    {{ $user->role->name }}
                </td>
             </tr>
        @endforeach

     </tbody>
   </table>
</div>
@endsection
