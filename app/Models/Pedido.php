<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model {
    protected $table = 'pedidos';
    protected $fillable = 'id_cliente';

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente', 'id_cliente', 'id');
    }
}
