<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personal';
    protected $primaryKey = 'idPersonal';
    const CREATED_AT = 'fechaAlta';
    const UPDATED_AT = 'fechaUMod';

    protected $fillable = [
        'idPersonal',
        'idEstadoCivil',
        'idPlaza',
        'idGenero',
        'foto',
        'nombre',
        'apellido1',
        'apellido2',
        'curp',
        'rfc',
        'fechaNacimiento',
        'numeroIdentificacion',
        'correoPersonal',
        'telefonoParticular',
        'telefonoCelular',
        'estatus',
        'fechaAlta',
        'fechaUMod',
        'fechaEliminacion',
        'idUsuarioAlta',
        'idUsuarioUMod',
        'idUsuarioEliminacion',
        'numeroCedula'
    ];

    public function getRouteKeyName()
    {
        return 'idPersonal';
    }

    public function estadoCivil() {
        return $this->hasOne(EstadoCivil::class, 'idEstadoCivil', 'idEstadoCivil');
    }

    public function plaza() {
        return $this->hasOne(Plaza::class, 'idPlaza', 'idPlaza');
    }

    public function usuario() {
        return $this->belongsTo(usuario::class, 'idPersonal', 'idPersonal');
    }
}
