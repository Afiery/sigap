<x-app-layout title="History Surat Izin">

    <div class="card">
        <h5 class="card-header">History Surat Izin</h5>
        <div class="button-wrapper d-flex align-items-center">
            <!-- Button trigger modal Tambah Pegawai -->

        </div>

        <div class="card-body">
            <div class="col">
                <div class="table-responsive p-3">
                    <table class="table" id="datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pemohon</th>
                                <th>Nomor KTP</th>
                                <th>Alamat Pemohon</th>
                                <th>Nomor Pendaftaran Izin</th>
                                <th>Lokasi Izin</th>
                                <th>Nomor SK</th>
                                <th>Tanggal SK</th>
                                <th>Expired SK</th>
                                <th>Nama Kelurahan</th>
                                <th>Nama Kecamatan</th>
                                <th>Nama Izin</th>
                                <th>Tipe Permohonan</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($pegawai as $pgw)
                                @php
                                    $statusExpired = '';

                                    if (date('Y-m-d') >= $pgw->expiredSK) {
                                        $statusExpired = '<span class="badge bg-label-danger">Expired</span>';
                                    } else {
                                        $date1 = $pgw->expiredSK;
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
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $no++ }}</strong>
                                    </td>
                                    <td>{{ $pgw->name }}</td>
                                    <td>{{ $pgw->noKTP }}</td>
                                    <td>{{ $pgw->alamat }}</td>
                                    <td>{{ $pgw->nomor_izin }}</td>
                                    <td>{{ $pgw->lokasi_izin }}</td>
                                    <td>{{ $pgw->noSK }}</td>
                                    <td>{{ $pgw->tanggalSK }}</td>
                                    <td>{!!$statusExpired!!}</td>
                                    <td>{{ $pgw->namaKelurahan }}</td>
                                    <td>{{ $pgw->namaKecamatan }}</td>
                                    <td>{{ $pgw->namaIzin}}</td>
                                    <td>{{ $pgw->tipePermohonan}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-6">
                      <button type="reset" class="btn btn-primary me-3" onclick="window.location.href='/manajemen-pegawai'">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        new DataTable('#datatable');
    </script>
</x-app-layout>
