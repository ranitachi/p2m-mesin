<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
class ApiController extends Controller
{
    public function test()
    {
        return Response::json([
            'key' => '123',
            'key2' => 'abc'
        ]);
    }
}
