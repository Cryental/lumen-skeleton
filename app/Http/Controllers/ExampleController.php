<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function Example(Request $request)
    {
        return response()->json(['hehe']);
    }
}
