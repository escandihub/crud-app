<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $fillable = ['nombre', 'edad', 'direccion', 'activo'];
    use HasFactory;
}
