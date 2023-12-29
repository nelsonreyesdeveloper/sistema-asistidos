<?php

namespace App\Models;

use App\Models\Tipo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expediente extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_id',
        'user_id',
        'n_expediente',
        'delito',
        'fecha_sentencia',
        'pena',
        'fecha_ingreso',
        'observaciones',
        'penas_accesorias'
    ];

    public $timestamps = false;

    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'tipo_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
