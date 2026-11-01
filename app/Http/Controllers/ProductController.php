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
        return view('product');
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            // Perhatikan 'descriptions' disesuaikan dengan database kamu
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
}