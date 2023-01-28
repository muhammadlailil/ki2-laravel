<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadFileController extends Controller
{
    function index(Request $request){
        return view('upload-file.index');
    }

    function store(Request $request){
        $upload = Storage::put('image',$request->file_upload);
        return "storage/$upload";
    }
}
