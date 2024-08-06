<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SLAModel;
use App\Models\hitung_slaModel;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\Models\all_siteModels;
use DateTime;
use DateTimeZone;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Exports\SLAExcel;
use App\Exports\Excel_Site;
use App\Exports\Excel_detail;

class SLAController extends Controller
{
    public function dashboard()
    {
        $timezone = "Asia/Jakarta";
        $date = new DateTime('now', new DateTimeZone($timezone));
        $bulan = $date->format('Y-m');
        //$bulan = "2022-01";
        $timestamp = $date->format('Y-m-d H:i:s');
        $tgl_awal = "2021-12-01";
        $tgl_akhir = "2021-12-31";

        $primacom = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                // ->where('bulan', $bulan)
                ->whereBetween('mulai', [$tgl_awal, $tgl_akhir])
                ->select('*')
                ->where('isp', 'PRIMACOM')
                ->count();
        
        $telkom = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                // ->where('bulan', $bulan)
                ->whereBetween('mulai', [$tgl_awal, $tgl_akhir])
                ->select('*')
                ->where('isp', 'telkom')
                ->count();
        
        $indosat = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                // ->where('bulan', $bulan)
                ->whereBetween('mulai', [$tgl_awal, $tgl_akhir])
                ->select('*')
                ->where('isp', 'indosat')
                ->count();
            
        $moratel = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                // ->where('bulan', $bulan)
                ->whereBetween('mulai', [$tgl_awal, $tgl_akhir])
                ->select('*')
                ->where('isp', 'moratel')
                ->count();

        $xl = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                // ->where('bulan', $bulan)
                ->whereBetween('mulai', [$tgl_awal, $tgl_akhir])
                ->select('*')
                ->where('isp', 'xl')
                ->count();

        $iforte = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                // ->where('bulan', $bulan)
                ->whereBetween('mulai', [$tgl_awal, $tgl_akhir])
                ->select('*')
                ->where('isp', 'iforte')
                ->count();

        $linknet = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                // ->where('bulan', $bulan)
                ->whereBetween('mulai', [$tgl_awal, $tgl_akhir])
                ->select('*')
                ->where('isp', 'linknet')
                ->count();

        $satnet = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                // ->where('bulan', $bulan)
                ->whereBetween('mulai', [$tgl_awal, $tgl_akhir])
                ->select('*')
                ->where('isp', 'satnet')
                ->count();

        $mkn = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                // ->where('bulan', $bulan)
                ->whereBetween('mulai', [$tgl_awal, $tgl_akhir])
                ->select('*')
                ->where('isp', 'mkn')
                ->count();
         
        
        //dd($bul);
        return view('dashboard.index', compact('primacom','indosat', 'telkom', 'moratel', 'iforte', 'linknet', 'satnet', 'mkn', 'xl',
                    'bulan'));
    }

