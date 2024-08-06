<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;
use Response;

class StravaController extends Controller
{
    public function index(Request $request)
    {
        $datas=DB::table("strava")
                ->get();

        //dd($data);
        return view('strava.index', compact('datas'));
    }

    public function simpan(Request $request)
    {
        //dd($request->all());
        $data = [
            'segment_strava' => $request->segment_strava,
            'link' => $request->link,
            'temuan' => $request->temuan,
            'tindak_lanjut' => $request->tindak_lanjut,
            'updated_at' => $request->updated_at,

        ];
        //dd($data);
        DB::table('strava')
            ->insert($data);

        return redirect('/strava')->with('pesan', 'Data Tersimpan');
    }

    public function edit ($id)
    {
        //dd($id);
        $data = DB::table('strava')
                ->where('id_strava', $id)
                ->get();
        //dd($data);
        return view('strava.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {

        $data = [
            'segment_strava' => $request->segment_strava,
            'link' => $request->link,
            'temuan' => $request->temuan,
            'tindak_lanjut' => $request->tindak_lanjut,
            'updated_at' => $request->updated_at,
        ];

        DB::table('strava')
            ->where('id_strava', $id)
            ->update($data);

        return redirect('/strava')->with('pesan', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        DB::table('strava')
                ->where('id_strava', $id)
                ->delete();

        return redirect('/strava')->with('pesan', 'Data Deleted');
    }
}
