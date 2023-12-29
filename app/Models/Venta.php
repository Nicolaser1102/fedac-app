<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    public function productos(){
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    public function usuarios(){
        return $this->belongsToMany(User::class, 'users_ventas','codVenta','user_id');
    }
}
