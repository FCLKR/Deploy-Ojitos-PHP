<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoVacuna extends Model
{
    use HasFactory;

    protected $table = 'producto_vacuna';

    protected $fillable = [
        'producto_id',
        'vacuna_id',
        'price',
    ];

    public function producto()
    {
        return $this->belongsTo(Product::class, 'producto_id');
    }

    public function vacuna()
    {
        return $this->belongsTo(Vacuna::class, 'vacuna_id');
    }
}

