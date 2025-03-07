<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Order;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $totalPhones = Phone::count();
        $totalOrders = Order::count();
        $totalUsers = User::count();
        $activities = ActivityLog::latest()->paginate(5);

        return view('admin.dashboard', compact('totalPhones', 'totalOrders', 'totalUsers', 'activities'));
    }

    public function phones() 
    {
        $phones = Phone::all(); // Fetch all phones from the database

        return view('admin.phones.index', compact('phones'));
    }

    public function create_phone()
    {
        return view('admin.phones.create');
    }

    public function store_phone(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'specs' => 'nullable|json',
            'image' => 'nullable|image|max:2048', // 2MB max image size
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('phones', 'public');
        }

        Phone::create($validated);

        ActivityLog::create([
            'activity_type' => 'Phone Added', // Activity type reflecting the action
            'description' => 'A new phone has been successfully added to the inventory with name: ' . $validated['name'], // Description that includes phone name
        ]);

        return redirect('/admin/phones')->with('success', 'Phone added successfully!');
    }

    public function edit_phone($id)
    {
        $phone = Phone::findOrFail($id); // Fetch the phone by ID
        return view('admin.phones.edit', compact('phone'));
    }

    public function update_phone(Request $request, $id)
    {
        $phone = Phone::findOrFail($id); // Find the phone record

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'specs' => 'nullable|json',
            'image' => 'nullable|image|max:2048', // 2MB max image size
        ]);

        // Check if a new image is uploaded, otherwise keep the old image
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($phone->image) {
                Storage::disk('public')->delete($phone->image);
            }
            // Store the new image
            $validated['image'] = $request->file('image')->store('phones', 'public');
        } else {
            $validated['image'] = $phone->image; // Keep old image
        }

        $phone->update($validated);

        // Log activity
        ActivityLog::create([
            'activity_type' => 'Phone Updated',
            'description' => 'Phone with name: ' . $phone->name . ' has been updated.',
        ]);

        return redirect('/admin/phones')->with('success', 'Phone updated successfully!');
    }

    public function delete_phone($id)
    {
        $phone = Phone::findOrFail($id); // Find the phone by ID

        // Check if the phone has an image and delete it
        if ($phone->image) {
            Storage::disk('public')->delete($phone->image);
        }

        // Log the delete activity
        ActivityLog::create([
            'activity_type' => 'Phone Deleted',
            'description' => 'Phone deleted: ' . $phone->name,
        ]);

        // Delete the phone from the database
        $phone->delete();

        return redirect('/admin/phones')->with('success', 'Phone deleted successfully!');
    }
    
    public function orders() 
    {
        $orders = Order::all(); // Fetch all phones from the database

        return view('admin.orders.index', compact('orders'));
    }

    
    public function users() 
    {
        $users = User::all(); // Fetch all phones from the database

        return view('admin.users.index', compact('users'));
    }
    
    public function settings() 
    {
        return view('admin.settings.index');
    }
}
