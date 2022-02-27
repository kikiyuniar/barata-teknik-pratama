<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SlideController extends Controller
{
    public function index_dashboard()
    {
        $show = Slide::all();
        return view('dashboard.main_dashboard.list_slide', ['slide' => $show]);
    }
    public function show_add()
    {
        return view('dashboard.main_dashboard.slide');
    }

    public function store_slides(Request $request)
    {
        $rules  = [
            'judul'     => 'required',
            'foto'      => 'required|image|max:2048|mimes:jpeg,bmp,png',
            'keterangan' => 'required',
        ];

        $messages = [
            'judul.required'        => 'Nama Lengkap wajib diisi',
            'foto.required'         => 'Foto wajib diisi',
            'foto.image'            => 'Foto harus berjenis gambar',
            'foto.mimes'            => 'Foto harus berjenis jpeg, bmp dan png.',
            'foto.max'              => 'Ukuran Foto Maksimal 2MB',
            'keterangan.required'   => 'Keterangan wajib diisi'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $imageName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('img_slide'), $imageName);

        $slides = new Slide();
        $slides->judul = $request->judul;
        $slides->foto = $imageName;
        $slides->keterangan = $request->keterangan;
        $simpan = $slides->save();

        if ($simpan) {
            Session::flash('success', 'Product added successfully!');
            return redirect('slide')->with('success', 'Product added successfully!');
        } else {
            return redirect('slide')->with('error', 'Product added fail!');
        }
    }

    public function del_slides($id)
    {
        $del = Slide::find($id);
        if ($del) {
            $file = public_path('img_slide/' . $del->foto);

            if (File::exists($file)) {
                File::delete($file);
            }

            $del->delete();
            return redirect()->back()->with('success', 'Deleted successfully');
        }
    }

    public function show_edit_slides(Request $request)
    {
        $data = Slide::where('id', '=', $request->id)->get();
        return view('dashboard.main_dashboard.edit_slide', ['slide' => $data]);
    }

    // public function action_update(Request $request)
    // {
    //     $updt_kate = Slide::where('id', $request->id);
    //     $updt_kate->judul            = $request->input('judul');
    //     if ($request->hasfile('foto')) {
    //         $file       = $request->file('foto');
    //         $extension  = $request->foto->getClientOriginalExtension();  //Get Image Extension
    //         $fileName   =  uniqid() . '.' . $extension;  //Concatenate both to get FileName (eg: file.jpg)

    //         $file->move(public_path() . '/img_slide/', $fileName);
    //         File::delete(public_path('img_/' . $updt_kate->foto));

    //         $data       = $fileName;
    //         $updt_kate->update(['foto' => $data]);
    //     }
    //     $updt_kate->keterangan      = $request->input('keterangan');
    //     $updt_kate->save($request->all());

    //     return redirect()->back()->with('success', 'Category edit successfully!');
    // }

    public function action_update(Request $request, $id)
    {
        $updt_kate = Slide::findOrFail($id);
        $updt_kate->judul            = $request->input('judul');
        if ($request->hasfile('foto')) {
            $file       = $request->file('foto');
            $extension  = $request->foto->getClientOriginalExtension();  //Get Image Extension
            $fileName   =  uniqid() . '.' . $extension;  //Concatenate both to get FileName (eg: file.jpg)

            $file->move(public_path() . '/img_slide/', $fileName);
            File::delete(public_path('img_slide/' . $updt_kate->foto));

            $data       = $fileName;
            $updt_kate->update(['foto' => $data]);
        }
        $updt_kate->keterangan      = $request->keterangan;
        $updt_kate->save($request->all());

        return redirect('slide')->with('success', 'Slide edit successfully!');
    }
}
