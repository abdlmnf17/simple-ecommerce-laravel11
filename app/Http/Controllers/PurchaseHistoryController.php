<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;

class PurchaseHistoryController extends Controller
{
    public function index()
    {
        // Cek jika user login
        if (Auth::check()) {
            $user = Auth::user();

            // Cek role pengguna
            if ($user->hasRole('admin')) {
                $sales = Sale::all(); // Ambil semua data untuk admin
            } else {
                $sales = Sale::where('user_id', $user->id)->get(); // Ambil data berdasarkan user_id
            }

            return view('purchase_history.index', compact('sales'));
        }

        return redirect()->route('login'); // Redirect ke halaman login jika tidak login
    }
}
