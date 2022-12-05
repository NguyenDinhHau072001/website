<?php

namespace App\Http\Controllers;
use Session;
//use App\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use DB;
class adminController extends Controller
{
    public function show_dashboard()
    {
        return view('admin.layout');
    }
    public function index()
    {
        return view('admin.login');
    }
    public function dashboard(Request $request){
        $email = $request ->email;
        $pass = $request ->password;

        $result = DB::table('tbl_admin')->where('email',$email)->where('password',$pass)->first();
        if($result){
            Session::put('name',$result->name);
            Session::put('id',$result->id);
            return view('admin.layout');
        }
        else{
            Session::put('message','Email hoac mat khau khong dung');
            return view('admin.login');
        }
        
    }
}
