<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    function index(){

        $data = [
            'nama' => 'Muhammad Lailil Mahfud',
            'telfon' => '085747474744',
            'asal' => 'Jepara'
        ];

        return view('about-us', $data );
    }
}
