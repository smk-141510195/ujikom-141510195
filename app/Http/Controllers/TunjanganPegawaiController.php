<?php

namespace App\Http\Controllers;


use Request;
use App\TunjanganPegawai;
use App\Tunjangan;
use App\Pegawai;
use App\Http\Requests;
use Validator;
use Input;

class TunjanganPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tunjanganpegawai = TunjanganPegawai::all();
        return view('tunjanganpegawai.index', compact('tunjanganpegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tunjangan=Tunjangan::all();
        $pegawai=Pegawai::all();
        return view('tunjanganpegawai.create',compact('tunjangan','pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=['kode_tunjangan_id'=>'required|unique:tunjangan_pegawais',
                'pegawai_id'=>'required'];
        $message=['kode_tunjangan_id.required'=>'Kolom Jangan Sampai Kosong',
                'kode_tunjangan_id.unique'=>'Kode Yang Anda Masukan Sudah Ada',
                'pegawai_id.required'=>'Kolom Jangan Sampai Kosong'];
      $validator=Validator::make(Input::all(),$rules,$message);

        if ($validator->fails())
         {
            # code...
            return redirect('/tunjanganpegawai/create')
            ->withErrors($validator)
            ->withInput();
        }
        else
        {
                $tunjanganpegawai=Request::all();
                TunjanganPegawai::create($tunjanganpegawai);
                return redirect('tunjanganpegawai');
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
        $tunjanganpegawai=TunjanganPegawai::find($id);
        $tunjangan=Tunjangan::all();
        $pegawai=Pegawai::all();
        return view('tunjanganpegawai.edit',compact('tunjanganpegawai','tunjangan','pegawai'));
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
        $this->validate($request,['kode_tunjangan_id'=>'required:unique:tunjangans','pegawai_id'=>'required']);
        $update = TunjanganPegawai::where('id', $id)->first();
       $update->kode_tunjangan_id = $request['kode_tunjangan_id'];
       $update->pegawai_id = $request['pegawai_id'];
       $update->update();

       return redirect()->to('/tunjanganpegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tunjanganpegawai=TunjanganPegawai::find($id)->delete();
        return redirect('tunjanganpegawai');
    }
}
