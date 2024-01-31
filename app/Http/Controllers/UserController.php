<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function yajra()
    {
        $user = UserModel::all();
        //dd($user);
        return DataTables::of($user)->addColumn('action',function($data){
            $url_edit = url('/user/edit/'.$data->id);
            $url_hapus = url('/user/delete/'.$data->id);
            $button = '<a href="'.$url_edit.'" class="btn btn-warning btn-sm rounded-0 fa fa-edit" type="button" data-toggle="tooltip" data-placement="top" title="Edit"></a> &nbsp';
            $button .= '<a href="'.$url_hapus.'" class="btn btn-danger remove-user fa fa-trash" data-id="'.$url_hapus.'"></a>';
            return $button;
        })->rawColumns(['status','action'])->make(true);
    }

    public function simpan(Request $request)
    {
        //dd($request->all());
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            //'password' => $request->password,
            'password' => Hash::make($request['password']),

        ];
        //dd($data);
        DB::table('users')
            ->insert($data);

        return redirect('/user')->with('pesan', 'User Sudah Disimpan');
    }

    public function edit ($id)
    {
        $user = UserModel::find($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),

        ];

        DB::table('users')
            ->where('id', $id)
            ->update($data);

        return redirect('/user')->with('pesan', 'Data User Berhasil Diubah');
    }
    public function delete($id)
    {
        $user = UserModel::find($id);
        $user->delete();
        return redirect('/user')->with('pesan', 'User Deleted');
    }

}
