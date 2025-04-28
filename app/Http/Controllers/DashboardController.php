<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Carbon\Carbon;
use App\Services\WhatsAppService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $waService;

    public function __construct(WhatsAppService $waService)
    {
        $this->waService = $waService;
    }
    public function index() {
        $data['total_admin'] = User::all()->count();
        $data['total_pegawai'] = Pegawai::all()->count();
        $data['total_expired'] = Pegawai::where('expiredSK', '<', Carbon::now())->count();
        return view('dashboard.index', $data);
    }   

    public function sendMessage(Request $request)
    {
        $number = $request->input('nomor_wa');
        $text = $request->input('teks_wa');

        $number = (string)$number;

        try {
            $response = $this->waService->sendMessage($number, $text);

            if ($response) {
                return redirect()->back()->with('OK', 'Pesan berhasil dikirim!');
            } else {
                return redirect()->back()->with('ERR', 'Pesan gagal dikirim!');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Pesan gagal dikirim! Error: ' . $e->getMessage());
        }
    }

}
