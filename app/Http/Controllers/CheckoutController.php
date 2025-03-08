<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    // Display the checkout page
    public function index()
    {
        $cart = Auth::user()->cart;
        $cartItems = $cart ? $cart->items()->with('phone')->get() : collect();

        // Calculate the total price
        $total = $cartItems->sum(function ($item) {
            return $item->quantity * $item->phone->price;
        });

        return view('checkout.index', compact('cartItems', 'total'));
    }

    // Process the checkout and create an order
    public function store(Request $request)
    {
        $cart = Auth::user()->cart;
        $cartItems = $cart ? $cart->items()->with('phone')->get() : collect();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Calculate the total price
        $total = $cartItems->sum(function ($item) {
            return $item->quantity * $item->phone->price;
        });

        // Create the order
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $total,
            'status' => 'pending',
        ]);

        // Create order items
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'phone_id' => $item->phone->id,
                'quantity' => $item->quantity,
                'price' => $item->phone->price,
            ]);
        }

        // Empty the cart
        $cart->items()->delete();

        // Redirect to the order confirmation page
        return redirect("/checkout/confirmation/{$order->id}")->with('success', 'Order placed successfully!');
    }

    // Show the order confirmation page
    public function confirmation($orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('checkout.confirmation', compact('order'));
    }
}
