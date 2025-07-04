<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
/**
 * @property int $id
 * @property string $card
 * @property string $name
 * @property string $lastname
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $phone
 * @property string $direccion
 * @property string $estado
 * @property string $ciudad
 * @property int $puntos
 * @property string $rol
 * @property string $password
 * @property bool $activo
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property Carrito[] $carritos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'card',
        'name',
        'lastname',
        'email',
        'phone',
        'direccion',
        'estado',
        'ciudad',
        'puntos',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function carritos()
    {
        return $this->hasMany(\App\Models\Carrito::class, 'id', 'user_id');
    }
}
