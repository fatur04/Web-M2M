<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class M2MBDAController extends Controller
{
    public function show(Request $request)
    {
        $datas = DB::table('m2m_sast')
                ->orderBy('updated_at', 'asc')
                ->get();

        return view('m2msast.index', compact('datas'));

    }
    public function simpan(Request $request)
    {
        //dd($request->all());
        $data = [
            'nama_soltemp' => $request->nama_soltemp,
            'nojar_soltemp' => $request->nojar_soltemp,
            'pelanggan_soltemp' => $request->pelanggan_soltemp,
            'nomor_soltemp' => $request->nomor_soltemp,
            'kuota' => $request->kuota,
            'status' => $request->status,
            'updated_at' => $request->updated_at,

        ];
        //dd($data);
        DB::table('m2m_sast')
            ->insert($data);

        return redirect('/m2msast')->with('pesan', 'Data Tersimpan');
    }

    public function edit ($id)
    {
        //dd($id);
        $data = DB::table('m2m_sast')
                ->where('id_soltemp', $id)
                ->get();
        //dd($data);
        return view('m2msast.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $file = $request->file('foto_kuota');

        if ($file == NULL) {
            // Tidak ada gambar diunggah, set kolom database sesuai dengan preferensi Anda
            $nama_file = ''; // atau NULL, tergantung pada preferensi Anda
        } else {
            $file = $request->file('foto_kuota');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'file_kuota';
            $file->move($tujuan_upload,$nama_file);
        }

        $data = [
            'nama_soltemp' => $request->nama_soltemp,
            'nojar_soltemp' => $request->nojar_soltemp,
            'pelanggan_soltemp' => $request->pelanggan_soltemp,
            'nomor_soltemp' => $request->nomor_soltemp,
            'kuota' => $request->kuota,
            'foto_kuota' => $nama_file,
            'status' => $request->status,
            'updated_at' => $request->updated_at,

        ];

        //dd($data);
        DB::table('m2m_sast')
            ->where('id_soltemp', $id)
            ->update($data);

        return redirect('/m2msast')->with('pesan', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        DB::table('m2m_sast')
                ->where('id_soltemp', $id)
                ->delete();

        return redirect('/m2msast')->with('pesan', 'Data Deleted');
    }

    public function status(Request $request, $nojar)
    {
        $newStatus = ('On Progress');

        //dd($newStatus);
        DB::table('m2m_sast')
            ->where('nojar_soltemp', $nojar)
            ->update(['status' => $newStatus]);

        return response()->json(['success' => true]);
    }
}
