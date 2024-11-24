@extends('layouts.user')
@section('title', 'Sewa Mobil')

@section('contents')
    <html>
    <head>
        <title>
            Car Rental
        </title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    </head>

    
        <div class="container mx-auto mt-8 flex">
            <div class="w-1/2 text-center">
                <img alt="Image of a silver Alphard car" class="mx-auto" height="300"
                    src="https://storage.googleapis.com/a1aa/image/LoONu54Y9WKZMlmPFu5aTHOkUflhe46fpYwz3Wdgb34rfFJPB.jpg"
                    width="400" />
                <h2 class="text-2xl font-bold mt-4">
                    Alphard
                </h2>
                <p class="text-lg">
                    Rp 900.000,00/day
                </p>
                <div class="flex justify-center space-x-4 mt-2">
                    <div class="flex items-center space-x-1">
                        <i class="fas fa-gas-pump">
                        </i>
                        <span>
                            Bensin
                        </span>
                    </div>
                    <div class="flex items-center space-x-1">
                        <i class="fas fa-user-friends">
                        </i>
                        <span>
                            4 Seats
                        </span>
                    </div>
                    <div class="flex items-center space-x-1">
                        <i class="fas fa-calendar-alt">
                        </i>
                        <span>
                            2020
                        </span>
                    </div>
                </div>
            </div>
            <div class="w-1/2 bg-gray-200 p-8 rounded-lg">
                <h2 class="text-xl font-bold mb-4">
                    Lengkapi Form Rental Berikut!
                </h2>
                <form>
                    <div class="mb-4">
                        <label class="block text-gray-700">
                            Nama Penyewa
                        </label>
                        <input class="w-full p-2 border border-gray-300 rounded" placeholder="Nama..." type="text" />
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">
                            Alamat
                        </label>
                        <input class="w-full p-2 border border-gray-300 rounded" placeholder="Jl. Setia Budi No.xx"
                            type="text" />
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">
                            Nomor HP
                        </label>
                        <input class="w-full p-2 border border-gray-300 rounded" placeholder="Nomor HP..." type="text" />
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">
                            Nama Mobil
                        </label>
                        <input class="w-full p-2 border border-gray-300 rounded"  placeholder="Alpard"type="text"
                            />
                    </div>
                    {{-- <div class="mb-4">
                        <label class="block text-gray-700">
                            Tanggal Mulai
                        </label>
                        <input class="w-full p-2 border border-gray-300 rounded" placeholder="mm/dd/yyyy" type="text" />
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">
                            Tanggal Selesai
                        </label>
                        <input class="w-full p-2 border border-gray-300 rounded" placeholder="mm/dd/yyyy" type="text" />
                    </div> --}}
                    <div class="mb-4">
                        <label for="tanggal_mulai" class="block text-gray-700">
                            Tanggal Mulai
                        </label>
                        <input id="tanggal_mulai" class="w-full p-2 border border-gray-300 rounded"  type="date" />
                    </div>
                    <div class="mb-4">
                        <label for="tanggal_selesai" class="block text-gray-700">
                            Tanggal Selesai
                        </label>
                        <input id="tanggal_selesai" class="w-full p-2 border border-gray-300 rounded"  type="date" />
                    </div>
                    <div  class="mb-4">
                        <label for="durasi" class="block text-gray-700">
                            Durasi Sewa
                        </label>
                        <input id="durasi" class="w-full p-2 border border-gray-300 rounded"  type="number" value="0" />
                    </div>
                    <div class="mb-4">
                        <label for="total_harga" class="block text-gray-700">
                            Total Harga Sewa
                        </label>
                        <input id="total_harga" class="w-full p-2 border border-gray-300 rounded" readonly name="total_harga" type="text"
                            value="Rp 0,00" />
                    </div>
                    <button class="w-full bg-blue-600 text-white p-2 rounded" type="submit">
                        Kirim
                    </button>
                </form>
            </div>
        </div>
    </body>
    </html>
    @endsection