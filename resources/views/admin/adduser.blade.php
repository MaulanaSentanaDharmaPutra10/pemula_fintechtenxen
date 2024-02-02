@extends('layouts.admin')
@section('content')
    <div class="flex gap-2">
        <h1 class="text-xl font-semibold">Tambah User Baru</h1>
        <a href="{{ route('admin.userindex') }}" class="btn btn-ghost btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
          </svg></a>
    </div>

    @if (session('message'))
        @if (is_array(session('message')) && count(session('message')) > 1)
            <div role="alert" class="alert alert-{{ session('message')[0] }} mt-3" id="warning">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>
                    {{ session('message')[1] }}
                </span>
            </div>
        @endif
    @endif

    <div class="w-full bg-white p-8 rounded-md mt-8">
        <form action="{{ route('admin.adduserstore') }}" method="POST" class="flex flex-col gap-4 w-full">
            @csrf
            <label for="">Username</label>
            <input required name="name" type="text" class="input input-bordered w-full" placeholder="Masukan Nama User">
            <label for="">Password</label>
            <input required name="password" type="password" class="input input-bordered w-full" placeholder="Masukan Nama User">
            <label for="">Role</label>
            <select  required class="select select-bordered w-full" name="role">
                <option disabled selected>Pilih Role User</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ Str::ucfirst($role->name) }}</option>
                @endforeach
            </select>
            <button class="btn bg-gray-300 mt-4">
                Submit
            </button>
        </form>
    </div>

    @push('script')
        <script>
            setTimeout(() => {
                document.getElementById('warning').style.display = 'none';
            }, 5000);
        </script>
    @endpush

@endsection
