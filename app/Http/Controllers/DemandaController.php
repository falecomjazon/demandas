<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demanda;

class DemandaController extends Controller
{
    public function index() {
       // $demandas = Demanda::get();
        //return view('welcome',compact('demandas'));
        return redirect('/admin');
    }
}
