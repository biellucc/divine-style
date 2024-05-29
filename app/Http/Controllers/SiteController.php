<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function dashboard(){
        $roupas = DB::table('roupa')->get();

        return view('welcome', compact('roupas'));
    }
}
