<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Menghapus middleware auth, karena kamu tidak ingin menggunakannya
    public function createOrder(Request $request)
    {
        // Ambil data keranjang belanja untuk pengguna yang sedang login
        $cartItems = Cart::where('user_id', Auth::id())->get();

        // Cek jika keranjang kosong
        if ($cartItems->isEmpty()) {
            return redirect()->route('user.cart.index')->with('error', 'Your cart is empty.');
        }

        // Hitung total harga dari semua produk dalam keranjang
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        // Simpan pesanan
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $totalPrice,
            'status' => 'Pending', // Status awal pesanan
            'payment_method' => $request->payment_method,
        ]);

        // Hapus semua item di keranjang setelah pesanan dibuat
        Cart::where('user_id', Auth::id())->delete();

        // Redirect ke halaman riwayat pesanan
        return redirect()->route('user.orders.index')->with('success', 'Pesanan berhasil dibuat.');
    }
}
