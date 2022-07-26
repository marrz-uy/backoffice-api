<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuntosInteres extends Model
{
    use HasFactory;
    public function ServiciosEsenciales()
    {
        return $this->hasMany(ServiciosEsenciales::class);
    }
    protected $table='puntosinteres';

    // protected $fillable=[
    //     'Nombre',
    //     'Departamento',
    //     'Ciudad',
    //     'Direccion',
    //     'Contacto',
    //     'Horario',
    //     'Descripcion'
    // ];
}
