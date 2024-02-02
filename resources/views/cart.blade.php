@extends('layouts.master')
@section('content')
   @if(count($transactions))
   {{-- <a href="{{ route('index') }}" class="btn btn-primary my-3">Kembali</a> --}}
   <div class="flex justify-between gap-8">
    <div class="grid grid-cols-1 gap-3 w-3/4">
        @foreach ($transactions as $transaction)
        <div class="card card-side h-fit bg-base-100 shadow-xl flex items-center" >
          <div class="w-[160px] h-[120px] overflow-hidden object-cover "><img class="object-cover ml-8" src="{{ $transaction->product->thumbnail }}"/></div>
          <div class="card-body mt-5">
            <h2 class="card-title">{{ $transaction->product->name }}</h2>
            <p>{{ format_to_rp($transaction->product->price) }} x {{ $transaction->quantity }}</p>
            <p class="text-xl font-semibold">{{ ($transaction->product->description)  }}</p>
            <div class="card-actions justify-end">
             <form action="{{ route('cart.delete', $transaction->id) }}" method="POST">
               @csrf
               @method('delete')
                <button onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Produk ini?')" type="submit" class="btn bg-red-600
                 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                  </svg></button>  
             </form>
            </div>
          </div>
        </div>
         @endforeach
     </div>
     <div class="pay w-1/4">
      <form action="{{ route('cart.pay') }}" method="POST">
        <div class="shadow-xl w-full max-h-full p-8 bg-white rounded-lg">
            <h1 class="font-semibold text-lg mb-3">Atur Jumlah dan Catatan</h1>
            <a class="text-grey-500" href="#">Stok Total : {{ $transaction->product->stock}}</a>
            <div class="flex justify-between price text-2xl font-semibold mt-4 mb-4">
            </label">Subtotal<label>
                {{ format_to_rp($total_prices_all) }}
            </div>
            <div class="button">
                    @csrf
                    <input type="hidden" value="{{ $total_prices_all }}" name="total_prices">
                    <button type="submit" class="btn bg-green-500 w-full">
                        Beli
                    </button>
                </form>

            </div>
        </div>
     </div>

   </div>
   @else
   <div class="flex w-full h-[80vh] justify-center items-center flex-col">
       <h1 class="font-semibold text-xl mb-4">Keranjangmu Kosong</h1>
       <a href="{{ route('index') }}" class="btn btn-outline btn-success">Kembali</a>
   </div>

   @endif



@endsection
