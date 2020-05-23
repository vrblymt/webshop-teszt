<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class NewsController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('News')->with('adat', $data);
    }
}
