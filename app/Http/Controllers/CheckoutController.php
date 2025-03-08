<?php

namespace App\Http\Controllers;

use App\Models\Cart as ModelsCart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // Display the checkout page
    public function index()
    {
        // Get the cart items and the total amount
        $cartItems = ModelsCart::getContent();
        $totalAmount =  0;

        foreach ($cartItems as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        };

        return view('checkout.index', compact('cartItems', 'totalAmount'));
    }

    // Handle the checkout process (store order)
    public function store(Request $request)
    {
        // Validate the checkout form (shipping details, etc.)
        $request->validate([
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
            'address' => 'required',
            'city' => 'required',
            'email' => 'required|email',
        ]);

        // Get user data and cart info
        $cartItems = Cart::getContent();
        $totalAmount = Cart::getTotal();

        // Create an order record in the database (optional, if you want to store orders)
        $order = Order::create([
            'user_id' => auth()->id(),
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'total_amount' => $totalAmount,
            'status' => 'pending', // You can change the status as needed
        ]);

        // Attach cart items to the order (optional)
        foreach ($cartItems as $item) {
            $order->items()->create([
                'product_id' => $item->id,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }

        // Clear the cart after order
        Cart::clear();

        // Redirect the user to a thank you page or show a success message
        return redirect()->route('home')->with('success', 'Your order has been placed successfully!');
    }
}
