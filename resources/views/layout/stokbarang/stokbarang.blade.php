@extends('app')
@section('content')
<div class="p-4 ml-64 bg-[#A7CCED]">

    <div class="mx-10 mb-5 p-8 w-lg bg-[#3a57b4] rounded-md flex justify-center">
        <h1 class="text-2xl text-white font-bold">Tabel Gandaria Sepatu</h1>
    </div>
    <div class="mt-7 mb-2 flex justify-end">
        <a href="{{ route('export.transactions.pdf') }}" id="printBtn" class="text-white bg-green-500 hover:bg-green-300 hover:text-black focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 focus:outline-none">Print Data Stok Barang</a>
    </div>
        <div class="relative overflow-x-auto w-full rounded-md">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 rounded-md">
                <thead class="text-md text-white uppercase bg-headline ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama Sepatu
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kategori
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Harga Sepatu
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ketersediaan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Stok Tersedia
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barang as $sepatu)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$sepatu->namabarang}}
                        </th>
                        
                        <td class="px-6 py-4">
                            {{$sepatu->kategori->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$sepatu->harga}}
                        </td>
                        <td class="px-6 py-4">
                            {{ $sepatu->ketersediaan == 'tersedia' ? 'Tersedia' : 'Tidak Tersedia' }}
                        </td>
                        <td class="px-6 py-4">
                            {{$sepatu->stok}}
                        </td>
                        <td class="px-6 py-4">
                           <!-- Tombol untuk Menambah Stok -->
                            <form action="{{ route('addStock') }}" method="POST" class="inline-block">
                                @csrf
                                <input type="hidden" name="id_barang" value="{{ $sepatu->id }}">
                                <input type="hidden" name="tipe" value="masuk">
                                <input type="number" name="stok" class="w-20 p-1 rounded-md mr-2" min="1" placeholder="-">
                                <button type="submit" class="font-sans font-semibold bg-green-700 text-white p-2 rounded-md mr-2">Tambah Stok</button>
                            </form>
                            
                            <!-- Tombol untuk Mengurangi Stok -->
                            <form action="{{ route('reduceStock') }}" method="POST" class="inline-block">
                                @csrf
                                <input type="hidden" name="id_barang" value="{{ $sepatu->id }}">
                                <input type="hidden" name="tipe" value="keluar">
                                <input type="number" name="stok" class="w-20 p-1 rounded-md mr-2" min="1" placeholder="-">
                                <button type="submit" class="font-sans font-semibold bg-red-700 text-white p-2 rounded-md">Kurangi Stok</button>
                            </form>
                        </td>
                    </tr>   
                    @endforeach
                </tbody>
            </table>
</div>
</div>
</div>

@if (session('success'))
<script>
    alert('{{ session('success') }}');
</script>
@endif

@if (session('error'))
<script>
    alert('{{ session('error') }}');
</script>
@endif
@endsection