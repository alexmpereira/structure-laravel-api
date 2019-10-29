<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\EstudanteRequest;

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
    public function store(EstudanteRequest $request)
    {
        return Estudante::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Estudante $estudante)
    {
        return $estudante;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EstudanteRequest $request, Estudante $estudante)
    {
        $estudante->update($request->all());
        return [];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudante $estudante)
    {
        $estudante->delete();
        return [];
    }
}
