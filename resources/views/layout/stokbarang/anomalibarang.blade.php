
@extends('app')
@section('content')

<div class="p-4 ml-64 bg-[#A7CCED]">
    <div class="mx-10 mb-5 p-8 w-lg bg-[#3a57b4] rounded-md flex justify-center items-center">
        <h1 class="text-2xl text-white font-bold">Laporan Anomali Barang</h1>
    </div>
    <div class="mt-7 mb-2 flex justify-end"><a href="{{ route('anomali.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 focus:outline-none">Lapor Anomali Barang</a>
    </div>
    
    <div class="relative overflow-x-auto w-full rounded-md">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 rounded-md">
            <thead class="text-md text-white uppercase bg-headline">
                <tr>
                    <th scope="col" class="px-6 py-3">Nama Barang</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Quantity</th>
                    <th scope="col" class="px-6 py-3">Tanggal Kejadian</th>
                    <th scope="col" class="px-6 py-3">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($opnames as $opname)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $opname->product->namabarang }}
                        </th>
                        <td class="px-6 py-4">@if($opname->status === 'rusak')
                            Rusak
                        @elseif($opname->status === 'hilang')
                            Hilang
                        @else
                            Butuh Penjelasan
                        @endif</td>
                        <td class="px-6 py-4">{{ $opname->quantity }}</td>
                        <td class="px-6 py-4">{{ $opname->occurred_at }}</td>
                        <td class="px-6 py-4">{{ $opname->keterangan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
