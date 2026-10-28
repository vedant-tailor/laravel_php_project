<?php

namespace App\Http\Controllers;

use App\models\productentry;
use Illuminate\Http\Request;

class UserPanel extends Controller
{
    /**
     * Homepage — show latest products from DB
     */
    public function index()
    {
        $products = productentry::with('product')->latest()->take(8)->get();
        return view('userpanel.userindex', compact('products'));
    }

    /**
     * Shop page — all products
     */
    public function viewproduct()
    {
        $viewproduct = productentry::with('product')->get();
        return view('userpanel.viewproduct', compact('viewproduct'));
    }

    // =========================================================
    // CART METHODS
    // =========================================================

    /**
     * Add a product to the session cart.
     */
    public function addToCart($id)
    {
        $product = productentry::with('product')->find($id);

        if (!$product) {
            abort(404);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Use the relation for product name, fallback to company/description
            $productName = optional($product->product)->productname
                        ?? $product->company
                        ?? 'Product #' . $id;

            $cart[$id] = [
                'name'     => $productName,
                'quantity' => 1,
                'price'    => $product->numeric_price,  // clean float, strips "300 rs" → 300.0
                'image'    => $product->image,
                'color'    => $product->color,
                'size'     => $product->size,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Update quantity of a cart item.
     */
    public function updateCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $qty = (int) $request->input('quantity', 1);
            if ($qty < 1) $qty = 1;
            $cart[$id]['quantity'] = $qty;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.view')->with('success', 'Cart updated!');
    }

    /**
     * Display the cart page.
     */
    public function cart()
    {
        return view('userpanel.cart');
    }

    /**
     * Remove an item from the cart.
     */
    public function remove(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.view')->with('success', 'Product removed successfully');
    }

    /**
     * Show the checkout page.
     */
    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.view')->with('error', 'Your cart is empty!');
        }

        $total = array_sum(array_map(
            fn($item) => floatval($item['price']) * intval($item['quantity']),
            $cart
        ));

        return view('userpanel.checkout', compact('cart', 'total'));
    }

    /**
     * Place the order (clear cart after success).
     */
    public function placeOrder(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:100',
            'phone'   => 'required|string|max:15',
            'address' => 'required|string|max:500',
            'city'    => 'required|string|max:100',
            'pincode' => 'required|string|max:10',
        ]);

        // Clear the cart after placing order
        session()->forget('cart');

        return redirect()->route('user.index')
                         ->with('order_success', 'Thank you! Your order has been placed successfully. We will contact you soon.');
    }
}