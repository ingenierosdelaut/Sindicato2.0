<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable=[
        'estado',
        'fecha',
        'id_usaurio',
        'motivo'
    ];
    use HasFactory;

}
