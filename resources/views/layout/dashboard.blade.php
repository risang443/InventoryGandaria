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
            <div class="p-4 bg-green-400"><?xml version="1.0" encoding="UTF-8"?>
                <svg class="h-12 w-12 tex" fill="#FFFF" enable-background="new 0 0 462.68 462.68" fill="none" version="1.1" viewBox="0 0 462.68 462.68" xmlns="http://www.w3.org/2000/svg" >
                <path d="m454.68 383.82v-30.546c0-12.481-7.382-23.769-18.807-28.756-37.15-16.212-70.676-43.134-94.401-75.807-25.378-34.948-38.792-74.831-38.792-115.34 0-10.408 0.799-20.936 2.374-31.29 1.78-11.708-3.017-23.288-12.519-30.222l-89.814-65.541c-5.072-3.701-11.279-5.207-17.481-4.235-6.202 0.969-11.655 4.295-15.355 9.366l-120.31 164.88c-2.568-1.039-5.371-1.385-8.177-0.947-4.091 0.64-7.688 2.833-10.128 6.178l-28.296 38.778c-5.037 6.904-3.519 16.619 3.385 21.657l272.68 198.98c17.834 13.015 38.931 19.894 61.01 19.894h107.13c8.547 0 15.5-6.953 15.5-15.5v-48c0-5.826-3.235-10.907-8-13.554zm-272.68-363.53c1.339-1.834 3.311-3.038 5.554-3.388 2.24-0.355 4.487 0.192 6.323 1.532l89.815 65.542c4.965 3.622 7.467 9.695 6.53 15.849-1.688 11.099-2.544 22.385-2.544 33.546 0 8.609 0.568 17.188 1.675 25.702l-23.547 7.849c-3.93 1.311-6.053 5.558-4.743 9.487 1.048 3.143 3.975 5.13 7.114 5.13 0.786 0 1.586-0.125 2.373-0.387l21.317-7.106c1.211 5.84 2.691 11.637 4.417 17.382l-22.478 7.493c-3.93 1.311-6.053 5.558-4.743 9.487 1.048 3.143 3.975 5.13 7.114 5.13 0.786 0 1.586-0.125 2.373-0.387l22.555-7.519c2.116 5.563 4.484 11.063 7.085 16.493l-23.134 7.711c-3.929 1.31-6.053 5.558-4.743 9.487 1.048 3.143 3.974 5.13 7.114 5.13 0.786 0 1.586-0.125 2.373-0.387l25.416-8.472c2.997 5.293 6.235 10.502 9.702 15.62l-25.612 8.538c-3.93 1.31-6.053 5.558-4.743 9.487 1.048 3.143 3.974 5.13 7.114 5.13 0.786 0 1.586-0.125 2.373-0.387l27.5-9.167c0.868-0.289 1.642-0.729 2.316-1.27 24.923 32.081 58.753 58.456 96.004 74.713 5.958 2.601 9.808 8.491 9.808 15.008v28.601h-99.632c-5.227 0-10.221-1.628-14.442-4.709l-263.63-192.38 120.02-164.49zm265.68 425.08c5.6843e-14 0.275-0.225 0.5-0.5 0.5h-107.13c-18.879 0-36.918-5.882-52.168-17.011l-272.68-198.98c-0.223-0.162-0.271-0.476-0.109-0.698l28.296-38.778c0.03-0.041 0.122-0.168 0.327-0.199 0.029-5e-3 0.058-7e-3 0.084-7e-3 0.154 0 0.251 0.07 0.287 0.097l272.68 198.98c6.807 4.967 14.858 7.592 23.284 7.592h107.13c0.275 0 0.5 0.225 0.5 0.5v47.999z"/>
                </svg>
                
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width=""
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                    </path>
                </svg></div>
            <div class="px-4 text-gray-700">
                <h3 class="text-sm tracking-wider">Jumlah Sepatu yang ada :</h3>
                <p class="text-3xl">12,768</p>
            </div>
        </div>
        <div class="flex items-center bg-white border rounded-md overflow-hidden shadow">
            <div class="p-4 bg-blue-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2">
                    </path>
                </svg></div>
            <div class="px-4 text-gray-700">
                <h3 class="text-sm tracking-wider">Jumlah Jenis Sepatu :</h3>
                <p class="text-3xl">39,265</p>
            </div>
        </div>
        <div class="flex items-center bg-white border rounded-md overflow-hidden shadow">
            <div class="p-4 bg-indigo-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z">
                    </path>
                </svg></div>
            <div class="px-4 text-gray-700">
                <h3 class="text-sm tracking-wider">Sepatu Yang Hampir Habis :</h3>
                <p class="text-3xl">142,334</p>
            </div>
        </div>
        <div class="flex items-center bg-white border rounded-md overflow-hidden shadow">
            <div class="p-4 bg-red-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4">
                    </path>
                </svg></div>
            <div class="px-4 text-gray-700">
                <h3 class="text-sm tracking-wider">Sepatu Kehabisan Stok :</h3>
                <p class="text-3xl">34.12%</p>
            </div>
        </div>
    </div>
 </div>
@endsection
