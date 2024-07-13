@extends('app')
@section('content')

<div class="p-4 ml-64 bg-[#A7CCED]">
    <div class="mx-10 mb-2 p-8 w-lg bg-[#3a57b4] rounded-md flex justify-center items-center">
        <h1 class="text-2xl text-white font-bold">Stok OPName</h1>
    </div>
    <div class="flex justify-end mb-3">
        <div class="mt-7 mb-2 flex">
            <a href="{{ route('opname.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 me-2 focus:outline-none">Lapor OPName Baru</a>
        </div>
    </div>
    
    <div class="relative overflow-x-auto w-full rounded-md">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 rounded-md">
            <thead class="text-md text-white uppercase bg-headline">
                <tr>
                    <th scope="col" class="px-6 py-3">Nama Sepatu</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Jumlah</th>
                    <th scope="col" class="px-6 py-3">Tanggal Kejadian</th>
                    <th scope="col" class="px-6 py-3">Keterangan</th>
                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($opnames as $opname)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $opname->product->namabarang }}
                        </th>
                        <td class=" text-gray-900 px-6 py-4">@if($opname->status === 'rusak')
                            Rusak
                        @elseif($opname->status === 'hilang')
                            Hilang
                        @else
                            Butuh Penjelasan
                        @endif</td>
                        <td class=" text-gray-900 px-6 py-4">{{ $opname->store }}</td>
                        <td class="text-gray-900 px-6 py-4">{{ $opname->occurred_at }}</td>
                        <td class=" text-gray-900 px-6 py-4">{{ $opname->keterangan }}</td>
                        <td class="text-gray-900 px-6 py-4">
                            <a href="{{ route('opname.edit', $opname->id) }}" class="font-sans font-semibold bg-blue-700 text-white p-2  rounded-md">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
