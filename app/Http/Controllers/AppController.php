<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KaryawanModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class AppController extends Controller
{
    private function validateInput(Request $request, array $rules)
    {
        $validator = Validator::make($request->all(), $rules, $messages = [
            'required' => ':attribute tidak boleh kosong.',
            'email.unique' => ':attribute sudah ada yang memiliki.',
            'email.email' => ':attribute yang di masukkan tidak valid.',
            'nomor_telepon.numeric' => ':attribute harus berupa angka.',
            'gaji_pokok.numeric' => ':attribute harus berupa angka.',
            'nomor_telepon.max_digits' => ':attribute tidak boleh lebih dari 13 digit.',
            'kode_pos.max_digits' => ':attribute tidak boleh lebih dari 5 digit.'
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = KaryawanModel::all();
        return view("index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $this->validateInput($request, [
            'nama_karyawan' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required|max_digits:5',
            'nomor_telepon' => 'required|numeric|max_digits:13',
            'email' => 'required|email|unique:tbl_karyawan',
            'jabatan' => 'required',
            'gaji_pokok' => 'required|numeric',
            'tanggal_masuk' => 'required'
        ]);

        if ($validateData->fails()) {
            return $this->handleValidationFailure('/app' . '/' . 'create', $validateData);
        } else {

            $inputData = $request->only([
                'nama_karyawan',
                'alamat',
                'kota',
                'provinsi',
                'kode_pos',
                'nomor_telepon',
                'email',
                'jabatan',
                'gaji_pokok',
                'tanggal_masuk'
            ]);

            $dataKaryawan = new KaryawanModel($inputData);

            if ($dataKaryawan->save()) {
                $this->setSessionFlash('success', 'Proses menyimpan data karyawan telah berhasil.');
                return redirect('/app');
            } else {
                $this->setSessionFlash('error', 'Proses menyimpan data karyawan telah gagal.');
                return redirect('/app/create');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = KaryawanModel::find($id);
        return view('show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = KaryawanModel::find($id);
        return view('edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $this->validateInput($request, [
            'nama_karyawan' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required|max_digits:5',
            'nomor_telepon' => 'required|numeric|max_digits:13',
            'email' => 'required|email',
            'jabatan' => 'required',
            'gaji_pokok' => 'required|numeric',
            'tanggal_masuk' => 'required'
        ]);

        if ($validateData->fails()) {
            return $this->handleValidationFailure('/app' . '/' . $id . '/edit', $validateData);
        } else {

            $updateDataKaryawan = KaryawanModel::find($id);
            $updateDataKaryawan->fill($request->only([
                'nama_karyawan',
                'alamat',
                'kota',
                'provinsi',
                'kode_pos',
                'nomor_telepon',
                'email',
                'jabatan',
                'gaji_pokok',
                'tanggal_masuk'
            ]));

            if ($updateDataKaryawan->save()) {
                $this->setSessionFlash('success', 'Proses update data karyawan telah berhasil.');
                return redirect('/app');
            } else {
                $this->setSessionFlash('error', 'Proses update data karyawan telah gagal.');
                return redirect('/app' . '/' . $id . '/edit');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idKaryawan = KaryawanModel::find($id);

        if ($idKaryawan->delete()) {
            $this->setSessionFlash('success', 'Data karyawan berhasil di hapus.');
            return redirect('/app');
        } else {
            $this->setSessionFlash('error', 'Data karyawan gagal di hapus.');
            return redirect('/app');
        }
    }
}
