@extends('layouts.master')
@section('content')
<div class="flex justify-between mt-4 mb-7">
   <h1 class="font-bold text-xl">Tarik Tunai</h1>
   <a href="{{ route('profile') }}" class="btn btn-error">
     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
       <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
     </svg>
     </a>
   </div>  
<form action="{{ route('tarik.tunai.store') }}" class="flex flex-col items-center mt-4 gap-2" method="POST">
 @csrf
 <input required name="nominals" type="text" class="input input-bordered w-full" placeholder="Masukan Nominal">
 <button type="submit" class="btn bg-slate-400 w-full mt-2">Tarik Tunai</button>
</form>

@endsection