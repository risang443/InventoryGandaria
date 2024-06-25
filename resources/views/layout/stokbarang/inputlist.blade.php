@extends('app')

@section('content')

<div class="p-4 ml-64 bg-[#A7CCED]">

    <div class="mx-10 mb-5 p-8 w-lg bg-[#3a57b4] rounded-md flex justify-center">
        <h1 class="text-2xl text-white font-bold">Tabel Input Barang</h1>
    </div>
    <div class="mt-7 mb-4 flex justify-end">
        <a href="/input-barang/create" id="" class="text-white bg-blue-900 hover:bg-green-300 hover:text-black focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-8 py-2.5 me-2 focus:outline-none">Masukan Stok Baru</a>
    </div>
    <div class="relative overflow-x-auto w-full rounded-md">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 rounded-md">
            <thead class="text-md text-white uppercase bg-headline ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Barang
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Supplier
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jumlah
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Input
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
                @foreach ($inputBarang as $item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $item->product->namabarang }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $item->supplier->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->jumlah }}
                    </td>
                    <td class="px-6 py-4">
                        {{ \Carbon\Carbon::parse($item->tanggal_input)->format('d-m-Y') }}
                    </td>
                    <td class="px-6 py-4">
                        @if ($item->fotoInvoiceInput === 'Tidak memiliki Gambar')
                            Tidak memiliki Gambar
                        @elseif ($item->fotoInvoiceInput)
                            <img src="{{ Storage::url($item->fotoInvoiceInput) }}" alt="Gambar Barang" class="w-20 h-20 object-cover">
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
