<?php

namespace App\Console\Commands;

use App\Models\Notifikasi;
use App\Models\Pegawai;
use DateTime;
use Illuminate\Console\Command;

class SendNotifToAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send-notif-to-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $title = 'Expired SIP';

        $pegawai = Pegawai::all();
        foreach ($pegawai as $pgw) {
            $date1 = $pgw->expiredSK;
            $date2 = date('Y-m-d');
            $d1 = new DateTime($date2);
            $d2 = new DateTime($date1);
            $Months = $d2->diff($d1);
            $howeverManyMonths = $Months->y * 12 + $Months->m;

            if (in_array($howeverManyMonths, [1,3,6,57])) {

                $msg = 'SIP ' . $pgw->name.' akan berakhir dalam '.$howeverManyMonths. ' bulan. ('. $pgw->expiredSK .')';
                $checkNotifExist = Notifikasi::where('message', $msg)->first();
                if (!$checkNotifExist) {
                    $url = Route('manajemen-pegawai.show', $pgw->id);
                    $notifikasi = new Notifikasi();
                    $notifikasi->title = $title;
                    $notifikasi->message = $msg;
                    $notifikasi->url = $url;
                    $notifikasi->status = 'pending'; //pending,success
                    $notifikasi->save();
                }
            }
        }
    }
}
