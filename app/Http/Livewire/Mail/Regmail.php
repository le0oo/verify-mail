<?php

namespace App\Http\Livewire\Mail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\CisTable;
use App\Models\TableSystemCis;
use App\Models\VerifyMail;
use App\Models\CisMail;
use App\Models\MailTable;

use Illuminate\Http\Request;

use Livewire\Component;

class Regmail extends Component
{

    public $mail, $name, $ntelefono, $registed = false, $enviando = false;
    public $cis = [0 => null];
    protected $rules, $messages;
    public $cisdirec = [0 => null];

    public function render()
    {
        return view('livewire.mail.regmail');
    }

    public function store()
    {

        $this->mail = trim($this->mail);

        $this->rules = [
            'name' => 'required',
            'ntelefono' => 'required',
            'mail' => 'required|email',
            'cis.*' => 'required|numeric|exists:App\Models\TableSystemCis,cis',
        ];


        $this->messages = [
            'name.required' => 'Debe completar el nombre',
            'ntelefono.required' => 'Debe completar el telefono',
            'mail.required' => 'Debe completar el Email',
            'mail.email' => 'El email no es correcto',
            'cis.*.required' => 'Completar CIS',
            'cis.*.numeric' => 'CIS mal ingresado',
            'cis.*.exists' => 'CIS no existe',
        ];

        $this->validate();

        $this->enviando = true;

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
            $message->to($data['mail'], "Grupo Servicios Junin S.A.") -> subject('Verificación de Factura Digital');
        });

        $this->name = '';
        $this->ntelefono = '';
        $this->mail = '';
        $this->cis = [0 => null];
        $this->enviando = false;

        // session()->flash('message', 'Verificar Email en correo electronico...');

        return $this->registed = true;

    }

    public function agregarCis()
    {
        array_push($this->cis, null);
    }

    public function eliminarCis($id)
    {
        unset($this->cis[$id]);

        $array = [];
        foreach($this->cis as $key => $value){
            array_push($array, $value);
        }
        $this->cis = $array;
    }

    public function resetPage(){
        $this->resetErrorBag();
    }
}