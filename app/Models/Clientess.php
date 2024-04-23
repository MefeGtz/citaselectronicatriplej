<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientess extends Model
{
    //use HasFactory;
protected $table="clientes";
protected $primaryKey="Id_cliente";
protected $fillable=[
    'Nombre','Apellidos','Id_genero','Direccion','Telefono'
];
}
