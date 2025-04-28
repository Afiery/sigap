<x-app-layout title="Show Pegawai">
@php
  $statusExpired = '';

  if (date('Y-m-d') >= $pegawai->expiredSK) {
      $statusExpired = 'Expired';
  } else {
      $date1 = $pegawai->expiredSK;
      $date2 = date('Y-m-d');
      $d1 = new DateTime($date2);
      $d2 = new DateTime($date1);
      $Months = $d2->diff($d1);

      $howEverManyYears = $Months->y;
      $howEverManyDays = $Months->d;
      $howEverManyMonths = $Months->m;

      $statusExpired = '';

      if ($howEverManyYears > 0) {
          $statusExpired = $howEverManyYears . ' Tahun';
      }
      if ($howEverManyMonths > 0) {
          $statusExpired = $statusExpired . ' ' . $howEverManyMonths . ' Bulan';
      }
      if ($howEverManyDays > 0) {
          $statusExpired = $statusExpired . ' ' . $howEverManyDays . ' Hari';
      }
  }
@endphp
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="row">
            <div class="col-md-12">
              <div class="nav-align-top">
              </div>
              <div class="card mb-6">
                <!-- Account -->
                <div class="card-body">
                  <div class="d-flex align-items-start align-items-sm-center gap-6 pb-4 border-bottom">
                    <div class="button-wrapper">
                      <h4>Detail Pegawai {{$pegawai->name}}</h4>
                    </div>
                  </div>
                </div>
                <div class="card-body pt-4">
                  <form id="formAccountSettings" method="POST" onsubmit="return false">
                    <div class="row g-6">
                        <div class="col-md-4">
                            <label for="noKTP" class="form-label">Nomor KTP</label>
                            <input
                              class="form-control"
                              type="text"
                              id="noKTP"
                              name="noKTP"
                              value={{$pegawai->noKTP}}
                              readonly>
                          </div>
                      <div class="col-md-4">
                        <label for="name" class="form-label">Nama</label>
                        <input
                          class="form-control"
                          type="text"
                          id="name"
                          name="name"
                          value={{$pegawai->name}}
                          readonly>
                      </div>
                      <div class="col-md-4">
                        <label for="noHP" class="form-label">Nomor HP</label>
                        <input
                          class="form-control"
                          type="text"
                          id="noHP"
                          name="noHP"
                          value={{$pegawai->noHP}}
                          readonly>
                      </div>
                      <div class="col-md-6">
                        <label for="alamat" class="form-label">Alamat Pemohon</label>
                        <input
                          class="form-control"
                          type="text"
                          id="alamat"
                          name="alamat"
                          value="{{$pegawai->alamat}}"
                          readonly>
                      </div>
                      <div class="col-md-6">
                        <label for="nomor_izin" class="form-label">Nomor Pendaftaran Izin</label>
                        <input
                          class="form-control"
                          type="text"
                          id="nomor_izin"
                          name="nomor_izin"
                          value={{$pegawai->nomor_izin}}
                          readonly>
                      </div>
                      <div class="col-md-6">
                        <label for="lokasi_izin" class="form-label">Lokasi Izin</label>
                        <input
                          class="form-control"
                          type="text"
                          id="lokasi_izin"
                          name="lokasi_izin"
                          value="{{$pegawai->lokasi_izin}}"
                          readonly>
                      </div>
                      <div class="col-md-6">
                        <label for="noSK" class="form-label">Nomor SK</label>
                        <input
                          class="form-control"
                          type="text"
                          id="noSK"
                          name="noSK"
                          value={{$pegawai->noSK}}
                          readonly>
                      </div>
                      <div class="col-md-6">
                        <label for="tanggalSK" class="form-label">Tanggal SK</label>
                        <input
                          class="form-control"
                          type="text"
                          id="tanggalSK"
                          name="tanggalSK"
                          value={{$pegawai->tanggalSK}}
                          readonly>
                      </div>
                      <div class="col-md-6">
                        <label for="statusExpired" class="form-label">Status Expired</label>
                        <input
                          class="form-control"
                          type="text"
                          id="statusExpired"
                          name="statusExpired"
                          value="{{ $statusExpired . ' ( ' . $pegawai->expiredSK . ' )'}}"
                          readonly>
                      </div>
                      <div class="col-md-6">
                        <label for="namaKelurahan" class="form-label">Nama Kelurahan</label>
                        <input
                          class="form-control"
                          type="text"
                          id="namaKelurahan"
                          name="namaKelurahan"
                          value={{$pegawai->namaKelurahan}}
                          readonly>
                      </div>
                      <div class="col-md-6">
                        <label for="namaKecamatan" class="form-label">Nama Kecamatan</label>
                        <input
                          class="form-control"
                          type="text"
                          id="namaKecamatan"
                          name="namaKecamatan"
                          value={{$pegawai->namaKecamatan}}
                          readonly>
                      </div>
                      <div class="col-md-6">
                        <label for="namaIzin" class="form-label">Nama Izin</label>
                        <input
                          class="form-control"
                          type="text"
                          id="namaIzin"
                          name="namaIzin"
                          value={{$pegawai->namaIzin}}
                          readonly>
                      </div>
                      <div class="col-md-6">
                        <label for="tipePermohonan" class="form-label">Tipe Permohonan</label>
                        <input
                          class="form-control"
                          type="text"
                          id="tipePermohonan"
                          name="tipePermohonan"
                          value={{$pegawai->tipePermohonan}}
                          readonly>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">QR Code</label>
                        <div>
                          {{$qrCode}}
                        </div>
                      </div>
                    </div>
                    <div class="mt-6">
                      <button type="reset" class="btn btn-primary me-3" onclick="window.location.href='/manajemen-pegawai'">Kembali</button>
                    </div>
                  </form>
                </div>
                <!-- /Account -->
              </div>
            </div>
          </div>
        </div>
        <!-- / Content -->
    </div>
</x-app-layout>