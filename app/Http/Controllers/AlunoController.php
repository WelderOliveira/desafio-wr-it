<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index()
    {
        $alunos = Aluno::all();
        return response()->json(['alunos'=>$alunos],200);
    }

    /**
     * @param Request $request
     * @return JsonResponse|void
     */
    public function store(Request $request)
    {
        try {
            request()->validate(Aluno::$rules);

            $aluno = new Aluno;
            $aluno->name = $request->input('name');
            $aluno->email = $request->input('email');

            if($request->input('dt_nascimento')){
                $aluno->dt_nascimento = $request->input('dt_nascimento');
            }

            if( $aluno->save() ){
                return response()->json(['aluno'=>$aluno],200);
            }
        }catch (\Exception $exception){
            return response()->json(['error'=>$exception]);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function searchAluno(Request $request)
    {
        if ($request->name) {
            $aluno = Aluno::where([
                ['name', 'like', '%' . $request->name . '%']
            ]);
        }
        if ($request->email) {
            $aluno = Aluno::where([
                ['email', 'like', '%' . $request->email . '%']
            ]);
        }
        return response()->json($aluno->get(),200);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $aluno = Aluno::findOrFail( $id );
        return response()->json(['aluno'=>$aluno],200);
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse|void
     */
    public function update(Request $request, $id)
    {
        $aluno = Aluno::findOrFail( $id );
        $aluno->name = $request->input('name');
        $aluno->email = $request->input('email');
        $aluno->dt_nascimento = $request->input('dt_nascimento');

        if( $aluno->update() ){
            return response()->json(['aluno'=>$aluno],200);
        }
    }

    /**
     * @param $id
     * @return JsonResponse|void
     */
    public function destroy($id)
    {
        $aluno = Aluno::findOrFail( $id );
        if( $aluno->delete() ){
            return response()->json(['success'=>"Aluno excluido com Sucesso!"],200);
        }
    }
}
