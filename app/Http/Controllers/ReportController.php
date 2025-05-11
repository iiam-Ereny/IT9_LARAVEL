<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class ReportController extends Controller
{
    //
    public function index()
    {
        return view('reports');
    }

    public function downloadPDF()
    {
        $medicines = Medicine::with('supplier')->orderBy('medicine_name')->get();
        $pdf = PDF::loadView('medicine_stock_report.pdf', compact('medicines'));
        return $pdf->download('medicine_stock_report.pdf');
    }
}
