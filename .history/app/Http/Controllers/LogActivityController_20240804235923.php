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
    public $timestamps = false;
    public function index()
    {
        // Mengambil data awal untuk tampilan
        $data = DB::table('logactivity')->get();
        //dd($data);
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
        
        // Menyimpan gambar
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Data yang akan disimpan atau diperbarui
        $data = [
            'nama' => $request->nama,
            'initial' => $request->initial,
            'activity' => $request->activity,
            'tanggal' => $request->tanggal,
            'image' => $imagePath,
            //'updated_at' => $request->updated_at,
        ];

        //dd($data);

        DB::table('logactivity')
            ->insert($data);

        return redirect()->route('formActivity')->with('success', 'Data berhasil disimpan.');
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
