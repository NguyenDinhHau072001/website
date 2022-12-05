@extends('admin/layout');
@section('all_pro')
<div class="table-agile-info">
    <div class="panel panel-default">
    <div class="panel-heading">
      Danh sach san pham
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên sản phẩm </th>
            <th>Ảnh</th>
            <th>Giá</th>
            <th>Danh mục</th>
            <th>Thương hiệu</th>
            <th>Mô tả</th>
            <th>Nội dung</th>
            <th>Hien thi</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_product as $key => $item)
            <tr>
            <td><label class="i-checks m-a-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $item->pro_name }}</td>
            <td> <img src="public/uploads/products/{{ $item->pro_image }}" alt="" style="height:100px">  </td>
            <td>{{ $item->pro_price }}</td>
            
            <td>{{ $item->name }}</td>
            <td>{{ $item->trade_name }}</td>
            <td>{{ $item->pro_desc }}</td>
            <td>{{ $item->pro_content }}</td>
            <td>
              
              @if($item->pro_status==0)
               
                            
                <a href="{{URL::to('/status_pro_up/'.$item->pro_id)}}">
                <span class="fa fa-thumbs-up text-success" style="font-size:30px"></span>
                </a>
              
            
              @else 
              
              
              <a href="{{URL::to('/status_pro_down/'.$item->pro_id)}}">
              <span class="fa fa-thumbs-down text-danger" style="font-size:30px"></span>
              </a>
              
              
              @endif
              
            </td>
            <td>
                <a href="{{URL::to('/edit_sanpham/'.$item->pro_id)}}" ui-toggle-class="">
                    <i class="fa fa-pencil-square-o text-success text-active" style="font-size:20px"></i>   
                </a>
                <a onclick="return confirm('ban co cha muon xoa san pham nay')" href="{{URL::to('/delete_sanpham/'.$item->pro_id)}}">
                <i class="fa fa-times text-danger text" style="font-size:20px"></i>
                </a>
            </td>
            </tr>
          @endforeach
          
          
          
        </tbody>
      </table>
    </div>
    
  </div>
</div>


@endsection;