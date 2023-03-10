<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Auth;

date_default_timezone_set('Asia/Jakarta');

class BukuController extends Controller
{
    
    public function index()
    {
        $buku = Buku::all();
        $dns = Auth::user()->id;
        $user = Auth::user();
        return view('buku', compact('buku','dns','user'));
    }
   
    public function store(Request $request)
    {
        $buku = Buku::create([
        'nama_buku'        => $request->nama_buku,
        'penerbit'         => $request->penerbit,
        'penulis'          => $request->penulis,
        'tahun_terbit'     => $request->tahun_terbit,
        'status'           => $request->status,
        'gambar'           => $request->file('gambar')->getClientOriginalName(),
        ]);

            $request->file('gambar')->move('fotobuku/', $request->file('gambar')->getClientOriginalName());
            $buku->gambar = $request->file('gambar')->getClientOriginalName();
            $buku->save();
        

        return redirect('/buku');
    }

    
    
    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        $awal                = $buku->gambar;
        $buku->nama_buku     = $request->nama_buku;
        $buku->penerbit      = $request->penerbit;
        $buku->penulis       = $request->penulis;
        $buku->status        = $request->status;
        $buku->tahun_terbit  = $request->tahun_terbit;
        if($request->hasFile('gambar')) {
            $buku->gambar = $awal;
            $request->file('gambar')->move('fotobuku/', $awal);
        } else {
            $buku->gambar = $awal;
        }

        $buku->save();

        return redirect('/buku')->with('success', 'Data Berhasil Di ubah');
    }

    
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $file = public_path('fotobuku/').$buku->gambar;
        if(file_exists($file)){
            @unlink($file);
        }
        $buku->delete();

        return redirect('/buku')->with('success', 'Data Berhasil Di hapus');
    }
}

