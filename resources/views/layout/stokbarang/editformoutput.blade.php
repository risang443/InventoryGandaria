@extends('app')

@section('content')
<div class="p-4 ml-64 bg-[#A7CCED]">
    <div class="mx-10 mb-5 p-8 w-lg bg-[#3a57b4] rounded-md flex justify-center">
        <h1 class="text-2xl text-white font-bold">Pengubahan Data Keluar Stok Barang</h1>
    </div>
    <div class="mx-10 p-8 w-lg bg-[#66a6df] rounded-md">
        <form action="{{ route('output-barang.update', $outputBarang->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label class="text-sm font-semibold" for="id_barang">Nama Barang :</label>
            <div class="my-3">
                <input type="text" id="searchOutputBarang" class="block w-full text-sm px-4 py-2 bg-white border border-gray-300 rounded-t-lg" placeholder="Cari Barang Disini......">
                <select class="block w-full p-2 text-gray-900 border border-gray-300 rounded-b-lg bg-gray-50 text-sm" name="id_barang" id="id_barang" required>
                    <option class="p-2" value="">Pilih Nama Barang di Search Input</option>
                    @foreach($products as $product)
                        <option class="p-2" value="{{ $product->id }}" data-stok="{{ $product->stok }}" {{ $outputBarang->id_barang == $product->id ? 'selected' : '' }}>
                            {{ $product->namabarang }}
                        </option>
                    @endforeach
                </select>
            </div>

            <label class="text-sm font-semibold" for="customers_id">Customer ID :</label>
            <div class="my-3">
                <input type="text" id="searchInputCustomer" class="block w-full text-sm px-4 py-2 bg-white border border-gray-300 rounded-t-lg" placeholder="Cari Customer Disini.....">
                <select class="block w-full p-2 text-gray-900 border border-gray-300 rounded-b-lg bg-gray-50 text-sm" name="costumers_id" id="costumers_id" required>
                    <option value="">Pilih Customer di Search Input</option>
                    @foreach($costumers as $costumer)
                        <option value="{{ $costumer->id }}" {{ $outputBarang->costumers_id == $costumer->id ? 'selected' : '' }}>
                            {{ $costumer->name}}
                        </option>
                    @endforeach
                </select>
            </div>

            <label class="text-sm font-semibold" for="stok">Stok Saat ini :</label>
            <input class="block my-3 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500" type="text" id="stok" readonly value="{{ $product->stok }}">

            <label class="text-sm font-semibold" for="jumlah">Jumlah Stok yang di Keluarkan :</label>
            <input class="block my-3 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500" type="number" name="store" id="store" value="{{ $outputBarang->store }}" required>

            <label class="text-sm font-semibold" for="tanggal_output">Tanggal Output :</label>
            <input class="block my-3 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500" type="date" name="tanggal_output" id="tanggal_output" value="{{ $outputBarang->tanggal_output }}" required>

            <label class="text-sm font-semibold" for="fotoInvoiceOutput">Upload Gambar :</label>
            <input class="block my-3 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500" type="file" name="fotoInvoiceOutput" id="fotoInvoiceOutput" accept="image/*">
            @if($outputBarang->fotoInvoiceOutput && $outputBarang->fotoInvoiceOutput != 'Tidak memiliki Gambar')
                <p class="text-sm font-semibold mb-3">Current Image:</p>
                <img src="{{ asset('storage/' . $outputBarang->fotoInvoiceOutput) }}" alt="Invoice Image" width="200">
            @endif

            <label class="text-sm font-semibold" for="keterangan">Keterangan :</label>
            <textarea class="block my-3 h-40 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500" name="keterangan" id="keterangan" required>{{ $outputBarang->keterangan }}</textarea>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-auto px-5 py-2.5 text-center">Update</button>
            <a href="{{ route('output-barang.index') }}" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-auto px-5 py-2.5 text-center">Kembali</a>
        </form>
    </div>
</div>

<script>
    // Search functionality for Nama Barang
    const searchOutputBarang = document.getElementById('searchOutputBarang');
    const selectOutputBarang = document.getElementById('id_barang');

    searchOutputBarang.addEventListener('input', function() {
        const filter = searchOutputBarang.value.toLowerCase();
        const options = selectOutputBarang.options;

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

    // Search functionality for Customer ID
    const searchInputCustomer = document.getElementById('searchInputCustomer');
    const selectInputCustomer = document.getElementById('customers_id');

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
