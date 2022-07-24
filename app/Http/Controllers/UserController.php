<?php

namespace App\Http\Controllers;

use App\Models\checkinout;
use App\Models\Groups;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check())
        {
            if (Auth::id()==1) return redirect(url('/admin'));
            $user = checkinout::with('user')->where('user_id',Auth::id())->orderBy('Currentday','desc')->get()->first();
            return view('main',['user'=>$user]);
        }else return redirect(url('/login'));
    }

    public function checkin(Request $request)
    {
        date_default_timezone_set('Africa/Cairo');
        checkinout::create([
            'user_id'=>Auth::id(),
            'checkin'=>$request->checkin,
            'Currentday'=>date("m/d")
        ]);
        return redirect('/')->with('status', 'You Checked in Successfully At'.' '. date("h:i:a"));
    }

    public function checkout(Request $request)
    {
        date_default_timezone_set('Africa/Cairo');
        $check = checkinout::where('user_id',Auth::id())->orderBy('id','desc')->get()->first();
        $check->update([
            'CheckOut'=>$request->checkout,
        ]);
        return redirect('/')->with('status1', 'You Checked out Successfully At'.' '. date("h:i:a"));
    }

    public function mygroup()
    {
        return view('yourgroup',['groups'=>Groups::get()]);
    }

    public function groups($id)
    {
        $user =User::where('id',Auth::id())->get()->first();
        $user->update([
           'groups'=>$id
        ]);
        $group = Groups::where('id',$id)->get()->first();
        $count = $group->count_;
        $group->update([
            'count_'=>++$count
        ]);
        return redirect('/group')->with('status', 'You Selected Group ' . Groups::where('id',$id)->get()->first()->name);

    }

    public function login()
    {
        return view('auth.login');
    }

    public function login_done(Request $request)
    {
        $value = request()->input('identify');
        $field = filter_var($value,FILTER_VALIDATE_EMAIL)? 'email':'name';
        request()->merge([$field=>$value]);

        $request->validate([
            $field=> 'required|string',
            'password' => 'required|string',
        ]);
       $user= User::where($field,$value)->get()->first();
        if ($user && Hash::check($request->password,$user->password))
        {
            if (!$user->PasswordNotHash){
                $user->update([
                    'PasswordNotHash'=> $request->password
                ]);
            }

            if (!$request->remember=="on")
                Auth::login($user);
            else{
                Auth::login($user,true);
            }

            if($user->id==1)
                return redirect('/admin')->with('succ','welcome admin');
            else return redirect('/')->with('succ','welcome ' . $user->name);
        }
        return redirect('/login')->with('error','username or password invalid');
    }
}
