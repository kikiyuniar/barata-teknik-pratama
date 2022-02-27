<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Business;
use App\Models\Front;
use App\Models\service;
use Illuminate\Support\Str;
use App\Models\vision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data   = About::all();
        $data2  = Business::all();
        $data3  = service::all();
        $data4  = vision::all();
        $data5  = Front::all();
        return view('dashboard.main_dashboard.about', [
            'about'     => $data,
            'business'  => $data2,
            'service'   => $data3,
            'vision'    => $data4,
            'home'      => $data5
        ]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        $data = About::where('id', $about->id);
        return view('dashboard.main_dashboard.about', ['about' => $data]);
    }

    public function edit_business(Request $request)
    {
        $data = Business::where('id', $request->id);
        return view('dashboard.main_dashboard.about', ['business' => $data]);
    }

    public function edit_service(Request $request)
    {
        $data = service::where('id', $request->id);
        return view('dashboard.main_dashboard.about', ['service' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $about = About::findOrFail($id);
        $about->judul = $request->input('judul');
        $about->keterangan = $request->input('keterangan');

        if ($request->hasfile('foto')) {
            $file = $request->file('foto');

            $extension = $request->foto->getClientOriginalExtension();  //Get Image Extension
            $fileName =  uniqid() . '.' . $extension;  //Concatenate both to get FileName (eg: file.jpg)

            $file->move(public_path() . '/img_about/', $fileName);
            File::delete(public_path('img_about/' . $about->foto));

            $data = $fileName;
            $about->update(['foto' => $data]);
        }
        $about->save($request->all());
        return redirect()->back()->with('success', 'About successfully!');
    }

    public function update_business(Request $request, $id)
    {
        $about = Business::findOrFail($id);
        $about->judul = $request->input('judul');
        $about->keterangan = $request->input('keterangan');

        if ($request->hasfile('foto')) {
            $file = $request->file('foto');
            $extension = $request->foto->getClientOriginalExtension();  //Get Image Extension
            $fileName =  uniqid() . '.' . $extension;  //Concatenate both to get FileName (eg: file.jpg)

            $file->move(public_path() . '/img_business/', $fileName);
            File::delete(public_path('img_business/' . $about->foto));
            $about->foto = $fileName;
            $about->update(['foto' => $fileName]);
        }
        $about->save($request->all());
        return redirect()->back()->with('success', 'Business successfully!');
    }

    public function update_service(Request $request, $id)
    {
        $about = service::findOrFail($id);
        $about->keterangan = $request->input('keterangan');
        $about->update($request->all());
        return redirect()->back()->with('success', 'Service successfully!');
    }

    public function update_vision(Request $request, $id)
    {
        $about = vision::findOrFail($id);
        $about->judul = $request->input('judul');
        $about->keterangan = $request->input('keterangan');
        $about->update($request->all());
        return redirect()->back()->with('success', 'Vision successfully!');
    }
    public function update_home(Request $request, $id)
    {
        $about = Front::findOrFail($id);
        $about->keterangan = $request->input('keterangan');
        $about->update($request->all());
        return redirect()->back()->with('success', 'Home successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