    public function hasil($tgl_awal, $tgl_akhir)
    {
        $timezone = "Asia/Jakarta";
        $date = new DateTime('now', new DateTimeZone($timezone));
        //$bulan = $date->format('Y-m');
        //$bulan = "2022-01";
        $timestamp = $date->format('Y-m-d H:i:s');

        $primacom = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                //->where('bulan', $bulan)
                ->whereBetween('mulai', [$tgl_awal, $tgl_akhir])
                ->select('*')
                ->where('isp', 'PRIMACOM')
                ->count();
        
        $telkom = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                // ->where('bulan', $bulan)
                ->whereBetween('mulai', [$tgl_awal, $tgl_akhir])
                ->select('*')
                ->where('isp', 'telkom')
                ->count();
        
        $indosat = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                // ->where('bulan', $bulan)
                ->whereBetween('mulai', [$tgl_awal, $tgl_akhir])
                ->select('*')
                ->where('isp', 'indosat')
                ->count();
            
        $moratel = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                // ->where('bulan', $bulan)
                ->whereBetween('mulai', [$tgl_awal, $tgl_akhir])
                ->select('*')
                ->where('isp', 'moratel')
                ->count();

        $xl = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                // ->where('bulan', $bulan)
                ->whereBetween('mulai', [$tgl_awal, $tgl_akhir])
                ->select('*')
                ->where('isp', 'xl')
                ->count();

        $iforte = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                // ->where('bulan', $bulan)
                ->whereBetween('mulai', [$tgl_awal, $tgl_akhir])
                ->select('*')
                ->where('isp', 'iforte')
                ->count();

        $linknet = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                // ->where('bulan', $bulan)
                ->whereBetween('mulai', [$tgl_awal, $tgl_akhir])
                ->select('*')
                ->where('isp', 'linknet')
                ->count();

        $satnet = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                // ->where('bulan', $bulan)
                ->whereBetween('mulai', [$tgl_awal, $tgl_akhir])
                ->select('*')
                ->where('isp', 'satnet')
                ->count();

        $mkn = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                // ->where('bulan', $bulan)
                ->whereBetween('mulai', [$tgl_awal, $tgl_akhir])
                ->select('*')
                ->where('isp', 'mkn')
                ->count();
         
        
        //dd($primacom);
        return view('dashboard.hasil', compact('primacom','indosat', 'telkom', 'moratel', 'iforte', 'linknet', 'satnet', 'mkn', 'xl', 'tgl_awal', 'tgl_akhir'));
    }

    public function dashboard_view($bulan)
    {
        $timezone = "Asia/Jakarta";
        $date = new DateTime('now', new DateTimeZone($timezone));
        //$bulan = $date->format('Y-m');
        //$bulan = "2022-01";
        $timestamp = $date->format('Y-m-d H:i:s');

        $primacom = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                ->where('bulan', $bulan)
                ->select('*')
                ->where('isp', 'PRIMACOM')
                ->count();
        
        $telkom = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                ->where('bulan', $bulan)
                ->select('*')
                ->where('isp', 'telkom')
                ->count();
        
        $indosat = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                ->where('bulan', $bulan)
                ->select('*')
                ->where('isp', 'indosat')
                ->count();
            
        $moratel = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                ->where('bulan', $bulan)
                ->select('*')
                ->where('isp', 'moratel')
                ->count();

        $xl = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                ->where('bulan', $bulan)
                ->select('*')
                ->where('isp', 'xl')
                ->count();

        $iforte = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                ->where('bulan', $bulan)
                ->select('*')
                ->where('isp', 'iforte')
                ->count();

        $linknet = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                ->where('bulan', $bulan)
                ->select('*')
                ->where('isp', 'linknet')
                ->count();

        $satnet = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                ->where('bulan', $bulan)
                ->select('*')
                ->where('isp', 'satnet')
                ->count();

        $mkn = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                ->where('bulan', $bulan)
                ->select('*')
                ->where('isp', 'mkn')
                ->count();
         
        
        //dd($primacom);
        return view('dashboard.hasil', compact('primacom','indosat', 'telkom', 'moratel', 'iforte', 'linknet', 'satnet', 'mkn', 'xl',
                    'bulan'));
    }

