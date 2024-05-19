<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KaryawanModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

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
        $jabatan = DB::table('tbl_jabatan')
            ->select('nama_jabatan', 'kode_jabatan')
            ->get();

        return view("index", compact('data', 'jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = DB::table('tbl_jabatan')
            ->select('nama_jabatan')
            ->get();

        return view('create', compact('jabatan'));
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

        $jabatan_karyawan = DB::table('tbl_jabatan')
            ->select('tbl_jabatan.nama_jabatan')
            ->get();

        return view('edit', compact('data', 'jabatan_karyawan'));
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

    public function jabatan_karyawan(string $nama_jabatan)
    {
        $jabatanStrReplace = str_replace('_', ' ', $nama_jabatan);

        /*SELECT a.kode_karyawan, a.nama_karyawan, b.nama_jabatan AS jabatan_karyawan, b.kode_jabatan FROM tbl_karyawan AS a
         INNER JOIN tbl_jabatan AS b ON a.jabatan = b.nama_jabatan WHERE a.jabatan = ?; 
        */

        $jabatan_karyawan = DB::table('tbl_karyawan AS a')
            ->join('tbl_jabatan AS b', 'a.jabatan', '=', 'b.nama_jabatan')
            ->select('a.kode_karyawan', 'a.nama_karyawan', 'b.nama_jabatan AS jabatan_karyawan', 'b.kode_jabatan')
            ->where('a.jabatan', '=', $jabatanStrReplace)
            ->get();

        return view('jabatan_karyawan', compact('jabatan_karyawan'));
    }

    public function cetak_pdf()
    {
        $karyawan = KaryawanModel::all();

        $pdf = PDF::loadview('karyawan_pdf', ['karyawan' => $karyawan])->setPaper('a3', 'landscape');
        return $pdf->stream();
    }
}
