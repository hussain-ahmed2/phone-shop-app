<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function index()
    {
        return view('phones.index', ['phones' => Phone::all()]);
    }

    public function create()
    {
        return view('phones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'specs' => 'nullable|json',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $phone = new Phone($request->all());

        if ($request->hasFile('image')) {
            $phone->image = $request->file('image')->store('phones', 'public');
        }

        $phone->save();

        return redirect()->route('phones.index')->with('success', 'Phone added successfully.');
    }
}
