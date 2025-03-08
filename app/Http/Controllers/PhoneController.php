<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhoneController extends Controller
{
    public function index(Request $request)
    {
        $query = Phone::query();

        // Check if a search term is provided
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;

            // Filter by phone name or description (you can add more attributes as needed)
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('brand', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        }

        // Paginate the results
        $phones = $query->paginate(12);

        return view('phones.index', compact('phones'));
    }

    public function show(Phone $phone)
    {
        $user = Auth::user();
        $isInCart = false;

        if ($user && $user->cart) {
            $isInCart = $user->cart->items->contains("phone_id", $phone->id);
        }

        return view('phones.show', compact('phone', 'isInCart'));
    }
}
