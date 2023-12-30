<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersVenta extends Model
{
    use HasFactory;

    public function ventas(){
        return $this->belongsTo(Venta::class, 'codVenta','codigoVenta','ventas');
    }

    // User
    // public function ventas(){
    //     return $this->belongsToMany(Venta::class, 'users_ventas','user_id','codVenta');
    // }

}
