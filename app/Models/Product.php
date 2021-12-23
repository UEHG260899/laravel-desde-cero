<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //Permite llenar de manera directa todos estos atributos
    protected $fillable = [
        'title',
        'decription',
        'price',
        'stock',
        'status'
    ];
}
