<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyMail extends Model
{
    use HasFactory;

    protected $fillable = ['mail','descrip','verify_code','confirmed'];
}
