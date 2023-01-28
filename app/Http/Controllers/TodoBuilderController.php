<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoBuilderController extends Controller
{
    public function add(){
        // simpan data ke table todo menggunakan query builder

        DB::table('todos')->insert([
            'title' => 'Laravel Query Builder',
            'deskripsi' => 'Belajar laravel Query Builder',
            'tanggal' => '2022-11-13',
            'is_done' => false
        ]);
        
        return 'todo berhasil disimpan';
    }

    public function edit(){
        // edit data ke table todo menggunakan query builder

        DB::table('todos')->where('id',8)->update([
           // isi data yang mau kita edit 
           'title' => 'laravel query builder'
        ]);

        return 'todo berhasil diedit';
    }

    public function delete(){
        // delete data ke table todo menggunakan query builder
        DB::table('todos')->where('id',8)->delete();

        return 'todo berhasil dihapus';
    }


    public function migrations(){
        DB::table('migrations');
    }
}
