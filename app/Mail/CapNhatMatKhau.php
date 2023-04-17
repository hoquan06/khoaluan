<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CapNhatMatKhau extends Mailable
{
    use Queueable, SerializesModels;

    public $hash_reset;
    public $tieu_de;

    public function __construct($hash_reset, $tieu_de)
    {
        $this->hash_reset = $hash_reset;
        $this->tieu_de    = $tieu_de;
    }

    public function build()
    {
        return $this->subject($this->tieu_de)->view('client.pages.mail.cap_nhat_mat_khau', [
            'hash_reset' => $this->hash_reset,
        ]);
    }
}
