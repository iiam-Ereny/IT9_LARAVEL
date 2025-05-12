<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class SupplierController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');

    $suppliers = Supplier::when($search, function ($query, $search) {
        return $query->where('name', 'like', "%{$search}%")
                     ->orWhere('email', 'like', "%{$search}%")
                     ->orWhere('contact_number', 'like', "%{$search}%")
                     ->orWhere('address', 'like', "%{$search}%");
    })->get();

    return view('suppliers', compact('suppliers'));
}

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        Supplier::create($request->all());
        return redirect()->route('suppliers');
    }
}
