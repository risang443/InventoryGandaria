@extends('app')

@section('content')

<div class="p-4 ml-64 bg-[#A7CCED]">

    <div class="mx-10 mb-5 p-8 w-lg bg-[#3a57b4] rounded-md flex justify-center">
        <h1 class="text-2xl text-white font-bold">Tabel Output Barang</h1>
    </div>
    <div class="mt-7 mb-4 flex justify-end">
        <a href="/output-barang/create" class="text-white bg-blue-700 hover:text-gray-900 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 me-2 focus:outline-none">Keluar Stok Barang</a>
    </div>
    <div class="relative overflow-x-auto w-full rounded-md">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 rounded-md">
            <thead class="text-md text-white uppercase bg-headline">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Barang
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Customer
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jumlah
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Output
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Bukti Invoice
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Keterangan
                    </th>

                </tr>
            </thead>
            <tbody class="text-black font-medium">
                @foreach ($outputBarang as $item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $item->product->namabarang }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->customer->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->jumlah }}
                    </td>
                    <td class="px-6 py-4">
                        {{ \Carbon\Carbon::parse($item->tanggal_output)->format('d-m-Y') }}
                    </td>
                    <td class="px-6 py-4">
                        @if ($item->fotoInvoiceOutput === 'Tidak memiliki Gambar')
                            Tidak memiliki Gambar
                        @elseif ($item->fotoInvoiceOutput)
                            <img src="{{ asset('storage/' . $item->fotoInvoiceOutput) }}" alt="Gambar Barang" class="w-20 h-20 object-cover">
                        @else
                            Tidak ada gambar
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->keterangan }}
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

    var msg = '{{ Session::get('alert') }}';
    var exist = '{{ Session::has('alert') }}';
    if (exist) {
        alert(msg);
    }
</script>
@endsection
