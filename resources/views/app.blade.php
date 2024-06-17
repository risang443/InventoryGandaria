<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ url('image/sepatu1.jpg') }}">
   <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
   <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <title>Gandaria Sepatu</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-[#A7CCED]">
   <aside id="sidebar-multi-level-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 rounded-md " aria-label="Sidebar">
      <div class="h-full px-3 py-4 overflow-y-auto  bg-[#545E75] dark:bg-gray-800 text-white">
        <h1 class="w-full bg-[#304D6D] p-5 text-center font-bold rounded-md text-2xl mb-5">GANDARIA SEPATU</h1>
    
         <ul class="space-y-2 font-medium">
            <li>
               <a href="/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <i class="fi fi-rr-home text-xl text-white"></i>
                  <span class="ms-3 text-white">Dashboard</span>
               </a>
            </li>
            @if (Auth::user()->role==='superadmin')
            <li>
               <button type="button" class="flex items-center w-full p-2 text-base text-white transition duration-75 rounded-lg group hover:bg-gray-100 hover:text-black" aria-controls="dropdown-1" data-collapse-toggle="dropdown-1">
                  <i class="fi fi-rr-folder text-xl text-white"></i>
                
                     <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-white hover:text-black">Data Sepatu</span>
                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                     </svg>
               </button>
               <ul id="dropdown-1" class="hidden py-2 space-y-2">
                     <li>
                        <a href="/tabelbarang" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 hover:text-black">Table Barang</a>
                     </li>
                     <li>
                      <a href="/forminsert" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 hover:text-black">Pemasukan Barang Baru</a>
                   </li>
                  
               </ul>
            </li>
            @endif
            <li>
             <button type="button" class="flex items-center w-full p-2 text-base text-white transition duration-75 rounded-lg group hover:bg-gray-100 hover:text-black" aria-controls="dropdown-2" data-collapse-toggle="dropdown-2">
               <i class="fi fi-rr-receipt text-xl text-white"></i>
                
                   <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-white hover:text-black">Stok Sepatu</span>
                   <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                   </svg>
             </button>
             <ul id="dropdown-2" class="hidden py-2 space-y-2">
                   <li>
                      <a href="/stok" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 hover:text-black">Edit Stok Barang</a>
                   </li>
                   
                   <li>
                      <a href="/opname" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 hover:text-black">Laporan Anomali Barang</a>
                   </li>
             </ul>
          </li>
            
            <li>
               
               <a href="/logout" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <i class="fi fi-rr-circle-user text-xl text-white"></i>
                  <span class="flex-1 ms-3 whitespace-nowrap text-white">Log Out</span>
               </a>


            </li>
            
         </ul>
      </div>
    </aside>
<div > 
   @yield('content') 
</div>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
{{-- Isi End --}}
</body>
</html>