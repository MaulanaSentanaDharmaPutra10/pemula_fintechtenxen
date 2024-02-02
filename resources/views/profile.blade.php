@extends('layouts.master')
@section('content')
<div class="top flex lg:flex-row flex-col gap-8 justify-between items-center bg-white px-20 py-9 rounded-full shadow-md">
    <div class="top-left">
        
          <div class="profile flex items-center">
              <div class="description flex justify-start flex-col">
                <h1 class="text-xl font-semibold">{{ Str::ucfirst( Auth::user()->name ) }}</h1>
                <p>Joined Date: {{ Auth::user()->created_at }}</p>
                <p class="text-3xl font-semibold">
                  {{ format_to_rp(Auth::user()->wallet->credit) }} 
                </p>
                <div class="flex mt-2 gap-2">
                  <a href="{{ route('tarik.tunai') }}" class=" flex items-center topup bg-slate-400 p-2 text-white rounded-lg font-semibold"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
                  </svg>Tarik Tunai</a>
                  <a href="{{ route('topup.index') }}"
                      class="topup flex items-center bg-slate-400 p-2 text-white rounded-lg font-semibold">
                      <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                      </svg>
                      Isi Saldo
                  </a>
                </div>
              </div>
            </div>
      </div>
      <div class="top-right">
        <div class="debit flex items-center gap-4">
          <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="bi bi-database-dash" viewBox="0 0 16 16">
            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M11 12h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1"/>
            <path d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4"/>
          </svg>
            <div class="description">
              <p class="text-md">
                Pengeluaran Belanja
            </p>
            <p class="text-2xl font-semibold">{{ format_to_rp(Auth::user()->wallet->debit) }}</p>
          </div>
           
        </div>
      </div>
</div>

  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="transaction-history">
        <p class="mt-6 text-xl font-semibold">
            Riwayat Transaksi
        </p>
        @if(count($transactions))
        <div class="grid grid-cols-1 mt-2">
        @foreach($transactions as $date => $transactionGroup)
            <h2 class="my-2">{{ $date }}</h2>
            <div class="grid grid-cols-1 my-3 gap-2 bg-white rounded-md overflow-hidden shadow-md">
                @foreach($transactionGroup as $transaction)
                 <div class="card card-side h-fit w-full border-b-[1px] rounded-[0px] py-1">
                    <div class="card-body py-3">
                        <p class="text-xl font-semibold">{{ $transaction->product->name }}</p>
                        <p>{{ format_to_rp($transaction->product->price) }} x {{ $transaction->quantity }}</p>
                    </div>
                 </div>
                @endforeach
            </div>
        @endforeach
        </div>
        @else
        <div role="alert" class="alert mt-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span>Belum Ada Transaksi Untuk Saat Ini</span>
          </div>
        @endif

      </div>
      <div class="topup-history">
        <p class="mt-6 text-xl font-semibold">
            Riwayat Top Up
        </p>
        @if(count($topups))
        <div class="grid grid-cols-1 mt-2">
            @foreach($topups as $date => $topupGroup)
            <h2 class="my-2">{{ $date }}</h2>
            <div class="grid grid-cols-1 my-3 bg-white rounded-md shadow-md overflow-hidden">
                @foreach($topupGroup as $topup)
                 <div class="card card-side h-fit shadow-lg w-full border-b-[1px] rounded-[0px] py-1">
                    <div class="card-body">
                        <div class="body-wrappers flex justify-between items-center">
                            <div class="body-left">
                                <p>
                                  {{ $topup->order_id }}
                                </p>
                                <p class="text-xl font-semibold text-green-500">
                                    + {{ format_to_rp($topup->nominals) }}
                                </p>
                            </div>
                            <div class="body-right">
                               @if($topup->status == "unconfirmed")
                                 <div class="bg-red-400 px-3 py-1 rounded-md text-white">
                                      Belum Dikonfirmasi
                                 </div>
                               @elseif($topup->status == "confirmed")
                                 <div class="bg-green-400 px-3 py-1 rounded-md text-white">
                                      Terkonfirmasi
                                </div>
                               @elseif($topup->status == "rejected")
                                <div class="bg-red-400 px-3 py-1 rounded-md text-white">
                                     Ditolak
                                </div>
                               @endif
                            </div>
                        </div>

                    </div>

                 </div>
                @endforeach
            </div>
        @endforeach
        </div>
        @else
        <div role="alert" class="alert mt-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span>Belum Ada Top Up Untuk Saat Ini</span>
          </div>
        @endif

      </div>
      <div class="tariktunai-history">
        <div class="grid grid-cols-3 gap-4">
          <p class="mt-6 text-xl font-semibold">
            Riwayat Tarik Tunai
        </p>
        <p class="mt-6 text-xl font-semibold">
         {{-- {{sum($tariktunais->nominal)}} --}}
      </p>
        </div>

      
      @if(count($tariktunais))
      <div class="grid grid-cols-1 mt-2">
          @foreach($tariktunais as $date => $tarikTunaiGroup)
          <h2 class="my-2">{{ $date }}</h2>
          <div class="grid grid-cols-1 my-3 bg-white rounded-md shadow-md overflow-hidden">
              @foreach($tarikTunaiGroup as $tarikTunai)
               <div class="card card-side h-fit shadow-lg w-full border-b-[1px] rounded-[0px] py-1">
                  <div class="card-body">
                      <div class="body-wrappers flex justify-between items-center">
                          <div class="body-left">
                              <p>
                                  {{ $topup->order_id }}
                              </p>
                              <p class="text-xl font-semibold text-red-500">
                                   - {{ format_to_rp($tarikTunai->nominals) }}
                              </p>
                          </div>
                          <div class="body-right">
                             @if($tarikTunai->status == "unconfirmed")
                               <div class="bg-red-400 px-3 py-1 rounded-md text-white">
                                    Belum Dikonfirmasi
                               </div>
                             @elseif($tarikTunai->status == "confirmed")
                               <div class="bg-green-400 px-3 py-1 rounded-md text-white">
                                    Terkonfirmasi
                              </div>
                             @endif
                          </div>
                      </div>

                  </div>

               </div>
              @endforeach
          </div>
      @endforeach
      </div>
      @else
      <div role="alert" class="alert mt-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          <span>Belum Ada Tarik Tunai Untuk Saat Ini</span>
        </div>
      @endif

      </div>
  </div>


@endsection
