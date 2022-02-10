<?php

namespace App\Http\Controllers\Word;

use App\Http\Controllers\Controller;
use App\Http\Requests\Word\StoreRequest;
use App\Models\Word;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        // return $data;
        
        $word = Word::create($data);
        return $word;
    }
}
