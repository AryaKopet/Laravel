<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Keranjang;
use Illuminate\Http\Request;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

class KeranjangController extends Controller
{    
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $keranjangs = Keranjang::latest()->paginate(5);

        //render view with posts
        return view('keranjangs.index', compact('keranjangs'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        $keranjang = Keranjang::get(); 
        return view('keranjangs.create', compact('keranjang'));
    }

 
    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'id_pengguna'   => 'required',
            'id_barang'   => 'required',
            'qty'   => 'required',
        ]);

        //create post
        keranjang::create([
            'id_pengguna'   => $request->id_pengguna,
            'id_barang'   => $request->id_barang,
            'qty'   => $request->qty,
        ]);

        //redirect to index
        return redirect()->route('keranjangs.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get post by ID
        $keranjang = Keranjang::findOrFail($id);

        //render view with post
        return view('keranjangs.show', compact('keranjang'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get post by ID
        $keranjang = Keranjang::findOrFail($id);

        //render view with post
        return view('keranjangs.edit', compact('keranjang'));
    }

        
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'id_barang'   => 'required',
            'qty'   => 'required',
        ]);

        //get post by ID
        $keranjang = Keranjang::findOrFail($id);

            //update post with new image
            $keranjang->update([
            'id_barang'   => $request->id_barang,
            'qty'   => $request->qty,
            ]);
        //redirect to index
        return redirect()->route('keranjangs.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $keranjang = Keranjang::findOrFail($id);

        //delete post
        $keranjang->delete();

        //redirect to index
        return redirect()->route('keranjangs.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}