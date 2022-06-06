<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
      'titulo', 'descricao'
    ];

    static $rules=[
        'titulo'=>'required',
    ];

    public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }

    public function alunos()
    {
        return $this->belongsToMany(Aluno::class,'matriculas','curso_id','aluno_id');
    }
}
