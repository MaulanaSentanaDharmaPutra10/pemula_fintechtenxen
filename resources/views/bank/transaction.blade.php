@extends('layouts.admin')
@section('content')  

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-xl font-semibold">Daftar Transaksi</h1>
    </div>
    <div class="overflow-x-auto mb-8">
        <h1 class="mb-4 font-semibold text-xl">Top Up</h1>
        <table class="table  bg-white">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Id</th>
                    <th>User</th>
                    <th>Nominals</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
           
                @foreach ($topups as $date => $topup)
                    <tr>
                        <td rowspan="{{ count($topup) }}">{{ $date }}</td>
                        @foreach ($topup as $index => $per_topup)
                            @if ($index > 0)
                              </tr>
                              <tr>
                            @endif
                <td>{{ $per_topup->order_id}}</td>
                <td>{{ $per_topup->user->name  }}</td>
                <td>{{ format_to_rp($per_topup->nominals) }}</td> 
                <td>{{ $per_topup->status }}</td>
                @if($index === 0)
                <td class="flex gap-2" rowspan="{{ count($topup) }}">
                    <a href="{{ route('bank.transaction.print',['date' => $date] )}}" class="btn bg-blue-600 text-white">Download</a>
                </td>
                @endif
                @endforeach
                </tr>
                @endforeach


            </tbody>
        </table>
    </div>
    <div class="overflow-x-auto mb-8">
        <div class="flex justify-between">
            <h1 class="mb-4 font-semibold text-xl">Tarik Tunai</h1>
        </div>
        <table class="table mt-4 bg-white">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Id</th>
                    <th>User</th>
                    <th>Nominals</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
           
                @foreach ($tariktunais as $date => $tarik_tunai)
                    <tr>
                        <td rowspan="{{ count($tarik_tunai) }}">{{ $date }}</td>
                        @foreach ($tarik_tunai as $index => $per_tariktunai)
                            @if ($index > 0)
                              </tr>
                              <tr>
                            @endif
                <td>{{ $per_tariktunai->order_id}}</td>
                <td>{{ $per_tariktunai->user->name  }}</td>
                <td>{{ format_to_rp($per_tariktunai->nominals) }}</td> 
                <td>{{ $per_tariktunai->status }}</td>
                @if($index === 0)
                <td class="flex gap-2" rowspan="{{ count($tarik_tunai) }}">
                    <a href="{{ route('bank.transaction.printtariktunais',['date' => $date] )}}" class="btn bg-blue-600 text-white">Download</a>
                </td>
                    @endif
                @endforeach
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
