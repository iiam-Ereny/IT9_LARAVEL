<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Supplier;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    // Display medicine list with optional search filters
    public function index(Request $request)
    {
        $query = Medicine::with('supplier');

        if ($request->filled('medicine_name')) {
            $query->where('medicine_name', 'like', '%' . $request->medicine_name . '%');
        }

        if ($request->filled('generic_name')) {
            $query->where('generic_name', 'like', '%' . $request->generic_name . '%');
        }

        if ($request->filled('supplier_name')) {
            $query->whereHas('supplier', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->supplier_name . '%');
            });
        }

        $medicines = $query->get();
        $suppliers = Supplier::all();

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

        Medicine::create($validated);

        return redirect()->route('medicine.index')->with('success', 'Medicine added successfully!');
    }

 public function edit($id)
{
    $medicine = Medicine::findOrFail($id);
    return view('   edit', compact('medicine'));
}

public function destroy($id)
{
    $medicine = Medicine::findOrFail($id);
    $medicine->delete();

    return redirect()->route('medicine.index')->with('success', 'Medicine deleted successfully!');

}


public function update(Request $request, $id)
{
    $medicine = Medicine::findOrFail($id);

    $validated = $request->validate([
        'medicine_name' => 'required|string|max:255',
        'packing' => 'required|string|max:255',
        'generic_name' => 'required|string|max:255',
        'expiry_date' => 'required|date',
        'supplier_id' => 'required|exists:suppliers,id',
        'quantity' => 'required|integer|min:0',
        'rate' => 'required|numeric|min:0',
    ]);

    $medicine->update($validated);

    return redirect()->route('medicine.index')->with('success', 'Medicine updated successfully!');
}
}