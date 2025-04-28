
<table style="table-layout: auto; width: 100%;" >
    <tr>
        <th colspan="12" style="text-align: center; font-weight: bold">Laporan Cetak SK</th>
    </tr>
    <tr></tr>
    <thead>
    <tr>
        <th class="header" style="background-color: #4472C4; color: white; padding:10px !important; width:100% !important; border:10px solid !important;">No</th>
        <th class="header" style="background-color: #4472C4; color: white; padding:10px !important; width:100% !important; border:10px solid !important;">Nama Pemohonan</th>
        <th class="header" style="background-color: #4472C4; color: white; padding:10px !important; width:100% !important; border:10px solid !important;">Nomor KTP</th>
        <th class="header" style="background-color: #4472C4; color: white; padding:10px !important; width:100% !important; border:10px solid !important;">Alamat Pemohon</th>
        <th class="header" style="background-color: #4472C4; color: white; padding:10px !important; width:100% !important; border:10px solid !important;">Nomor Pendaftaran Izin</th>
        <th class="header" style="background-color: #4472C4; color: white; padding:10px !important; width:100% !important; border:10px solid !important;">Lokasi Izin</th>
        <th class="header" style="background-color: #4472C4; color: white; padding:10px !important; width:100% !important; border:10px solid !important;">Nomor SK</th>
        <th class="header" style="background-color: #4472C4; color: white; padding:10px !important; width:100% !important; border:10px solid !important;">Tanggal SK</th>
        <th class="header" style="background-color: #4472C4; color: white; padding:10px !important; width:100% !important; border:10px solid !important;">Nama Kelurahan</th>
        <th class="header" style="background-color: #4472C4; color: white; padding:10px !important; width:100% !important; border:10px solid !important;">Nama Kecamatan</th>
        <th class="header" style="background-color: #4472C4; color: white; padding:10px !important; width:100% !important; border:10px solid !important;">Nama Izin</th>
        <th class="header" style="background-color: #4472C4; color: white; padding:10px !important; width:100% !important; border:10px solid !important;">Tipe Permohonan</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 0;
    @endphp
    @foreach($pegawais as $pegawai)
        @php
            $no++;
        @endphp
        <tr>
            <td style="border: 1px solid black; text-align: center;">{{ $no }}</td>
            <td style="border: 1px solid black; white-space: nowrap;">{{ $pegawai->name ?? '' }}</td>
            <td style="border: 1px solid black; white-space: nowrap;">{{ $pegawai->noKTP ?? ''}}</td>
            <td style="border: 1px solid black; white-space: nowrap;">{{ $pegawai->alamat ?? ''}}</td>
            <td style="border: 1px solid black; white-space: nowrap;">{{ $pegawai->nomor_izin ?? ''}}</td>
            <td style="border: 1px solid black; white-space: nowrap;">{{ $pegawai->lokasi_izin ?? ''}}</td>
            <td style="border: 1px solid black; white-space: nowrap;">{{ $pegawai->noSK ?? ''}}</td>
            <td style="border: 1px solid black; white-space: nowrap;">{{ $pegawai->tanggalSK ?? ''}}</td>
            <td style="border: 1px solid black; white-space: nowrap;">{{ $pegawai->namaKelurahan ?? ''}}</td>
            <td style="border: 1px solid black; white-space: nowrap;">{{ $pegawai->namaKecamatan ?? ''}}</td>
            <td style="border: 1px solid black; white-space: nowrap;">{{ $pegawai->namaIzin ?? ''}}</td>
            <td style="border: 1px solid black; white-space: nowrap;">{{ $pegawai->tipePermohonan ?? ''}}</td>
        </tr>
    @endforeach
    </tbody>
</table>