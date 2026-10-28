@extends('userpanel.usermaster')
@section('content')
<div class="untree_co-section product-section before-footer-section">
		    <div class="container">
		      	<div class="row">

                    @foreach($viewproduct as $item)
					<!-- Start Column 3 -->
					<div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item" href="{{ route('cart.add', $item->id) }}">
							@if($item->image)
								<img src="{{asset('image_upload/'.$item->image)}}" class="img-fluid product-thumbnail">
							@endif
							<h3 class="product-title">{{optional($item->product)->productname ?? 'Product'}}</h3>
							<strong class="product-price">{{$item->price}}</strong><br>
							<strong class="product-price">{{$item->description}}</strong>

							<span class="icon-cross">
								@if($item->image)
									<img src="{{asset('image_upload/'.$item->image)}}" class="img-fluid">
								@endif
							</span>
						</a>
					</div>
                    @endforeach
					<!-- End Column 3 -->

				

		      	</div>
		    </div>
		</div>
        @endsection
