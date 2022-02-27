<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Subkategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;



class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data1 = Kategori::all();
        return view('dashboard.main_dashboard.product', ['kategori' => $data1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules  = [
            'judul'     => 'required',
            'foto'      => 'required|image|mimes:jpeg,bmp,png',
            'foto2'     => 'required|image|mimes:jpeg,bmp,png',
            'foto3'     => 'required|image|mimes:jpeg,bmp,png',
            'file'      => 'required|mimes:pdf',
            'kategori'  => 'required',
            'keterangan' => 'required',
        ];

        $messages = [
            'judul.required'        => 'Nama Lengkap wajib diisi',
            'foto.required'         => 'Foto wajib diisi',
            'foto.image'            => 'Foto harus berjenis gambar',
            'foto.mimes'            => 'Foto harus berjenis jpeg, bmp dan png.',
            'foto2.required'        => 'Foto wajib diisi',
            'foto2.image'           => 'Foto harus berjenis gambar',
            'foto2.mimes'           => 'Foto harus berjenis jpeg, bmp dan png.',
            'foto3.required'        => 'Foto wajib diisi',
            'foto3.image'           => 'Foto harus berjenis gambar',
            'foto3.mimes'           => 'Foto harus berjenis jpeg, bmp dan png.',
            'kategori.required'     => 'Kategori wajib diisi',
            'keterangan.required'   => 'Keterangan wajib diisi'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $imageName = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('foto')->getClientOriginalName());
        $imageName2 = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('foto2')->getClientOriginalName());
        $imageName3 = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('foto3')->getClientOriginalName());
        $request->foto->move(public_path('img_products'), $imageName);
        $request->foto2->move(public_path('img_products'), $imageName2);
        $request->foto3->move(public_path('img_products'), $imageName3);

        $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('file')->getClientOriginalName());
        $request->file('file')->move(public_path('file_pdf'), $filename);

        $barang = new Barang();
        $barang->judul = $request->judul;
        $barang->slug = Str::slug($barang->judul, '-');
        $barang->kategori_id = $request->kategori;
        $barang->sub_kategori_id = $request->subkategori;
        $barang->foto = $imageName;
        $barang->foto2 = $imageName2;
        $barang->foto3 = $imageName3;
        $barang->file = $filename;
        $barang->keterangan = $request->keterangan;
        $barang->status = 'sembunyikan';
        $simpan = $barang->save();

        if ($simpan) {
            Session::flash('success', 'Product added successfully!');
            return redirect('list_products')->with('success', 'Product added successfully!');
        } else {
            Session::flash('errors', ['' => 'Error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // $id_kategori = $request->id_kategori;

        // $subkategori = Subkategori::where('kategori_id', $id_kategori)->get();
        // $option      = "<option selected disabled>Select Sub Category ...</option>";
        // foreach ($subkategori as $item) {
        //     $option .= "<option value='$item->id'>$item->name</option>";
        // }
        // echo $option;

        $barang = Barang::leftJoin('kategoris', 'kategoris.id', '=', 'barangs.kategori_id')
            ->leftJoin('subkategoris', 'subkategoris.id', '=', 'barangs.sub_kategori_id')
            ->orderBy('id', 'desc')
            ->get(['barangs.*', 'kategoris.name as kate_name', 'subkategoris.name as sub_name']);

        // $data = Kategori::all();
        return view('dashboard.main_dashboard.list_product', [
            'barang'    => $barang,
            // 'kategoris' => $data
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit_show(Request $request)
    {
        // $id_kategori = $request->id_kategori;

        // $subkategori = Subkategori::where('kategori_id', $id_kategori)->get();
        // $option      = "<option selected disabled>Select Sub Category ...</option>";
        // foreach ($subkategori as $item) {
        //     $option .= "<option value='$item->id'>$item->name</option>";
        // }
        // echo $option;

        $data = Kategori::all();
        $data2 = Subkategori::all();
        $edit = Barang::where('id', $request->id)->get();
        // dd($edit);
        return view('dashboard.main_dashboard.edit_product', [
            'barang'    => $edit,
            'kategori'  => $data,
            'sub'       => $data2
        ])->with('success', 'Update success!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $barangs = Barang::findOrFail($id);

        $barangs->judul             = $request->input('judul');
        $barangs->keterangan        = $request->input('keterangan');
        $barangs->kategori_id       = $request->input('kategori');
        $barangs->sub_kategori_id   = $request->input('subkategori');
        $barangs->slug              = Str::slug($barangs->judul, '-');

        // if ($request->hasfile('foto')) {


        //     $file = $request->file('foto');
        //     $extension = $request->foto->getClientOriginalExtension();  //Get Image Extension
        //     $fileName =  uniqid() . '.' . $extension;  //Concatenate both to get FileName (eg: file.jpg)

        //     $file->move(public_path() . '/img_products/', $fileName);
        //     File::delete(public_path('img_products/' . $barangs->foto));

        //     $data = $fileName;
        //     $barangs->update([
        //         'foto' => $data
        //     ]);
        // }

        // dd($barangs);
        $barangs->save($request->all());

        return redirect('list_products')->with('success', 'Product edit successfully!');
    }
    public function update_img1(Request $request, $id)
    {
        $barangs = Barang::findOrFail($id);
        if ($request->hasfile('foto')) {

            $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('foto')->getClientOriginalName());
            $request->file('foto')->move(public_path('img_products'), $filename);
            File::delete(public_path('img_products/' . $barangs->foto));

            $barangs->foto = $filename;
            $barangs->save($request->all());
        }
        return redirect()->back()->with('success', 'Product edit Image 1 successfully!');
    }
    public function update_img2(Request $request, $id)
    {
        $barangs = Barang::findOrFail($id);
        if ($request->hasfile('foto2')) {

            $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('foto2')->getClientOriginalName());
            $request->file('foto2')->move(public_path('img_products'), $filename);
            File::delete(public_path('img_products/' . $barangs->foto2));

            $barangs->foto2 = $filename;
            $barangs->save($request->all());
        }
        return redirect()->back()->with('success', 'Product edit Image 2 successfully!');
    }
    public function update_img3(Request $request, $id)
    {
        $barangs = Barang::findOrFail($id);
        if ($request->hasfile('foto3')) {

            $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('foto3')->getClientOriginalName());
            $request->file('foto3')->move(public_path('img_products'), $filename);
            File::delete(public_path('img_products/' . $barangs->foto3));

            $barangs->foto3 = $filename;
            $barangs->save($request->all());
        }
        return redirect()->back()->with('success', 'Product edit Image 3 successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $del = Barang::find($id);
            if ($del) {
                $file = public_path('img_products/' . $del->foto);
                $file2 = public_path('img_products/' . $del->foto2);
                $file3 = public_path('img_products/' . $del->foto3);

                if (File::exists($file)) {
                    File::delete($file, $file2, $file3);
                }

                $del->delete();
                return redirect('list_products')->with('success', 'Product deleted successfully');
            }
        } catch (\Throwable $th) {
            return redirect('list_products')->with('error', 'Barang cannot be deleted');
        }
    }

    public function detailbarang(Request $request)
    {
        $data = Barang::join('kategoris', 'kategoris.id', '=', 'barangs.kategori_id')
            ->join('subkategoris', 'subkategoris.id', '=', 'barangs.sub_kategori_id')
            ->where('barangs.id', '=', $request->id)
            ->get(['barangs.*', 'kategoris.name as kat_name', 'subkategoris.name as sub_name']);
        return view('dashboard.main_dashboard.show_detail', [
            'barang'     => $data
        ]);
    }

    public function update_top_product(Request $request)
    {
        if ($request->status == 'tampilkan') {
            DB::table('barangs')->where('id', $request->id)
                ->update([
                    'status' => 'sembunyikan',
                ]);
        } elseif ($request->status == 'sembunyikan') {
            DB::table('barangs')->where('id', $request->id)
                ->update([
                    'status' => 'tampilkan',
                ]);
        } else {
            return redirect()->back();
        }
        return redirect()->back();
    }
}
