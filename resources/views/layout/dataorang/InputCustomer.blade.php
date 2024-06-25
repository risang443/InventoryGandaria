@extends('app')

@section('content')
    <div class="p-4 ml-64 bg-[#A7CCED]">
        <div class="mx-10 mb-5 p-8 w-lg bg-[#3a57b4] rounded-md flex justify-center">
            <h1 class="text-2xl text-white font-bold">Form Input Customer Baru</h1>
        </div>
        <div class="mx-10 p-8 w-lg bg-[#66a6df] rounded-md">
            <form action="{{ route('customer.store') }}" method="POST">
                @csrf
                <label class="text-md font-semibold" for="name">Nama :</label>
                <input class="block my-3 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500" type="text" name="name" id="name" required value="{{ old('name') }}">
                
                <label class="text-md font-semibold" for="notelp">Nomor Telepon :</label>
                <input class="block my-3 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500" type="text" name="notelp" id="notelp" required value="{{ old('notelp') }}">
                
                <label class="text-md font-semibold" for="alamat">Alamat :</label>
                <textarea class="block my-3 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500" name="alamat" id="alamat" required>{{ old('alamat') }}</textarea>
                
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-auto px-5 py-2.5 text-center">Submit</button>
                <a href="/customers" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-auto px-5 py-2.5 text-center">Cancel</a>
            </form>
        </div>
    </div>
@endsection
