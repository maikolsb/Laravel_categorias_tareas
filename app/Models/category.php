<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tarea;

class category extends Model
{
    use HasFactory;

    public function tareas(){
        //Devuelve todos los todos -> una categoria puede tener muchos todos
        return $this->hasMany(Tarea::class);
    }
}
