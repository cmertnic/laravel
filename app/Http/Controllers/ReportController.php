<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\DB;
class ReportController extends Controller
{
    
    public function index(){
        $reports = Report::paginate(10);
        return view('report.index', ['reports' => $reports]);
    }
    public function destroy(Report $report){
        $report -> delete();
        return redirect()->back();
    }
    public function store(Request $request, Report $report)
    {
        $data = $request->validate([
            'number' => 'string',
            'description' => 'text',
        ]);
        $report->create($data);
        return redirect()->back();
    }
    public function update(Request $request, Report  $report)
    {
        $data = $request->validate([
            'number' => 'string',
            'description' => 'text',
        ]);
        $report->update($data);
        return redirect()->back();
    }
    public function show(Report  $report)
    {     
        return view('report.edit',compact('report'));
    }
}