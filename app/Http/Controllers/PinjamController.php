<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjam;
use App\Models\Buku;
use App\Models\User;
use Auth;
use DB;


date_default_timezone_set('Asia/Jakarta');

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::where('status', 'Tersedia')->get();
        $user = User::all();
        $dns = Auth::user()->name;
        $pinjam = Pinjam::join('buku', 'pinjam.id', '=', 'buku.id')
                ->select('buku.nama_buku', 'pinjam.nama_pinjam', 'pinjam.nomor_hp', 'pinjam.status', 'pinjam.tanggal_pinjam', 'pinjam.tanggal_kembali', 'buku.gambar', 'pinjam.id')
                ->orderBy('tanggal_pinjam', 'asc')
                ->get();
        

        // $pinjam = DB::select("SELECT a.nama_buku, d.nama_pinjam, d.nomor_hp, d.status, d.tanggal_pinjam, d.tanggal_kembali, a.gambar, d.id FROM pinjam d JOIN buku a ON d.id = a.id JOIN users b ON d.id = b.id ORDER BY tanggal_pinjam ASC");

        return view('pinjam', compact('user','buku', 'pinjam'));
        
    }

    // public function detail($id)
    // {
    //     $dns = Auth::user()->name;
    //     $detail = Pinjam::join('buku', 'buku.id', '=', 'pinjam.id_buku')
    //             ->join('users', 'users.id', '=', 'pinjam.id_buku') 
    //             ->select('pinjam.status', 'pinjam.tanggal_pinjam', 'pinjam.tanggal_kembali', 'buku.nama_buku', 'buku.penerbit', 'buku.penulis', 'users.name')
    //             ->where('users.name', $dns)
    //             ->get();
    //     return view('detail', compact('detail', 'dns'));
    // }
    

    public function show()
    {
        $buku = Buku::all();

        return view('pinjam_user', compact('buku'));
    }
    public function store(Request $request)
    {
        $pinjam = Pinjam::create([
        'nama_pinjam'        => $request->nama_pinjam,
        'id_buku'            => $request->id_buku,
        'nomor_hp'           => $request->nomor_hp,
        'status'             => $request->status,
        'tanggal_pinjam'     => $request->tanggal_pinjam,
        'tanggal_kembali'    => $request->tanggal_kembali
        ]);

        return redirect('/pinjam')->with('success', 'Buku berhasil dipinjam!');
    }

    public function update(Request $request, $id)
    {
        $pinjam = Pinjam::findOrFail($id);

        $awal                    = $pinjam->gambar;
        $pinjam->nama_pinjam     = $request->nama_pinjam;
        $pinjam->nomor_hp        = $request->nomor_hp;
        $pinjam->status          = $request->status;
        $pinjam->save();

        return redirect('/pinjam')->with('success', 'Data Berhasil Di ubah');
    }

    
    public function destroy($id)
    {
        //
    }
}

    