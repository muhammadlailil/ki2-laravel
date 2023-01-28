<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function add(){
        // simpan data ke table todo menggunakan eloquent
        // cara pertama
        Todo::create([
            'title' => 'Belajar Laravel',
            'deskripsi' => 'Harus bisa laravel bulan ini',
            'tanggal' => '2022-11-12',
            'is_done' => false,
        ]);

        // cara kedua
        $todo = new Todo();
        $todo->title = 'Belajar Laravel Eloquent';
        $todo->deskripsi = 'Harus bisa laravel eloquent';
        $todo->tanggal = '2022-11-11';
        $todo->is_done = true;
        $todo->save();

        return 'todo berhasil dibuat';
    }

    public function edit(){
        // edit data ke table todo menggunakan eloquent
        // cara pertama
        Todo::findOrFail(1)->update([
            'title'=>'Belajar Eloquent Laravel'
        ]);

        // cara kedua
        $todo = Todo::findOrFail(1);
        $todo->title = 'Laravel Edit Kedua';
        $todo->update();

        return 'todo berhasil diedit';
    }

    public function delete(){
        // delete data ke table todo menggunakan eloquent
        // cara pertama
        Todo::findOrFail(2)->delete();


        // $todo = Todo::findOrFail(2);
        // $todo->delete();

        return 'todo berhasil dihapus';
    }
}
