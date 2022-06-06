<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index()
    {
        $curso = Curso::all();
        return response()->json(['curso'=>$curso],200);
    }

    /**
     * @param Request $request
     * @return JsonResponse|void
     */
    public function store(Request $request)
    {
        try {
            $curso = new Curso;
            $curso->titulo = $request->input('titulo');
            $curso->descricao = $request->input('descricao');

            if( $curso->save() ){
                return response()->json(['curso'=>$curso],200);
            }
        }catch (\Exception $exception){
            return response()->json(['error'=>$exception]);
        }
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $curso = Curso::findOrFail( $id );
        return response()->json(['curso'=>$curso],200);
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse|void
     */
    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail( $id );
        $curso->titulo = $request->input('titulo');
        $curso->descricao = $request->input('descricao');

        if( $curso->save() ){
            return response()->json(['curso'=>$curso],200);
        }
    }

    /**
     * @param $id
     * @return JsonResponse|void
     */
    public function destroy($id)
    {
        $curso = Curso::findOrFail( $id );
        if( $curso->delete() ){
            return response()->json(['curso'=>$curso],200);
        }
    }
}
