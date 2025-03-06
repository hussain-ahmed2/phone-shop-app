<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Order;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalPhones = Phone::count();
        $totalOrders = Order::count();
        $totalUsers = User::count();
        $activities = ActivityLog::all();

        return view('admin.dashboard', compact('totalPhones', 'totalOrders', 'totalUsers', 'activities'));
    }

    public function phones() 
    {
        $phones = Phone::all(); // Fetch all phones from the database

        return view('admin.phones.index', compact('phones'));
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
