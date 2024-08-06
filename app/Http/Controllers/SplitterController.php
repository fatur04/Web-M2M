<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use DateTime;
use DateTimeZone;

class SplitterController extends Controller
{
    public function index()
    {
        return view('splitter.index');
    }

    public function yajra()
    {
        $split = DB::table('splitter')
                ->get();
        //dd($split);
        return DataTables::of($split)
        ->addColumn('action',function($data){
            $url_show = url('/show_splitter/'.$data->id);
            // $url_edit = url('/edit/'.$data->id);
            $url_hapus = url('/delete_splitter/'.$data->id);
            $button = '<a href="'.$url_show.'" class="btn btn-success fa fa-bars" title="Show"></a> &nbsp';
            // $button .= '<a href="'.$url_edit.'" class="btn btn-primary fa fa-edit" title="Edit"></a> &nbsp';
            $button .= '<a href="'.$url_hapus.'" class="btn btn-danger remove-user fa fa-trash" data-id="'.$url_hapus.'"></a>';
            return $button;
        })->rawColumns(['status','action'])->make(true);
    }
    public function tambah()
    {
        return view('splitter.tambah');
    }

    public function simpan(Request $request)
    {

        $data1 = [
            'nama_splitter' => $request->nama_splitter,
            'node' => $request->node,
            'alamat' => $request->alamat,
            'latlong' => $request->latlong,
            'input1' => $request->input1,
            'input2' => $request->input2,
            'output1' => $request->output1,
            'output2' => $request->output2,
            'output3' => $request->output3,
            'output4' => $request->output4,
            'output5' => $request->output5,
            'output6' => $request->output6,
            'output7' => $request->output7,
            'output8' => $request->output8,
        ];

        //dd($data);
        $id_nojar = DB::table('splitter')
                ->insertGetId($data1);

        //dd($id);
        $data2 = [
            'id_nojar_output' => $id_nojar,
            'nojar1' => $request->nojar1,
            'nojar2' => $request->nojar2,
            'nojar3' => $request->nojar3,
            'nojar4' => $request->nojar4,
            'nojar5' => $request->nojar5,
            'nojar6' => $request->nojar6,
            'nojar7' => $request->nojar7,
            'nojar8' => $request->nojar8,
        ];
        DB::table('nojar')
            ->insert($data2);

        $data3 = [
            'id_redaman_output' => $id_nojar,
            'redaman1' => $request->redaman1,
            'redaman2' => $request->redaman2,
            'redaman3' => $request->redaman3,
            'redaman4' => $request->redaman4,
            'redaman5' => $request->redaman5,
            'redaman6' => $request->redaman6,
            'redaman7' => $request->redaman7,
            'redaman8' => $request->redaman8,
        ];

        DB::table('redaman')
            ->insert($data3);

        return redirect('/splitter')->with('pesan', 'Data Splitter Tersimpan');
    }

    public function show ($id)
    {
        $data = DB::table('splitter')
                    ->join('nojar', 'splitter.id', '=', 'nojar.id_nojar_output')
                    ->join('redaman', 'splitter.id', '=', 'redaman.id_redaman_output')
                    ->find($id);
        //dd($data);
        return view('splitter.show', compact('data'));
    }

    public function edit ($id)
    {
        $data = DB::table('splitter')
                    ->join('nojar', 'splitter.id', '=', 'nojar.id_nojar_output')
                    ->join('redaman', 'splitter.id', '=', 'redaman.id_redaman_output')
                    ->find($id);

        return view('splitter.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data1 = [
            'nama_splitter' => $request->nama_splitter,
            'node' => $request->node,
            'alamat' => $request->alamat,
            'latlong' => $request->latlong,
            'input1' => $request->input1,
            'input2' => $request->input2,
            'output1' => $request->output1,
            'output2' => $request->output2,
            'output3' => $request->output3,
            'output4' => $request->output4,
            'output5' => $request->output5,
            'output6' => $request->output6,
            'output7' => $request->output7,
            'output8' => $request->output8,
        ];

        //dd($data1);
        DB::table('splitter')
            ->where('id', $id)
            ->update($data1);

        //dd($id);
        $data2 = [
            'id_nojar_output' => $id,
            'nojar1' => $request->nojar1,
            'nojar2' => $request->nojar2,
            'nojar3' => $request->nojar3,
            'nojar4' => $request->nojar4,
            'nojar5' => $request->nojar5,
            'nojar6' => $request->nojar6,
            'nojar7' => $request->nojar7,
            'nojar8' => $request->nojar8,
        ];
        DB::table('nojar')
            ->where('id_nojar_output', $id)
            ->update($data2);

        $data3 = [
            'id_redaman_output' => $id,
            'redaman1' => $request->redaman1,
            'redaman2' => $request->redaman2,
            'redaman3' => $request->redaman3,
            'redaman4' => $request->redaman4,
            'redaman5' => $request->redaman5,
            'redaman6' => $request->redaman6,
            'redaman7' => $request->redaman7,
            'redaman8' => $request->redaman8,
        ];

        DB::table('redaman')
            ->where('id_redaman_output', $id)
            ->update($data3);

        return redirect('/show_splitter/' . $id)->with('pesan', 'Data Splitter Tersimpan');
    }

    public function delete($id)
    {
        DB::table('splitter')
                ->where('id', $id)
                ->delete();
        DB::table('nojar')
                ->where('id_nojar_output', $id)
                ->delete();
        DB::table('redaman')
                ->where('id_redaman_output', $id)
                ->delete();

        return redirect('/splitter')->with('pesan', 'Data Splitter Deleted');
    }
}
