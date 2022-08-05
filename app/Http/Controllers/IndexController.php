<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{

    public function __invoke()
    {
        return view('index');
    }
}
