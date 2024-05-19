<?php

namespace App\Http\Controllers;

use App\Models\AuthModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    private function validateInput(Request $request, array $rules)
    {
        $validator = Validator::make($request->all(), $rules, $messages = [
            'required' => ':attribute tidak boleh kosong.',
            'email.unique' => ':attribute sudah ada yang memiliki.',
            'email.email' => ':attribute yang di masukkan tidak valid.'
        ]);

        return $validator;
    }

    private function handleValidationFailure($urlRedirect, $validateData)
    {
        return redirect($urlRedirect)
            ->withErrors($validateData)
            ->withInput();
    }

    private function setSessionFlash($detectMessage, $message)
    {
        Session::flash($detectMessage, $message);
    }

    public function index()
    {
        return view('auth.login');
    }

    public function proses_login(Request $request)
    {

        $validateData = $this->validateInput($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $remember = $request->has('remember') ? true : false;

        if ($validateData->fails()) {
            return $this->handleValidationFailure('/login', $validateData);
        } else if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ], $remember)) {
            $request->session()->regenerate();
            $this->setSessionFlash('welcome', 'Selamat datang di kelompok 3.');
            return redirect()->intended('/app');
        } else {
            $this->setSessionFlash('error', 'Proses login gagal. Pastikan dengan memasukkan identitas dengan benar.');
            return $this->handleValidationFailure('/login', $validateData);
        }
    }

    public function pendaftaran()
    {
        return view('auth.pendaftaran');
    }

    public function proses_pendaftaran(Request $request)
    {
        $validateData = $this->validateInput($request, [
            'email' => 'required|email|unique:tbl_auth',
            'password' => 'required',
            'konfirmasi_password' => 'required'
        ]);

        if ($validateData->fails()) {
            return $this->handleValidationFailure('/pendaftaran', $validateData);
        } else if ($request->input('password') != $request->input('konfirmasi_password')) {
            $this->setSessionFlash('error', 'Mohon maaf konfirmasi password tidak sesuai. Silakan coba lagi.');
            return redirect('/pendaftaran')->withInput();
        } else {

            $data = [
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password'))
            ];

            $pendaftaran = new AuthModel();
            $pendaftaran->email = $data['email'];
            $pendaftaran->password = $data['password'];

            if ($pendaftaran->save()) {
                $this->setSessionFlash('success', 'Selamat proses mendaftar berhasil di lakukan. Silakan login terlebih dahulu.');
                return redirect('/login')->withInput();
            } else {
                $this->setSessionFlash('error', 'Mohon maaf terjadi kesalahan saat proses pendaftaran. Silakan coba lagi.');
                return redirect('/pendaftaran');
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        Session::flash('logout', 'Kamu telah berhasil logout.');

        return redirect('/login');
    }
}
