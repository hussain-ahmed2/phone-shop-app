<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Display the cart
    public function index()
    {
        // Retrieve the cart for the authenticated user
        $cart = Cart::where('user_id', Auth::id())->first();
        
        if ($cart) {
            // Retrieve the items in the cart
            $cartItems = $cart->items;
            $total = 0;
            foreach ($cartItems as $item) {
                $total += $item->phone->price * $item->quantity;
            }
        } else {
            $cartItems = [];
            $total = 0;
        }

        return view('cart.index', compact('cartItems', 'total'));
    }

    // Add a phone to the cart
    public function add(Phone $phone)
    {
        $user = Auth::user();

        // Retrieve the user's cart, or create a new one if it doesn't exist
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        // Check if the phone already exists in the cart
        $cartItem = CartItem::where('cart_id', $cart->id)->where('phone_id', $phone->id)->first();

        if ($cartItem) {
            // Increment the quantity of the phone in the cart
            $cartItem->quantity++;
            $cartItem->save();
        } else {
            // Add a new cart item with quantity 1
            CartItem::create([
                'cart_id' => $cart->id,
                'phone_id' => $phone->id,
                'quantity' => 1,
            ]);
        }

        return redirect('/cart')->with('success', 'Phone added to cart!');
    }

    // Remove a phone from the cart
    public function remove(Phone $phone)
    {
        $cart = Cart::where('user_id', Auth::id())->first();

        if ($cart) {
            // Find the cart item associated with the phone
            $cartItem = CartItem::where('cart_id', $cart->id)->where('phone_id', $phone->id)->first();

            if ($cartItem) {
                // Remove the phone from the cart
                $cartItem->delete();

                return redirect('/cart')->with('success', 'Phone removed from cart!');
            }
        }

        return redirect('/cart')->with('error', 'Phone not found in cart!');
    }
}
