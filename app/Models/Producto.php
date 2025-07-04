<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $codigo
 * @property $nombre
 * @property $precio
 * @property $precio_puntos
 * @property $marca
 * @property $regalo
 * @property $activo
 * @property $foto
 * @property $created_at
 * @property $updated_at
 *
 * @property Carrito[] $carritos
 * @property ProductoDetalle[] $productoDetalles


 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['codigo', 'nombre', 'precio', 'precio_puntos', 'marca', 'regalo', 'activo', 'foto'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carritos()
    {
        return $this->hasMany(\App\Models\Carrito::class, 'id', 'id_producto');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productoDetalles()
    {
        return $this->hasMany(\App\Models\ProductoDetalle::class, 'id', 'id_producto');
    }
    
}
