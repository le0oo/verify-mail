<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CisMail extends Model
{
    use HasFactory;

    protected $fillable = ['id_verify_mail_fk','id_cis_table_fk'];

    public function verifymail()
    {
        return $this->belongsTo('App\Models\VerifyMail','id_verify_mail_fk','id');
    }

    public function cistables()
    {
        return $this->belongsTo('App\Models\CisTable','id_cis_table_fk','id');
    }
}
