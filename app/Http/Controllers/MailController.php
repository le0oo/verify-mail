<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MailTable;
use App\Models\VerifyMail;
use App\Models\CisTable;
use App\Models\CisMail;

class MailController extends Controller
{

    public function confirmarMail($hash)
    {
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

    public function confirmarFormRegMail($hash)
    {
        $mailverify = VerifyMail::where('verify_code', $hash)->first();

        if($mailverify ==! null && ! $mailverify->confirmed){
    
            $mailverify->confirmed = true;
            $mailverify->save();

            $cismail = CisMail::where('id_cis_table_fk', $mailverify->id)->first();

            $mailtable = MailTable::create([
                'cis' => $cismail->cistables->cis,
                'mail' => $mailverify->mail,
                'hash' => $mailverify->verify_code,
                'estado' => true,
            ]);

            return view('mail.confirmacion-mail', [
                'mensaje' => 'Mail Verificado', 
                'verificado' => 'verificado',
                'cis' => $cismail->cistables->cis,
                'namemail' => $mailverify->mail
            ]);

        }elseif($mailverify ==! null && $mailverify->confirmed){
            
            return view('mail.confirmacion-mail', [
                'mensaje'=>'Su Mail ya a sido Verificado', 
                'verificado'=>'yaverificado',
                'namemail' => $mailverify->mail
                ]);
            
        }elseif(!$mailverify){

            return view('mail.confirmacion-mail', [
                'mensaje'=>'Error de verificacion', 
                'verificado'=>'error']);

        }
    }

}