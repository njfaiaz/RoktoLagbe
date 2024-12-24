<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrHistoryController extends Controller
{
    public function index()
    {
        return view('frontend.history.index');
    }

    public function Store()
    {
        return view('frontend.history.edite');
    }
}
