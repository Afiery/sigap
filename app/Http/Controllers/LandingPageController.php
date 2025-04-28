<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        $requestData = $request->all();
        $data['dataPegawai'] = null;
        if (isset($requestData['noKTP'])) {
            $detailPegawai = Pegawai::where('noKTP',$requestData['noKTP'])->first();
            $linkProfile = env('APP_URL') . '/?noKTP=' . $requestData['noKTP'];
            $data['qrCode'] = null;
            if ($detailPegawai) {
                $data['dataPegawai'] = $detailPegawai;
            } else {
                $data['dataPegawai'] = "not found";
            }

            $data['qrCode'] = QrCode::generate(
                $linkProfile,
            );

        }
        return view('landing-page.index', $data);
    }
}
