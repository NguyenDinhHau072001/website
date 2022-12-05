
@extends("pages/layout");
@section("category_product");
<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
                    @foreach($product as $key => $pro)
						<h2 class="title text-center">{{$pro->}}</h2>
						
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="">
										<div class="productinfo text-center">
											<img src="public/uploads/products/{{$pro->pro_image}}" alt=""style="height:200px" />
											<h2>{{number_format($pro->pro_price)}}  VND</h2>
											<p>{{$pro->pro_name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
										</div>
										
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Thêm yêu thích</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Thêm vào xem sau</a></li>
									</ul>
								</div>
							</div>
							
						</div>
						
						
					</div><!--features_items-->
					
					@endforeach
                    @endsection;