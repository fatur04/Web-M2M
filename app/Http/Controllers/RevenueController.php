<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;

class RevenueController extends Controller
{
    public function index()
    {
        $totalData = DB::table('revenue')
                ->count();
        $jumlahpop = DB::table('revenue')
                ->distinct()
                ->count('pop');
        //dd($jumlahpop);
        return view('revenue.index', ['totalData' => $totalData], ['jumlahpop' => $jumlahpop]);
    }

    public function allpop()
    {
        $totalData = DB::table('revenue')
                ->count();

        $jumlahpop = DB::table('revenue')
                ->distinct()
                ->count('pop');

        $semuapop= DB::table('revenue')
                ->distinct()
                ->pluck('pop');
        //dd($allpop);
        return view('revenue.allpop', compact('semuapop','totalData', 'jumlahpop'));
    }

    public function allpoppop(Request $request, $pop)
    {
        $pop;

        $jumlahrevenue = DB::table('revenue')
                ->where('pop', $pop)
                ->select('revenue')
                ->get()
                ->sum(function($item) {
                    // Menghapus titik dan mengonversi ke tipe data numerik
                    return (int) str_replace(',', '', $item->revenue);
                });

        $totalrupiah=(number_format($jumlahrevenue, 0, '.', ','));
        //dd($jumlahrevenue);

        $datas = DB::table('revenue')
                ->where('pop', $pop)
                ->get();

        return view('revenue.revenuepop', compact('datas', 'totalrupiah', 'pop'));
    }

    public function yajra(request $request)
    {
        $revenue = DB::table('revenue')
                ->get();
        //dd($revenue);
        //return DataTables::of($revenue);
        return DataTables::of($revenue)
        ->addColumn('action',function($data){
            $url_edit = url('/revenue/edit/'.$data->id_revenue);
            $url_hapus = url('/revenue/delete/'.$data->id_revenue);
            $button = '<a href="'.$url_edit.'" class="btn btn-warning fa fa-pencil-square-o" title="Edit"></a> &nbsp';
            $button .= '<a href="'.$url_hapus.'" class="btn btn-danger remove-user fa fa-trash" data-id="'.$url_hapus.'"></a>';
            return $button;
        })->rawColumns(['link','action'])->make(true);
    }

    public function simpan(Request $request)
    {
        //dd($request->all());
        $data = [
            'pop' => $request->pop,
            'node' => $request->node,
            'nojar' => $request->nojar,
            'pelanggan' => $request->pelanggan,
            'revenue' => $request->revenue,
            'port' => $request->port,
            'status' => $request->status,
            // 'updated_at' => $request->updated_at,

        ];
        //dd($data);
        DB::table('revenue')
            ->insert($data);

        return redirect('/revenue')->with('pesan', 'Data Tersimpan');
    }

    public function edit ($id)
    {
        //dd($id);
        $data = DB::table('revenue')
                ->where('id_revenue', $id)
                ->get();
        //dd($data);
        return view('revenue.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {

        $data = [
            'node' => $request->node,
            'nojar' => $request->nojar,
            'pelanggan' => $request->pelanggan,
            'revenue' => $request->revenue,
            'port' => $request->port,
            'status' => $request->status,
            'updated_at' => $request->updated_at,
        ];

        //dd($data);
        DB::table('revenue')
            ->where('id_revenue', $id)
            ->update($data);

        return redirect('/revenue')->with('pesan', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        DB::table('revenue')
                ->where('id_revenue', $id)
                ->delete();

        return redirect('/revenue')->with('pesan', 'Data Deleted');
    }
}
