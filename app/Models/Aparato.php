<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Aparato
 *
 * @property $Id_aparato
 * @property $Id_tipoaparato
 * @property $Id_marca
 * @property $Modelo
 * @property $Descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @property Marca $marca
 * @property Tipoaparato $tipoaparato
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Aparato extends Model
{
    
    protected $table='aparato';
    protected $primaryKey = 'Id_aparato';
    static $rules = [
		'Id_tipoaparato' => 'required',
		'Id_marca' => 'required',
		'Modelo' => 'required',
    ];

    protected $perPage = 20;
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Id_aparato','Id_tipoaparato','Id_marca','Modelo','Descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function marca()
    {
        return $this->hasOne('App\Models\Marca', 'Id_marca', 'Id_marca');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoaparato()
    {
        return $this->hasOne('App\Models\Tipoaparato', 'Id_tipoaparato', 'Id_tipoaparato');
    }

    //relacion a las citas

    public Function citas(){

        return $this->belongsToMany(Citas::class);
        
    }

    //copiar esto al modelo 
    
}
