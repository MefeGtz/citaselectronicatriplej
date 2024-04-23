<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\cliente;
use App\Models\Aparato;
use App\Models\User;
use Carbon\Carbon;

class Citas extends Model
{
    use HasFactory;
    protected $table='citas';
    protected $primaryKey = 'Id_cita';
    protected $fillable=[
       'Id_cliente',
       'Id_aparato',
       'Falla',
       'Fecha_creacion',
       'Fecha_cita',
       'Hora_inicial',
       'Hora_final',
       'Estado_cita',
       'Id_tecnico',
       'Id_usuario',
       'Observaciones',
    ];

    //hacer referencia a aparato y ulizar la relacion 
    /* public function aparato(){
        return $this->belongsTo(Aparato::class);
    } 
    public function cliente(){
        return $this->belongsTo(cliente::class);
    }*/

    public function cliente(){
        return $this->hasOne('App\Models\cliente','Id_cliente','Id_cliente');
    }

    public function aparato()
    {
        return $this->hasOne('App\Models\Aparato', 'Id_aparato', 'Id_aparato');
    }

    //primero va la llave primaria de la tabla principal y luego la foranea
    public function tecnico()
    {
        return $this->hasOne('App\Models\User', 'id', 'Id_tecnico');
    }
    
    //para cambiar el formato a las horas utilizado en index y en edit
    public function getHoraInicial12Attribute(){
        return (new Carbon($this->Hora_inicial))->format('g:i A');
    }

    public function getHoraFinal12Attribute(){
        return (new Carbon($this->Hora_final))->format('g:i A');
    }

}