    public function index()
    {
        return view('SLA.index');

    }
    public function yajra()
    {
        //$sla = SLAModel::all();
        $sla = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->orderBydesc('sla.id')
                ->get();
        //dd($sla);
        return DataTables::of($sla)->editColumn('status',function($kondisi){
            $url_status = url('/status/'.$kondisi->id);
            if($kondisi->status == 1){
                $view = url('file_tiket/'.$kondisi->gambar);
                $button = '<a href="'.$view.'" class="btn btn-warning" type="button" target="_blank data-placement="top">OPEN</a>';
                return $button;
                //return '<button class="btn btn-warning btn-xs">OPEN</button>';
            }elseif($kondisi->status == 2){
                $view = url('file_tiket/'.$kondisi->gambar);
                $button = '<a href="'.$view.'" class="btn btn-success" type="button" target="_blank data-placement="top">CLOSE</a>';
                return $button;
                //return '<button class="btn btn-success btn-xs">CLOSE</button>';
            }
        
        // })->addColumn('gambar', function ($sla) { 
        //     $url= asset('file_tiket/'.$sla->gambar);
        //     return '<img src="'.$url.'" border="0" width="150" class="img-rounded" align="center" />';

        })->addColumn('action',function($data){
            $view = url('file_tiket/'.$data->gambar);
            $url_edit = url('/edit/'.$data->id);
            $url_hapus = url('/delete/'.$data->id);
            $button = '<a href="'.$view.'" class="btn btn-success btn-sm rounded-0 fa fa-edit" type="button" data-toggle="tooltip" target="_blank data-placement="top" title="View"></a> &nbsp';
            $button = '<a href="'.$url_edit.'" class="btn btn-primary btn-sm rounded-0 fa fa-edit" type="button" data-toggle="tooltip" data-placement="top" title="Edit"></a> &nbsp';
            $button .= '<a href="'.$url_hapus.'" class="btn btn-danger remove-user fa fa-trash" data-id="'.$url_hapus.'"></a>';
            return $button;
        })->rawColumns(['status','action'])->make(true);
    }

    public function simpan(Request $request)
    {
        //dd($request->all());
        $timezone = "Asia/Jakarta";
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $bulan = $date->format('Y-m');
        //$bulan = "2021-11";
        $localtime = $date->format('H:i:s');
        $timestamp = $date->format('Y-m-d H:i:s');

        $tgl1 = ($request->akhir);
        $tgl2 = $request->mulai;
        if ($tgl1 == NULL)
        {
            $hasil = "0";

            $file = $request->file('file');
            if ($file == NULL)
            {
                $data = [
                    'nama_site' => $request->nama_site,
                    'tiket' => $request->tiket,
                    'problem' => implode(' ', $request->problem),
                    'status' => $request->status,
                    'mulai_now' => $timestamp,
                    'mulai' => $request->mulai,
                    'hours' => $hasil,  
                ];
            } else {
                $nama_file = time()."_".$file->getClientOriginalName();
                $tujuan_upload = 'file_tiket';
                $file->move($tujuan_upload,$nama_file);

                $data = [
                    'nama_site' => $request->nama_site,
                    'tiket' => $request->tiket,
                    'gambar' => $nama_file,
                    'problem' => implode(' ', $request->problem),
                    'status' => $request->status,
                    'mulai_now' => $timestamp,
                    'mulai' => $request->mulai,
                    'hours' => $hasil,

                ];
            }
            
            DB::table('sla')
                ->insert($data);

        } else {
            $selisih = ((strtotime($tgl1) - strtotime($tgl2))*24)/(60 * 60 *24);
            $hasil = round($selisih, 2);
            $waktu = DB::table('summary')
                ->where('date', $bulan)
                ->value('jam_oprasional');
            //dd($waktu);

            $persen = round($hasil/$waktu * 100, 2);
            $av = $waktu-$hasil;
            $hasil_persen = round($av/$waktu * 100, 2);

            $id_site = $request->nama_site;

            $file = $request->file('file');
            if ($file == NULL)
            {
                $data = [
                    'nama_site' => $request->nama_site,
                    'tiket' => $request->tiket,
                    'problem' => implode(' ', $request->problem),
                    'status' => $request->status,
                    'mulai_now' => $timestamp,
                    'mulai' => $request->mulai,
                    'end_now' => $timestamp,
                    'akhir' => $request->akhir,
                    'hours' => $hasil,
    
                ];
            } else {
                $nama_file = time()."_".$file->getClientOriginalName();
                $tujuan_upload = 'file_tiket';
                $file->move($tujuan_upload,$nama_file);

                $data = [
                    'nama_site' => $request->nama_site,
                    'tiket' => $request->tiket,
                    'gambar' => $nama_file,
                    'problem' => implode(' ', $request->problem),
                    'status' => $request->status,
                    'mulai_now' => $timestamp,
                    'mulai' => $request->mulai,
                    'end_now' => $timestamp,
                    'akhir' => $request->akhir,
                    'hours' => $hasil,
                ];
            }

            //dd($data);
            $id = DB::table('sla')
                ->insertGetId($data);

            $data2 = [
                'id_sla' => $id,
                'id_site' => $request->nama_site,
                'avaibility' => $av,
                'hasil_persen' => $hasil_persen,
                'maint' => $hasil,
                'persen' => $persen,
                'total_jam' => $waktu,
                'bulan' => $bulan,

            ];

            echo $prob = implode(' ', $request->problem);
            if ($prob == "Intermitten ")
            {
                echo "Tidak ada";
            }
            else
            {
                echo DB::table('hitung_sla')
                ->insert($data2);
            }
        }
        return redirect('/index')->with('pesan', 'Data SLA Sudah Disimpan');

    }

