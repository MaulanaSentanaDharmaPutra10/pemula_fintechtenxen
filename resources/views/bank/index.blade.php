@extends('layouts.admin')
@section('content')
<h1 class="text-xl font-semibold">Rekap Data</h1>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mt-4 shadow-sm">
    <div class="bg-white rounded-md p-4">
        <p class="text-lg font-semibold">Jumlah TopUp</p>
        <p>{{ count($topups) }}</p>
    </div>
    <div class="bg-white rounded-md p-4 shadow-sm">
        <p class="text-lg font-semibold">Jumlah TarikTunai</p>
        <p>{{ count($tariktunais) }}</p>
    </div>
</div>
<div class="grid grid-cols-1">
    <p class="text-xl font-semibold mt-4 mb-4">Top Up</p>
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
                 Nominal
             </td>
             <td>
                 Status
             </td>
         </tr>
      </thead>
      <tbody>
         @foreach($topups5 as $key => $topup)
               <tr>
                 <td>
                     {{ $key + 1}}
                 </td>
                 <td>
                    {{ $topup->user->name }} 
                 </td>
                 <td>
                     {{ $topup->nominals }}
                 </td>
                 <td>
                     {{ $topup->status }}
                 </td>
              </tr> 
         @endforeach
 
      </tbody>
    </table>
</div>

<div class="grid grid-cols-1">
    <p class="text-xl font-semibold mt-4 mb-4">Tarik Tunai</p>
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
                 Nominal
             </td>
             <td>
                 Status
             </td>
         </tr>
      </thead>
      <tbody>
         @foreach($tariktunais5 as $key => $tariktunai)
               <tr>
                 <td>
                     {{ $key + 1}}
                 </td>
                 <td>
                    {{ $tariktunai->user->name }} 
                 </td>
                 <td>
                     {{ $tariktunai->nominals }}
                 </td>
                 <td>
                     {{ $tariktunai->status }}
                 </td>
              </tr> 
         @endforeach
 
      </tbody>
    </table>
</div>
@endsection
