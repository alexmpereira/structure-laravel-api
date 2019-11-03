<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Services\LinksGenerator;

class Estudante extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $links = new LinksGenerator;
        $links->addGet('self', route('estudantes.show', $this->id));
        $links->addPut('update', route('estudantes.update', $this->id));
        $links->addDelete('delete', route('estudantes.destroy', $this->id));

        return [
            'id' => ( int ) $this->id,
            'nome' => $this->nome,
            'nascimento' => $this->nascimento,
            'sala' => new Sala($this->sala),
            'links' => $links->toArray()
        ];
    }
}
