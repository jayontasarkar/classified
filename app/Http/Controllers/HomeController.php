<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$areas = Area::get()->toTree();

        return view('home', compact('areas'));
    }
}
