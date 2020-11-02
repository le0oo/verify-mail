<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CisTable extends Model
{
    use HasFactory;

    protected $fillable = ['cis','descrip'];

}
