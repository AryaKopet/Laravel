<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{    
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $barangs = Barang::latest()->paginate(5);

        //render view with posts
        return view('barangs.index', compact('barangs'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        $kategori = Kategori::get(); 
        return view('barangs.create', compact('kategori'));
        
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
            'nama_barang'   => 'required',
            'jumlah'   => 'required',
            'keterangan'   => 'required',
            'harga_barang'   => 'required',
            'id_kategori'   => 'required'
        ]);

        //create post
        Barang::create([
            'nama_barang'   => $request->nama_barang,
            'jumlah'   => $request->jumlah,
            'keterangan'   => $request->keterangan,
            'harga_barang'   => $request->harga_barang,
            'id_kategori'   => $request->id_kategori,
        ]);

        //redirect to index
        return redirect()->route('barangs.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $barang = Barang::findOrFail($id);

        //render view with post
        return view('barangs.show', compact('barang'));
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
        $barang = Barang::findOrFail($id);

        //render view with post
        return view('barangs.edit', compact('barang'));
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
            'nama_barang'   => 'required',
            'jumlah'   => 'required',
            'keterangan'   => 'required',
            'harga_barang'   => 'required',
        ]);

        //get post by ID
        $barang = Barang::findOrFail($id);

            //update post with new image
            $barang->update([
                'nama_barang'   => $request->nama_barang,
                'jumlah'   => $request->jumlah,
                'keterangan'   => $request->keterangan,
                'harga_barang'   => $request->harga_barang,
            ]);
        //redirect to index
        return redirect()->route('barangs.index')->with(['success' => 'Data Berhasil Diubah!']);
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
        $barang = Barang::findOrFail($id);

        //delete post
        $barang->delete();

        //redirect to index
        return redirect()->route('barangs.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}