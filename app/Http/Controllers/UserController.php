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
}
