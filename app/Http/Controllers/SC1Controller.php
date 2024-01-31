<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class SC1Controller extends Controller
{
    public function index()
    {
        return view('sc1.index');
    }

    public function yajra()
    {
        $split = DB::table('sc1')
                ->get();
        //dd($split);
        return DataTables::of($split)
        ->addColumn('action',function($data){
            $url_show = url('/show_sc1/'.$data->id);
            // $url_edit = url('/edit/'.$data->id);
            $url_hapus = url('/delete_sc1/'.$data->id);
            $button = '<a href="'.$url_show.'" class="btn btn-success fa fa-bars" title="Show"></a> &nbsp';
            // $button .= '<a href="'.$url_edit.'" class="btn btn-primary fa fa-edit" title="Edit"></a> &nbsp';
            $button .= '<a href="'.$url_hapus.'" class="btn btn-danger remove-user fa fa-trash" data-id="'.$url_hapus.'"></a>';
            return $button;
        })->rawColumns(['status','action'])->make(true);
    }

    public function show ($id)
    {
        $data = DB::table('sc1')
                    ->join('sc2', 'sc1.id', '=', 'sc2.id_sc1')
                    ->where('id', $id)
                    ->get();
        //dd($data);
        return view('sc1.show', compact('data'));
    }

    public function edit ($id)
    {
        $sc1 = DB::table('sc1')
                    ->join('sc2', 'sc1.id', '=', 'sc2.id_sc1')
                    ->find($id);

        $data = DB::table('sc1')
                    ->join('sc2', 'sc1.id', '=', 'sc2.id_sc1')
                    ->where('id', $id)
                    ->get();
        //dd($sc1,$data);
        return view('sc1.edit', compact('data', 'sc1'));
    }

    public function update(Request $request, $id)
    {
        $data1 = [
            'id' => $id,
            'nama_sc1' => $request->nama_sc1,
            'node' => $request->node,
            // 'alamat' => $request->alamat,
            'latlong' => $request->latlong,
        ];

        //dd($data1);
        DB::table('sc1')
                ->where('id', $id)
                ->update($data1);


        $id_sc2Array = $request->input('id_sc2');
        $outputArray =$request->input('output');
        $nojarArray = $request->input('nojar');
        $pelangganArray = $request->input('pelanggan');
        $segmentArray = $request->input('segment');
        $alamatArray = $request->input('alamat');
        $redamanArray = $request->input('redaman');


        foreach ($outputArray as $key => $output) {
            $nojar = $nojarArray[$key];
            $pelanggan = $pelangganArray[$key];
            $segment = $segmentArray[$key];
            $alamat = $alamatArray[$key];
            $redaman = $redamanArray[$key];
            $id_sc2 = $id_sc2Array[$key];

            DB::table('sc2')
                ->where('id_sc2', $id_sc2)
                ->update([
                    'output' => $output,
                    'nojar' => $nojar,
                    'pelanggan' => $pelanggan,
                    'segment' => $segment,
                    'alamat' => $alamat,
                    'redaman' => $redaman,
                ]);

        }
        return redirect('/show_sc1/' . $id)->with('pesan', 'Data Splitter Tersimpan');
    }

    public function delete($id)
    {
        DB::table('sc1')
                ->where('id', $id)
                ->delete();
        DB::table('sc2')
                ->where('id_sc1', $id)
                ->delete();

        return redirect('/sc1')->with('pesan', 'Data Splitter Deleted');
    }

    public function tambah()
    {
        return view('sc1.tambah');
    }

    public function simpan(Request $request)
    {
        $data1 = [
            'nama_sc1' => $request->nama_sc1,
            'node' => $request->node,
            'latlong' => $request->latlong,
        ];

        // $nama_sc1Array =$request->input('nama_sc1');
        // $nodeArray =$request->input('node');
        // $latlongArray =$request->input('latlong');

        $id_nojar = DB::table('sc1')
                ->insertGetId($data1);

        $id_nojarsc1 = $id_nojar;
        $outputArray =$request->input('output');
        $nojarArray = $request->input('nojar');
        $pelangganArray = $request->input('pelanggan');
        $segmentArray = $request->input('segment');
        $alamatArray = $request->input('alamat');
        $redamanArray = $request->input('redaman');

        foreach ($outputArray as $key => $output) {
            $nojar = $nojarArray[$key];
            $pelanggan = $pelangganArray[$key];
            $segment = $segmentArray[$key];
            $alamat = $alamatArray[$key];
            $redaman = $redamanArray[$key];
            $id_nojar = $id_nojarsc1;

            DB::table('sc2')
                ->insert([
                    'id_sc1' => $id_nojar,
                    'output' => $output,
                    'nojar' => $nojar,
                    'pelanggan' => $pelanggan,
                    'segment' => $segment,
                    'alamat' => $alamat,
                    'redaman' => $redaman,
                ]);

        }

        //dd($data1);

        return redirect('/sc1')->with('pesan', 'Data Splitter Tersimpan');
    }
}
