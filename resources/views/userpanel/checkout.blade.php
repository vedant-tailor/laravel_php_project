@extends('userpanel.usermaster')
@section('content')

<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Checkout</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="untree_co-section before-footer-section">
    <div class="container">

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('order.place') }}" method="POST">
            @csrf
            <div class="row g-4">

                {{-- ===== Billing Details ===== --}}
                <div class="col-md-7">
                    <div class="card border-0 shadow-sm p-4">
                        <h4 class="fw-bold mb-4">Billing & Delivery Details</h4>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Full Name *</label>
                            <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                                   class="form-control @error('name') is-invalid @enderror"
                                   placeholder="Your full name" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email Address *</label>
                            <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                                   class="form-control @error('email') is-invalid @enderror"
                                   placeholder="your@email.com" required>
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Phone Number *</label>
                            <input type="text" name="phone" value="{{ old('phone') }}"
                                   class="form-control @error('phone') is-invalid @enderror"
                                   placeholder="e.g. 9876543210" required>
                            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Delivery Address *</label>
                            <textarea name="address" rows="3"
                                      class="form-control @error('address') is-invalid @enderror"
                                      placeholder="House/Flat No., Street, Area" required>{{ old('address') }}</textarea>
                            @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">City *</label>
                                <input type="text" name="city" value="{{ old('city') }}"
                                       class="form-control @error('city') is-invalid @enderror"
                                       placeholder="City" required>
                                @error('city')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Pincode *</label>
                                <input type="text" name="pincode" value="{{ old('pincode') }}"
                                       class="form-control @error('pincode') is-invalid @enderror"
                                       placeholder="e.g. 380001" required>
                                @error('pincode')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Order Notes (Optional)</label>
                            <textarea name="notes" rows="2" class="form-control"
                                      placeholder="Any special delivery instructions...">{{ old('notes') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Payment Method</label>
                            <div class="d-flex gap-3 mt-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment" value="cod" id="cod" checked>
                                    <label class="form-check-label" for="cod">💵 Cash on Delivery</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment" value="online" id="online">
                                    <label class="form-check-label" for="online">💳 Pay Online</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ===== Order Summary ===== --}}
                <div class="col-md-5">
                    <div class="card border-0 shadow-sm p-4">
                        <h4 class="fw-bold mb-4">Your Order</h4>

                        @foreach($cart as $id => $details)
                        <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                            @if($details['image'])
                                <img src="{{ asset('image_upload/' . $details['image']) }}"
                                     style="width:60px; height:60px; object-fit:cover; border-radius:6px;" class="me-3">
                            @endif
                            <div class="flex-grow-1">
                                <div class="fw-semibold">{{ $details['name'] }}</div>
                                @if(!empty($details['color']))<small class="text-muted">Color: {{ $details['color'] }}</small><br>@endif
                                @if(!empty($details['size']))<small class="text-muted">Size: {{ $details['size'] }}</small>@endif
                            </div>
                            <div class="text-end">
                                <div>Rs.{{ number_format($details['price'] ?? 0, 2) }}</div>
                                <small class="text-muted">× {{ $details['quantity'] }}</small>
                            </div>
                        </div>
                        @endforeach

                        <div class="d-flex justify-content-between mt-2 mb-1">
                            <span>Subtotal</span>
                            <span>Rs.{{ number_format($total, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>Shipping</span>
                            <span class="text-success fw-semibold">Free</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between fw-bold fs-5 mb-4">
                            <span>Total</span>
                            <span>Rs.{{ number_format($total, 2) }}</span>
                        </div>

                        <button type="submit" class="btn btn-dark btn-lg w-100">
                            ✓ Place Order
                        </button>
                        <a href="{{ route('cart.view') }}" class="btn btn-outline-secondary w-100 mt-2">← Back to Cart</a>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection
