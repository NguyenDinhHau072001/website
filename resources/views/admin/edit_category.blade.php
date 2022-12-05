@extends('admin/layout');
@section('edit_cate');
<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Sửa danh mục
                        </header>
                        
                        <div class="panel-body">
                            <div class="position-center">
                                <?php
                                $message = Session::get('message');
                                if($message){
                                    echo $message;
                                }
                                ?>
                                @foreach($edit_category as $key => $cate)
                                <form role="form" action="{{URL::to('/update_category/'.$cate->id)}}" method="post">
                                    {{csrf_field()}}
                                    
                                        <div class="form-group">
                                            <label for="name">Tên danh mục:</label>
                                            <input type="text" class="form-control" id="name" placeholder="Ten danh muc" name="name" value="{{ $cate->name }}"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="desc">Mô tả:</label>
                                            <textarea name="desc" id="desc" cols="88" rows="8">{{ $cate->mota }}</textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="status">Hien thi</label>
                                            <select name="status" id="status" class="form-control input-sm m-bot15">
                                                <option value="0">hien thi</option>
                                                <option value="1">an</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-info">Sua</button>
                                    
                            </form>
                            @endforeach;
                            </div>

                        </div>
                        @endsection;