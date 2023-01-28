<?php
namespace App\Services;

use App\Repositorys\TodoRepository;

class TodoService
{
    public static function allTodo()
    {
        $data = TodoRepository::allTodo();
        foreach($data as $row){
            $row->created_at = date('Y-m-d H:i:s',strtotime($row->created_at));
            $row->updated_at = date('Y-m-d H:i:s',strtotime($row->updated_at));
            
            $row->title_new = "New Title $row->title";
        }

        return $data;
    }
}
