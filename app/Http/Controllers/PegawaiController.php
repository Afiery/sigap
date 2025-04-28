<?php

namespace App\Http\Controllers;

use App\Exports\PegawaiExport;
use App\Imports\PegawaiImport;
use App\Models\HistorySK;
use App\Models\Notifikasi;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PegawaiController extends Controller
{
    public function index(Request $request) {

        $requestData = $request->all();
        $data['filterExpired'] = null;

        $data['pegawai'] = Pegawai::orderBy('expiredSK', 'asc')->get();

        if (isset($requestData['filterExpired'])) {
            if ($requestData['filterExpired'] == 'semua') {
                $data['pegawai'] = $data['pegawai'];
            } elseif ($requestData['filterExpired'] == '1') {
                $data['pegawai'] = $data['pegawai']->where('expiredSK', '<=', Carbon::now()->copy()->addMonth(2));
            } elseif ($requestData['filterExpired'] == '3') {
                $data['pegawai'] = $data['pegawai']->where('expiredSK', '<=', Carbon::now()->copy()->addMonths(4));
            } elseif ($requestData['filterExpired'] == '6') {
                $data['pegawai'] = $data['pegawai']->where('expiredSK', '<=', Carbon::now()->copy()->addMonths(7));
            } elseif ($requestData['filterExpired'] == 'expired') {
                $data['pegawai'] = $data['pegawai']->where('expiredSK', '<', Carbon::now());
            }
            $data['filterExpired'] = $requestData['filterExpired'];
        }

        return view('pegawai.index',$data);
    }

    public function indexHistorySK(Request $request, $id) {

        $requestData = $request->all();
        
        $data['pegawai'] = HistorySK::where('idPegawai', $id)->orderBy('created_at', 'desc')->get();

        return view('pegawai.history-sk',$data);
    }

    public function show($id) {

        $pegawai = Pegawai::find($id);
        $data['pegawai'] = $pegawai;

        $linkProfile = env('APP_URL') . '/?noKTP=' . $pegawai->noKTP;
        $data['qrCode'] = QrCode::generate(
            $linkProfile,
        );

        return view('pegawai.show', $data);
    }

    public function store(Request $request)
    {
        $pegawaiIdByNOKTP= $this->findPegawaiIdByNOKTP($request->noKTP);
        if($pegawaiIdByNOKTP) return redirect()->back()->with('ERR','Nomor KTP sudah digunakan');

        $pegawaiIdByNOHP= $this->findPegawaiIdByNOHP($request->noHP);
        if($pegawaiIdByNOHP) return redirect()->back()->with('ERR','Nomor HP sudah digunakan');

        $skExpired = Carbon::parse($request->tanggalSK)->addYears(5)->toDateString();

        // logic create sip expired
        // $sipExpired = $request->sip_awal + 5 years;

        Pegawai::create([
            'name' => $request->name,
            'noKTP' => $request->noKTP,
            'noHP' => $request->noHP,
            'alamat' => $request->alamat,
            'nomor_izin' => $request->nomor_izin,
            'lokasi_izin' => $request->lokasi_izin,
            'noSK' => $request->noSK,
            'tanggalSK' => $request->tanggalSK,
            'expiredSK' => $skExpired,
            'namaKelurahan' => $request->namaKelurahan,
            'namaKecamatan' => $request->namaKecamatan,
            'namaIzin' => $request->namaIzin,
            'tipePermohonan' => $request->tipePermohonan
        ]);

        return redirect()->back()->with('OK','Pegawai baru berhasil ditambahkan');
    }

    public function detailJson(Request $request)
    {
        $data['pegawai'] = Pegawai::find($request->id);

        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawaiIdByNOKTP= $this->findPegawaiIdByNOKTP($request->noKTP);
        if($pegawaiIdByNOKTP && $pegawaiIdByNOKTP != $id) return redirect()->back()->with('ERR','Nomor KTP sudah digunakan');
        
        $pegawaiIdByNOHP= $this->findPegawaiIdByNOHP($request->noHP);
        if($pegawaiIdByNOHP && $pegawaiIdByNOHP != $id) return redirect()->back()->with('ERR','Nomor HP sudah digunakan');

        $storedHistory = HistorySK::create([
            'idPegawai' => $pegawai->id,
            'name' => $pegawai->name,
            'noKTP' => $pegawai->noKTP,
            'noHP' => $pegawai->noHP,
            'alamat' => $pegawai->alamat,
            'nomor_izin' => $pegawai->nomor_izin,
            'lokasi_izin' => $pegawai->lokasi_izin,
            'noSK' => $pegawai->noSK,
            'tanggalSK' => $pegawai->tanggalSK,
            'expiredSK' =>  $pegawai->expiredSK,
            'namaKelurahan' => $pegawai->namaKelurahan,
            'namaKecamatan' => $pegawai->namaKecamatan,
            'namaIzin' => $pegawai->namaIzin,
            'tipePermohonan' => $pegawai->tipePermohonan
        ]);
        $pegawai->update([
            'name' => $request->name,
            'noKTP' => $request->noKTP,
            'alamat' => $request->alamat,
            'nomor_izin' => $request->nomor_izin,
            'lokasi_izin' => $request->lokasi_izin,
            'noSK' => $request->noSK,
            'tanggalSK' => $request->tanggalSK,
            'expiredSK' =>  $request->expiredSK,
            'namaKelurahan' => $request->namaKelurahan,
            'namaKecamatan' => $request->namaKecamatan,
            'namaIzin' => $request->namaIzin,
            'tipePermohonan' => $request->tipePermohonan
        ]);

        return redirect()->back()->with('OK','Berhasil update pegawai');
    }

    private function findPegawaiIdByNOKTP($noKTP)
    {
        $pegawaiId = null;
        $pegawai = Pegawai::where('noKTP',$noKTP)->first();
        if($pegawai) $pegawaiId = $pegawai->id;

        return $pegawaiId;
    }

    private function findPegawaiIdByNOHP($noHP)
    {
        $pegawaiId = null;
        $pegawai = Pegawai::where('noHP',$noHP)->first();
        if($pegawai) $pegawaiId = $pegawai->id;

        return $pegawaiId;
    }

    public function destroy($id)
    {
        $pegawai = Pegawai::find($id);
        if (!$pegawai) {
            return redirect()->back()->with('ERR','Pegawai tidak ditemukan!');
        }

        $pegawai->delete();

        return redirect()->back()->with('OK','Berhasil hapus Pegawai');
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file
        $path = $file->storeAs('public/excel/',$nama_file);
        // import data
        $import = Excel::import(new PegawaiImport(), storage_path('app/public/excel/'.$nama_file));

        //remove from server
        Storage::delete($path);

        if($import) {
            //redirect
            return redirect()->route('manajemen-pegawai.list-pegawai')->with(['OK' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('manajemen-pegawai.list-pegawai')->with(['ERR' => 'Data Gagal Diimport!']);
        }
    }
 	public function export()
	{
        $fileName = date('Y-m-d') . ' - List Pegawai.xlsx';
		return Excel::download(new PegawaiExport, $fileName);
	}

    public function readAllNotif() {
        $unReadNotif = Notifikasi::where('status', 'pending')->get();
        foreach ($unReadNotif as $notif) {
            $notif->status = 'success';
            $notif->save();
        }
    }

    public function loadNotif() {
        $unReadNotif = Notifikasi::where('status', 'pending')->count();

        $data['unReadNotif'] = $unReadNotif;
        return response()->json($data, 200);
    }
}
