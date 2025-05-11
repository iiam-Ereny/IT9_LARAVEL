<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    
public function store(Request $request)
{
    $validated = $request->validate([
        'invoice_number'   => 'required|string|max:255',
        'medicine_name'    => 'required|string|max:255',
        'generic_name'     => 'required|string|max:255',
        'sale_date'        => 'required|date',
        'quantity'         => 'required|integer|min:1',
        'payment_status'   => 'required|in:PAID,DUE',
    ]);

    // Create the new sale record
    Sale::create($validated);

    // Fetch all sales again to pass to the view
    $sales = Sale::all();

    // Return view with updated data and success message
    return view('sales', compact('sales'))->with('success', 'Sale added successfully!');
}

    public function index()
    {
        $sales = Sale::all();
        return view('sales', compact('sales'));

    }
 public function edit($id)
{
    $sales = Sale::findOrFail($id);
    return view('sales.index', compact('sales'));
}

public function update(Request $request, $id)
{
    $sales = Sale::findOrFail($id);
    $sales->update($request->all());
    return redirect()->route('sales.index');
}

public function destroy($id)
{
   
    $sales = Sale::findOrFail($id);
    
    
    $sales->delete();

    
    return redirect()->route('suppliers')->with('success', 'Supplier deleted successfully.');
}

}

