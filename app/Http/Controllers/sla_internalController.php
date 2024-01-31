<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sla_internalModel;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\Models\all_siteModels;
use DateTime;
use DateTimeZone;

class sla_internalController extends Controller
{
    public function index()
    {
        return view('sla_internal.index');

    }
    public function yajra()
    {
        //$sla = SLAModel::all();
        $sla = DB::table('sla_internal')
                ->join('all_site','sla_internal.nama_site', "=", 'all_site.id_site')
                ->orderBydesc('sla_internal.id')
                ->get();
        //dd($sla);
        return DataTables::of($sla)->editColumn('status',function($kondisi){
            $url_status = url('/status/'.$kondisi->id);
            if($kondisi->status == 1){
                return '<button class="btn btn-warning btn-xs">OPEN</button>';
            }elseif($kondisi->status == 2){
                return '<button class="btn btn-success btn-xs">CLOSE</button>';
            }

        })->addColumn('action',function($data){
            $url_edit = url('/edit_internal/'.$data->id);
            $url_hapus = url('/delete_internal/'.$data->id);
            $button = '<a href="'.$url_edit.'" class="btn btn-primary btn-sm rounded-0 fa fa-edit" type="button" data-toggle="tooltip" data-placement="top" title="Edit"></a> &nbsp';
            $button .= '<a href="'.$url_hapus.'" class="btn btn-danger remove-user fa fa-trash" data-id="'.$url_hapus.'"></a>';
            return $button;
        })->rawColumns(['status','action'])->make(true);
    }

    public function tambah()
    {
        return view('sla_internal.tambah');

    }

    public function simpan(Request $request)
    {
        //dd($request->all());
        $timezone = "Asia/Jakarta";
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $bulan = $date->format('Y-m');
        $localtime = $date->format('H:i:s');
        $timestamp = $date->format('Y-m-d H:i:s');

        $tgl1 = ($request->akhir);
        $tgl2 = $request->mulai;
        if ($tgl1 == NULL)
        {
            $hasil = "0";
            $data = [
                'nama_site' => $request->nama_site,
                'problem' => $request->problem,
                'status' => $request->status,
                'mulai_now' => $timestamp,
                'mulai' => $request->mulai,
                'hours' => $hasil,

            ];
            DB::table('sla_internal')
                ->insert($data);
        }
        else {
            $selisih = ((strtotime($tgl1) - strtotime($tgl2))*24)/(60 * 60 *24);
            $hasil = round($selisih, 2);

            $data = [
                'nama_site' => $request->nama_site,
                'problem' => $request->problem,
                'status' => $request->status,
                'mulai_now' => $timestamp,
                'mulai' => $request->mulai,
                'end_now' => $timestamp,
                'akhir' => $request->akhir,
                'hours' => $hasil,

            ];
            DB::table('sla_internal')
                ->insert($data);
        }

        return redirect('/sla_internal')->with('pesan', 'Data SLA Internal Sudah Disimpan');
    }

    public function edit ($id)
    {
        //$sla = SLAModel::find($id);
        $sla = DB::table('sla_internal')
                ->join('all_site','sla_internal.nama_site', "=", 'all_site.id_site')
                ->find($id);
                //->get();

        return view('sla_internal.edit', compact('sla'));
    }

    public function update(Request $request, $id)
    {
        $timezone = "Asia/Jakarta";
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');
        $timestamp = $date->format('Y-m-d H:i:s');

        $tgl1 = ($request->akhir);
        $tgl2 = $request->mulai;
        if ($tgl1 == NULL)
        {
            $hasil = "0";
            $data = [
                'problem' => $request->problem,
                'status' => $request->status,
                'mulai' => $request->mulai,
                'hours' => $hasil,

            ];

            DB::table('sla_internal')
                ->where('id', $id)
                ->update($data);
        }
        else{
            $selisih = ((strtotime($tgl1) - strtotime($tgl2))*24)/(60 * 60 *24);
            $hasil = round($selisih, 2);

            $data = [
                'problem' => $request->problem,
                'status' => $request->status,
                'mulai' => $request->mulai,
                'akhir' => $request->akhir,
                'end_now' => $timestamp,
                'hours' => $hasil,

            ];

            DB::table('sla_internal')
                ->where('id', $id)
                ->update($data);
        }

        return redirect('/sla_internal')->with('pesan', 'Data SLA Internal Berhasil Diupdate');
    }
    public function delete($id)
    {
        DB::table('sla_internal')->delete($id);
        return redirect('/sla_internal')->with('pesan', 'Data SLA Deleted');
    }

}
