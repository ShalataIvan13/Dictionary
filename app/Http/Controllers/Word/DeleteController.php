<?php

namespace App\Http\Controllers\Word;

use App\Models\Word;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function __invoke(Word $word)
    {
        $word->delete();
    }
}
