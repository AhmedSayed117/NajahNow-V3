<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Groups;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin extends Controller
{
    public function index()
    {
        if (Auth::id()==1)
        {
            return view('admin.control',[
                'groups'=>Groups::get(),
            ]);
        }else return redirect(url('/'));
    }

    public function showGroup($id)
    {
        if (Auth::id()==1){
            return view('admin.show',['group'=>Groups::where('id',$id)->get()->first(),'users'=>User::where('groups',$id)->get()]);
        }else return redirect(url('/'));
    }

    public function add_group()
    {
        if (Auth::id()==1){
            return view('admin.addGroup');
        }else return redirect(url('/'));
    }

    public function createGroup(Request $request)
    {
        if (Auth::id()==1){
            Groups::create([
                'name'=>$request->name
            ]);
            return redirect('/admin')->with('status', 'You Added Group Successfully');
        }else return redirect(url('/'));
    }
}
