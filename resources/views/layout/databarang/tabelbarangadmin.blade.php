@extends('app')
@section('content')

<div class="p-4 ml-64 bg-[#A7CCED]">

    <div class="mx-10 mb-5 p-8 w-lg bg-[#3a57b4] rounded-md flex justify-center">
        <h1 class="text-2xl text-white font-bold">Tabel Gandaria Sepatu</h1>
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
                    </tr>
                </thead>
                <tbody class="text-black font-medium">
                    @foreach ($barang as $sepatu)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$sepatu->namabarang}}
                        </th>
                        
                        <td class="px-6 py-4">
                            {{$sepatu->kategori->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{ 'Rp ' . number_format($sepatu->harga, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $sepatu->ketersediaan == 'tersedia' ? 'Tersedia' : 'Tidak Tersedia' }}
                        </td>
                        <td class="px-6 py-4">
                            {{$sepatu->stok}}
                        </td>
                    </tr>   
                    @endforeach
                </tbody>
            </table>
</div>
</div>

<script>
    document.getElementById('printBtn').addEventListener('click', function(event) {
        event.preventDefault();
        var userConfirmed = confirm("Apakah anda ingin mencetak data ini?");
        if (userConfirmed) {
            window.location.href = this.href;
        }
    });

    var msg = '{{ Session::get('alert') }}';
    var exist = '{{ Session::has('alert') }}';
    if (exist) {
        alert(msg);
    }
</script>
@endsection
