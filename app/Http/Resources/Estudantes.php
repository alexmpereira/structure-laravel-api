<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class Estudantes extends ResourceCollection
{

    public $collects = Estudante::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'dados' => $this->collection,
            'links' => [
                'self' => 'teste'
            ]
        ];
    }
}
