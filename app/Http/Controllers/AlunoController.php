<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $alunos = Aluno::all();
        return response()->json(['aluno'=>$alunos],200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function store(Request $request)
    {
        try {
            request()->validate(Aluno::$rules);

            $aluno = new Aluno;
            $aluno->name = $request->input('name');
            $aluno->email = $request->input('email');
            $aluno->dt_nascimento = $request->input('dt_nascimento');

            if( $aluno->save() ){
                return response()->json(['aluno'=>$aluno],200);
            }
        }catch (\Exception $exception){
            return response()->json(['error'=>$exception]);
        }
    }

    public function searchAluno()
    {
//        if ($search){
//            $contatos = Aluno::where([
//                ['nome','like','%'.$search.'%']
//            ])->get();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $aluno = Aluno::findOrFail( $id );
        return response()->json(['aluno'=>$aluno],200);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse|void
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
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function destroy($id)
    {
        $aluno = Aluno::findOrFail( $id );
        if( $aluno->delete() ){
            return response()->json(['aluno'=>$aluno],200);
        }
    }
}
