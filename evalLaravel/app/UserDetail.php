<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{

    protected $table = 'usuario_detalle';
    public $timestamps = false;

    protected $fillable = [
        'idusuario',
        'tipo_doc',
        'rut',
        'nombre_usuario',
        'apellido_paterno',
        'apellido_materno',
        'nacimiento',
        'sexo',
        'est_civil',
        'direccion',
        'idcomuna',
        'idprovincia',
        'idregion',
        'correo',
        'correo_valido',
        'celular',
        'telefono',
        'escolaridad',
        'cargo',
        'sist_salud',
        'observaciones',
        'nivel_capacitacion',
        'fecha_capacitacion',
        'graduado',
        'creador',
        'iduniversidad',
        'nombreInstitucionTitulo',
        'titulo_universitario',
        'tituloProfesional',
        'fechaCertificadoTitulo',
        'fecha_inicio_capacitacion',
        'porcentaje_enc',
        'sms',
        'sms_disponible',
        'pass_mail',
        'secuencia',
        'fecha_nacimiento'
    ];
    
}
