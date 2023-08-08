<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){
        $user = User::all();
        return view('users')->with(['data_user' => $user]);
    }

    public function register(Request $req){
        $user =  User::create([
            'nama' => $req->nama,
            'usia' => $req->usia,
            'kota' => $req->kota
        ]);

        return redirect('user');
    }
}
