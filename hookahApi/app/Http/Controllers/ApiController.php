<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function successResponse($data, $status = 200)
    {
        if(empty($data))
            $status = 204;

        return response()->json(['data' => $data], $status);
    }


    public function errorResponse($errors, $status)
    {
        if(empty($status))
            $status = 400;

        return response()->json(['errors' => $errors], $status);

    }
}
