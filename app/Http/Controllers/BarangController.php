<?php

namespace App\Http\Controllers;

//import Model "Barang
use App\Models\Barang;

//return type View
use Illuminate\View\View;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get barangs
        $barangs = Barang::latest()->paginate(5);

        //render view with posts
        return view('barangs.index', compact('barangs'));
    }
}