<?php

namespace App\Http\Controllers;

use App\Models\Roupa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function dashboard(){
        $roupas = Roupa::all();

        return view('welcome', compact('roupas'));
    }

    public function produto(Request $request){
        $produto = Roupa::find($request->id);

        return  view('Site.produto', compact('produto'));
    }
}
