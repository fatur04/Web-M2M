<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\DataUpdated;
use App\Models\ActivityModels;
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

    
}
