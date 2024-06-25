@extends('app')

@section('content')

<div class="p-4 ml-64 bg-[#A7CCED]">
    <div class="mx-10 mb-5 p-8 w-lg bg-[#3a57b4] rounded-md flex justify-center">
        <h1 class="text-2xl text-white font-bold">Data Customer Sepatu</h1>
    </div>
    <div class="mt-7 mb-4 flex justify-end">
        <a href="{{route('customer.create')}}" id="" class="text-white bg-blue-900 hover:bg-green-300 hover:text-black focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-8 py-2.5 me-2 focus:outline-none">Input Data Costumer</a>
    </div>
    <div class="relative overflow-x-auto w-full rounded-md">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 rounded-md">
            <thead class="text-md text-white uppercase bg-headline">
                <tr>
                    <th scope="col" class="px-6 py-3">Nama Customer</th>
                    <th scope="col" class="px-6 py-3">No. Telepon</th>
                    <th scope="col" class="px-6 py-3">Alamat</th>
                </tr>
            </thead>
            <tbody class="text-black font-medium">
                @foreach ($customers as $customer)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $customer->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $customer->notelp }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $customer->alamat }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    var msg = '{{ Session::get('alert') }}';
    var exist = '{{ Session::has('alert') }}';
    if (exist) {
        alert(msg);
    }
</script>

@endsection
