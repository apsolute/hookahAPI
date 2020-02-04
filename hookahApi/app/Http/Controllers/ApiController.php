<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function successResponse($data, $code = 200)
    {
        return response()->json(['data' => $data, 'code' => $code]);
    }


    public function errorResponse($errors, $code)
    {
        return response()->json(['errors' => $errors, 'code' => $code]);

    }
}
