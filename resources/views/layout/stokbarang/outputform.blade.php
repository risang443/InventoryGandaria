@extends('app')

@section('content')
    <div class="p-4 ml-64 bg-[#A7CCED]">
        <div class="mx-10 mb-5 p-8 w-lg bg-[#3a57b4] rounded-md flex justify-center">
            <h1 class="text-2xl text-white font-bold">Form Pengisian Output Barang</h1>
        </div>
        <div class="mx-10 p-8 w-lg bg-[#66a6df] rounded-md">
            <form action="{{ route('output-barang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="text-md font-semibold" for="id_barang">Nama Barang :</label>
                <div class="my-3">
                    <input type="text" id="searchInputBarang" class="block w-full px-4 py-2 bg-white border border-gray-300 rounded-t-lg" placeholder="Search...">
                    <select class="block w-full p-2 text-gray-900 border border-gray-300 rounded-b-lg bg-gray-50 text-base" name="id_barang" id="id_barang" required>
                        <option class="p-2" value="">Pilih Nama Barang di Search Input</option>
                        @foreach($products as $product)
                            <option class="p-2" value="{{ $product->id }}" data-stok="{{ $product->stok }}">{{ $product->namabarang }}</option>
                        @endforeach
                    </select>
                </div>
                
                <label class="text-md font-semibold" for="costumers_id">Nama Customer :</label>
                <div class="my-3">
                    <input type="text" id="searchInputCustomer" class="block w-full px-4 py-2 bg-white border border-gray-300 rounded-t-lg" placeholder="Search...">
                    <select class="block w-full p-2 text-gray-900 border border-gray-300 rounded-b-lg bg-gray-50 text-base" name="costumers_id" id="costumers_id" required>
                        <option value="">Pilih Customer di Search Input</option>
                        @foreach($costumers as $costumer)
                            <option value="{{ $costumer->id }}">{{ $costumer->name }}</option>
                        @endforeach
                    </select>
                </div>

                <label class="text-md font-semibold" for="stok">Stok Saat Ini :</label>
                <input class="block my-3 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500" type="text" id="stok" readonly>

                <label class="text-md font-semibold" for="jumlah">Jumlah :</label>
                <input class="block my-3 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500" type="number" name="jumlah" id="jumlah" required value="{{ old('jumlah') }}">
                
                <label class="text-md font-semibold" for="tanggal_output">Tanggal Output :</label>
                <input class="block my-3 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500" type="date" name="tanggal_output" id="tanggal_output" required value="{{ old('tanggal_output') }}">

                <label class="text-md font-semibold" for="fotoInvoiceOutput">Upload Invoice :</label>
                <input class="block my-3 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500" type="file" name="fotoInvoiceOutput" id="fotoInvoiceOutput" accept="image/*">

                <label class="text-md font-semibold" for="keterangan">Keterangan :</label>
                <textarea class="block my-3 h-40 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500" name="keterangan" id="keterangan" required>{{ old('keterangan') }}</textarea>
                
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-auto px-5 py-2.5 text-center">Submit</button>
                <a href="/outputbarang" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-auto px-5 py-2.5 text-center">Cancel</a>
            </form>
        </div>
    </div>
    
    <script>
        // Search functionality for Nama Barang
        const searchInputBarang = document.getElementById('searchInputBarang');
        const selectInputBarang = document.getElementById('id_barang');

        searchInputBarang.addEventListener('input', function() {
            const filter = searchInputBarang.value.toLowerCase();
            const options = selectInputBarang.options;

            for (let i = 0; i < options.length; i++) {
                const option = options[i];
                const text = option.text.toLowerCase();

                if (text.indexOf(filter) > -1) {
                    option.style.display = '';
                } else {
                    option.style.display = 'none';
                }
            }
        });

        // Update stok based on selected Nama Barang
        document.addEventListener('DOMContentLoaded', function () {
            const idBarangSelect = document.getElementById('id_barang');
            const stokInput = document.getElementById('stok');

            idBarangSelect.addEventListener('change', function () {
                const selectedOption = idBarangSelect.options[idBarangSelect.selectedIndex];
                const stok = selectedOption.getAttribute('data-stok');
                stokInput.value = stok ? stok : 'Stok tidak tersedia';
            });
        });

        // Search functionality for Nama Customer
        const searchInputCustomer = document.getElementById('searchInputCustomer');
        const selectInputCustomer = document.getElementById('costumers_id');

        searchInputCustomer.addEventListener('input', function() {
            const filter = searchInputCustomer.value.toLowerCase();
            const options = selectInputCustomer.options;

            for (let i = 0; i < options.length; i++) {
                const option = options[i];
                const text = option.text.toLowerCase();

                if (text.indexOf(filter) > -1) {
                    option.style.display = '';
                } else {
                    option.style.display = 'none';
                }
            }
        });
    </script>
@endsection
