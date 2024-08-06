<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\DataUpdated;
use App\Models\ActivityModels;
use App\Models\InisialModels;
use Illuminate\Support\Facades\DB;
use DataTables;

class LogActivityController extends Controller
{
    public function index()
    {
        // Mengambil data awal untuk tampilan
        $data = DB::table('logactivity')->get();
        return view('LogActivity.index', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $data = ActivityModels::all(); // Ganti dengan query yang sesuai
        return response()->json($data);
    }

    public function form()
    {
        $activities = InisialModels::all();
        $data = ActivityModels::all();
        return view('LogActivity.form', ['activities' => $activities], ['data' => $data]);
    }

    // public function inisial(Request $request)
    // {
    //     $inisial = InisialModels::where('inisial', $request->inisial)->first();
    //     return response()->json($inisial);
    // }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'initial' => 'required',
            'activity' => 'required',
            'tanggal' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        dd($request);
        // $imagePath = null;
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('images', 'public');
        // }

        // InisialModels::updateOrCreate(
        //     ['id_log' => $request->input('id_log')],
        //     [
        //         'initial' => $request->input('initial'),
        //         'nama' => $request->input('nama'),
        //         'activity' => $request->input('activity'),
        //         'tanggal' => $request->input('tanggal'),
        //         'image' => $imagePath,
        //     ]
        // );

        // return redirect()->route('LogActivity.form')->with('success', 'Data berhasil disimpan.');
    }

    public function getActivity(Request $request)
    {
        $activity = InisialModels::where('initial', $request->initial)->first();
        return response()->json($activity);
    }

    public function getActivities()
    {
        return datatables()->of(InisialModels::query())->toJson();
    }

    public function edit($id)
    {
        $activity = InisialModels::findOrFail($id);
        return response()->json($activity);
    }
    
}
