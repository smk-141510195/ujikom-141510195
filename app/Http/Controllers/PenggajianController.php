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
                /*$penggajian=Input::all();
         // dd($penggajian);
        $where=TunjanganPegawai::where('id',$penggajian['tunjangan_pegawai_id'])->first();
        // dd($where);
        $wherepenggajian=Penggajian::where('tunjangan_pegawai_id',$where->id)->first();
        // dd($wherepenggajian);
        $wheretunjangan=Tunjangan::where('id',$where->id_tunjangan)->first();
        // dd($where);
        $wherepegawai=Pegawai::where('id',$where->id_pegawai)->first();
        // dd($wherepegawai);
        $wherekategorilembur=KategoriLembur::where('jabatan_id',$wherepegawai->id_jabatan)->where('golongan_id',$wherepegawai->id_golongan)->first();
        // dd($wherekategorilembur);
         $wherelemburpegawai=LemburPegawai::where('pegawai_id',$wherepegawai->id)->get();
        $Jumlah_jam=0;
        foreach ($wherelemburpegawai as $jam) {
            $Jumlah_jam+=$jam->jumlah_jam;
        }
        // dd($Jumlah_jam);
        $wherejabatan=Jabatan::where('id',$wherepegawai->id_jabatan)->first();
        // dd($wherejabatan);
        $wheregolongan=Golongan::where('id',$wherepegawai->id_golongan)->first();
        // dd($wheregolongan);

        $penggajian=new Penggajian ;
        if (isset($wherepenggajian)) {
            $error=true ;
            $tunjangan=TunjanganPegawai::all();
            return view('penggajian.create',compact('tunjangan','error'));
        }
        elseif (!isset($wherelemburpegawai)) {
            $nol=0 ;
            $penggajian->jumlah_jam_lembur=$nol;
            $penggajian->jumlah_uang_lembur=$nol ;
            $penggajian->gaji_pokok=$wherejabatan->besar_uang+$wheregolongan->besar_uang;
            $penggajian->gaji_total=($wheretunjangan->besar_uang)+($wherejabatan->besar_uang+$wheregolongan->besar_uang)+($wheretunjangan->besar_tunjangan);
        $penggajian->id_tunjangan_pegawai=Input::get('tunjangan_pegawai_id');
        $penggajian->petugas_penerima=auth::user()->name ;
        $penggajian->save();
        }
        elseif (!isset($wherelemburpegawai)||!isset($wherekategorilembur)) {
            $nol=0 ;
            $penggajian->jumlah_jam_lembur=$nol;
            $penggajian->jumlah_uang_lembur=$nol ;
            $penggajian->gaji_pokok=$wherejabatan->besar_uang+$wheregolongan->besar_uang;
            $penggajian->gaji_total=($wheretunjangan->besar_uang)+($wherejabatan->besar_uang+$wheregolongan->besar_uang)+($wheretunjangan->besar_tunjangan);
        $penggajian->id_tunjangan_pegawai=Input::get('tunjangan_pegawai_id');
        $penggajian->petugas_penerima=auth::user()->name ;
        $penggajian->save();
        }
        else{
            $penggajian->jumlah_jam_lembur=$wherelemburpegawai->jumlah_jam;
            $penggajian->jumlah_uang_lembur=$Jumlah_jam*$wherekategorilembur->besar_uang;
            $penggajian->gaji_pokok=$wherejabatan->besar_uang+$wheregolongan->besar_uang;
            $penggajian->gaji_total=($wherelemburpegawai->jumlah_jam*$wherekategorilembur->besar_uang)+($wheretunjangan->besar_uang)+($wherejabatan->besar_uang+$wheregolongan->besar_uang)+($wheretunjangan->besar_tunjangan);
            $penggajian->tanggal_pengambilan =date('d-m-y');
            $penggajian->id_tunjangan_pegawai=Input::get('tunjangan_pegawai');
            $penggajian->petugas_penerima=auth::user()->name ;
            $penggajian->save();
            }*/
            return redirect('penggajian');
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
