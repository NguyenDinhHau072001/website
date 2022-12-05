<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
class productController extends Controller
{
    public function add_product()
    {
        $all_cate=DB::table('tbl_category')->orderby('id')->get();
        $all_trade = DB::table('tbl_thuonghieu')->orderby('id')->get();
        return view('admin.add_product')->with('all_cate',$all_cate)->with('all_trade',$all_trade);
    }

    public function save_product(Request $request)
    {
        $data = array();
        $data['pro_name'] = $request->pro_name;
        $data['cate_id'] = $request->category;
        $data['thuonghieu_id'] = $request->thuonghieu;
        $data['pro_price'] = $request->pro_price;
        $data['pro_desc'] = $request->pro_desc;
        $data['pro_content'] = $request->pro_content;
        $data['pro_status'] = $request->pro_status;

        $get_image = $request->file('pro_image');
        if($get_image)
        {
            $get_name_image =$get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();

            $get_image->move('public/uploads/products',$new_image);
            $data['pro_image'] = $new_image;
            DB::table('tbl_sanpham') -> insert($data);
            Session::put('message4','Them san pham thanh cong');
            return Redirect::to('add_product');
        }
        $data['pro_image'] = '';
        DB::table('tbl_sanpham') -> insert($data);
        Session::put('message4','Them san pham thanh cong');
        return Redirect::to('add_product');
    }

    public function all_product()
    {
        $all_product = DB::table('tbl_sanpham')
        ->join('tbl_category', 'tbl_category.id','=','tbl_sanpham.cate_id' )-> join('tbl_thuonghieu','tbl_thuonghieu.id','=','tbl_sanpham.thuonghieu_id') ->get();
        $list_pro = view('admin.all_product')->with('all_product',$all_product);
        return view('admin.layout')->with('admin.all_product',$list_pro);
    }

    public function status_pro_up($pro_id){
        
        DB::table('tbl_sanpham')->where('pro_id',$pro_id)->update(['pro_status'=>1]);
        return Redirect::to('all_product');
    }
    public function status_pro_down($pro_id){
        
        DB::table('tbl_sanpham')->where('pro_id',$pro_id)->update(['pro_status'=>0]);
        return Redirect::to('all_product');
    }

    public function edit_sanpham($id){
        $all_cate=DB::table('tbl_category')->get();
        $all_trade = DB::table('tbl_thuonghieu')->get();
        $product = DB::table('tbl_sanpham')-> join('tbl_category','tbl_sanpham.cate_id','=','tbl_category.id')
        ->join('tbl_thuonghieu','tbl_sanpham.thuonghieu_id','=','tbl_thuonghieu.id') ->where('pro_id',$id)->get();
        $list_pro = view('admin.edit_product')->with('edit_product',$product)->with('all_cate',$all_cate)->with('all_trade',$all_trade);
        return view('admin.layout')->with('edit_product',$list_pro);
    }

    public function update_sanpham(Request $request, $id){
        $data = array();
        $data['pro_name'] = $request->pro_name;
        $data['cate_id'] = $request->category;
        $data['thuonghieu_id'] = $request->thuonghieu;
        $data['pro_price'] = $request->pro_price;
        $data['pro_desc'] = $request->pro_desc;
        $data['pro_content'] = $request->pro_content;
        $data['pro_status'] = $request->pro_status;

        $get_image = $request->file('pro_image');
        if($get_image)
        {
            $get_name_image =$get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();

            $get_image->move('public/uploads/products',$new_image);
            $data['pro_image'] = $new_image;
            DB::table('tbl_sanpham') ->where('pro_id',$id)-> update($data);
            Session::put('message4','sua san pham thanh cong');
            return Redirect::to('all_product');
        }
        DB::table('tbl_sanpham') ->where('pro_id',$id)-> update($data);
        Session::put('message4','sua san pham thanh cong');
        return Redirect::to('all_product');

    }

    public function delete_sanpham($id){
        DB::table('tbl_sanpham')->where('pro_id',$id)->delete();
        return Redirect::to('all_product');
    }
}
