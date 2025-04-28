<x-app-layout title="Manajemen Pegawai">
    <style>
        .btn-create {
            width: 10em;
        }

        .center-btn {
            text-align: center;
        }
    </style>
    <div class="card">
        <h5 class="card-header">Manajemen Pegawai</h5>
        <div class="button-wrapper d-flex align-items-center">
            <!-- Button trigger modal Tambah Pegawai -->
            <button type="button" class="m-3 btn btn-primary btn-create" data-bs-toggle="modal"
                data-bs-target="#createModal">
                Tambah
            </button>
            <!-- Select Filter Expired -->
            <select name="filter-expired" id="filter-expired" class="btn btn-info" style="width: auto;">
                <option {{ $filterExpired == 'semua' ? 'selected' : '' }} value="semua">Semua</option>
                <option {{ $filterExpired == '1' ? 'selected' : '' }} value="1">1 Bulan</option>
                <option {{ $filterExpired == '3' ? 'selected' : '' }} value="3">3 Bulan</option>
                <option {{ $filterExpired == '6' ? 'selected' : '' }} value="6">6 Bulan</option>
                <option {{ $filterExpired == 'expired' ? 'selected' : '' }} value="expired">Expired</option>
            </select>
            <button id="btnGroupDrop1" type="button" class="btn btn-outline-success dropdown-toggle ms-auto me-10"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="tf-icons bx bx-file me-2"></span>
                Excel
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"
                style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 42.5px, 0px);"
                data-popper-placement="bottom-start">
                <a class="dropdown-item" href="{{route('manajemen-pegawai.export')}}">Export</a>
                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                data-bs-target="#importModal">Import</a>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Tambah Pegawai</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('manajemen-pegawai.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label required">Nama</label>
                                    <input name="name" required type="text" id="nameBasic" class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label required">Nomor KTP</label>
                                    <input name="noKTP" maxlength="16" pattern="\d{16}" required type="text"
                                        id="nameBasic" class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label required">Nomor HP</label>
                                    <input name="noHP"  required type="tel"
                                        id="nameBasic" class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label required">Alamat Pemohon</label>
                                    <input name="alamat" required type="text" id="nameBasic" class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label required">Nomor Pendaftaran Izin</label>
                                    <input name="nomor_izin" required type="text" id="nameBasic"
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label required">Lokasi Izin</label>
                                    <input name="lokasi_izin" required type="text" id="nameBasic"
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label required">Nomor SK</label>
                                    <input name="noSK" required type="text" id="nameBasic"
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label required">Tanggal SK</label>
                                    <input name="tanggalSK" required type="date" id="nameBasic"
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label required">Nama Kelurahan</label>
                                    <input name="namaKelurahan" required type="text" id="nameBasic"
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label required">Nama Kecamatan</label>
                                    <input name="namaKecamatan" required type="text" id="nameBasic"
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label required">Nama Izin</label>
                                    <input name="namaIzin" required type="text" id="nameBasic"
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label required">Tipe Permohonan</label>
                                    <input name="tipePermohonan" required type="text" id="nameBasic"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Kembali
                            </button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="importModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Import Pegawai</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('manajemen-pegawai.import') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>PILIH FILE</label>
                                <input type="file" name="file" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Kembali
                            </button>
                            <button type="submit" class="btn btn-primary">Import</button>
                        </div>
                    </form>
                </div>
            </div>
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
                                <th>Nomor HP</th>
                                <th>Alamat Pemohon</th>
                                {{-- <th>Nomor Pendaftaran Izin</th>
                                <th>Lokasi Izin</th>
                                <th>Nomor SK</th> --}}
                                <th>Tanggal SK</th>
                                <th>Expired SK</th>
                                {{-- <th>Nama Kelurahan</th>
                                <th>Nama Kecamatan</th>
                                <th>Nama Izin</th>
                                <th>Tipe Permohonan</th> --}}
                                <th>Aksi</th>
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
                                    <td>
                                        <button class="btn btn-success btn-wa" data-id="{{ $pgw->id }}">
                                            <i class='bx bxl-whatsapp fs-3' ></i>
                                        </button>
                                    </td>
                                    {{-- <td><a href="https://wa.me/62{{ ltrim($pgw->noHP, '0') }}" target="_blank" class="text-decoration-none link-dark">
                                        <i class='bx bxl-whatsapp fs-3' ></i>
                                    </a>
                                    </td> --}}
                                    <td>{{ $pgw->alamat }}</td>
                                    {{-- <td>{{ $pgw->nomor_izin }}</td>
                                    <td>{{ $pgw->lokasi_izin }}</td>
                                    <td>{{ $pgw->noSK }}</td> --}}
                                    <td>{{ $pgw->tanggalSK }}</td>
                                    <td>{!!$statusExpired!!}</td>
                                    {{-- <td>{{ $pgw->namaKelurahan }}</td>
                                    <td>{{ $pgw->namaKecamatan }}</td>
                                    <td>{{ $pgw->namaIzin}}</td>
                                    <td>{{ $pgw->tipePermohonan}}</td> --}}
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" id="btn-show"
                                                    data-url="{{ route('manajemen-pegawai.show', $pgw->id) }}"><i
                                                        class="bx bx-show me-1"></i> Show</a>
                                                <a class="dropdown-item" id="btn-show"
                                                data-url="{{ route('manajemen-pegawai.history-sk', $pgw->id) }}"><i
                                                    class="bx bx-history me-1"></i> History SK</a>
                                                <a class="dropdown-item btn-edit" data-id="{{ $pgw->id }}"
                                                    data-link="{{ route('manajemen-pegawai.update', $pgw->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item" id="btn-delete"
                                                    data-url="{{ route('manajemen-pegawai.destroy', $pgw->id) }}"><i
                                                        class="bx bx-trash me-1"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Edit Modal --}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Edit Pegawai</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="edit-pegawai-form" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label required">Nama</label>
                                <input name="name" required type="text" id="name-edit" class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label required">Nomor KTP</label>
                                <input name="noKTP" maxlength="16" pattern="\d{16}" required type="text"
                                    id="noKTP-edit" class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label required">Nomor HP</label>
                                <input name="noHP" required type="tel"
                                    id="noHP-edit" class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label required">Alamat Pemohon</label>
                                <input name="alamat" required type="text" id="alamat-edit" class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label required">Nomor Pendaftaran Izin</label>
                                <input name="nomor_izin" required type="text" id="nomor_izin-edit"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label required">Lokasi Izin</label>
                                <input name="lokasi_izin" required type="text" id="lokasi_izin-edit"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label required">Nomor SK</label>
                                <input name="noSK" required type="text" id="noSK-edit"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label required">Tanggal SK</label>
                                <input name="tanggalSK" required type="date" id="tanggalSK-edit"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label required">Expired SK</label>
                                <input name="expiredSK" required type="date" id="expiredSK-edit"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label required">Nama Kelurahan</label>
                                <input name="namaKelurahan" required type="text" id="namaKelurahan-edit"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label required">Nama Kecamatan</label>
                                <input name="namaKecamatan" required type="text" id="namaKecamatan-edit"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label required">Nama Izin</label>
                                <input name="namaIzin" required type="text" id="namaIzin-edit"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label required">Tipe Permohonan</label>
                                <input name="tipePermohonan" required type="text" id="tipePermohonan-edit"
                                    class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Kembali
                        </button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="waModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Whatsapp Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('wa.send') }}" class="wa-form" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label required">Nomor Whatsapp</label>
                                <input name="nomor_wa" required type="text" id="nomor-wa" class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label required">Isi Pesan</label>
                                <textarea name="teks_wa" required type="text" id="pesan-wa" rows="4" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Kembali
                        </button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        new DataTable('#datatable');

        //script handle edit
        $('table tbody').on('click', '.btn-edit', function() {
            var id = $(this).data('id');
            $(".edit-pegawai-form").trigger("reset");

            $.ajax({
                method: "GET",
                data: {
                    id: id
                },
                url: "{{ route('manajemen-pegawai.detail-json') }}",
            }).done(function(response) {
                $("#name-edit").val(response.pegawai.name);
                $("#noKTP-edit").val(response.pegawai.noKTP);
                $("#noHP-edit").val(response.pegawai.noHP);
                $("#alamat-edit").val(response.pegawai.alamat);
                $("#nomor_izin-edit").val(response.pegawai.nomor_izin);
                $("#lokasi_izin-edit").val(response.pegawai.lokasi_izin);
                $("#noSK-edit").val(response.pegawai.noSK);
                $("#tanggalSK-edit").val(response.pegawai.tanggalSK);
                $("#expiredSK-edit").val(response.pegawai.expiredSK);
                $("#namaKelurahan-edit").val(response.pegawai.namaKelurahan);
                $("#namaKecamatan-edit").val(response.pegawai.namaKecamatan);
                $("#namaIzin-edit").val(response.pegawai.namaIzin);
                $("#tipePermohonan-edit").val(response.pegawai.tipePermohonan);
            });

            $(".edit-pegawai-form").attr("action", $(this).data("link"));
            $("#editModal").modal('show');
        });

        // Fungsi untuk mengubah format tanggal dari 'yyyy-mm-dd' ke 'dd/mm/yy'
        function formatDate(dateString) {
            var date = new Date(dateString);
            var day = ("0" + date.getDate()).slice(-2);
            var month = ("0" + (date.getMonth() + 1)).slice(-2);
            var year = date.getFullYear();

            return day + "/" + month + "/" + year;
        }

        //script handle wa
            $('table tbody').on('click', '.btn-wa', function() {
            var id = $(this).data('id');
            $(".wa-form").trigger("reset");

            $.ajax({
                method: "GET",
                data: {
                    id: id
                },
                url: "{{ route('manajemen-pegawai.detail-json') }}",
            }).done(function(response) {
                $("#nomor-wa").val('62' + response.pegawai.noHP.replace(/^0/, ''));
                var templateMessage = "Halo, Pesan ini merupakan pesan otomatis untuk mengingatkan bahwa SIP anda akan berakhir pada #expiredSK#";
                var expiredSK = response.pegawai.expiredSK;
                var formatTanggal = formatDate(expiredSK);
                var templateMessageFinal = templateMessage.replace('#expiredSK#', formatTanggal);
                $('#pesan-wa').val(templateMessageFinal);

            });

            $(".wa-form").attr("action", "{{ route('wa.send') }}");
            $("#waModal").modal('show');
        });

        $('#filter-expired').change(function() {
            window.location = "{{ route('manajemen-pegawai.list-pegawai') }}/?filterExpired=" + $(this).val();
        });
    </script>
</x-app-layout>
