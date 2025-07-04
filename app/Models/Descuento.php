<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Descuento
 *
 * @property $id
 * @property $marca_id
 * @property $descuento
 * @property $descripcion
 * @property $activo
 * @property $created_at
 * @property $updated_at
 *
 * @property MarcasDescuento $marcasDescuento
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Descuento extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['marca_id', 'descuento', 'descripcion', 'activo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function marcasDescuento()
    {
        return $this->belongsTo(\App\Models\MarcasDescuento::class, 'marca_id', 'id');
    }
    
}
