<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Estudante;
use App\Http\Requests\EstudanteRequest;
use App\Http\Resources\Estudante as EstudanteResource;
use App\Http\Resources\Estudantes as EstudanteCollection;


class EstudanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Response $response)
    {
        return  (new EstudanteCollection(Estudante::paginate(20)))
                    ->response()
                    ->setStatusCode(Response::HTTP_OK);
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
        if (request()->header("Accept") === "application/xml") {
            return $this->getStudentXmlResponse($student);
        }

        if (request()->wantsJson()) {
            return new EstudanteResource($estudante);
        }

        return response(['message'=>'Não conheço esse formato']);
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

    public function getStudentXmlResponse($estudante)
    {
       $estudante = $estudante->toArray();
       $xml = new \SimpleXMLElement('<estudante/>');
       array_walk_recursive($estudante, function($value, $key) use ($xml) {
            $xml->addChild($key, $value);
       });
       return response($xml->asXML(), 200)
                    ->header('Content-Type', 'application/xml');
    }
}
