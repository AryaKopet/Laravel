<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\Kategori;

use Illuminate\Http\Request;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class KategoriController extends Controller
{    
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $kategoris = Kategori::latest()->paginate(5);

        //render view with posts
        return view('kategoris.index', compact('kategoris'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('kategoris.create');
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
            'nama_kategori'   => 'required'
        ]);

        //create post
        Kategori::create([
            'nama_kategori'   => $request->nama_kategori
        ]);

        //redirect to index
        return redirect()->route('kategoris.index')->with(['success' => 'Kategori Berhasil Disimpan!']);
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
        $kategori = Kategori::findOrFail($id);

        //render view with post
        return view('kategoris.show', compact('kategori'));
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
        $kategori = Kategori::findOrFail($id);

        //render view with post
        return view('kategoris.edit', compact('kategori'));
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
            'nama_kategori'   => 'required'
        ]);

        //get post by ID
        $kategori = Kategori::findOrFail($id);

            //update post with new image
            $kategori->update([
                'nama_kategori'   => $request->nama_kategori
            ]);
        //redirect to index
        return redirect()->route('kategoris.index')->with(['success' => 'Kategori Berhasil Diubah!']);
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
        $kategori = Kategori::findOrFail($id);

        //delete post
        $kategori->delete();

        //redirect to index
        return redirect()->route('kategoris.index')->with(['success' => 'Kategori Berhasil Dihapus!']);
    }
}