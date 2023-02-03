<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tax;


class Product extends Model
{
    use HasFactory;

    public function tax()
    {
        return $this->belongsTo(Tax::class, 'taxes_id');
    }
}
