<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receipt</title>
    @vite(['resources/css/app.css'])
    <style>
       @media print {
         #back-to-home {
            display: none;
         }
       }
    </style>
</head>

<body>
    <div class="container mx-auto px-3 py-8 h-screen">
        <h1 class="card-title">Report Transaksi</h1>
        <p>Tanggal {{ $date }}</p>
        @foreach ($tariktunais as $tariktunai)
        <ul class="mt-4 shadow-lg p-4 border-2">
                <li>
                    Order Id : {{ $tariktunai->order_id }}  
                </li>
                <li>
                    Nominal : {{ $tariktunai->nominals }}
                </li>
                <li>
                    Status : {{ $tariktunai->status }} 
                </li>
            </ul>
        @endforeach
        <hr class="mt-4">
        <div class="flex justify-end w-full" id="back-to-home">
                <a href="{{ route('bank.transaction') }}" type="submit" class="btn bg-gray-300">Kembali</a>
        </div>


    </div>




    <script>
        window.print();
    </script>

</body>

</html>
