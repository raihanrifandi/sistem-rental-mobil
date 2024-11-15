@foreach ($cars as $car)
    @if ($car->status === 'available')
        <div class="bg-white rounded-lg border border-black/10 hover:shadow-md transition-all">
            <div class="aspect-[4/3] rounded-t-lg overflow-hidden">
                @if($car->gambar)
                    <img src="{{ asset($car->gambar) }}" alt="{{ $car->merk }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                        <svg class="w-12 h-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M4 4h16v12H4z"/>
                            <path d="M4 4l8 6 8-6M4 16l8-6 8 6"/>
                        </svg>
                    </div>
                @endif
            </div>
                
            <div class="p-4">
                <div class="mb-2">
                    <h3 class="font-semibold">{{ $car->merk }}</h3>
                    <p class="text-sm text-gray-500">{{ $car->model }}</p>
            </div>

            <div class="flex items-center gap-1 mb-3">
                @for($i = 0; $i < 5; $i++)
                    <svg class="w-4 h-4 {{ $i < 4 ? 'text-yellow-400' : 'text-gray-300' }}" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                    </svg>
                @endfor
                <span class="text-sm text-gray-500 ml-1">40 Reviews</span>
            </div>

            <div class="grid grid-cols-2 gap-2 text-sm mb-4">
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-400" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
                        <path d="M12 7v5l3 3"/>
                    </svg>
                    <span>{{ $car->tahun }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-400" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M16 1a7 7 0 0 0-7 7v8h14V8a7 7 0 0 0-7-7z"/>
                    </svg>
                    <span>{{ $car->kapasitas }} Orang</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-400" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2L4 7v10l8 5 8-5V7l-8-5z"/>
                    </svg>
                    <span>{{ $car->plat }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-400" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                    </svg>
                    <span>{{ ucfirst($car->transmisi) }}</span>
                </div>
            </div>

            <div class="mb-4">
                <div class="text-lg font-semibold">Rp{{ number_format($car->harga_sewa, 0, ',', '.') }}/hari</div>
                <div class="text-sm text-gray-500">Rp{{ number_format($car->harga_sewa * 7, 0, ',', '.') }}/minggu</div>
            </div>

                <button class="w-full py-2 rounded text-white text-sm font-medium bg-gradient-to-r from-[#038EFF] to-[#65BAFF] hover:opacity-90 transition-opacity">
                    Sewa
                </button>
            </div>
        </div>
    @endif
@endforeach