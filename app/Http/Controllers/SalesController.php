<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Medicine;
use Illuminate\Http\Request;

class SalesController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function index() {
    $sales = Sales::all();
    $medicines = Medicine::all(); // Also needed for dropdown in the form

    return view('sales', compact('sales', 'medicines'));
}
    
    public function store(Request $request)
{
    // Validate request
    $request->validate([
        'medicine_id' => 'required|exists:medicines,id',
        'invoice_number' => 'required',
        'sale_date' => 'required|date',
        'quantity' => 'required|integer|min:1',
        'total_amount' => 'required|numeric|min:0',
    ]);

    // Get the medicine
    $medicine = Medicine::findOrFail($request->medicine_id);

    // Check if there's enough stock
    if ($medicine->quantity < $request->quantity) {
        return back()->with('error', 'Not enough stock available.');
    }

    // Deduct stock
    $medicine->quantity -= $request->quantity;
    $medicine->save();

    // Create the sale
    Sales::create([
        'invoice_number' => $request->invoice_number,
        'medicine_name' => $medicine->medicine_name,
        'generic_name' => $medicine->generic_name,
        'sale_date' => $request->sale_date,
        'quantity' => $request->quantity,
        'total_amount' => $medicine->rate * $request->quantity,
    ]);

    return redirect()->route('sales')->with('success', 'Sale recorded and inventory updated.');
}

}
