<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;
    protected $table = 'alumno';
    protected $fillable = [
        'alumno',
        'curso',
        'apoderado',
        'estado',
        'colegio',
        'nivel',
        'habilitado',
        'numLista',
        'secuencia'
    ];


    public function attendance()
    {
        return $this->hasMany('App\Attendance', 'id_alumno', 'id');
    }

    public function school()
    {
        return $this->belongsTo('App\School', 'colegio');
    }
}
