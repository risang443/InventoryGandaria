@extends('app')

@section('content')
<div class="p-4 ml-64 bg-[#A7CCED]">
    <div class="mx-10 mb-5 p-8 w-lg bg-[#3a57b4] rounded-md flex justify-center">
        <h1 class="text-2xl text-white font-bold">Edit OPName Sepatu</h1>
    </div>
    <div class="mx-10 p-8 w-lg bg-[#66a6df] rounded-md">
        <form action="{{ route('opname.update', $anomalies->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label class="text-sm font-semibold" for="id_barang">Nama Barang :</label>
            <div class="my-3">
                <input type="text" id="searchInputBarang" class="block text-sm w-full px-4 py-2 bg-white border border-gray-300 rounded-t-lg" placeholder="Cari Barang Disini......">
                <select class="block w-full p-2 text-gray-900 border border-gray-300 rounded-b-lg bg-gray-50 text-sm" name="id_barang" id="id_barang" required>
                    <option class="p-2" value="">Pilih Nama Barang di Search Input</option>
                    @foreach($products as $product)
                        <option class="p-2" value="{{ $product->id }}" data-stok="{{ $product->stok }}" {{ $anomalies->id_barang == $product->id ? 'selected' : '' }}>
                            {{ $product->namabarang }}
                        </option>
                    @endforeach
                </select>
            </div>

            <label class="text-sm font-semibold" for="status">Status Anomali :</label>
            <select name="status" id="status" class="bg-gray-50 border my-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                <option value="">Pilih Status</option>
                <option value="rusak" {{ $anomalies->status == 'rusak' ? 'selected' : '' }}>Rusak</option>
                <option value="hilang" {{ $anomalies->status == 'hilang' ? 'selected' : '' }}>Hilang</option>
                <option value="lainnya" {{ $anomalies->status == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>

            <label class="text-sm font-semibold" for="stok">Stok Saat Ini :</label>
            <input class="block my-3 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500" type="number" id="stok" readonly value="{{ $product->stok }}">

            <label class="text-sm font-semibold" for="quantity">Jumlah Dikurangi :</label>
            <input class="block my-3 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500" type="number" name="store" id="store" value="{{ $anomalies->store }}" required>

            <label class="text-sm font-semibold" for="occurred_at">Tanggal Kejadian :</label>
            <input class="block my-3 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500" type="date" name="occurred_at" id="occurred_at" value="{{ $anomalies->occurred_at }}" required>

            <label class="text-sm font-semibold" for="keterangan">Keterangan :</label>
            <textarea class="block my-3 h-40 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500" name="keterangan" id="keterangan" required>{{ $anomalies->keterangan }}</textarea>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-auto px-5 py-2.5 text-center">Update</button>
            <a href="{{ route('opname.index') }}" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-auto px-5 py-2.5 text-center">Cancel</a>
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
</script>
@endsection
