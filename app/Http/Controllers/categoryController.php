<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use DB;
class categoryController extends Controller
{
    public function add_category()
    {
        return view('admin.add_category');
    }

    public function all_category(){
        $all_cate = DB::table('tbl_category')->get();
        $list_cate = view('admin.all_cate')->with('all_cate',$all_cate);
        return view('admin.layout')->with('admin.all_cate',$list_cate);
    }

    public function save_category(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['mota'] = $request->desc;
        $data['hienthi'] = $request->status;

        DB::table('tbl_category')->insert($data);
        Session::put('message','Them danh muc thanh cong');
        return Redirect::to('add_category');
    }

    public function status_category_up($cate_id)
    {       
        DB::table('tbl_category')->where('id',$cate_id)->update(['hienthi'=>0]);
        return Redirect::to('all_category');
    }
    public function status_category_down($cate_id)
    {       
        DB::table('tbl_category')->where('id',$cate_id)->update(['hienthi'=>1]);
        return Redirect::to('all_category');
    }

    public function edit_category($id)
    {
        $category=DB::table('tbl_category')->where('id',$id)->get();
        $list_category = view('admin.edit_category')->with('edit_category',$category);
        return view('admin.layout')->with('edit_category',$list_category);
    }

    public function update_category(Request $request,$id)
    {
        $data  = array();
        $data['name'] = $request->name;
        $data['mota'] = $request->desc;
        $data['hienthi'] = $request->status;
        if($data){
            DB::table('tbl_category')->where('id',$id)->update($data);
            $message = Session::put('message2','Cap nhat thanh cong');
            return Redirect::to('all_category');
        }
    }

    public function delete_category($id)
    {
        DB::table('tbl_category')->where('id',$id)->delete();
        $message2 = Session::put('message1','Xoa thanh cong');
        return Redirect::to('all_category');
    }


    //front-end

    public function danh_muc($id){
        $all_cate=DB::table('tbl_category')->where('hienthi','0')->where('id',$id) ->orderby('id')->get();
        $all_trade = DB::table('tbl_thuonghieu')->where('trade_status','0')->orderby('id')->get();
        $all_product = DB::table('tbl_sanpham')
        ->join('tbl_category', 'tbl_category.id','=','tbl_sanpham.cate_id' )
        -> join('tbl_thuonghieu','tbl_thuonghieu.id','=','tbl_sanpham.thuonghieu_id')
        ->where('tbl_sanpham.cate_id',$id)->get();
        return view('pages.show_cate')->with('cate',$all_cate)->with('pro',$all_product)->with('thuonghieu',$all_trade);
    }

}
