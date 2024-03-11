<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\Pengguna;
use Illuminate\Http\Request;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

class PenggunaController extends Controller
{    
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $penggunas = Pengguna::latest()->paginate(5);

        //render view with posts
        return view('penggunas.index', compact('penggunas'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        $pengguna = Pengguna::get(); 
        return view('penggunas.create', compact('pengguna'));
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
        'nama_lengkap' => 'required',
        'alamat' => 'required',
        'jenis_kelamin' => 'required',
        'username' => 'required',
        'password' => 'required',
        ]);
         //create post
        Pengguna::create([
            'nama_lengkap'   => $request->nama_lengkap,
            'alamat'   => $request->alamat,
            'jenis_kelamin'   => $request->jenis_kelamin,
            'username'   => $request->username,
            'password'   => $request->password,
        ]);

        //redirect to index
        return redirect()->route('penggunas.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $pengguna = Pengguna::findOrFail($id);

        //render view with post
        return view('penggunas.show', compact('pengguna'));
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
        $pengguna = Pengguna::findOrFail($id);

        //render view with post
        return view('penggunas.edit', compact('pengguna'));
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
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        //get post by ID
        $pengguna = Pengguna::findOrFail($id);

            //update post 
            $pengguna->update([
                'nama_lengkap'   => $request->nama_lengkap,
                'alamat'   => $request->alamat,
                'jenis_kelamin'   => $request->jenis_kelamin,
                'username'   => $request->username,
                'password'   => $request->password,
            ]);
        //redirect to index
        return redirect()->route('penggunas.index')->with(['success' => 'Data Berhasil Diubah!']);
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
        $pengguna = Pengguna::findOrFail($id);

        //delete post
        $pengguna->delete();

        //redirect to index
        return redirect()->route('penggunas.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}