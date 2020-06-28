<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Helper\Report;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home.index');
    }

    public function store(Request $request) {
        $date = $request->date;
        $user_id = Auth::user()->id;

        $report = new Report($date, $user_id);
        $scatter = $report->scatter();

        return view('home.create', compact('scatter'));
    }
}
