<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class movesController extends Controller
{
    public function index()
{
  return view('entry.blade');
}
}
