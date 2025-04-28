<?php

namespace App\Imports;

use App\Models\Pegawai;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class PegawaiImport implements ToCollection, WithStartRow, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow(): int
    {
        return 4;
    }
    public function headingRow(): int
    {
        return 3;
    }
    public function collection(Collection $rows)
    {
        $months = [
            'Januari' => '01', 'Februari' => '02', 'Maret' => '03', 'April' => '04', 'Mei' => '05',
            'Juni' => '06', 'Juli' => '07', 'Agustus' => '08', 'September' => '09', 'Oktober' => '10',
            'Nopember' => '11', 'Desember' => '12',

            'January' => '01', 'February' => '02', 'March' => '03', 'April' => '04', 'May' => '05',
            'June' => '06', 'July' => '07', 'August' => '08', 'September' => '09', 'October' => '10',
            'November' => '11', 'December' => '12',
        ];

        foreach ($rows as $row) {
            $row = $row->all();

            try {
                $date = $row['tgl_sk'];

                if (is_numeric($date)) {
                    $tanggalSK = gmdate("Y-m-d", ($date - 25569) * 86400);
                } else {
                    foreach ($months as $key => $month) {
                        if (strpos($date, $key) !== false) {
                            $date = str_replace($key, $month, $date);
                            break;
                        }
                    }

                    // Validasi dan konversi tanggal dari format d m Y
                    try {
                        $tanggalSK = Carbon::createFromFormat('d m Y', $date)->format('Y-m-d');
                    } catch (\Exception $e) {
                        \Log::error("Format tanggal tidak valid: " . $date);
                        continue; // Lewati baris jika format tanggal tidak valid
                    }
                }

                // Hitung tanggal expired
                $expiredSK = Carbon::parse($tanggalSK)->addYears(5)->format('Y-m-d');

                // Cek Nomor KTP
                $pegawai = Pegawai::where('noKTP', $row['nomor_ktp'])->first();

                if ($pegawai) {
                        $pegawai->update([
                            'name' => $row['nama_pemohon'],
                            'noKTP' => $row['nomor_ktp'],
                            'noHP' => $row['nomor_hp'],
                            'alamat' => $row['alamat_pemohon'],
                            'tanggalSK' => $tanggalSK,
                            'expiredSK' => $expiredSK,
                        ]);
                } else {
                    Pegawai::create([
                        'name' => $row['nama_pemohon'],
                        'noKTP' => $row['nomor_ktp'],
                        'noHP' => $row['nomor_hp'],
                        'alamat' => $row['alamat_pemohon'],
                        'tanggalSK' => $tanggalSK,
                        'expiredSK' => $expiredSK,
                    ]);
                }
            } catch (\Throwable $th) {

            }
        }
    }
}
