<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    /**
     * indica os atributos para definição de dados em massa
     *
     * @var array
     */
    protected $fillable = ['nome', 'nascimento', 'sala_id'];

    // /**
    //  * Faz conversão na hora de serialização
    //  *
    //  * @var array
    //  */
    protected $casts = [
        'nascimento' => 'date:d/m/Y'
    ];

    // /**
    //  * Define atributos não mostrados depois da serialização
    //  */
    protected $hidden = ['created_at', 'updated_at'];

    // /**
    //  * Define os atributos visiveis depois da serialização
    //  *
    //  * @var array
    //  */
    // protected $visible = ['nome', 'nascimento', 'sala_id'];

    /**
     * Mapeando de relacionamento da tabela Sala
     *
     * @return void
     */
    public function sala()
    {
        return $this->belongsTo('App\Sala');
    }
}