    public function edit ($id)
    {
        //$sla = SLAModel::find($id);
        $sla = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->find($id);
                //->get();

        return view('SLA.edit', compact('sla'));
    }

    public function loadData(Request $request)
    {

        $site = [];

        if($request->has('q')){
            $search = $request->q;
            $site =all_siteModels::select("id_site", "site")
            		->where('site', 'LIKE', "%$search%")
            		->get();
        }
        return response()->json($site);

    }
    public function tambah()
    {
        return view('SLA.tambah');

    }
    public function update(Request $request, $id)
    {
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

            $file = $request->file('file');
            if ($file == NULL)
            {
                $data = [
                    // 'nama_site' => $request->nama_site,
                    'tiket' => $request->tiket,
                    'problem' => implode(' ', $request->problem),
                    'status' => $request->status,
                    'mulai' => $request->mulai,
                    'hours' => $hasil,
                ];
            } else {
                $nama_file = time()."_".$file->getClientOriginalName();
                $tujuan_upload = 'file_tiket';
                $file->move($tujuan_upload,$nama_file);

                $data = [
                    'gambar' => $nama_file,
                    'tiket' => $request->tiket,
                    'problem' => implode(' ', $request->problem),
                    'status' => $request->status,
                    'mulai' => $request->mulai,
                    'hours' => $hasil,
                ];
            }
        
            DB::table('sla')
                ->where('id', $id)
                ->update($data);
        }
        else {
            $selisih = ((strtotime($tgl1) - strtotime($tgl2))*24)/(60 * 60 *24);
            $hasil = round($selisih, 2);

            $selisih = ((strtotime($tgl1) - strtotime($tgl2))*24)/(60 * 60 *24);
            $hasil = round($selisih, 2);
            $waktu = DB::table('summary')
                    ->where('date', $bulan)
                    ->value('jam_oprasional');
            //dd($waktu);

            $persen = round($hasil/$waktu * 100, 2);
            $av = $waktu-$hasil;
            $hasil_persen = round($av/$waktu * 100, 2);

            $file = $request->file('file');
            if ($file == NULL)
            {
                $data = [
                    // 'nama_site' => $request->nama_site,
                    'tiket' => $request->tiket,
                    'problem' => implode(' ', $request->problem),
                    'status' => $request->status,
                    'mulai' => $request->mulai,
                    'akhir' => $request->akhir,
                    'end_now' => $timestamp,
                    'hours' => $hasil,
                ];
            } else {
                $nama_file = time()."_".$file->getClientOriginalName();
                $tujuan_upload = 'file_tiket';
                $file->move($tujuan_upload,$nama_file);

                $data = [
                    'gambar' => $nama_file,
                    'tiket' => $request->tiket,
                    'problem' => implode(' ', $request->problem),
                    'status' => $request->status,
                    'mulai' => $request->mulai,
                    'akhir' => $request->akhir,
                    'end_now' => $timestamp,
                    'hours' => $hasil,
                ];
            }

            DB::table('sla')
                ->where('id', $id)
                ->update($data);

            $data2 = [
                'id_sla' => $id,
                'id_site' => $request->nama_site,
                'avaibility' => $av,
                'hasil_persen' => $hasil_persen,
                'maint' => $hasil,
                'persen' => $persen,
                'total_jam' => $waktu,
                'bulan' => $bulan,

            ];

            $get = hitung_slaModel::where("id_sla", $id)->value('id_sla');
            echo $prob = implode(' ', $request->problem);

            if ($get == $id)
            {
                
                if ($prob == "Intermitten ")
                {
                    echo "Tidak ada";
                }
                else
                {
                    DB::table('hitung_sla')
                    ->where('id_sla', $id)
                    ->update($data2);
                }             
            }
            else {
                if ($prob == "Intermitten ")
                {
                    echo "Tidak ada";
                }
                else
                {
                    DB::table('hitung_sla')
                    ->insert($data2);
                }
                
            }

        }

