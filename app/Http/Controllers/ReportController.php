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
        $medicines = Medicine::with('supplier')->orderBy('medicine_name')->get();
        $reportDate = now()->format('Y-m-d H:i:s');
        return view('reports', compact('medicines', 'reportDate'));
    }

    public function downloadPDF()
    {
        $medicines = Medicine::with('supplier')->orderBy('medicine_name')->get();
        $reportDate = now()->format('Y-m-d H:i:s');
        $pdf = PDF::loadView('medicine_stock_report.pdf', compact('medicines', 'reportDate'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('medicine_stock_report.pdf');
    }
}
