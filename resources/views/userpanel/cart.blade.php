@extends('userpanel.usermaster')
@section('content')

    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Shopping Cart</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section before-footer-section">
        <div class="container">

            {{-- Alerts --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="row mb-5">
                <div class="site-blocks-table col-md-12">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Subtotal</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(session('cart') && count(session('cart')) > 0)
                                @php $total = 0; @endphp

                                @foreach(session('cart') as $id => $details)
                                    @php $total += floatval($details['price'] ?? 0) * intval($details['quantity']); @endphp
                                    <tr>
                                        <td class="product-thumbnail">
                                            @if($details['image'])
                                                <img src="{{ asset('image_upload/' . $details['image']) }}"
                                                     alt="{{ $details['name'] }}"
                                                     class="img-fluid" style="width:80px; height:80px; object-fit:cover; border-radius:6px;">
                                            @endif
                                        </td>
                                        <td class="product-name">
                                            <h6 class="mb-1">{{ $details['name'] }}</h6>
                                            @if(!empty($details['color']))<small class="text-muted">Color: {{ $details['color'] }}</small><br>@endif
                                            @if(!empty($details['size']))<small class="text-muted">Size: {{ $details['size'] }}</small>@endif
                                        </td>
                                        <td>Rs.{{ number_format(floatval($details['price'] ?? 0), 2) }}</td>
                                        <td>
                                            {{-- Quantity update form --}}
                                            <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex align-items-center" style="gap:6px;">
                                                @csrf
                                                <input type="number" name="quantity" value="{{ $details['quantity'] }}"
                                                       min="1" max="99"
                                                       class="form-control form-control-sm" style="width:70px;">
                                                <button type="submit" class="btn btn-sm btn-outline-secondary">Update</button>
                                            </form>
                                        </td>
                                        <td>Rs.{{ number_format(floatval($details['price'] ?? 0) * intval($details['quantity']), 2) }}</td>
                                        <td>
                                            <a href="{{ route('cart.remove', $id) }}"
                                               class="btn btn-sm btn-danger"
                                               onclick="return confirm('Remove this item?')">✕</a>
                                        </td>
                                    </tr>
                                @endforeach

                            @else
                                <tr>
                                    <td colspan="6" class="text-center py-4">
                                        Your cart is empty.
                                        <a href="{{ route('products.shop') }}" class="btn btn-sm btn-primary ms-2">Shop Now</a>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            @if(session('cart') && count(session('cart')) > 0)
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('products.shop') }}" class="btn btn-outline-dark">← Continue Shopping</a>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm p-4">
                        <h5 class="fw-bold mb-3">Cart Summary</h5>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal</span>
                            <span>Rs.{{ number_format($total ?? 0, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>Shipping</span>
                            <span class="text-success">Free</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between fw-bold fs-5 mb-4">
                            <span>Total</span>
                            <span>Rs.{{ number_format($total ?? 0, 2) }}</span>
                        </div>
                        <a href="{{ route('checkout') }}" class="btn btn-dark btn-lg w-100">Proceed to Checkout →</a>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>

@endsection