<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','email'
    ];

    public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }

    public function cursos()
    {
        return $this->belongsToMany(Curso::class,'matriculas', 'aluno_id','curso_id');
    }
}
