<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidationRequest;

class ValidationController extends Controller
{
    public function index(){
        return view('validation');
    }

    public function submit(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        /// coding kita
        dd('debug');
    }

    public function submitForm(ValidationRequest $request){
        /// coding kita
        // save
        // TodoReposie::save(['']);
        dd('debug');
    }
}
