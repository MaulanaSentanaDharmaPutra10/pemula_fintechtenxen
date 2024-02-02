@extends('layouts.admin')
@section('content')
   <div class="flex justify-between items-center mb-6">
       <h1 class="text-xl font-semibold">Daftar Produk</h1>
       <a href="{{ route('kantin.addproduct.index') }}" class="btn bg-gray-300 btn-md">Tambah Produk</a>
   </div>
    <div class="overflow-x-auto">
      <table class="table table-zebra bg-white">
        <thead>
          <tr>
            <th>Id</th>
            <th>Thumbnail</th>
            <th>Nama</th>
            <th>Stock</th>
            <th>Category</th>
            <th>Price</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $key => $product )
          <tr>
             <td>{{ $key + 1 }}</td>
             <td>
                <div class="w-16 h-12 overflow-hidden object-cover">
                    <img src="{{ asset($product->thumbnail )}}" alt="">
                </div>
             </td>
             <td>{{ $product->name }}</td>
             <td>{{ $product->stock }}</td>
             <td>{{ $product->category->name }}</td>
             <td>{{ $product->price }}</td>
             <td>{{ $product->description }}</td>
             <td class="flex gap-2">
                <form action="{{ route('kantin.deleteproduct', $product->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-error text-white" onclick="return confirm('Yakin Mau Delete?')">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                         <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                       </svg>
                    </button>
                </form>
                <a class="btn btn-warning text-white" href="{{ route('kantin.editproduct',$product->id) }}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001"/>
                  </svg>
                </a>
             </td>
            </tr>
            @endforeach

        </tbody>
      </table>
    </div>
@endsection
