<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chamado extends Model {
    protected $table = 'chamados';
    protected $fillable = ['id_pedido', 'titulo', 'observacao', 'id_cliente'];

    public function pedido()
    {
        return $this->belongsTo('App\Models\Pedido', 'id_pedido', 'id');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente', 'id_cliente', 'id');
    }
}
