<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ApiController extends BaseController
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
