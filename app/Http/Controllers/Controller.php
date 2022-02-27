<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Contact;
use App\Models\Kategori;
use App\Models\Subkategori;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dashboard()
    {
        $category       = Kategori::all()->count();
        $subcategory    = Subkategori::all()->count();
        $product        = Barang::all()->count();
        $product_top    = Barang::where('status', '=', 'tampilkan')->count();
        $pesan          = Contact::all()->count();
        return view('dashboard.main_dashboard.dashboard', [
            'kate'   => $category,
            'sub'    => $subcategory,
            'produk' => $product,
            'top'    => $product_top,
            'pesan'  => $pesan
        ]);
    }
}
