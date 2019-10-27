<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

use App\Estudante;

class EstudanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Response $response)
    {
        return $response->setContent(Estudante::get()->toJson())
                ->setStatusCode(Response::HTTP_OK)
                ->header('Content-Type', 'application/json');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            return Estudante::create($request->all());
        } catch (\Throwable $e) {
           return response()->json([
               'message' => $e->getMessage()
           ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudante = Estudante::find($id);

        if($estudante)
        {
            return response()->json($estudante, Response::HTTP_FOUND);
        }
        
        return response()->json(['message' => 'Não encontrado'], Response::HTTP_NOT_FOUND);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $estudante = Estudante::find($id);

        if(!$estudante){
            return response()->json(['message' => 'Não encontrado'], Response::HTTP_NOT_FOUND); 
        }

        try {
            $estudante->update($request->all());

            return [];
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudante = Estudante::find($id);

        if(!$estudante){
            return response()->json(['message' => 'Não encontrado'], Response::HTTP_NOT_FOUND); 
        }

        try {
            $estudante->delete();

            return [];
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
