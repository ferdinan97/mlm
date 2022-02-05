<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Upline;
use App\Models\Downline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index(User $user){
        return view('index', [
            'user' => User::all(),
        ]);
    }

    public function add(){
        return view('add',[
            'upline' => User::all(),
        ]);
    }

    public function addmember(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'address' => 'required',
            'password' => 'required',
            'nmr_telepon' => 'required|unique:users'
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);
        return redirect('/')->with('berhasil', 'Berhasil Menambah Member');
    }

    public function addatasan(Downline $downline){
        return view('addatasan',[
            'user' => User::all(),
        ]);
    }

    public function addatasanpost(Request $request, User $user){
        $data = $request->validate([
            'atasan_id' => 'required',
        ]);

        $data['user_id'] = auth()->user()->id;

        $upline = Upline::select('user_id')->where('user_id', $data['user_id'])->get();
        
        if(empty($upline)){
            return redirect('/addatasan')->with('gagal', 'Gagal Menambah Atasan Anda Sudah Punya Atasan');
        }
        
        else{
            Upline::create($data);
            return redirect('/')->with('berhasil', 'Berhasil Menambah Atasan');
        }
    }

    public function addbawahan(Downline $downline){
        return view('addbawahan',[
            'user' => User::all(),
        ]);
    }

    public function addbawahanpost(Request $request, User $user){
        $data = $request->validate([
            'bawahan_id' => 'required',
        ]);

        $data['user_id'] = auth()->user()->id;

        $downline = Downline::select('user_id')->where('user_id', $data['user_id'])->get();
        
        if(count($downline) >= 2){
            return redirect('/addbawahan')->with('gagal', 'Gagal Menambah Bawahan, Anda Sudah Memiliki 2 Bawahan ');
        }
        
        else{
        Downline::create($data);
        return redirect('/')->with('berhasil', 'Berhasil Menambah Bawahan');
        }
    }
}
