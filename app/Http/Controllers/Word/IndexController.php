<?php

namespace App\Http\Controllers\Word;

use App\Http\Controllers\Controller;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        // $data = Word::where('user_id', '=', 4)->get();
        $data = Word::all();
        // $data = Word::find(5)->get();
        return $data;
    }
}
