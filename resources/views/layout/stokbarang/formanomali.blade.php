@extends('app')

@section('content')
    <div class="p-4 ml-64 bg-[#A7CCED]">
        <div class="mx-10 mb-5 p-8 w-lg bg-[#3a57b4] rounded-md flex justify-center">
            <h1 class="text-2xl text-white font-bold">Form OPName Sepatu</h1>
        </div>
        <div class="mx-10 p-8 w-lg bg-[#66a6df] rounded-md">
            <form action="{{ route("opname.store") }}" method="POST">
                @csrf
                <label class="text-sm font-semibold" for="id_barang">Nama Barang :</label>
                <div class="my-3">
                    <input type="text" id="searchInputBarang" class="block text-sm w-full px-4 py-2 bg-white border border-gray-300 rounded-t-lg" placeholder="Search...">
                    <select class="block w-full p-2 text-gray-900 border border-gray-300 rounded-b-lg bg-gray-50 text-sm" name="id_barang" id="id_barang" required>
                        <option class="p-2" value="">Pilih Nama Barang di Search Input</option>
                        @foreach($products as $product)
                            <option class="p-2" value="{{ $product->id }}" data-stok="{{ $product->stok }}">{{ $product->namabarang }}</option>
                        @endforeach
                    </select>
                </div>
                <label class="text-sm font-semibold" for="status">Status Sepatu:</label>
                <select name="status" id="status" class="bg-gray-50 border my-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    <option value="">Pilih Status</option>
                    <option value="rusak">Rusak</option>
                    <option value="hilang">Hilang</option>
                    <option value="lainnya">Lainnya</option>
                </select>

                <label class="text-sm font-semibold" for="stok_awal">Stok Saat Ini :</label>
                <input class="block my-3 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500" type="number" id="stok_awal" readonly>

                <label class="text-sm font-semibold" for="quantity">Jumlah Stok Opname :</label>
                <input class="block my-3 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500" type="number" name="store" id="store" required>
                
                <label class="text-sm font-semibold" for="occurred_at">Tanggal Kejadian :</label>
                <input class="block my-3 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500" type="date" name="occurred_at" id="occurred_at" required>

                <label class="text-sm font-semibold" for="keterangan">Keterangan :</label>
                <textarea class="block my-3 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500" name="keterangan" id="keterangan" required>{{ old('keterangan') }}</textarea>

                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-auto px-5 py-2.5 text-center">Tambahkan</button>
                <a href="/opname" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-auto px-5 py-2.5 text-center">Kembali</a>
            </form>
        </div>
    </div>
    <script>

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
        document.addEventListener('DOMContentLoaded', function () {
            const idBarangSelect = document.getElementById('id_barang');
            const stokAwalInput = document.getElementById('stok_awal');

            idBarangSelect.addEventListener('change', function () {
                const selectedOption = idBarangSelect.options[idBarangSelect.selectedIndex];
                const stok = selectedOption.getAttribute('data-stok');
                stokAwalInput.value = stok ? stok : 'Stok tidak tersedia';
            });
        });
    </script>
@endsection
