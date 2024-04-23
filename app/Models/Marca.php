<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Marca
 *
 * @property $Id_marca
 * @property $Marca
 * @property $created_at
 * @property $updated_at
 *
 * @property Aparato[] $aparatos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Marca extends Model
{
    

  protected $primaryKey = 'Id_marca';
    static $rules = [
		'Marca' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Marca'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function aparatos()
    {
        return $this->hasMany('App\Models\Aparato', 'Id_marca', 'Id_marca');
    }
    

}
