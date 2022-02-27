<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Facade\FlareClient\View;

class LoginController extends Controller
{

    public function showFormLogin()
    {
        if (Auth::check()) {
            return redirect('dashboard');
        }
        return view('dashboard.auth.login');
    }

    public function login(Request $request)
    {
        $view_username = DB::table('users')->where('email', $request->email)->get();
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            foreach ($view_username as $username) {
                session(['login_name' => $username->name]);
            }
            return redirect('dashboard');
        }
        return redirect()->back()->with('danger', 'Email/Password Salah ');
    }

    public function showFormRegister()
    {
        return view('dashboard.auth.register');
    }

    public function register(Request $request)
    {
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed'
        ];

        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $user = new User;
        $user->name = ucwords(strtolower($request->name));
        $user->foto = 'profile.jpg';
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->email_verified_at = \Carbon\Carbon::now();
        $simpan = $user->save();

        if ($simpan) {
            return redirect('profile')->with('success', 'Task Created Successfully!');
        } else {
            return redirect('profile')->with('error', 'Register failed! Please repeat again!');
        }
    }

    public function view_profile()
    {
        $data = User::all();
        return view('dashboard.main_dashboard.profile', [
            'user' => $data
        ]);
    }

    public function edit_profile(Request $request, $id)
    {
        $cek_password = $request->password;
        $profile = User::findOrFail($id);

        if ($cek_password == null) {
            try {
                $file       = $request->file('foto');
                $extension  = $request->foto->getClientOriginalExtension();  //Get Image Extension
                $fileName   =  uniqid() . '.' . $extension;  //Concatenate both to get FileName (eg: file.jpg)

                $file->move(public_path() . '/img_profile/', $fileName);
                File::delete(public_path('img_profile/' . $profile->foto));

                $profile->foto = $fileName;
                $profile->name = $request->input('name');
                $profile->email = $request->input('email');
                $profile->save($request->all());
                return redirect()->back()->with('success', 'Edit profile success');
            } catch (\Throwable $th) {
                $profile->name = $request->input('name');
                $profile->email = $request->input('email');
                $profile->save($request->all());
                return redirect()->back()->with('success', 'Edit profile success');
            }
        } else {
            User::find($id)->update([
                'password' => bcrypt($request->password),
            ]);
            return redirect()->back()->with('success', 'Edit password success, please login again!');
        }
    }

    public function destroy($id)
    {
        $del = User::find($id);
        if ($del) {
            $file = public_path('img_profile/' . $del->foto);

            if (File::exists($file)) {
                File::delete($file);
            }

            $del->delete();
            return redirect()->back()->with('success', 'Deleted successfully');
        }
    }

    public function del($id)
    {
        $del = User::find($id);
        if ($del) {
            $file = public_path('img_profile/' . $del->foto);

            if (File::exists($file)) {
                File::delete($file);
            }

            $del->delete();
            return redirect()->back()->with('success', 'Deleted successfully');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
