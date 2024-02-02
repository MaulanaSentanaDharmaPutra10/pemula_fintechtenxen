
@extends('layouts.admin')
@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-xl font-semibold">Tarik Tunai Baru</h1>
    <a href="{{ route('bank.tariktunai') }}" class="btn bg-gray-300 btn-md">Kembali</a>
</div>
<div class="w-full bg-white p-8 rounded-md mt-8 mb-8">
    <form action="{{ route('bank.tariktunai.post') }}" method="POST" class="flex flex-col gap-4 w-full" enctype="multipart/form-data"
        onsubmit="return validateForm()">
        @csrf
        <label for="nominals">Nominal</label>
        <input required name="nominals" type="text" class="input input-bordered w-full" placeholder="Masukan Nominal">
        <select required class="select select-bordered w-full" name="user" id="userSelect">
            <option disabled selected>Pilih User Penerima</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ Str::ucfirst($user->name) }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn bg-gray-300 mt-4" id="submitButton" disabled>
            Submit
        </button>
    </form>

    <script>
        function validateForm() {
            var nominal = document.getElementsByName('nominals')[0].value;
            var selectedUser = document.getElementById('userSelect').value;

            if (nominal === "" || selectedUser === "") {
                alert('Mohon masukkan nominal dan pilih user penerima sebelum mengirim formulir.');
                return false;
            }
            return true;
        }

        document.addEventListener('DOMContentLoaded', function () {
            var submitButton = document.getElementById('submitButton');
            var nominalInput = document.getElementsByName('nominals')[0];
            var userSelect = document.getElementById('userSelect');

            nominalInput.addEventListener('input', function () {
                updateSubmitButtonState();
            });

            userSelect.addEventListener('change', function () {
                updateSubmitButtonState();
            });

            function updateSubmitButtonState() {
                var nominalValue = nominalInput.value.trim();

                if (nominalValue !== "" && userSelect.value !== "Pilih User Penerima") {
                    submitButton.removeAttribute('disabled');
                } else {
                    submitButton.setAttribute('disabled', 'disabled');
                }
            }
        });

    </script>
</div>

@endsection