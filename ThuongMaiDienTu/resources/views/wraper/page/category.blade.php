@extends('wraper.layout.master')
@section('title','Danh muc san pham')

@section('content')
	<!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<h2 class="text-uppercase">{{__('front.category')}} -> {{$category->translation()->name}}</h2>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Top selling</h3>
							<!-- Product TOP SELL -->
							{{-- @php dd($topsell); @endphp --}}
							@forelse ($producsell as $ts)
							<div class="product-widget">
								<div class="product-img">
									<img src="/wraper/img/product01.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">{{$ts->category->name}}</p>
								<h3  onclick="window.location.href='{{route('detail',$ts->id)}}'"  class="product-name"><a href="#">{{$ts->name}}</a></h3>
									<h4 class="product-price">{{$ts->price-($ts->price * ($ts->sale/100))}} VNĐ <del class="product-old-price">{{$ts->price}}</del></h4>
								</div>
							</div>	
							@empty
								
							@endforelse
							
							<!-- END Product TOP SELL -->	
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Sort By:
									<select class="input-select">
										<option value="0">Popular</option>
										<option value="1">Position</option>
									</select>
								</label>

								<label>
									Show:
									<select class="input-select">
										<option value="0">20</option>
										<option value="1">50</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">

                            @forelse ($product as $pr)
                            <!-- product -->
							<div class="col-md-4 col-xs-6">
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="/wraper/img/product01.png" alt="">
                                            <div class="product-label">
                                                <span class="sale">-{{$pr->sale}}%</span>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{$pr->category->name}}</p>
                                            <h3 class="product-name"><a href="#">{{$pr->name}}</a></h3>
                                            <h4 class="product-price">{{$pr->price - ($pr->price*($pr->sale/100))}} VNĐ <del class="product-old-price">{{$pr->price}} VNĐ</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                <button onclick="window.location.href='{{route('detail',$pr->id)}}'" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /product -->    
                            @empty
                                <h1>Không có sản phẩm nào!</h1>
                            @endforelse
							
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							{{-- <ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul> --}}
							<div class="store-pagination">
								{{$product->links()}}
							</div>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@stop