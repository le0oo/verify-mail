<?php

namespace App\Http\Livewire\Mail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\CisTable;
use App\Models\VerifyMail;
use App\Models\CisMail;

use Illuminate\Http\Request;

use Livewire\Component;

class Regmail extends Component
{

    public $mail;
    public $cis;

    public function render()
    {
        return view('livewire.mail.regmail');
    }


    public function store()
    {
        $data = [
            'mail' => $this->mail,
            'verify_code' => Str::random(25),
        ];

        $mail = VerifyMail::create([
            'mail' => $data['mail'],
            'verify_code' => $data['verify_code'],
        ]);

        // Se envia mail para confirmar el mail

        Mail::send('mail.confirmacion-verifymail', $data, function($message) use ($data) 
        {
            $message->to($data['mail'], 'Prueba1');
        });

        $this->mail = '';
        $this->cis = '';

        return $mail;

    }

    public function verify_mail($code)
    {
        $mailverify = MailTable::where('verify_code', $code)->first();
    }
}
