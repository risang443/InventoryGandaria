@extends('app')

@section('content')

<div class="p-4 sm:ml-64 bg-[#A7CCED]">
    {{-- Hero Dashboard Start--}}
    <div class="p-4 border-l-cyan-200 bg-[#63ADF2] rounded-md">
        <div class="flex flex-wrap justify-start items-center font-sans text-white ">
            <h1 class="text-5xl flex w-full mb-3 font-bold">GANDARIAN SEPATU</h1>
            <p class="text-2xl flex w-full mb-2 font-medium">Selamat Datang di Dashboard Aplikasi Inventory Gandaria Sepatu</p>
            <p class="text-2xl flex font-medium">Aplikasi ini dapat membantu anda untuk mendapatkan informasi terhadap situasi stok sepatu yang akan dijual</p>
        </div>
    </div>
<hr class="h-2 my-8 bg-[#82A0BC] border-0 ">

    {{-- Hero Dashboard End --}}
    <div class="grid grid-cols-2 grid-rows-2 gap-12 px-8 mt-8 ">
        <div class="flex items-center bg-white border rounded-md overflow-hidden shadow">
            <div class="p-4 bg-green-400">
                <i class="fi fi-rr-boot text-5xl text-white"></i>
            </div>
            <div class="px-4 text-gray-700">
                <h3 class="text-sm tracking-wider">Jumlah Sepatu yang ada :</h3>
                <p class="text-3xl">{{ $totalStock }}</p>
            </div>
        </div>
        <div class="flex items-center bg-white border rounded-md overflow-hidden shadow">
            <div class="p-4 bg-blue-400">
                <i class="fi fi-rr-shoe-prints text-5xl text-white"></i>
            </div>
            <div class="px-4 text-gray-700">
                <h3 class="text-sm tracking-wider">Jumlah Jenis Sepatu :</h3>
                <p class="text-3xl">{{ $totalJenisSepatu }}</p>
            </div>
        </div>
        <div class="flex items-center bg-white border rounded-md overflow-hidden shadow">
            <div class="p-4 bg-indigo-400">
                <i class="fi fi-rr-arrow-to-bottom text-5xl text-white"></i>
            </div>
            <div class="px-4 text-gray-700">
                <h3 class="text-sm tracking-wider">Sepatu Yang Hampir Habis :</h3>
                <p class="text-3xl">{{ $almostOutOfStock }}</p>
            </div>
        </div>
        <div class="flex items-center bg-white border rounded-md overflow-hidden shadow">
            <div class="p-4 bg-red-400">
                <i class="fi fi-rr-light-emergency-on text-5xl text-white"></i>
            </div>
            <div class="px-4 text-gray-700">
                <h3 class="text-sm tracking-wider ">Sepatu Kehabisan Stok :</h3>
                <p class="text-3xl">{{ $outOfStock }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
