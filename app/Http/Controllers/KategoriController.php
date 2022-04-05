<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Subkategori;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    public function index()
    {
        $data = Kategori::all();
        $data_sub = Subkategori::join('kategoris', 'kategoris.id', '=', 'subkategoris.kategori_id')
            ->get(['subkategoris.*', 'kategoris.name as kate_name']);

        return view('dashboard.main_dashboard.add_category', [
            'kategori'      => $data,
            'subkategori'   => $data_sub
        ]);
    }
    public function index2()
    {
        $data = Subkategori::join('kategoris', 'kategoris.id', '=', 'subkategoris.kategori_id')
            ->get(['subkategoris.*', 'kategoris.name as kate_name']);
        $data2 = Kategori::all();
        return view('dashboard.main_dashboard.add_sub_category', [
            'subkategori'  => $data,
            'kategori'     => $data2
        ]);
    }
    public function create(Request $request)
    {
        $rules  = [
            'name'  => 'unique:kategoris',
            'foto'  => 'required|mimes:jpg,jpeg,png,bmp'
        ];

        $messages = [
            'name.unique'   => 'Category is already!',
            'foto.mimes'    => 'Just format jpg,jpeg,png,bmp'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $imageName = 'category-' . $request->foto->getClientOriginalName();
        $request->foto->move(public_path('img_kategori'), $imageName);

        $category = new Kategori();
        $category->name = $request->name;
        $category->slug_kategori = Str::slug($category->name, '-');
        $category->foto = $imageName;
        $category->keterangan = $request->keterangan;
        $category->save();


        return redirect()->back()->with('success', 'Category added successfully!');
    }

    public function sub_create(Request $request)
    {
        $rules  = [
            'name'  => 'unique:subkategoris',
            'foto'  => 'mimes:jpg,jpeg,png,bmp'
        ];

        $messages = [
            'name.unique'   => 'Category is already!',
            'foto.mimes'    => 'Just format jpg,jpeg,png,bmp'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $imageName = 'subcategory-' . $request->foto->getClientOriginalName();
        $request->foto->move(public_path('img_subkategori'), $imageName);

        $subcategory = new Subkategori();

        $subcategory->name = $request->name;
        $subcategory->slug_sub = Str::slug($subcategory->name, '-');
        $subcategory->foto = $imageName;
        $subcategory->keterangan = $request->keterangan;
        $subcategory->kategori_id = $request->kategori;
        $simpan = $subcategory->save();

        if ($simpan) {
            Session::flash('success', 'Sub Category added successfully!');
            return redirect()->back()->with('success', 'Sub Category added successfully!');
        } else {
            Session::flash('errors', ['' => 'Error']);
        }
    }

    public function destroy_kategori($id)
    {
        try {
            $del = Kategori::find($id);
            if ($del) {
                $file = public_path('img_kategori/' . $del->foto);

                if (File::exists($file)) {
                    File::delete($file);
                }

                $del->delete();
                return redirect()->back()->with('success', 'Deleted successfully');

                // $del = Kategori::find($id);
                // $del->delete();
                // return redirect()->back()->with('success', 'Deleted successfully');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Category cannot be deleted, data is in use ');
        }
    }

    public function destroy_subkategori($id)
    {
        try {
            $del = Subkategori::find($id);
            if ($del) {
                $file = public_path('img_subkategori/' . $del->foto);

                if (File::exists($file)) {
                    File::delete($file);
                }

                $del->delete();
                return redirect()->back()->with('success', 'Deleted successfully');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Subcategory cannot be deleted, data is in use ');
        }
    }

    public function edit_kategori(Request $request, $id)
    {
        $updt_kate = Kategori::findOrFail($id);
        $updt_kate->name            = $request->input('name');
        $updt_kate->slug_kategori   = Str::slug($updt_kate->name, '-');
        if ($request->hasfile('foto')) {
            $file       = $request->file('foto');
            $extension  = $request->foto->getClientOriginalExtension();  //Get Image Extension
            $fileName   =  uniqid() . '.' . $extension;  //Concatenate both to get FileName (eg: file.jpg)

            $file->move(public_path() . '/img_kategori/', $fileName);
            File::delete(public_path('img_kategori/' . $updt_kate->foto));

            $data       = $fileName;
            $updt_kate->update(['foto' => $data]);
        }
        $updt_kate->keterangan      = $request->keterangan;
        $updt_kate->save($request->all());

        return redirect()->back()->with('success', 'Category edit successfully!');
    }

    public function update_category(Request $request, $id)
    {
        $barangs = Subkategori::findOrFail($id);
        $barangs->kategori_id  = $request->input('kategori');
        $barangs->save($request->all());

        return redirect('category')->with('success', 'Subcategory edit successfully!');
    }

    public function edit_subkategori(Request $request, $id)
    {
        $updt_sub = Subkategori::findOrFail($id);
        $updt_sub->name         = $request->input('name');
        $updt_sub->slug_sub     = Str::slug($updt_sub->name, '-');
        $updt_sub->kategori_id  = $request->input('kategori');
        if ($request->hasfile('foto')) {
            $file       = $request->file('foto');
            $extension  = $request->foto->getClientOriginalExtension();  //Get Image Extension
            $fileName   =  uniqid() . '.' . $extension;  //Concatenate both to get FileName (eg: file.jpg)

            $file->move(public_path() . '/img_subkategori/', $fileName);
            File::delete(public_path('img_subkategori/' . $updt_sub->foto));

            $data       = $fileName;
            $updt_sub->update(['foto' => $data]);
        }
        $updt_sub->keterangan      = $request->keterangan;
        $updt_sub->save($request->all());
        return redirect('category')->with('success', 'Subcategory edit successfully!');
    }

    public function getsubkategori(Request $request)
    {
        $id_kategori = $request->id_kategori;
        $subkategori = Subkategori::where('kategori_id', $id_kategori)->get();
        $option      = "<option>Select Sub Category ...</option>";
        foreach ($subkategori as $item) {
            $option .= "<option value='$item->id' >$item->name</option>";
        }
        echo $option;
    }
}
