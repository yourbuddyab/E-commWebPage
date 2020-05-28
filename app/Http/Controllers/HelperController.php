<?php

namespace App\Http\Controllers;

use App\Produect;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    public function index()
    {
        $product = Produect::where('status', 1)->get();
        return view('/welcome', compact('product'));
    }
}
