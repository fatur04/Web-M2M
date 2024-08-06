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
        $data = ActivityModels::find($id);
        $data->update($request->all());

        broadcast(new DataUpdated($data));

        return response()->json(['message' => 'Data updated successfully']);
    }

    public function index()
    {
        // Mengambil data awal untuk tampilan
        $data = DB::table('logactivity')->get();
        return view('LogActivity.index', ['data' => $data]);
    }
}
