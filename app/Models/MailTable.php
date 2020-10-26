<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailTable extends Model
{
    use HasFactory;

    protected $fillable = ['mail', 'estado'];
}
