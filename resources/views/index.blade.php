@extends('layouts.master')
@section('content')
    
    <div class="carousel w-full shadow-xl rounded-lg">
        <div id="slide1" class="carousel-item relative w-full">
            <img src="https://images.tokopedia.net/img/cache/1208/NsjrJu/2024/1/17/91ccd1a4-e7b1-4cb7-b54b-0a659148fe83.jpg.webp?ect=4g" class="w-full" />
            <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                <a href="#slide4" class="btn btn-circle">❮</a> 
                <a href="#slide2" class="btn btn-circle">❯</a>
            </div>
        </div> 
        <div id="slide2" class="carousel-item relative w-full">
            <img src="https://images.tokopedia.net/img/cache/1208/NsjrJu/2024/1/8/868b7a32-39b3-43d4-9b80-965193b373a4.jpg.webp?ect=4g" class="w-full" />
            <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                <a href="#slide1" class="btn btn-circle">❮</a> 
                <a href="#slide3" class="btn btn-circle">❯</a>
            </div>
        </div> 
        <div id="slide3" class="carousel-item relative w-full">
            <img src="https://images.tokopedia.net/img/cache/1208/NsjrJu/2024/1/15/72423a0a-6c96-4aaf-9222-f057e55e3409.jpg.webp?ect=4g" class="w-full" />
            <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                <a href="#slide2" class="btn btn-circle">❮</a> 
                <a href="#slide4" class="btn btn-circle">❯</a>
            </div>
        </div> 
        <div id="slide4" class="carousel-item relative w-full">
            <img src="https://images.tokopedia.net/img/cache/1208/NsjrJu/2024/1/10/4cd4301e-f656-4b34-8ef7-79c8e9bef3ba.jpg.webp?ect=4g" class="w-full" />
            <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                <a href="#slide3" class="btn btn-circle">❮</a> 
                <a href="#slide1" class="btn btn-circle">❯</a>
            </div>
        </div>
    </div>

    <div class="product-list flex justify-between mt-4">
        <div class="welcome-text">
            <p class="text-xl">Selamat Datang
                @if(Auth::check())
                   {{Auth::user()->name}}
                @else
                   Di Fintech
                @endif
            </p>
            <h1 class="font-semibold text-xl">Pilih Product Menarik</h1>
        </div>

        <select class="select w-2/1 max-w-xs" id="select_category">
            <option disabled selected>Kategori</option>
            <option value="all">
                Semua Kategori
            </option>
            @foreach ($categories as $category )
              <option id="{{ $category->id }}" value="{{ $category->id }}">
                {{ $category->name }}
              </option>
            @endforeach
          </select>
      </div>

      <div class="product-list mt-4 lg:mt-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 w-full gap-5">
            @foreach ($products as $key => $product)
                <div class="card bg-base-100 shadow-xl hover:scale-105 duration-200">
                    <figure class="h-[170px] overflow-hidden object-cover">
                        <img class="object-cover" src="{{ $product->thumbnail }}" alt="Sepatu" />
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title">{{ $product->name }}</h2>
                        <p>{{ $product->description }}</p>
                        <div class="card-actions justify-between">
                            <h4 class="card-title mt-3">{{ format_to_rp($product->price) }}</h4>
                            <form action="{{ route('cart.add') }}" method="POST"
                                class="card-actions justify-end h-full">
                                @csrf
                                @auth
                                    @if ($product->stock > 0)
                                        <input class="w-5" type="hidden" value="{{ $product->id }}" name="product_id">
                                        <input value="1" min="1" max="{{ $product->stock }}" name="quantity" type="number"
                                            class="shadow-lg border-[1.5px] border-slate-300 h-full w-12 pl-2 rounded-lg">
                                        <button type="submit"
                                            class="btn text-white bg-gradient-to-r from-gray-700 to-gray-600 text-ms hover:bg-gradient-to-r hover:from-gray-600 hover:to-gray-700 duration-400">+ Keranjang</button>
                                    @else
                                        <button type="button"
                                            class="btn text-white bg-gradient-to-r from-gray-700 to-gray-600 text-ms cursor-not-allowed opacity-50">
                                            Stok Habis
                                        </button>
                                    @endif
                                @else
                                    <input class="w-5" type="hidden" value="{{ $product->id }}" name="product_id">
                                    <input value="1" min="1" max="{{ $product->stock }}" name="quantity" type="number"
                                        class="shadow-lg border-[1.5px] border-slate-300 h-full w-12 pl-2 rounded-lg">
                                    <button type="button"
                                        class="btn text-white bg-gradient-to-r from-gray-700 to-gray-600 text-ms cursor-not-allowed opacity-50"
                                        onclick="showLoginAlert()">
                                        + Keranjang
                                    </button>
                                    <script>
                                        function showLoginAlert() {
                                            alert('Anda belum login. Silakan login terlebih dahulu.');
                                        }
                                    </script>
                                @endauth
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
   
    @if (session('message'))
        @if (is_array(session('message')) && count(session('message')) > 1)
            <div class="toast toast-end toast-bottom" id="warning">
                <div class="alert alert-{{ session('message')[0] }}">
                    {{ session('message')[1] }}
                </div>
            </div>
        @endif
    @endif


    @push('script')
        <script>
            setTimeout(() => {
                document.getElementById('warning').style.display = 'none';
            }, 5000);
        </script>
    @endpush
@endsection
