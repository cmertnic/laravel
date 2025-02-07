<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $reports = Report::paginate(10); 
        
        return view('admin', compact('reports'));
    }

    public function update(Request $request, $id)
    {
        $report = Report::findOrFail($id);
        
        $report->status_id = $request->input('status_id');
        $report->save();

        return redirect()->route('admin.index')->with('success', 'Статус отчета обновлен успешно!');
    }
}
