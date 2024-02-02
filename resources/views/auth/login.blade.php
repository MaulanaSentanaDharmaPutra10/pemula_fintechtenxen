@extends('layouts.master')
@section('content')
<div class="flex flex-col overflow-hidden w-full h-[80vh] justify-content items-center">
  
    <div class="w-full p-4 m-auto bg-white rounded-md shadow-md lg:max-w-lg">
        <h1 class="text-3xl font-semibold text-center font-mono text-gray-700">Fintech Tenizen</h1>
        @if (session('message'))
        <div role="alert" class="alert alert-error mt-3 lg:max-w-lg flex justify-center" id="warning">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>
                {{ session('message') }}
            </span>
        </div> 
        @endif
        <form class="space-y-3" action="{{ route('auth') }}" method="post">
            @csrf
            <div>
                <label class="label">
                    <span class="text-base label-text">Username</span>
                </label>
                <input name="username" type="text" placeholder="Email Address" class="w-full input input-bordered" />
            </div>
            <div>
                <label class="label">
                    <span class="text-base label-text">Password</span>
                </label>
                <input name="password" type="password" placeholder="Enter Password"
                    class="w-full input input-bordered" />
            </div>
            <div>
                <button type="submit" class="mb-2 mt-5 btn btn-block">Login</button>
            </div>
        </form>
    </div>
</div>
@push('script')
<script>
    setTimeout(() => {
        document.getElementById('warning').style.display = 'none';
    }, 5000);
</script>
@endpush

@endsection
