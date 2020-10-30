<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MailTable;

class MailController extends Controller
{

    public function confirmarMail($hash){
        $mail = MailTable::where('hash', $hash)->first();
        $namemail = '';
        if($mail ==! null){
            if($mail->estado == false){
                $namemail = $mail->mail;
                $mail->estado = true;
                $mail->update();
                return view('mail.confirmacion-mail', [
                        'mensaje' => 'Mail Verificado', 
                        'verificado' => 'verificado',
                        'namemail' => $namemail
                    ]);
            }else{
                $namemail = $mail->mail;
                return view('mail.confirmacion-mail', [
                    'mensaje'=>'Su Mail ya a sido Verificado', 
                    'verificado'=>'yaverificado',
                    'namemail' => $namemail
                    ]);
            }
        }else{
            return view('mail.confirmacion-mail', [
                'mensaje'=>'Error de verificacion', 
                'verificado'=>'error']);
        }

    }
}