<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use Input;
use App\Penggajian;
use App\TunjanganPegawai;
use App\Pegawai;
use App\Tunjangan;
use App\Golongan;
use App\Jabatan;
use App\KategoriLembur;
use App\LemburPegawai;


class PenggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penggajian=Penggajian::all();
        $pegawai=Pegawai::all();
        $lemburpegawai=LemburPegawai::all();
        $tunjanganpegawai=TunjanganPegawai::all();
        $tunjangan=Tunjangan::all();
        $golongan=Golongan::all();
        $jabatan=Jabatan::all();
        $kategorilembur=KategoriLembur::all();
        return view('penggajian.index',compact('penggajian','pegawai','lemburpegawai','tunjanganpegawai','tunjangan','golongan','jabatan','kategorilembur'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
