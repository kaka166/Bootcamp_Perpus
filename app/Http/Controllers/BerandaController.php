<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\User;
use Auth;

class BerandaController extends Controller
{
    public function index()
    {
        $buku_tersedia = Buku::where('status', 'Tersedia')->count();
        $buku_tidak_tersedia = Buku::where('status', 'Tidak Tersedia')->count();
        $jumlah_user = User::where('level', 'user')->count();
        $data = Buku::all();
        $user = Auth::user();
        return view('dashboard', compact('data','user', 'buku_tersedia', 'buku_tidak_tersedia', 'jumlah_user'));
    }

    public function detail()
    {
        $pinjam = Pinjam::all();
        return view('/{id}/detail', compact('pinjam'));
    }

    
}
