<?php

namespace App\Http\Livewire\Mail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\CisTable;
use App\Models\VerifyMail;
use App\Models\CisMail;
use App\Models\MailTable;

use Illuminate\Http\Request;

use Livewire\Component;

class Regmail extends Component
{

    public $mail;
    public $cis = [0];

    public function render()
    {
        return view('livewire.mail.regmail');
    }


    public function store()
    {
        $data = [
            'mail' => $this->mail,
            'cis' => $this->cis,
            'verify_code' => Str::random(64),
        ];

        $verifymail = VerifyMail::create([
            'mail' => $data['mail'],
            'verify_code' => $data['verify_code'],
        ]);
        
        foreach($data['cis'] as $key => $value)
        {
            $cistable = CisTable::create([
                'cis' => $value
            ]);
            $cismail = CisMail::create([
                'id_verify_mail_fk'=>$verifymail->id,
                'id_cis_table_fk'=>$cistable->id
            ]);
        }

        // Se envia mail para confirmar el mail

        Mail::send('mail.confirmacion-verifymail', $data, function($message) use ($data) 
        {
            $message->to($data['mail'], "Grupo Servicios Junin") -> subject('Verificacion de Factura Digital');
        });
        

        $this->mail = '';
        $this->cis[1] = '';
        $this->cis[2] = '';

        session()->flash('message', 'Verificar Mail en correo electronico...');

        // return $mail;

    }

}