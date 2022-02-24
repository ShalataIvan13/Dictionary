<?php

namespace App\Http\Controllers\Word;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Word\UpdateRequest;
use App\Models\Word;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Word $word)
    {
        $data = $request->validated();
        $word->update($data);
        return $word;
    }
}
