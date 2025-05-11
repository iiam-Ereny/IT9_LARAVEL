<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Medicine;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     public function index()
    {
        $totalSuppliers = Supplier::count();
        $totalMedicines = Medicine::count();
        $outOfStock = Medicine::where('quantity', 0)->count();
        $expired = Medicine::whereDate('expiry_date', '<', Carbon::today())->count();

        return view('dashboard', compact('totalSuppliers', 'totalMedicines', 'outOfStock', 'expired'));
    }

     public function login(Request $request)
    {
        // For now, just allow any username and password
        $request->session()->put('user', $request->email); // Store the username in the session

        // Redirect to the dashboard
        return redirect()->route('dashboard');
    }
    // Handle logout functionality
    public function logout(Request $request)
    {
        $request->session()->forget('user');
        return redirect('/login');
    }

}
