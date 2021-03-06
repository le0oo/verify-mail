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
        $mail = MailTable::where('hash', $hash)->get();
        $namemail = '';

        if(!$mail){
            if($mail[0]->estado == false){
                $namemail = $mail[0]->mail;
                
                foreach($mail as $indice){
                    $indice->estado = true;
                    $indice->update();
                }

                return view('mail.confirmacion-mail', [
                        'mensaje' => 'Mail Verificado', 
                        'verificado' => 'verificado',
                        'namemail' => $namemail
                    ]);
            }else{
                $namemail = $mail[0]->mail;
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

            $cismail = CisMail::where('id_verify_mail_fk', $mailverify->id)->get();

            foreach ($cismail as $indice){
                $mailtable = MailTable::create([
                    'cis' => $indice->cistables->cis,
                    'mail' => $mailverify->mail,
                    'hash' => $mailverify->verify_code,
                    'estado' => true,
                ]);
            }
            return view('mail.confirmacion-mail', [
                'mensaje' => 'Mail Verificado', 
                'verificado' => 'verificado',
                'cis' => $cismail,
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

    public function confirmarMailsincis($hash)
    {
        $mail = MailTable::where('hash', $hash)->first();
        $namemail = '';
        
        if($mail)
        {
            if($mail->estado == false)
            {
                $namemail = $mail->mail;
                $mail->estado = true;
                $mail->update();

                return view('mail.confirmacion-mail', [
                        'mensaje' => 'Mail Verificado', 
                        'verificado' => 'verificado',
                        'namemail' => $namemail
                    ]);

            }elseif($mail->estado == true)
            {
                $namemail = $mail->mail;
                return view('mail.confirmacion-mail', [
                    'mensaje'=>'Su Mail ya a sido Verificado', 
                    'verificado'=>'yaverificado',
                    'namemail' => $namemail
                    ]);
            
            }
        }else
        {
            return view('mail.confirmacion-mail', [
                'mensaje'=>'Error de verificacion', 
                'verificado'=>'error']);
        }

    }

    public function registerMail($user,$pass,$cis,$varmail,$hash){
    
        $arrCis = (json_decode($cis,TRUE));

        if ($user === "sysadmin" && $pass ==="SaleVale"){

            foreach($arrCis as $key => $value){
                $mailtable = MailTable::create([
                    'cis' => $value,
                    'mail' => $varmail,
                    'hash' => $hash,
                ]);
            }
        }

    }

    public function registerMailsincis($user,$pass,$varmail,$hash){

        $validation = MailTable::where('hash', $hash)
                                ->first();

        if ($user === "sysadmin" && $pass ==="SaleVale"){
            if(!$validation){
                MailTable::create([
                    'hash' => $hash,
                    'mail' => $varmail,
                ]);
            }elseif($validation->mail !== $varmail){
                $validation->mail = $varmail;
                $validation->estado = false;
                $validation->save();
            }
        }
    }
}