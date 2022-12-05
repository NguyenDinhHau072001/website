<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;

use DB;
class thuonghieuController extends Controller
{
    public function add_thuonghieu()
    {
        return view('admin.add_thuonghieu');
    }

    public function save_thuonghieu(Request $request)
    {
        $data = array();
        $data['trade_name'] = $request->name;
        $data['trade_desc'] = $request->desc;
        $data['trade_status'] = $request->status;
        if($data){
             DB::table('tbl_thuonghieu') -> insert($data);
             $message = Session::put('message','Them thuong hieu thanh cong');
        }
        else
            $message = Session::put('message','them thuong hieu khong thanh cong');

        return Redirect::to('add_thuonghieu');
       

    }

    public function all_thuonghieu()
    {
        $th_name = DB::table('tbl_thuonghieu')->get();
        $list_trade = view('admin.all_thuonghieu')->with('all_thuonghieu',$th_name);
        return view('admin.layout')->with('admin.all_thuonghieu',$list_trade);
    }

    public function status_trade_down($id)
    {
        DB::table('tbl_thuonghieu')->where('id',$id)->update(['trade_status'=>1]);
        return Redirect::to('all_thuonghieu');
    }
    public function status_trade_up($id)
    {
        DB::table('tbl_thuonghieu')->where('id',$id)->update(['trade_status'=>0]);
        return Redirect::to('all_thuonghieu');
    }

    public function delete_thuonghieu($id){
        DB::table('tbl_thuonghieu')->where('id',$id)->delete();
        return Redirect::to('all_thuonghieu');
    }

    public function edit_thuonghieu($id){
        $thuonghieu = DB::table('tbl_thuonghieu')->where('id',$id)->get();
        $list_thuonghieu = view('admin.edit_thuonghieu')->with('edit_thuonghieu',$thuonghieu);
        return view('admin.layout')->with('edit_thuonghieu',$list_thuonghieu);
    }
    public function update_thuonghieu(Request $request, $id){
        $data = array();
        $data['trade_name'] = $request->name;
        $data['trade_desc'] = $request->desc;
        $data['trade_status'] = $request->status;
        if($data){
             DB::table('tbl_thuonghieu') -> update($data);
             $message = Session::put('message','Sua thuong hieu thanh cong');
        }
        else
            $message = Session::put('message','Sua thuong hieu khong thanh cong');

        return Redirect::to('all_thuonghieu');
    }
}
