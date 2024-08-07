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
        $data = ActivityModels::orderBy('updated_at', 'desc')
                            ->get();
        return view('LogActivity.index', compact('data'));
    }

    public function update(Request $request)
    {
        $data = ActivityModels::all(); // Ganti dengan query yang sesuai
        return response()->json($data);
    }

    public function form()
    {
        $activities = InisialModels::all();
        $data = ActivityModels::orderBy('updated_at', 'desc')
                 ->get();
        return view('LogActivity.form', ['activities' => $activities], ['data' => $data]);
    }

    public function store(Request $request)
    {
        
        // Menyimpan gambar

        // $file = $request->file('foto_kuota');

        // if ($file == NULL) {
        //     // Tidak ada gambar diunggah, set kolom database sesuai dengan preferensi Anda
        //     $nama_file = ''; // atau NULL, tergantung pada preferensi Anda
        // } else {
        //     $file = $request->file('activity');
        //     $nama_file = time()."_".$file->getClientOriginalName();
        //     $tujuan_upload = 'activity';
        //     $file->move($tujuan_upload,$nama_file);
        // }

        // Data yang akan disimpan atau diperbarui
        $data = [
            'nama' => $request->nama,
            'initial' => $request->initial,
            'cluster' => $request->cluster,
            'start' => $request->start,
            'end' => $request->end,
            'activity' => $request->activity,
            
            //'image' => $file,
            //'updated_at' => $request->updated_at,
        ];

        //dd($data);

        DB::table('logactivity')
            ->insert($data);

        
        $data = ActivityModels::all();
        return redirect('/formActivity')->with('pesan', 'Data Berhasil Diubah', ['data' => $data]);
        //return view('LogActivity.form', ['data' => $data]);
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
        $activity = ActivityModels::findOrFail($id);
        $activities = ActivityModels::all(); // Ambil semua aktivitas untuk dropdown
        $data = ActivityModels::all();

        return view('LogActivity.edit', compact('activity', 'activities', 'data'));
    }

    public function updatelog(Request $request, $id)
    {
        
        $data = [
            'nama' => $request->nama,
            'initial' => $request->initial,
            'cluster' => $request->cluster,
            'start' => $request->start,
            'end' => $request->end,
            'activity' => $request->activity,
            
            //'image' => $file,
            //'updated_at' => $request->updated_at,
        ];

        //dd($data);
        DB::table('logactivity')
            ->where('id_log', $id)
            ->update($data);

        return redirect('/formActivity')->with('pesan', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        DB::table('logactivity')
                ->where('id_log', $id)
                ->delete();

        return redirect('/logactivity')->with('pesan', 'Data Deleted');
    }
    
}
