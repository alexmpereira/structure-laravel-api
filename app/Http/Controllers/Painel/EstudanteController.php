<?php

/**
 * @SWG\Swagger(
 *     basePath="/api",
 *     schemes={"http"},
 *     host="http://localhost:8000",
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="API Estudantes",
 *         description="API de Estudantes",
 *         @SWG\Contact(
 *             email="alexmpprog@gmail.com"
 *         ),
 *     )
 * )
 */

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Estudante;
use App\Http\Requests\EstudanteRequest;
use App\Http\Resources\Estudante as EstudanteResource;
use App\Http\Resources\Estudantes as EstudanteCollection;
use JWTAuth;


class EstudanteController extends Controller
{
    protected $user;
 
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    /**
     * @SWG\Get(
     *      path="/estudantes",
     *      operationId="getestudantesList",
     *      tags={"estudantes"},
     *      summary="Get list of estudantes",
     *      description="Returns list of estudantes",
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *       @SWG\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * Returns list of estudantes
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudantes = Estudante::paginate(20);

        return  (new EstudanteCollection($estudantes))
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
     * @SWG\Get(
     *      path="/estudantes/{id}",
     *      operationId="getEstudanteById",
     *      tags={"estudantes"},
     *      summary="Informação de um estudante",
     *      description="Retorna um único estudante",
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *      @SWG\Response(response=400, description="Bad request"),
     *      @SWG\Response(response=404, description="Resource Not Found"),
     *      security={
     *         {
     *             "oauth2_security_example": {"write:estudantes", "read:estudantes"}
     *         }
     *     },
     * )
     *
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Estudante $estudante)
    {
        if (request()->header("Accept") === "application/xml") {
            return $this->getStudentXmlResponse($estudante);
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
