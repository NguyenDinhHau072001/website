@extends('admin/layout')
@section('edit_product')
<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Sua san pham
                        </header>
                        
                        <div class="panel-body">
                            <div class="position-center">
                                @foreach($edit_product as $key => $item)
                                <form role="form" action="{{URL::to('/update_product/'.$item->pro_id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="name">Tên sản phẩm:</label>
                                    <input type="text" class="form-control" id="pro_name" placeholder="Ten san pham" name="pro_name" value="{{$item->pro_name}}">
                                </div>
                               
                                <div class="form-group">
                                    <label for="status">Danh muc</label>
                                    <select name="category" id="category" class="form-control input-sm m-bot15">
                                    @foreach($all_cate as $key => $cate)
                                        <option value="{{$cate->id}}">{{$cate->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Thương hiệu:</label>
                                    <select name="thuonghieu" id="thuonghieu" class="form-control input-sm m-bot15">
                                    @foreach($all_trade as $key => $trade)
                                        <option value="{{$trade->id}}">{{$trade->trade_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                               
                                <div class="form-group">
                                    <label for="price">Giá:</label>
                                    <input type="text" class="form-control" id="pro_price" placeholder="Ten san pham" name="pro_price" value="{{$item->pro_price}}">
                                </div>
                                <div class="form-group">
                                    <label for="desc">Mô tả:</label>
                                    <textarea name="pro_desc" id="pro_desc" cols="88" rows="8">{{$item->pro_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="pro_content">Nội dung:</label>
                                    <textarea name="pro_content" id="pro_content" cols="88" rows="8">{{$item->pro_content}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">Ảnh minh họa:</label>
                                    <input type="file" value="" id="pro_image" name="pro_image">
                            
                                    <img src="{{URL::to('public/uploads/products/'.$item->pro_image)}}" alt="" style="height:100px">
                            
                                </div>
                                <div class="form-group">
                                    <label for="status">Hiển thị</label>
                                    <select name="pro_status" id="pro_status" class="form-control input-sm m-bot15">
                                        <option value="0">hiển thi</option>
                                        <option value="1">ẩn</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-info">Sua san pham</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                        @endsection