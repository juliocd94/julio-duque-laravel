<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Compras;

class Invoice extends Model
{
    use HasFactory;

    public function client()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // public function compra(){
    //     return $this->belongsToMany(Compras::class);
    // }
}
