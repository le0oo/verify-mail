<?php

namespace App\Http\Livewire\Mail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\CisTable;
// use App\Models\TableSystemCis;
use App\Models\VerifyMail;
use App\Models\CisMail;
use App\Models\MailTable;


use Illuminate\Http\Request;

use Livewire\Component;

class Regmail extends Component
{

    public $mail;
    public $cis = [0 => null];
    
    protected $rules = [        
        'mail' => 'required|email',
        'cis.*' => 'required|numeric|exists:App\Models\TableSystemCis,cis',
    ];

    protected $messages = [
        'mail.required' => 'Debe Completar el campo Email',
        'mail.email' => 'El email no es correcto',
        'cis.*.required' => 'Debe Completar el campo CIS',
        'cis.*.numeric' => 'CIS mal ingresado',
        'cis.*.exists' => 'El CIS no existe',
    ];


    public function render()
    {
        return view('livewire.mail.regmail');
    }

    public function store()
    {

        $this->validate();

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
        $this->cis = [0 => null];

        session()->flash('message', 'Verificar Mail en correo electronico...');

    }

    public function agregarCis()
    {
        array_push($this->cis, null);
    }

    public function eliminarCis()
    {
        // dd(count($this->cis));

        if(count($this->cis) > 1)
        {
            array_pop($this->cis);
        }
    }
}