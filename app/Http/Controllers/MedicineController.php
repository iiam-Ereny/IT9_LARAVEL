<?php

namespace App\Http\Controllers;


use App\Models\Medicine;
use App\Models\Supplier;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
{
    $medicines = Medicine::with('supplier')->get();
    $suppliers = Supplier::all(); // add this

    return view('inventory', compact('medicines', 'suppliers'));
}


    // Store a new medicine inventory record
    public function store(Request $request)
{
    $validated = $request->validate([
        'medicine_name' => 'required|string|max:255',
        'packing' => 'required|string|max:255',
        'generic_name' => 'required|string|max:255',
        'expiry_date' => 'required|date',
        'supplier_id' => 'required|exists:suppliers,id',
        'quantity' => 'required|integer|min:0',
        'rate' => 'required|numeric|min:0',
    ]);

    // Create the new medicine record
    Medicine::create($validated);

    // Fetch all medicines again to pass to the view
    $medicines = Medicine::with('supplier')->get();

    // Redirect back with success and pass the medicines
    return view('inventory', compact('medicines'))->with('success', 'Medicine added successfully!');
}
 }

