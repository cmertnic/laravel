<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Storage;
class ReportController extends Controller
{
    public function index()
    {
        // Получаем отчеты только для текущего пользователя
        $reports = Report::where('user_id', Auth::id())->paginate(10);
        
        return view('report.index', ['reports' => $reports]);
    }
    public function create() {
        return view('report.create');
    }
    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->back();
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'number' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'path_img' => 'image|mimes:png,jpg,jpeg,gif|max:800',
        ]);
        $imageName=Storage::disk('public')->put('/reports',$request->file('path_img'));
        $imageName=time() . '.' . $request['path_img']->extension();
        $request['path_img']->move(public_path('storage'),$imageName);
        Report::create([
            'number' => $request->number,
            'description' => $request->description,
            'path_img'=>$imageName,
            'status_id' => 1,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->back()->with('info','Заявление отправлено');
    }
    public function update(Request $request) {
        $request->validate([
            'status_id' => ['required', 'exists:statuses,id'],
            'id' => ['required']
        ]);
        Report::where('id', $request->id)->update([
            'status_id' => $request->status_id,
        ]);
        return redirect()->back();
    }

    public function show(Report $report)
    {     
        return view('report.edit', compact('report'));
    }
}
