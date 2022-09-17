<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;
    
    protected $fillable = ["specialty_id", "professional_id", "source_id", "name", "cpf", "birthdate"];
}
