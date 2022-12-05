<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
class HomeController extends Controller
{
    public function index()
    {
        $all_cate=DB::table('tbl_category')->where('hienthi','0') ->orderby('id')->get();
        $all_trade = DB::table('tbl_thuonghieu')->where('trade_status','0') ->orderby('id')->get();
        $all_product = DB::table('tbl_sanpham')
        ->join('tbl_category', 'tbl_category.id','=','tbl_sanpham.cate_id' )-> join('tbl_thuonghieu','tbl_thuonghieu.id','=','tbl_sanpham.thuonghieu_id') ->get();
        return view('pages.home')->with('category',$all_cate)->with('thuonghieu',$all_trade)->with('product',$all_product);
    }

    public function contact()
    {
        return view('pages.contact');
    }
    public function login(){
        return view('pages.login');
    }
}
