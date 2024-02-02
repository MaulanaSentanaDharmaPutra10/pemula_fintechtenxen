<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Fintech Tenizen</title>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @vite(['resources/css/app.css'])
</head>

<body>
    @include('sweetalert::alert')
    <header class="bg-gradient-to-r from-gray-700 to-gray-900 w-full h-16 px-6 py-4 flex justify-between lg:hidden">
        <div class="flex-1">
            <a class="text-4xl font-mono text-white">
                Use
                @if(Auth::user()->role->id == 4)
                Kantin
                @elseif(Auth::user()->role->id == 2)
                Bank
                @elseif(Auth::user()->role->id == 3)
                Admin
                @endif
            </a>
        </div>
        <button class="text-white" id="hamburger">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
              </svg>    
        </button>
        
    </header>
    <div class="container flex gap-4 w-full relative" >
        <div class="pl-4 sticky left-0 z-30 bg-gradient-to-r  from-gray-700 to-gray-900  w-[500px] lg:w-[270px]  pt-6 min-h-full hidden lg:block" id="menuContainer">
            <div class="flex-1">
                <a class="btn btn-ghost text-xl text-white">
                    Use
                    @if(Auth::user()->role->id == 4)
                    Kantin
                    @elseif(Auth::user()->role->id == 2)
                    Bank
                    @elseif(Auth::user()->role->id == 3)
                    Admin
                    @endif
                </a>
            </div>
            @if(Auth::user()->role->id == 3)
            <ul class="pl-4 flex flex-col gap-4 mt-4 text-white opacity-80">
                <li><a href="{{ route('admin.index') }}">Home</a></li>
                <li><a href="{{ route('admin.userindex')}}">Tambah User</a></li>
                <li><a href="{{ route('admin.transaction') }}">Transaksi</a></li>
                <li><a href="{{ route('logout')}}">Logout</a></li>
            </ul>
            @elseif(Auth::user()->role->id == 2)
            <ul class="pl-4 flex flex-col gap-4 mt-4 text-white opacity-80">
                <li><a href="{{ route('bank.index') }}">Home</a></li>
                <li><a href="{{ route('bank.topup.index')}}">Isi Saldo</a></li>
                <li><a href="{{ route('bank.tariktunai')}}">Tarik Tunai</a></li>
                <li><a href="{{ route('bank.transaction') }}">Laporan</a></li>
                <li><a href="{{ route('logout')}}">Logout</a></li>
            </ul>
            @elseif(Auth::user()->role->id == 4)
            <ul class="pl-4 flex flex-col gap-4 mt-4 text-white opacity-80">
                <li><a href="{{ route('kantin.index') }}">Home</a></li>
                <li><a href="{{ route('kantin.product.index')}}">Tambah Product</a></li>
                <li><a href="{{ route('kantin.transaction') }}">Transaksi</a></li>
                <li><a href="{{ route('kantin.confirm') }}">Confirm Buy</a></li>
                <li><a href="{{ route('logout')}}">Logout</a></li>
            </ul>
            @endif

        </div>
        <main class="pl-4 lg:pl-[6.25rem] pr-4 lg:pr-14 pt-8 w-full min-h-screen h-full">
            @yield('content')
        </main>

    </div>
     <script src="{{ asset('js/hamburger.js') }}">

     </script>
     @stack('script')
</body>

</html>
