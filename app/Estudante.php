<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    protected $fillable = ['nome', 'nascimento', 'sala_id'];

    /**
     * Mapeando de relacionamento da tabela Sala
     *
     * @return void
     */
    public function sala()
    {
        return $this->belongsTo('App\Models\Sala');
    }
}
