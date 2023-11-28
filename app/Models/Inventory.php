<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //protegiendo campos
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'quantity',
    ];
}
