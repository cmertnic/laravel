<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reports;

class ReportController extends Controller
{
    
    public function index(){
        $reports = reports::all();
        return view('report.index', ['reports' => $reports]);
    }
}