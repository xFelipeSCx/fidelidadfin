<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MarcasDescuento
 *
 * @property $id
 * @property $nombre
 * @property $correo_electronico
 * @property $numero_telefono
 * @property $activo
 * @property $created_at
 * @property $updated_at
 *
 * @property Descuento[] $descuentos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MarcasDescuento extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'correo_electronico', 'numero_telefono', 'activo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function descuentos()
    {
        return $this->hasMany(\App\Models\Descuento::class, 'id', 'marca_id');
    }
    
}
