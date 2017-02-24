<?php
namespace App\Http\Controllers;
use Request;
use Validator;
use Input;
use App\Penggajian;
use App\TunjanganPegawai;
use App\Pegawai;
use App\Tunjangan;
use App\LemburPegawai;
use App\KategoriLembur;
use App\Golongan;
use App\Jabatan;
use auth;
class penggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pegawai=Pegawai::all();
        $penggajian=Penggajian::paginate(3);
        return view('penggajian.index',compact('penggajian','pegawai'));
    }
    


     
    public function create()
    {
        //
        $tunjangan=TunjanganPegawai::paginate(10);
        return view('penggajian.create',compact('tunjangan'));
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
        
        $penggajian=Input::all();
         // dd($penggajian);
        $where=TunjanganPegawai::where('id',$penggajian['tunjangan_pegawai_id'])->first();
        // dd($where); 
        $wherepenggajian=Penggajian::where('tunjangan_pegawai_id',$where->id)->first();
        // dd($wherepenggajian);
        $wheretunjangan=Tunjangan::where('id',$where->kode_tunjangan_id)->first();
        // dd($wheretunjangan);
        $wherepegawai=Pegawai::where('id',$where->pegawai_id)->first();
        // dd($wherepegawai);
        $wherekategorilembur=KategoriLembur::where('jabatan_id',$wherepegawai->jabatan_id)->where('golongan_id',$wherepegawai->golongan_id)->first();
        // dd($wherekategorilembur);
        $wherelemburpegawai=LemburPegawai::where('pegawai_id',$wherepegawai->id)->get();
        $jumlah_jam=0;
        foreach ($wherelemburpegawai as $jam) {
            $jumlah_jam+=$jam->jumlah_jam;
        }
        // dd($Jumlah_jam);
        $wherejabatan=Jabatan::where('id',$wherepegawai->jabatan_id)->first();
        // dd($wherejabatan);
        $wheregolongan=Golongan::where('id',$wherepegawai->golongan_id)->first();
        // dd($wheregolongan);
        $penggajian=new Penggajian ;
        if (isset($wherepenggajian)) {
            $error=true ;
            $tunjangan=TunjanganPegawai::paginate(10);
            return view('penggajian.create',compact('tunjangan','error'));
        }
        elseif (!isset($wherelemburpegawai)) {
            $nol=0 ;
            $penggajian->jumlah_jam_lembur=$nol;
            $penggajian->jumlah_uang_lembur=$nol ;
            $penggajian->gaji_pokok=$wherejabatan->besaran_uang+$wheregolongan->besaran_uang;
            $penggajian->total_gaji=($wheretunjangan->besaran_uang)+($wherejabatan->besaran_uang+$wheregolongan->besaran_uang);
        $penggajian->tunjangan_pegawai_id=Input::get('tunjangan_pegawai_id');
        $penggajian->petugas_penerima=auth::user()->name ;
        $penggajian->save();
        }
        elseif (!isset($wherelemburpegawai)||!isset($wherekategorilembur)) {
            $nol=0 ;
            $penggajian->jumlah_jam_lembur=$nol;
            $penggajian->jumlah_uang_lembur=$nol ;
            $penggajian->gaji_pokok=$wherejabatan->besaran_uang+$wheregolongan->besaran_uang;
            $penggajian->total_gaji=($wheretunjangan->besaran_uang)+($wherejabatan->besaran_uang+$wheregolongan->besaran_uang);
        $penggajian->tunjangan_pegawai_id=Input::get('tunjangan_pegawai_id');
        $penggajian->petugas_penerima=auth::user()->name ;
        $penggajian->save();
        }
        else{
            $penggajian->jumlah_jam_lembur=$jumlah_jam;
            $penggajian->jumlah_uang_lembur=$jumlah_jam*$wherekategorilembur->besaran_uang ;
            $penggajian->gaji_pokok=$wherejabatan->besaran_uang+$wheregolongan->besar_uang;
            $penggajian->total_gaji=($jumlah_jam*$wherekategorilembur->besaran_uang)+($wheretunjangan->besaran_uang)+($wherejabatan->besaran_uang+$wheregolongan->besaran_uang);
            $penggajian->tanggal_pengambilan =date('d-m-y');
            $penggajian->tunjangan_pegawai_id=Input::get('tunjangan_pegawai_id');
            $penggajian->petugas_penerima=auth::user()->name ;
            $penggajian->save();
            }
            return redirect('penggajian');
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
         $penggajian=Penggajian::find($id);
        return view('penggajian.read',compact('penggajian'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gaji=Penggajian::find($id);
        $penggajian=new Penggajian ;
        $penggajian=array('status_pengambilan'=>1,'tgl_pengambilan'=>date('y-m-d'));
        Penggajian::where('id',$id)->update($penggajian);
        return redirect('penggajian');
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
        Penggajian::find($id)->delete();
        return redirect('penggajian');
    }
}