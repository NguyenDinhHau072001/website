@extends('admin/layout')
@section('add_thuonghieu')
<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Them thuong hieu
                        </header>
                        
                        <div class="panel-body">
                            <div class="position-center">
                                <?php
                                $message = Session::get('message');
                                if($message){
                                    echo $message;
                                }
                                ?>
                                <form role="form" action="{{URL::to('/save_thuonghieu')}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="name">Tên thương hiệu:</label>
                                    <input type="text" class="form-control" id="name" placeholder="Ten danh muc" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="desc">Mô tả:</label>
                                    <textarea name="desc" id="desc" cols="88" rows="8"></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="status">Hien thi</label>
                                    <select name="status" id="status" class="form-control input-sm m-bot15">
                                        <option value="0">hien thi</option>
                                        <option value="1">an</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-info">Them thương hiệu</button>
                            </form>
                            </div>

                        </div>
                        @endsection