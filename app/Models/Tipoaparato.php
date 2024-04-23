<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipoaparato
 *
 * @property $Id_tipoaparato
 * @property $Nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Aparato[] $aparatos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tipoaparato extends Model
{

    //'Id_tipoaparato'
    protected $table='tipoaparato';
    protected $primaryKey = 'Id_tipoaparato';
    static $rules = [
		'Nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Id_tipoaparato','Nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function aparatos()
    {
        return $this->hasMany('App\Models\Aparato', 'Id_tipoaparato', 'Id_tipoaparato');
    }
    

}
