<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate( [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        Supplier::create($request->all());
        return redirect()->route('suppliers');
    }


   public function edit($id)
{
    $supplier = Supplier::findOrFail($id);
    return view('suppliers.edit', compact('supplier'));
}

public function update(Request $request, $id)
{
    $supplier = Supplier::findOrFail($id);
    $supplier->update($request->all());
    return redirect()->route('suppliers');
}

public function destroy($id)
{
   
    $supplier = Supplier::findOrFail($id);
    
    
    $supplier->delete();

    
    return redirect()->route('suppliers')->with('success', 'Supplier deleted successfully.');
}


}
