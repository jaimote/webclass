<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'colegio';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'nombre',
        'rbd',
        'direccion',
        'url',
        'curriculum',
        'visible',
        'modulos',
        'encargado',
        'id_ant',
        'semilla',
        'estado_comercial',
        'cuenta_wm',
        'pass_wm',
        'pseudo',
        'grupo_wc',
        'basePromedioCritico',
        'baseAsistenciaCritica',
        'umbral_asistencia_bloque',
        'tema_institucional',
        'fecha_activacion',
        'fecha_caducidad',
        'fecha_venta',
        'codigo_activacion',
        'numero_matriculados',
    ];

    public function grades()
    {
        return $this->hasMany('App\Grade', 'colegio')->where('visible', true)
            ->with('gradeImage')
            ->orderBy('nivel', 'ASC')
            ->orderBy('letra', 'ASC');
    }
}
