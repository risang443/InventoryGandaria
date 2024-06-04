@extends('app')

@section('content')
    <div class="p-4 ml-64 bg-[#A7CCED]">
        <div class="mx-10 mb-5 p-8 w-lg bg-[#3a57b4] rounded-md flex justify-center">
            <h1 class="text-2xl text-white font-bold">Form Pengisian Sepatu Baru</h1>
        </div>
        <div class="mx-10 p-8 w-lg bg-[#66a6df] rounded-md">
            <form action="{{ url('forminsert') }}" method="POST">
                @csrf
                <label class="text-md font-semibold" for="namabarang">Nama Barang :</label>
                <input class="form-control block my-5 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500" type="text" name="namabarang" id="namabarang" required value="{{ old('namabarang') }}">
                
                <label class="text-md font-semibold" for="kategori_id">Kategori Sepatu :</label>
                <select name="kategori_id" id="kategori_id" class="bg-gray-50 border my-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    <option value="">Select a category</option>
                    <option value="1">Sneakers</option>
                    <option value="2">Formal</option>
                    <option value="3">Sport</option>
                    <option value="4">Casual</option>
                </select>
                
                <label class="text-md font-semibold" for="harga">Harga Sepatu :</label>
                <input class="block my-5 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500" type="number" name="harga" id="harga" required>
                
                <label class="text-md font-semibold" for="ketersediaan">Ketersediaan :</label>
                <fieldset class="flex justify-start">
                    <div class="flex items-center mb-4 mr-8">
                      <input id="tersedia" type="radio" name="ketersediaan" value="tersedia" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300" checked>
                      <label for="tersedia" class="block ms-2 text-sm font-medium text-gray-900">Tersedia</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input id="tidak_tersedia" type="radio" name="ketersediaan" value="tidak_tersedia" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300">
                        <label for="tidak_tersedia" class="block ms-2 text-sm font-medium text-gray-900">Tidak Tersedia</label>
                    </div>
                </fieldset>
                
                <label class="text-md font-semibold" for="stok">Stok Sepatu :</label>
                <input class="block my-5 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500" type="number" name="stok" id="stok" required>
                
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-auto px-5 py-2.5 text-center">Submit</button>
            </form>
        </div>
    </div>
@endsection
