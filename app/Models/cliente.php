<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    protected $primaryKey = 'Id_cliente';
    use HasFactory;

    public Function citas(){
        return $this->belongsToMany(Citas::class);
    }
}
