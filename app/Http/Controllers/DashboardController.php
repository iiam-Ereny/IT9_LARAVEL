<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Medicine;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Dashboard page with statistics
    public function index()
    {
        $totalSuppliers = Supplier::count();
        $totalMedicines = Medicine::count();
        $outOfStock = Medicine::where('quantity', 0)->count();
        $expired = Medicine::whereDate('expiry_date', '<', Carbon::today())->count();

        return view('dashboard', compact('totalSuppliers', 'totalMedicines', 'outOfStock', 'expired'));
    }

    // Hardcoded login method
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $adminEmail = 'admin@example.com';
        $adminPassword = 'password123';

        if ($request->email === $adminEmail && $request->password === $adminPassword) {
            $request->session()->put('admin_logged_in', true);
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    // Logout method — THIS is what you're asking about
    public function logout(Request $request)
    {
        $request->session()->forget('admin_logged_in');
        return redirect('/login');
    }
}
