<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'usuarios';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'usuario-id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['usuario-nombre', 'usuario-apellido', 'usuario-correo', 'usuario-clave'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['usuario-clave', 'remember_token'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->{'usuario-clave'};
    }

    /**
     * Get the publications for the user.
     */
    public function publications()
    {
        return $this->hasMany(Publications::class, 'usuario-id');
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'email';
    }

    /**
     * Validate a user's credentials.
     *
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(array $credentials)
    {
        $hasher = app('hash');

        return $hasher->check($credentials['usuario-clave'], $this->{'usuario-clave'});
    }
}
