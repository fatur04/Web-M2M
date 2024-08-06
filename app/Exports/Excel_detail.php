<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\SLAModel;
use App\Models\hitung_slaModel;

class Excel_detail implements FromQuery, WithHeadings
{
    use Exportable;

    protected $id;
    protected $tgl_awal;
    protected $tgl_akhir;

    function __construct($id, $tgl_awal,$tgl_akhir)
    {

        $id = $this->id = $id;
        $tgl_awal = $this->tgl_awal = $tgl_awal;
        $tgl_akhir = $this->tgl_akhir = $tgl_akhir;
        //dd($isp, $tgl_awal, $tgl_akhir);
    }

    public function query()
    {
        return $hitung = DB::table('sla')
                ->join('all_site','sla.nama_site', "=", 'all_site.id_site')
                ->join('hitung_sla', 'sla.id', '=', 'hitung_sla.id_sla')
                ->whereBetween('mulai', [$this->tgl_awal, $this->tgl_akhir])
                ->select('site', 'problem', 'tiket', 'isp', 'mulai', 'akhir', 'hours', 'avaibility','persen', 'hasil_persen', 'total_jam')
                ->where('hitung_sla.id_site',[$this->id])
                ->orderBy('mulai', 'asc');

        //dd($hitung);
        //return $hitung;
        //return SLAModel::query()->whereYear('mulai', $this->tgl_awal)->whereYear('mulai', $this->tgl_akhir);
    }
    public function headings(): array
     {
         return [
             'Nama Link',
             'Problem',
             'Ticket',
             'ISP',
             'Mulai',
             'Selesai',
             'Down Time',
             'Availability',           
             'Down Time %',
             'Availability 100%',
             'Total Hours',
        ];
    }
}
