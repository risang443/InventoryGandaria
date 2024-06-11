@extends('app')

@section('content')
    <div class="p-4 ml-64 bg-[#A7CCED]">
        <div class="mx-10 mb-5 p-8 w-lg bg-[#3a57b4] rounded-md flex justify-center">
            <h1 class="text-2xl text-white font-bold">Form Lapor Anomali Barang</h1>
        </div>
        <div class="mx-10 p-8 w-lg bg-[#66a6df] rounded-md">
            <form action="{{ url('anomali/store') }}" method="POST">
                @csrf
                <label class="text-md font-semibold" for="id_barang">Nama Barang :</label>
                <select name="id_barang" id="id_barang" class="bg-gray-50 border my-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    <option value="">Pilih Barang</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->namabarang }}</option>
                    @endforeach
                </select>

                <label class="text-md font-semibold" for="status">Status Anomali :</label>
                <select name="status" id="status" class="bg-gray-50 border my-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    <option value="">Pilih Status</option>
                    <option value="rusak">Rusak</option>
                    <option value="hilang">Hilang</option>
                    <option value="lainnya">Lainnya</option>
                </select>

                <label class="text-md font-semibold" for="quantity">Quantity :</label>
                <input class="block my-5 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500" type="number" name="quantity" id="quantity" required>
                
                <label class="text-md font-semibold" for="occurred_at">Tanggal Kejadian :</label>
                <input class="block my-5 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500" type="date" name="occurred_at" id="occurred_at" required>

                <label class="text-md font-semibold" for="keterangan">Keterangan :</label>
                <textarea class="block my-5 w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500" name="keterangan" id="keterangan" required>{{ old('keterangan') }}</textarea>

                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-auto px-5 py-2.5 text-center">Submit</button>
            </form>
        </div>
    </div>
@endsection
