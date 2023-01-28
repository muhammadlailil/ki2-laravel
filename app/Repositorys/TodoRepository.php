<?php
namespace App\Repositorys;

use App\Models\Todo;

class TodoRepository extends Todo
{
    public static function allTodo()
    {
        return self::all();
    }

    public function todos(){
        return self::all();
    }
}
