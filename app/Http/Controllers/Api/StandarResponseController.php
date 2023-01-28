<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class StandarResponseController extends Controller
{
    use ApiResponse;

    public function list(Request $request) {
        return $this->successData([
            'name' => 'Lailil Mahfud',
        ]);
    }

    public function success(Request $request)
    {
        return $this->successResponse('Oke');
    }

    public function requestBad(Request $request)
    {
        return $this->badRequest('Salah nih');
    }

    public function requestUnathorized(Request $request)
    {
        return $this->unauthorized('Login dulu bos');
    }
}
