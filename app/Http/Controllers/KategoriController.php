<?php

namespace App\Http\Controllers;

//import Model "Kategori
use App\Models\Kategori;

//return type View
use Illuminate\View\View;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get kategoris
        $kategoris = Kategori::latest()->paginate(5);

        //render view with posts
        return view('kategoris.index', compact('kategoris'));
    }
}