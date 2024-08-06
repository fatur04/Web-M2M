<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\DataUpdated;
use App\Models\ActivityModels;
use Illuminate\Support\Facades\DB;
use DataTables;

class LogActivityController extends Controller
{
    public function update(Request $request, $id)
    {
        $data = ActivityModels::create($request->all());

        broadcast(new DataUpdated($data))->toOthers();

        return response()->json(['message' => 'Data inserted successfully', 'data' => $data]);
    }

    public function index()
    {
        // Mengambil data awal untuk tampilan
        $data = DB::table('logactivity')->get();
        return view('LogActivity.index', ['data' => $data]);
    }
}
