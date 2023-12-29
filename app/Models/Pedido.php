<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function userVenta(){
        return $this->belongsTo(UsersVenta::class, 'id_UserVenta');
    }

    public function vendedores(){
        return $this->belongsTo(User::class, 'vendedor_id');
    }
}
