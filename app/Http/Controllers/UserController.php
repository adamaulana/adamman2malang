<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{

    public function index(){
        $user = User::all();
        return view('users')->with(['data_user' => $user]);
    }

    public function register(Request $req){
        $validator = Validator::make($req->all(), [
            'nama' => 'required|max:200|alpha:ascii',
            'usia' => 'required|numeric',
            'kota' => 'required|alpha:ascii',
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $user =  User::create([
            'nama' => $req->nama,
            'usia' => $req->usia,
            'kota' => $req->kota
        ]);

        return redirect('user');
    }


    // API CONTROLLER
    public function get(){
        $user = User::all();

        return response()->json([
            'status' => true,
            'message'=> "berhasil menampilkan data user",
            'data'   => $user
        ]);
    }

    public function store(Request $req){
        $validator = Validator::make($req->all(), [
            'nama' => 'required|max:200|alpha:ascii',
            'usia' => 'required|numeric',
            'kota' => 'required|alpha:ascii',
        ]);



        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message'=> "Tidak lulus validasi data",
            ]);
        }

        $user =  User::create([
            'nama' => $req->nama,
            'usia' => $req->usia,
            'kota' => $req->kota
        ]);

        return response()->json([
            'status' => true,
            'message'=> "berhasil menambahkan data user",
            'data'   => $user
        ]);


    }

    public function edit(Request $req){
        $validator = Validator::make($req->all(), [
            'nama' => 'required|max:200|alpha:ascii',
            'usia' => 'required|numeric',
            'kota' => 'required|alpha:ascii',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message'=> "Tidak lulus validasi data",
            ]);
        }

        $user = User::where('id',$req->id)->first();
        $user->nama = $req->nama;
        $user->usia = $req->usia;
        $user->kota = $req->kota;
        $user->save();

        return response()->json([
            'status' => true,
            'message'=> "berhasil mengupdate data user",
            'data'   => $user
        ]);
    }

    public function delete(Request $req){
        $user = User::where('id',$req->id)->delete();
        return response()->json([
            'status' => true,
            'message'=> "berhasil menghapus data",
            'data'   => $user
        ]);
    }





}
