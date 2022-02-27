<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Barang;
use App\Models\Business;
use App\Models\Contact;
use App\Models\Front;
use App\Models\Kategori;
use App\Models\service;
use App\Models\Slide;
use App\Models\Subkategori;
use App\Models\vision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $sub        = Subkategori::all();
        $katalog    = DB::table('kategoris')->paginate(6);
        return view('front.content.katalog', [
            'data' => $katalog,
            'sub'   => $sub
        ]);
    }

    public function index_products(Request $request)
    {
        $kategori   = Kategori::all();
        // $produk     = DB::table('barangs')->paginate(6);
        $data = Barang::leftJoin('kategoris', 'kategoris.id', '=', 'barangs.kategori_id')
            ->leftJoin('subkategoris', 'subkategoris.id', '=', 'barangs.sub_kategori_id')
            ->orderBy('barangs.created_at', 'desc')
            ->paginate(6, array('barangs.*', 'kategoris.name as kat_name', 'subkategoris.name as sub_name'));
        // ->get(['barangs.*', 'kategoris.name as kat_name', 'subkategoris.name as sub_name']);
        // ->get();

        return view('front.content.products', [
            'data' => $data,
            'kate' => $kategori
        ]);
    }

    public function cari_product(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
        $kategori = Kategori::all();
        // mengambil data dari table pegawai sesuai pencarian data
        $katalog = DB::table('barangs')
            ->leftJoin('kategoris', 'kategoris.id', '=', 'barangs.kategori_id')
            ->leftJoin('subkategoris', 'subkategoris.id', '=', 'barangs.sub_kategori_id')
            ->orderBy('barangs.created_at', 'desc')
            ->where('judul', 'like', "%" . $cari . "%")
            ->paginate('1000', array('barangs.*', 'kategoris.name as kat_name', 'subkategoris.name as sub_name'));

        // mengirim data katalog ke view index
        return view('front.content.products', [
            'data'  => $katalog,
            'kate'  => $kategori
        ]);
    }

    public function cari_kategori(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $katalog = DB::table('kategoris')
            ->where('name', 'like', "%" . $cari . "%")
            ->paginate();

        // mengirim data katalog ke view index
        return view('front.content.katalog', ['data' => $katalog]);
    }

    public function show_kategori(Request $request)
    {
        $kate = Kategori::all();
        $data_sub = Barang::leftJoin('kategoris', 'kategoris.id', '=', 'barangs.kategori_id')
            ->leftJoin('subkategoris', 'subkategoris.id', '=', 'barangs.sub_kategori_id')
            ->where('kategoris.slug_kategori', '=', $request->slug_kategori)->orderBy('barangs.id', 'desc')
            ->get(['barangs.*', 'kategoris.name as kat_name', 'subkategoris.name as sub_name']);


        $slect_sub = Subkategori::leftJoin('kategoris', 'kategoris.id', '=', 'subkategoris.kategori_id')
            ->where('kategoris.slug_kategori', '=', $request->slug_kategori)
            ->get(['subkategoris.*']);

        $head_data_sub = Subkategori::leftJoin('kategoris', 'kategoris.id', '=', 'subkategoris.kategori_id')
            ->where('kategoris.slug_kategori', '=', $request->slug_kategori)->limit(1)
            ->get(['subkategoris.*', 'kategoris.name as kat_name']);

        $data = Barang::leftJoin('kategoris', 'kategoris.id', '=', 'barangs.kategori_id')
            ->leftJoin('subkategoris', 'subkategoris.id', '=', 'barangs.sub_kategori_id')
            ->where('kategoris.slug_kategori', '=', $request->slug_kategori)
            ->paginate(5, array('barangs.*', 'kategoris.name as kat_name', 'subkategoris.name as sub_name'));
        return view('front.content.kategori', [
            'barang' => $data,
            'sub'    => $data_sub,
            'head'   => $head_data_sub,
            'slect'  => $slect_sub,
            'kate'   => $kate
        ]);
    }

    public function subshow(Request $request)
    {
        $head_data_sub = Subkategori::leftJoin('kategoris', 'kategoris.id', '=', 'subkategoris.kategori_id')
            ->where('subkategoris.slug_sub', '=', $request->slug_sub)->limit(1)
            ->get(['subkategoris.*']);

        $data = Barang::leftJoin('kategoris', 'kategoris.id', '=', 'barangs.kategori_id')
            ->leftJoin('subkategoris', 'subkategoris.id', '=', 'barangs.sub_kategori_id')
            ->where('subkategoris.slug_sub', '=', $request->slug_sub)
            ->get(['barangs.*', 'kategoris.name as kat_name', 'subkategoris.name as sub_name']);
        return view('front.content.subkategori', [
            'barang' => $data,
            'head'   => $head_data_sub
        ]);
    }

    public function showbarang(Request $request)
    {
        $data = Barang::leftJoin('kategoris', 'kategoris.id', '=', 'barangs.kategori_id')
            ->leftJoin('subkategoris', 'subkategoris.id', '=', 'barangs.sub_kategori_id')
            ->where('barangs.slug', '=', $request->slug)
            ->get(['barangs.*', 'kategoris.name as kat_name', 'subkategoris.name as sub_name']);
        return view('front.content.detail', [
            'barang'     => $data
        ]);
    }

    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Front Page +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    public function show_contact()
    {
        $data = Contact::orderBy('id', 'desc')->get();
        return view('dashboard.main_dashboard.contact', [
            'contact' => $data
        ]);
    }

    public function del_contact($id)
    {
        $del = Contact::find($id);
        $del->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }

    public function action_send(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subjek = $request->subject;
        $contact->pesan = $request->message;
        $simpan = $contact->save();

        if ($simpan) {
            return redirect()->back()->with('success', 'Successful message sent!');
        } else {
            return redirect()->back()->with('errors', 'Message failed to send!');
        }
    }

    public function show_index()
    {
        $top = Barang::where('status', 'tampilkan')
            ->get();
        $data_top = Barang::leftJoin('kategoris', 'kategoris.id', '=', 'barangs.kategori_id')
            ->where('barangs.status', '=', 'tampilkan')
            ->get(['barangs.*', 'kategoris.name as kat_name']);
        $show = Slide::all();
        $data = Kategori::all();
        $data2 = Front::all();
        return view('front.content.index', [
            'top'   => $data_top,
            'slide' => $show,
            'home' => $data2,
            'kate'  => $data
        ]);
    }

    public function show_about()
    {
        $about = About::all();
        $ourbusiness = Business::all();
        $services = service::all();
        $vision = vision::all();

        return view('front.content.about', [
            'about'         => $about,
            'ourbusiness'   => $ourbusiness,
            'services'      => $services,
            'vision'        => $vision
        ]);
    }

    public function contact()
    {
        return view('front.content.contact_us');
    }
}
