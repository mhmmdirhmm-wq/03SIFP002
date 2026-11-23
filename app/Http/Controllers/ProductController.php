<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        $products = product::all();
        return view('product', compact('products'));
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = product::select(['id', 'name', 'descriptions', 'price', 'created_at']);
            
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('price', function($row){
                    return 'Rp ' . number_format($row->price, 0, ',', '.');
                })
                ->editColumn('created_at', function($row){
                    return $row->created_at ? $row->created_at->format('Y-m-d') : '';
                })
                ->make(true);
        }
    }

    public function cetakPdf()
    {
        $product = product::all();
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('product.cetak', ['product' => $product])
            ->setPaper('a4', 'landscape');
        return $pdf->download('data-product.pdf');
    }
}