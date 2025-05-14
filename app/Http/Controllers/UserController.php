<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Tidak ada middleware di sini

    public function index()
    {
        return view('user.dashboard');
    }

    // Menampilkan daftar produk
    public function showProducts()
    {
        $products = Product::all();
        return view('user.products.index', compact('products'));
    }

    // Menampilkan detail produk
    public function showProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('user.products.show', compact('product'));
    }

    // Menambahkan produk ke keranjang
    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId); // Ambil produk berdasarkan ID

        // Cek apakah produk sudah ada di keranjang
        $existingCartItem = Cart::where('user_id', Auth::id())
                                ->where('product_id', $product->id)
                                ->first();

        if ($existingCartItem) {
            // Jika produk sudah ada, tambahkan kuantitasnya
            $existingCartItem->quantity += $request->quantity;
            $existingCartItem->save();
        } else {
            // Jika produk belum ada, buat item baru
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->route('user.cart.index')->with('success', 'Product added to cart.');
    }

    // Menampilkan keranjang belanja
    public function showCart()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('user.cart.index', compact('cartItems'));
    }

    // Menghapus item dari keranjang
    public function removeFromCart($cartId)
    {
        Cart::destroy($cartId);
        return redirect()->route('user.cart.index')->with('success', 'Item removed from cart.');
    }

    // Menyelesaikan checkout dan membuat pesanan
    public function checkout(Request $request)
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('user.cart.index')->with('error', 'Your cart is empty.');
        }

        // Hitung total harga
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        // Simpan pesanan
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $totalPrice,
            'status' => 'Pending',
            'payment_method' => $request->payment_method,
        ]);

        // Hapus semua item di keranjang setelah checkout
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('user.orders.index')->with('success', 'Order has been placed.');
    }

    // Menampilkan riwayat pesanan pengguna
    public function showOrders()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('user.orders.index', compact('orders'));
    }
}
