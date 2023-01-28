<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function halo(Request $request,$nama,$alamat){
        return "<h1>Halo {$nama}, alamat saya {$alamat} dari controller</h1>";
    }
}
