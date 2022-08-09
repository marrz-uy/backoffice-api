<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiciosEsenciales extends Model
{
    protected $table='servicios_esenciales';
    use HasFactory;
    public function PuntosInteres(){
        return $this->belongsTo(PuntosInteres::class);
    }
}
