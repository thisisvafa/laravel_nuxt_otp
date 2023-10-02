<?php

namespace App\Http\Controllers\Countries;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use Illuminate\Http\Request;

class CodeController extends Controller
{
    public function show()
    {
        $countriesCode = Countries::select('id', 'name', 'phonecode')->get();
        return response()->json(['data' => $countriesCode]);
    }
}
