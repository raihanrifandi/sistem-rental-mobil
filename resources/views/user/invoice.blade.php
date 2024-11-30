<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="ThemeMarch">
  <!-- Site Title -->
  <title>Invoice Transaksi</title>
  @vite('resources/css/app.css')
</head>

<body>
  <div class="cs-container">
    <div class="cs-invoice cs-style1">
      <div class="cs-invoice_in" id="download_section">
        <div class="cs-invoice_head cs-type1 cs-mb25">
          <div class="cs-invoice_left">
            <p class="cs-invoice_number cs-primary_color cs-mb5 cs-f16"><b class="cs-primary_color">Penyewaan NO:</b> {{ $penyewaan->id_penyewaan }}</b></p>
            <p class="cs-invoice_date cs-primary_color cs-m0"><b class="cs-primary_color">Tanggal Terbit: </b> {{ now()->format('d-m-Y') }}</p>
          </div>
          <div class="cs-invoice_right cs-text_right">
            <div class="cs-logo cs-mb5"><img src="../../assets/img/logo.png" alt="Logo" class="w-18 h-16 rounded-full"></div>
          </div>
        </div>
        <div class="cs-invoice_head cs-mb10">
          <div class="cs-invoice_left">
            <div class="cs-box cs-style1 cs-type1 cs-text_center cs-mb10">
              <p class="cs-mb5">Durasi Sewa</p>
              <p class="cs-accent_color cs-f24 cs-bold cs-mb0">{{$durasiSewa}} Hari</p>
            </div>
          </div>
          <div class="cs-invoice_right cs-text_right">
            <b class="cs-primary_color">DOA IBU RENT CAR</b>
            <p>
              Jl. Prof. Dr. Ir. Sumantri Brojonegoro No.1,  <br /> Gedong Meneng, Kec. Rajabasa, Kota Bandar Lampung, Prov. Lampung 35141 <br /> doaiburentalcar@gmail.com
            </p>
          </div>
        </div>
        <ul class="cs-grid_row cs-col_3 cs-mb10">
          <li class="cs-mb20">
            <b class="cs-primary_color">Pengambilan:</b>
            <p class="cs-mb0">
              Car Pool Doa Ibu, <br> Bandar Lampung, Lampung <br> {{ $penyewaan->tanggal_mulai }},  {{ $penyewaan->waktu_penjemputan }} WIB
            </p>
          </li>
          <li class="cs-mb20">
            <b class="cs-primary_color">Pengembalian:</b>
            <p class="cs-mb0">
                Car Pool Doa Ibu, <br> Bandar Lampung, Lampung <br> {{ $penyewaan->tanggal_selesai }},  {{ $penyewaan->waktu_penjemputan }} WIB
            </p>
          </li>
          <li class="cs-mb20">
            <div class="cs-box cs-style1 cs-type1 cs-text_center cs-max_w_150 cs-left_auto">
              <p class="cs-mb5">Batas Kilometer</p>
              <p class="cs-accent_color cs-f24 cs-bold cs-mb0">250 KM</p>
            </div>
          </li>
        </ul>
        <div class="cs-table cs-style1 cs-type2 cs-mb30">
          <div class="cs-round_border">
            <p class="cs-primary_color cs-semi_bold cs-f18 cs-mb0 cs-table_title">Informasi Penyewa</p>
            <div class="cs-table_responsive">
              <table class="cs-border_less">
                <tbody>
                  <tr class="cs-table_baseline">
                    <td class="cs-width_8">
                      <div class="cs-table cs-style2">
                        <table>
                          <tbody>
                            <tr>
                              <td><b class="cs-primary_color cs-semi_bold">Nama Lengkap:</b> {{ $user->name }}</td>
                              <td><b class="cs-primary_color cs-semi_bold">No. Telepon:</b> {{ $user->no_telepon }}</td>
                            </tr>
                            <tr>
                              <td><b class="cs-primary_color cs-semi_bold">Alamat Email:</b> {{ $user->email }}</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="cs-box2_wrap cs-mb30">
          <div class=" cs-box cs-style2">
            <p class="cs-primary_color cs-semi_bold cs-f18 cs-mb5">Informasi Mobil</p>
            <div class="cs-table cs-style2">
              <table>
                <tbody>
                  <tr>
                    <td><b class="cs-primary_color cs-semi_bold">Merk:</b> {{ $mobil->merk }}</td>
                  </tr>
                  <tr>
                    <td><b class="cs-primary_color cs-semi_bold">Model:</b> {{ $mobil->model }}</td>
                  </tr>
                  <tr>
                    <td><b class="cs-primary_color cs-semi_bold">Plat:</b> {{ $mobil->plat }}</td>
                  </tr>
                  <tr>
                    <td><b class="cs-primary_color cs-semi_bold">Transmisi:</b> {{ $mobil->transmisi }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class=" cs-box cs-style2">
            <p class="cs-primary_color cs-semi_bold cs-f18 cs-mb5">Gambar Mobil</p>
                <img src="{{ asset($mobil->gambar) }}" alt="Mobil" class="w-198 h-48 rounded-md">
            </div>
          </div>
        </div>
        <div class="cs-table cs-style2">
          <div class="cs-round_border">
            <div class="cs-table_responsive">
              <table>
                <thead>
                  <tr class="cs-focus_bg">
                    <th class="cs-width_6 cs-semi_bold cs-primary_color">Detail Transaksi</th>
                    <th class="cs-width_2 cs-semi_bold cs-primary_color">Harga</th>
                    <th class="cs-width_2 cs-semi_bold cs-primary_color">Pajak</th>
                    <th class="cs-width_2 cs-semi_bold cs-primary_color cs-text_right">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="cs-width_6">{{ $mobil->merk }} - {{$durasiSewa}} Hari</td>
                    <td class="cs-width_2">Rp{{ number_format($mobil->harga_sewa,0, ',', '.') }}/hari</td>
                    <td class="cs-width_2">%10</td>
                    <td class="cs-width_2 cs-text_right cs-primary_color cs-semi_bold">Rp{{ number_format($penyewaan->total_biaya, 0, ',', '.') }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="cs-table cs-style2">
          <div class="cs-table_responsive">
            <table>
              <tbody>
                <tr class="cs-table_baseline">
                  <td class="cs-width_5">
                    <b class="cs-primary_color">Telah Dibayar Pada:</b><br> {{ $tanggalPembayaranPlus7 ? $tanggalPembayaranPlus7->format('Y-m-d H:i:s') : '-' }}
                  </td>
                  <td class="cs-width_5 cs-primary_color cs-bold cs-f16 cs-text_right">Total Biaya:</td>
                  <td class="cs-width_2 cs-text_right cs-primary_color cs-bold cs-primary_color cs-f16">Rp{{ number_format($penyewaan->total_biaya, 0, ',', '.') }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="cs-note">
          <div class="cs-note_left">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
              <path
                d="M416 221.25V416a48 48 0 01-48 48H144a48 48 0 01-48-48V96a48 48 0 0148-48h98.75a32 32 0 0122.62 9.37l141.26 141.26a32 32 0 019.37 22.62z"
                fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
              <path d="M256 56v120a32 32 0 0032 32h120M176 288h160M176 368h160" fill="none" stroke="currentColor"
                stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
            </svg>
          </div>
          <br>
          <div class="cs-note_right">
            <p class="cs-mb0"><b class="cs-primary_color cs-bold">Catatan:</b></p>
            <p class="cs-m0">Penyewa wajib membawa dan menunjukkan invoice ini beserta dokumen fisik asli yang telah diunggah sebelumnya saat serah terima mobil di lokasi yang telah disepakati.</p>
          </div>
        </div>
        <!-- .cs-note -->
      </div>
      <div class="cs-invoice_btns cs-hide_print">
        <a href="javascript:window.print()" class="cs-invoice_btn cs-color1">
          <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
            <path
              d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24"
              fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
            <rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none" stroke="currentColor"
              stroke-linejoin="round" stroke-width="32" />
            <path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none"
              stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
            <circle cx="392" cy="184" r="24" />
          </svg>
          <span>Print</span>
        </a>
        <button id="download_btn" class="cs-invoice_btn cs-color2">
          <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
            <title>Download</title>
            <path d="M336 176h40a40 40 0 0140 40v208a40 40 0 01-40 40H136a40 40 0 01-40-40V216a40 40 0 0140-40h40"
              fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"
              d="M176 272l80 80 80-80M256 48v288" />
          </svg>
          <span>Download</span>
        </button>
      </div>
    </div>
  </div>
</body>
</html>