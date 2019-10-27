<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    protected $fillable = ['descricao'];

    /**
     * Mapeando de relacionamento da tabela estudantes
     *
     * @return void
     */
    public function estudantes()
    {
        return $this->hasMany('App\Models\Estudante');
    }
}
