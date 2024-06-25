@extends('app')

@section('content')
    <div class="p-4 ml-64 bg-[#A7CCED]">
        <div class="mx-10 mb-5 p-8 w-lg bg-[#3a57b4] rounded-md flex justify-center">
            <h1 class="text-2xl text-white font-bold">Form Update Sepatu</h1>
        </div>
        <div class="mx-10 p-8 w-lg bg-[#66a6df] rounded-md">
            <form action="{{ route('product.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label class="text-md font-semibold" for="namabarang">Nama Barang :</label>
                <input class="form-control block my-3 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500" type="text" name="namabarang" id="namabarang" required value="{{ $product->namabarang }}">
                
                <label class="text-md font-semibold" for="kategori_id">Kategori Sepatu :</label>
                <select name="kategori_id" id="kategori_id" class="bg-gray-50 border my-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('kategori_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                
                <label class="text-md font-semibold" for="harga">Harga Sepatu :</label>
                <input class="block my-3 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500" type="number" name="harga" id="harga" required value="{{ $product->harga }}">
                
                <label class="text-md font-semibold" for="ketersediaan">Ketersediaan :</label>
                <select name="ketersediaan" id="ketersediaan" class="bg-gray-50 border my-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    <option value="tersedia" {{ $product->ketersediaan == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="tidak_tersedia" {{ $product->ketersediaan == 'tidak_tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                </select>
                
                <label class="text-md font-semibold" for="stok">Stok Sepatu :</label>
                <input class="block my-3 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500" type="number" name="stok" id="stok" required value="{{ $product->stok }}">
                
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-auto px-5 py-2.5 text-center">Update</button>
                <a href="/tabelbarang" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-auto px-5 py-2.5 text-center">Cancel</a>
            </form>
        </div>
    </div>
@endsection
