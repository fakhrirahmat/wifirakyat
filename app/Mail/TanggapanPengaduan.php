<?php

namespace App\Mail;

use App\Models\Pengaduan;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TanggapanPengaduan extends Mailable
{
    use Queueable, SerializesModels;

    public $pengaduan;

    public function __construct(Pengaduan $pengaduan)
    {
        $this->pengaduan = $pengaduan;
    }

    public function build()
    {
        return $this->subject('Tanggapan Pengaduan Anda')
            ->view('emails.tanggapan_pengaduan');
    }
}
