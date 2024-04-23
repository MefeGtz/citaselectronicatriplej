<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Sanctum\HasApiTokens;
//citas 



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'DNI',
        'direccion',
        'telefono',
        'rol',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function scopeAdmins($query){
        return $query->where('rol','TecAdmin');
    }

    public function scopeTecnicos($query){
        return $query->where('rol','Tecnico');
    }
    
    
    public function scopeTodos($query){
        return $query->where('rol','Tecnico')->orwhere('rol','TecAdmin');
    }
    public function asCitastecnico(){
        return $this->hasMany('App\Models\Citas','Id_tecnico','id');
    }

    //para saber cuales citas fueron completadas 
    //citas completadas
    public function citasCompletadas() {
        return $this->asCitastecnico()->where('Estado_cita','Finalizada');
    }

    //para saber cuales citas dueron canceladas por cada tecnico
    public function citasCanceladas() {
        return $this->asCitastecnico()->where('Estado_cita','Cancelada');
    }
}
