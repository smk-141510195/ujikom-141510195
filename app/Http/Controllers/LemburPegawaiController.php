<?php

namespace App\Http\Controllers;

use Request;
use App\KategoriLembur;
use App\Pegawai;
use App\LemburPegawai;
use App\Http\Requests;
use Validator;
use Input;

class LemburPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lemburpegawai = LemburPegawai::all();
        return view('lemburpegawai.index', compact('lemburpegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai=Pegawai::all();
        $kategorilembur=KategoriLembur::all();
        return view('lemburpegawai.create',compact('pegawai','kategorilembur'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=['kode_lembur_id'=>'required|unique:lembur_pegawais',
                'pegawai_id'=>'required',
                'jumlah_jam'=>'required'];
        $message=['kode_lembur_id.required'=>'Kolom Jangan Sampai Kosong',
                'kode_lembur_id.unique'=>'Kode Yang Anda Masukan Sudah Ada',
                'pegawai_id.required'=>'Kolom Jangan Sampai Kosong',
                'jumlah_jam.required'=>'Kolom Jangan Sampai Kosong'];
      $validator=Validator::make(Input::all(),$rules,$message);

        if ($validator->fails())
         {
            # code...
            return redirect('/lemburpegawai/create')
            ->withErrors($validator)
            ->withInput();
        }
        else
        {
                $lemburpegawai=Request::all();
                LemburPegawai::create($lemburpegawai);
                return redirect('lemburpegawai');
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
        $pegawai=Pegawai::all();
        $kategorilembur=KategoriLembur::all();
        $lemburpegawai=LemburPegawai::find($id);
        return view('lemburpegawai.edit',compact('pegawai','kategorilembur','lemburpegawai'));
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
        $lemburpegawai=LemburPegawai::where('id',$id)->first();
        if($lemburpegawai['kode_lembur_id'] != Request('kode_lembur_id')){
            $roles=[
            'kode_lembur_id'=>'required',
            'pegawai_id'=>'required',
            'jumlah_jam'=>'required',
        ];
        }
        else{
            $roles=[
            'kode_lembur_id'=>'required|unique:lembur_pegawais',
            'pegawai_id'=>'required',
            'jumlah_jam'=>'required',
        ];
        }
        $sms=[
            'kode_lembur_id.required'=>'Jangan kosong',
            'kode_lembur_id.unique'=>'Jangan sama',
            'pegawai_id.required'=>'Jangan kosong',
            'jumlah_jam.required'=>'Jangan kosong',
        ];
        $validasi=Validator::make(Input::all(),$roles,$sms);
        if($validasi->fails()){
            return redirect()->back()
                    ->WithErrors($validasi)
                    ->WithInput();
        }
        $update=Request::all();
        $lemburpegawai=LemburPegawai::find($id);
        $lemburpegawai->update($update);
        return redirect('lemburpegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lemburpegawai=LemburPegawai::find($id)->delete();
        return redirect('lemburpegawai');
    }
}
