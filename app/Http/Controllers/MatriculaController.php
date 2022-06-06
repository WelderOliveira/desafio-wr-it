<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Matricula;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    /**
     * Lista os cursos que o aluno esta matriculado
     *
     * @return JsonResponse
     */
    public function consultaCursosAluno($id)
    {

        $aluno['dadosAluno'] = Aluno::findOrFail($id);
        $matricula = Matricula::where('aluno_id', $id)->get()->toArray();//Pesquiso pelo Aluno
        $aluno['qntTurmasRegistrado'] = count($matricula);

        foreach ($matricula as $key => $al){
            $aluno[$key]['cursoAluno'] = Curso::findOrFail($al['curso_id']);
        }

        return response()->json($aluno,200);
    }

    /**
     * Lista os Alunos Matriculados no Curso
     *
     * @param $id
     * @return JsonResponse
     */
    public function consultaAlunosCurso($id)
    {

        $aluno['dadosCurso'] = Curso::findOrFail($id);
        $matricula = Matricula::where('curso_id', $id)->get()->toArray();//Pesquiso pelo Curso
        $aluno['qntAlunosMatriculados'] = count($matricula);

        foreach ($matricula as $key => $al){
            $aluno[$key]['alunoCurso'] = Aluno::findOrFail($al['aluno_id']);
        }

        return response()->json($aluno,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $matricula = new Matricula;
            $matricula->aluno_id = $request->input('aluno_id');
            $matricula->curso_id = $request->input('curso_id');

            if( $matricula->save() ){
                return response()->json([$matricula],200);
            }
        }catch (\Exception $exception){
            return response()->json(['error'=>$exception]);
        }
    }

    /**
     * @param $id
     * @return JsonResponse|void
     */
    public function destroy($id)
    {
        $matricula = Matricula::findOrFail( $id );
        if( $matricula->delete() ){
            return response()->json(['success'=>"Matricula Excluida com Sucesso!"],200);
        }
    }
}
