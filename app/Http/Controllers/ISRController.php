<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;
use Response;

class ISRController extends Controller
{
    public function index()
    {
        $datas = DB::table('data_isr')
                ->orderBy('updated_at', 'asc')
                 ->get();
        return view('isr.index', compact('datas'));
    }

    public function simpan(Request $request)
    {
        //dd($request->all());
        $data = [
            'nama_stasiun' => $request->nama_stasiun,
            'perangkat' => $request->perangkat,
            'frekuensi_tx' => $request->frekuensi_tx,
            'frekuensi_rx' => $request->frekuensi_rx,
            'period_awal' => $request->period_awal,
            'period_akhir' => $request->period_akhir,
            'bhp' => $request->bhp,
            'siteid' => $request->siteid,
            'isr' => $request->isr,
            'psb_user' => $request->psb_user,
            'psb_kemitraan' => $request->psb_kemitraan,
            'updated_at' => $request->updated_at,

        ];
        //dd($data);
        DB::table('data_isr')
            ->insert($data);

        return redirect('/isr')->with('pesan', 'Data Tersimpan');
    }

    public function edit ($id)
    {
        //dd($id);
        $data = DB::table('data_isr')
                ->where('no_isr', $id)
                ->get();
        //dd($data);
        return view('isr.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {

        $data = [
            'nama_stasiun' => $request->nama_stasiun,
            'perangkat' => $request->perangkat,
            'frekuensi_tx' => $request->frekuensi_tx,
            'frekuensi_rx' => $request->frekuensi_rx,
            'period_awal' => $request->period_awal,
            'period_akhir' => $request->period_akhir,
            'bhp' => $request->bhp,
            'siteid' => $request->siteid,
            'isr' => $request->isr,
            'psb_user' => $request->psb_user,
            'psb_kemitraan' => $request->psb_kemitraan,
            'updated_at' => $request->updated_at,

        ];

        DB::table('data_isr')
            ->where('no_isr', $id)
            ->update($data);

        return redirect('/isr')->with('pesan', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        DB::table('data_isr')
                ->where('no_isr', $id)
                ->delete();

        return redirect('/isr')->with('pesan', 'Data Deleted');
    }
}
