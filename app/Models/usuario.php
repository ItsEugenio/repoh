<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Auth\Passwords\CanResetPassword;

class usuario extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'usuario';
    protected $primaryKey = 'idUsuario';
    
    const CREATED_AT = 'fechaAlta';
    const UPDATED_AT = 'fechaUMod'; 

    protected $fillable = [ 
        'idUsuario',
        'idPersonal',
        'idRoles',
        'usuario',
        'password',
        'suspendido',
        'ultimoAcceso',
        'remember_token',
        'estatus',
        'fechaAlta',
        'fechaUMod',
        'fechaEliminacion',
        'idUsuarioAlta',
        'idUsuarioUMod',
        'idUsuarioEliminacion',
        'email'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRouteKeyName() {
        return 'idUsuario';
    }

    public function Personal() {
        return $this->hasOne(Personal::class, 'idPersonal','idPersonal');
    }

    public function articulos() {
        return $this->hasMany(Articulo::class, 'idUsuario', 'idUsuario');
    }

    public function sendPasswordResetNotification($token) {
        $this->notify(new ResetPasswordNotification($token));
    }

}

