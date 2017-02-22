<?php

namespace App\Http\Controllers;

use Request;
use App\Tunjangan;
use App\Golongan;
use App\Jabatan;
use App\Http\Requests;
use Validator;
use Input;

class TunjanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tunjangan = Tunjangan::all();
        return view('tunjangan.index', compact('tunjangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan=Jabatan::all();
        $golongan=Golongan::all();
        return view('tunjangan.create',compact('jabatan','golongan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=['kode_tunjangan'=>'required|unique:tunjangans',
                'jabatan_id'=>'required',
                'golongan_id'=>'required',
                'status'=>'required',
                'jumlah_anak'=>'required',
                'besaran_uang'=>'required'];
        $message=['kode_tunjangan.required'=>'Kolom Jangan Sampai Kosong',
                'kode_tunjangan.unique'=>'Kode Yang Anda Masukan Sudah Ada',
                'jabatan_id.required'=>'Kolom Jangan Sampai Kosong',
                'golongan_id.required'=>'Kolom Jangan Sampai Kosong',
                'status.required'=>'Kolom Jangan Sampai Kosong',
                'jumlah_anak.required'=>'Kolom Jangan Sampai Kosong',
                'besaran_uang.required'=>'Kolom Jangan Sampai Kosong'];
      $validator=Validator::make(Input::all(),$rules,$message);

        if ($validator->fails())
         {
            # code...
            return redirect('/tunjangan/create')
            ->withErrors($validator)
            ->withInput();
        }
        else
        {
                $tunjangan=Request::all();
                Tunjangan::create($tunjangan);
                return redirect('tunjangan');
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
        $golongan=Golongan::all();
        $jabatan=Jabatan::all();
        $tunjangan=Tunjangan::find($id);
        return view('tunjangan.edit',compact('golongan','jabatan','tunjangan'));
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
        $tunjangan=Tunjangan::where('id',$id)->first();
        if($tunjangan['kode_tunjangan'] != Request('kode_tunjangan')){
            $roles=[
                'kode_tunjangan'=>'required|unique:tunjangans',
                'jabatan_id'=>'required',
                'golongan_id'=>'required',
                'status'=>'required',
                'jumlah_anak'=>'required',
                'besaran_uang'=>'required',
            ];
        }
        else{
            $roles=[
                'kode_tunjangan'=>'required',
                'jabatan_id'=>'required',
                'golongan_id'=>'required',
                'status'=>'required',
                'jumlah_anak'=>'required',
                'besaran_uang'=>'required',
            ];
        }
        $sms=[
                'kode_tunjangan.required'=>'jangan kosong',
                'kode_tunjangan.unique'=>'jangan sama',
                'jabatan_id.required'=>'jangan kosong',
                'golongan_id.required'=>'jangan kosong',
                'status.required'=>'jangan kosong',
                'jumlah_anak.required'=>'jangan kosong',
                'besaran_uang.required'=>'jangan kosong',
            ];
            $validasi= Validator::make(Input::all(),$roles,$sms);
            if($validasi->fails()){
                return redirect()->back()
                        ->WithErrors($validasi)
                        ->WithInput();
            }

            $update=Request::all();
            $tunjangan=Tunjangan::find($id);
            $tunjangan->update($update);
            return redirect('tunjangan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tunjangan=Tunjangan::find($id)->delete();
        return redirect('tunjangan');
    }
}
