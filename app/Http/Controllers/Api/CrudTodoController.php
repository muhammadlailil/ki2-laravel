<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class CrudTodoController extends Controller
{
    use ApiResponse;

    function list(Request $request) {
        $listAllTodo = Todo::latest('id')
            ->select(['id', 'title', 'deskripsi', 'tanggal', 'is_done'])
            ->get();

        return $this->successData($listAllTodo);
    }

    function detail(Request $request,$id){
        $findTodo = Todo::findOrFail($id);
        return $this->successData($findTodo);
    }

    public function create(Request $request)
    {
        // $request->validate([]);
        Todo::create([
            'title' =>  $request->title,
            'deskripsi' =>  $request->deskripsi,
            'tanggal' =>  $request->tanggal,
            'is_done' =>  $request->is_done,
        ]);
        return $this->successResponse('Todo berhasil dibuat');
    }

    public function update(Request $request, $id)
    {
        Todo::findOrFail($id)->update([
            'title' =>  $request->title,
            'deskripsi' =>  $request->deskripsi,
            'tanggal' =>  $request->tanggal,
            'is_done' =>  $request->is_done,
        ]);
        return $this->successResponse('Todo berhasil diperbarui');
    }

    public function delete(Request $request, $id)
    {
        Todo::findOrFail($id)->delete();
        return $this->successResponse('Todo berhasil dihapus');
    }
}
