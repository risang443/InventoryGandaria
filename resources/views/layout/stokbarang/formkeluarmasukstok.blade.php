@extends('app')
@section('content')
<div class="p-4 ml-64 bg-[#A7CCED]">

    <div class="mx-10 mb-5 p-8 w-lg bg-[#3a57b4] rounded-md flex justify-center">
        <h1 class="text-2xl text-white font-bold">Form Keluar Masuk Stok Barang</h1>
    </div>
    <div class="mx-10 p-8 w-lg bg-[#66a6df] rounded-md">
        <form action="POST">
            <label class="text-md font-semibold" for="ketesediaan">Pilih fungsi :</label>
            <fieldset class="flex justify-start mt-4">
                <div class="flex items-center mb-4 mr-8">
                  <input id="masuk" type="radio" name="masuk" value="masuk" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300" checked>
                  <label for="tersedia" class="block ms-2  text-sm font-medium text-gray-900">
                    Tambah Stok Barang
                  </label>
                </div>

                <div class="flex items-center mb-4">
                    <input id="keluar" type="radio" name="keluar" value="keluar" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300">
                    <label for="notersedias" class="block ms-2  text-sm font-medium text-gray-900">
                      Kurang Stok Barang
                    </label>
                  </div>
            </fieldset>

            <label class="text-md font-semibold" for="namabarang">ID Barang :</label>
            <input class="block my-5 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 " type="text" name="namabarang" id="namabarang">

            <label class="text-md font-semibold" for="namabarang">Nama Barang :</label>
            <input class="block my-5 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 " type="text" name="namabarang" id="namabarang">
            <label class="text-md font-semibold" for="Kategori">Kategori Sepatu :</label>
            <select id="countries" class="bg-gray-50 border my-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option></option>
                <option>Sneakers</option>
                <option>Formal</option>
                <option>Sport</option>
                <option>Casual</option>
              </select>
            
            <label class="text-md font-semibold" for="namabarang">Stok Sepatu Lama :</label>
            <input class="block my-5 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 " type="number" name="stok" id="stok" disabled>

            <label class="text-md font-semibold" for="namabarang">Stok Sepatu Baru :</label>
            <input class="block my-5 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 " type="number" name="stok" id="stok">
            
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-auto px-5 py-2.5 text-center">Submit</button>
        </form>
    </div>
</div>
@endsection