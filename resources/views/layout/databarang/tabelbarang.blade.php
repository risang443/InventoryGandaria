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
                            {{$sepatu->ketersedian}}
                        </td>
                        <td class="px-6 py-4">
                            {{$sepatu->stok}}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ url('formupdatebarang/'.$sepatu->id) }}" class="font-sans font-semibold bg-blue-700 text-white p-2 rounded-md">Modifikasi</a>
                        </td>
                    </tr>   
                    @endforeach
                </tbody>
            </table>
</div>
</div>