        return redirect('/index')->with('pesan', 'Data SLA Berhasil Diubah');
    }
    public function delete($id)
    {
        $user = SLAModel::find($id);
        $user->delete();
        return redirect('/index')->with('pesan', 'Data SLA Deleted');
    }
    public function status(Request $request, $id)
    {
        $timezone = "Asia/Jakarta";
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');
        $timestamp = $date->format('Y-m-d H:i:s');

        $data = [
            'status' => "2",
            'akhir' => $timestamp,
            'updated_at' => $timestamp,
        ];
        //DB::table('absen')->update($id, $data);
        DB::table('sla')
            ->where('id', $id)
            ->update($data);

        return redirect()->back()->with('pesan', 'Tiket SLA status CLOSE');

    }

    public function reportindex()
    {
        $site = all_siteModels::all();
        $sla = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                ->select('*')
                ->get();

        //echo ($sla);
        return view('report.index', compact('site','sla'));
    }

    public function reportsla()
    {
        return view('report.report_SLA');

    }

    public function report_yazra()
    {
        $hitung = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                //->get();
                ->orderByDesc('id_hitung')
                ->get();
        //dd($hitung);
        return DataTables::of($hitung)->make();
    }

    public function report_loadData(Request $request)
    {

        $isp = [];

        if($request->has('q')){
            $search = $request->q;
            $isp =all_siteModels::select("id_site", "isp")
            		->where('isp', 'LIKE', "%$search%")
            		->get();
        }
        return response()->json($isp);

    }

    public function viewreport($tgl_awal, $tgl_akhir)
    {
        $hitung = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                ->whereBetween('mulai', [$tgl_awal, $tgl_akhir])
                ->select('*')
                //->where('isp', 'LIKE', '%'.$isp.'%')
                ->orderBy('mulai', 'asc')
                ->get();
        //dd($hitung);
        $sum = DB::table("all_site")->get()->count("id_site");
        //dd($sum);
        return view('report.report_cari', compact('hitung','sum','tgl_awal','tgl_akhir'));
    }

    public function viewdetail($id, $tgl_awal, $tgl_akhir)
    {
        $hitung = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                ->whereBetween('mulai', [$tgl_awal, $tgl_akhir])
                ->select('*')
                ->where('hitung_sla.id_site',$id)
                ->orderBy('mulai', 'asc')
                ->get();

        $site = DB::table('all_site')
                //->select('id_site', 'site')
                ->where('id_site', $id)
                ->get();
        // if ($hitung == 'NULL')
        // {
        //     echo "Tidak Ada Data";
        // }
        // else
        // {
        //     $sum = DB::table("all_site")->get()->count("id_site");
        //     //dd($hitung);
        //     //return view('report.report_cari', compact('hitung','sum'));
        // }
        $sum = DB::table("all_site")->get()->count("id_site");
        //dd($hitung);
        return view('report.report_cari', compact('hitung','sum','site','tgl_awal','tgl_akhir'));
    }

    public function export_excel($tgl_awal, $tgl_akhir)
	{

        //dd($tgl_awal);
        return Excel::download(new SLAExcel($tgl_awal,$tgl_akhir), 'sla.xlsx');
        //return (new SLAExcel)->forYear(2021-11-01)->download('invoices.xlsx');
	}

    public function pdf($tgl_awal, $tgl_akhir)
    {
        $hitung = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                ->whereBetween('mulai', [$tgl_awal, $tgl_akhir])
                ->select('*')
                //->where('isp', 'LIKE', '%'.$isp.'%')
                ->orderBy('mulai', 'asc')
                ->get();

        //dd($hitung);
        $sum = DB::table("all_site")->get()->count("id_site");

        $pdf = PDF::loadView('report.printpdf', compact('hitung','sum'));
        return $pdf->stream();
    }

    public function detailreport($id)
    {
        $hitung = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                ->where('hitung_sla.id_site',$id)
                //->whereBetween('mulai', [$tgl_awal, $tgl_akhir])
                ->select('*')
                ->orderBy('mulai', 'asc')
                ->get();
        //dd($view);
        return view('report.detail', compact('hitung', 'id'));
    }

    public function pdf_detail($id, $tgl_awal, $tgl_akhir)
    {
        $hitung = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                ->whereBetween('mulai', [$tgl_awal, $tgl_akhir])
                ->select('*')
                ->where('hitung_sla.id_site',$id)
                ->orderBy('mulai', 'asc')
                ->get();

        //dd($hitung);
        $sum = DB::table("all_site")->get()->count("id_site");

        $pdf = PDF::loadView('report.printpdf', compact('hitung','sum'));
        return $pdf->stream();
    }

    public function export_exceldetail($id, $tgl_awal, $tgl_akhir)
	{

        //dd($tgl_awal);
        return Excel::download(new Excel_detail($id, $tgl_awal,$tgl_akhir), 'sla_detail.xlsx');
        //return (new SLAExcel)->forYear(2021-11-01)->download('invoices.xlsx');
	}

    public function reportsite()
    {
        return view('report.reportsite');

    }

    public function viewsite($isp, $tgl_awal, $tgl_akhir)
    {
        $hitung = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                ->whereBetween('mulai', [$tgl_awal, $tgl_akhir])
                ->select('*')
                ->where('isp', 'LIKE', '%'.$isp.'%')
                //->where('nama_site', 'LIKE', '%'.$nama_site.'%')
                ->orderBy('mulai', 'asc')
                ->get();
        
        //dd($hitung);
        $sum = DB::table("all_site")->get()->count("id_site");
        // //dd($sum);
        return view('report.report_cari', compact('hitung','sum','tgl_awal','tgl_akhir'));
    }

    public function excel_site($isp, $tgl_awal, $tgl_akhir)
	{

        //dd($tgl_awal);
        return Excel::download(new Excel_Site($isp, $tgl_awal,$tgl_akhir), 'sla_site.xlsx');
        //return (new SLAExcel)->forYear(2021-11-01)->download('invoices.xlsx');
	}

    public function pdf_site($isp, $tgl_awal, $tgl_akhir)
    {
        $hitung = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                ->whereBetween('mulai', [$tgl_awal, $tgl_akhir])
                ->select('*')
                ->where('isp', 'LIKE', '%'.$isp.'%')
                ->orderBy('mulai', 'asc')
                ->get();

        //dd($hitung);
        $sum = DB::table("all_site")->get()->count("id_site");

        $pdf = PDF::loadView('report.printpdf', compact('hitung','sum'));
        return $pdf->stream();
    }
}
