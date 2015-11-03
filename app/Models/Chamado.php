<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chamado extends Model {
    protected $table = 'chamados';
    protected $fillable = ['id_pedido', 'titulo', 'observacao'];

    public function pedido()
    {
        $this->belongsTo('App\Models\Pedido', 'id_pedido', 'id');
    }
}
