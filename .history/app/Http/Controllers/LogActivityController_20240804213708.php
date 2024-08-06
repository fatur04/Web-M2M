<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\DataUpdated;
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
    
    public function update(Request $request, $id)
    {
        DB::table('logactivity')
                ->where('id_log', $id)
                ->update($data);
        
        // Trigger the event
        broadcast(new DataUpdated($data))->toOthers();

        return response()->json(['status' => 'success']);
    }

    
}
