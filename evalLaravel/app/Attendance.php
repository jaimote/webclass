<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'alumno_asistencia';
    public $timestamps = false;


    public function student()
    {
        return $this->belongsTo('App\Student', 'id_alumno', 'alumno');
    }
}
