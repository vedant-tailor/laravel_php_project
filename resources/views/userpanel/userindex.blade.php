@extends('userpanel.usermaster')

@section('content')



        <!-- Start Product Section -->
        <div class="product-section">
            <div class="container">
                <div class="row">

                    <!-- Intro column -->
                    <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                        <h2 class="mb-4 section-title">Crafted with excellent material.</h2>
                        <p class="mb-4">Discover our premium furniture collection — designed for comfort, built to last.</p>
                        <p><a href="{{ route('products.shop') }}" class="btn">Explore All</a></p>
                    </div>

                    @forelse($products as $product)
                    <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                        <a class="product-item" href="{{ route('cart.add', $product->id) }}">
                            @if($product->image)
                                <img src="{{ asset('image_upload/' . $product->image) }}" class="img-fluid product-thumbnail" alt="{{ optional($product->product)->productname }}">
                            @else
                                <img src="{{ asset('images/product-1.png') }}" class="img-fluid product-thumbnail">
                            @endif
                            <h3 class="product-title">{{ optional($product->product)->productname ?? 'Product' }}</h3>
                            <strong class="product-price">{{ $product->price ? 'Rs.' . $product->price : '' }}</strong>
                            <span class="icon-cross">
                                <img src="{{ asset('images/cross.svg') }}" class="img-fluid">
                            </span>
                        </a>
                    </div>
                    @empty
                    <div class="col-12 col-md-9">
                        <p class="text-muted">No products available yet. Check back soon!</p>
                    </div>
                    @endforelse

                </div>
            </div>
        </div>
        <!-- End Product Section -->



        <!-- Start Why Choose Us Section -->

        <div class="why-choose-section">

            <div class="container">

                <div class="row justify-content-between">

                    <div class="col-lg-6">

                        <h2 class="section-title">Why Choose Us</h2>

                        <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.</p>



                        <div class="row my-5">

                            <div class="col-6 col-md-6">

                                <div class="feature">

                                    <div class="icon">

                                        <img src="images/truck.svg" alt="Image" class="imf-fluid">

                                    </div>

                                    <h3>Fast &amp; Free Shipping</h3>

                                    <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>

                                </div>

                            </div>



                            <div class="col-6 col-md-6">

                                <div class="feature">

                                    <div class="icon">

                                        <img src="images/bag.svg" alt="Image" class="imf-fluid">

                                    </div>

                                    <h3>Easy to Shop</h3>

                                    <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>

                                </div>

                            </div>



                            <div class="col-6 col-md-6">

                                <div class="feature">

                                    <div class="icon">

                                        <img src="images/support.svg" alt="Image" class="imf-fluid">

                                    </div>

                                    <h3>24/7 Support</h3>

                                    <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>

                                </div>

                            </div>



                            <div class="col-6 col-md-6">

                                <div class="feature">

                                    <div class="icon">

                                        <img src="images/return.svg" alt="Image" class="imf-fluid">

                                    </div>

                                    <h3>Hassle Free Returns</h3>

                                    <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>

                                </div>

                            </div>



                        </div>

                    </div>



                    <div class="col-lg-5">

                        <div class="img-wrap">

                            <img src="images/why-choose-us-img.jpg" alt="Image" class="img-fluid">

                        </div>

                    </div>



                </div>

            </div>

        </div>

        <!-- End Why Choose Us Section -->



@endsection