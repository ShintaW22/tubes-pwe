<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('user.cart.index', compact('cartItems'));
    }

    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('user.cart.index');
    }

    public function removeFromCart($cartId)
    {
        Cart::destroy($cartId);
        return redirect()->route('user.cart.index');
    }
}
