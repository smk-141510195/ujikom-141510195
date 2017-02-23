<?php

namespace App\Http\Controllers;

use Request;
use App\Pegawai;
use App\Golongan;
use App\Jabatan;
use App\User;
use Validator;
use Input;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use RegistersUsers;

    public function index()
    {
        //
         $pegawai = Pegawai::all();
        return view('Pegawai.index', compact('pegawai'));
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
        $user=User::all();
        return view('Pegawai.create',compact('jabatan','golongan','user'));
    
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
        //$pegawai=Request::all();
        //Pegawai::create($pegawai);
        //return redirect('pegawai');

        $roles=[
            'nip'=>'required|unique:pegawais',
            'jabatan_id'=>'required',
            'golongan_id'=>'required',
            'photo'=>'required',
            'name' => 'required|max:255',
            'permision' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ];
        $sms=[
            'nip.required'=>'Kolom Jangan Sampai Kosong',
            'nip.unique'=>'Kolom Jangan Sampai Kosong',
            'jabatan_id.required'=>'Kolom Jangan Sampai Kosong',
            'golongan_id.required'=>'Kolom Jangan Sampai Kosong',
            'photo.required'=>'Kolom Jangan Sampai Kosong',
            'name.required'=>'Kolom Jangan Sampai Kosong',
            'name.max'=>'max 255',
            'permision.required'=>'Kolom Jangan Sampai Kosong',
            'email.required'=>'Kolom Jangan Sampai Kosong',
            'email.email'=>'Data Yang Di Masukan Harus Berbentuk Email',
            'email.max'=>'max 255',
            'email.unique'=>'Email Ini Sudah Ada',
            'password.required'=>'Kolom Jangan Sampai Kosong',
            'password.min'=>'min 6',
            'password.confirmed'=>'Konfirmasi Ulang Password',
        ];
        $validasi=Validator::make(Input::all(),$roles,$sms);
        if($validasi->fails()){
            return redirect()->back()
                ->WithErrors($validasi)
                ->WithInput();
        }
        $user=new User;
        $user->name = Request('name');
        $user->permision = Request('permision');
        $user->email = Request('email');
        $user->password = bcrypt(Request('password'));
        $user->save();
        $user = User::all();
        foreach ($user as $data ) {
            $di=$data->id;
        }

        $file= Input::file('photo');
        $destination= public_path().'/assets/image/';
        $filename=$file->getClientOriginalName();
        $uploadsuccess=$file->move($destination,$filename);
        if(Input::hasFile('photo')){
                $pegawai = new Pegawai;
                $pegawai->nip = Request('nip');
                $pegawai->user_id = $di;
                $pegawai->jabatan_id = Request('jabatan_id');
                $pegawai->golongan_id = Request('golongan_id');
                $pegawai->photo=$filename;
                $pegawai->save();
                return redirect('pegawai');
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
        //
        $pegawai=Pegawai::find($id);;
        $golongan=Golongan::all();
         $jabatan=Jabatan::all();
         $user=User::all();
        return view('pegawai.edit',compact('golongan','jabatan','user','pegawai'));
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
        $old_pegawai = Pegawai::where('id', $id)->first();
      $old_email = User::where('id', $old_pegawai->user_id)->first()->email;
      $data = Request::all();
      $validati = ([
          'name' => 'required|max:255',
          'email' => 'required|email|max:255|unique:users',
          'nip'=>'required|unique:pegawai',
          'jabatan_id' => 'required',
          'golongan_id' => 'required',
          'photo' => 'required',
          ]);
      if ($old_email==$data['email']) 
      {
          $validati['email'] = '';
          $data['email'] = $old_email;
      }
      if (Input::file() == null)
      {
          $validati['photo'] = '';
      }
      if ($data['nip']==$old_pegawai['nip'])
      {
          $validati['nip'] = '';
      }
      else
      {
          $validati['nip'] = 'required|unique:pegawais';
      }

      $validation = Validator::make(Request::all(), $validati);

      if ($validation->fails()) {
          return redirect('pegawai/'.$id.'/edit')->withErrors($validation)->withInput();
      }

      $user = User::where('id', $old_pegawai->user_id)->first()->update([
          'name' => $data['name'],
          'email' => $data['email'],
          ]);
      $user = User::where('id', $old_pegawai->user_id)->first();
      

      if (Input::file()==null)
      {
          $data['photo'] = $old_pegawai->poto;

      }
      else
      {
          $file = Input::file('photo');
          $destination_path = public_path().'/assets/image';
          $filename = $user->name.'_'.$file->getClientOriginalName();
          $uploadSuccess = $file->move($destination_path,$filename);
          $data['photo'] = $filename;
      }

      pegawai::where('id', $id)->first()->update([
          'nip' => $data['nip'],
          'jabatan_id' => $data['jabatan_id'],
          'golongan_id' => $data['golongan_id'],
          'photo' => $data['photo'],
          ]);
      return redirect('pegawai');
$old_pegawai = Pegawai::where('id', $id)->first();
      $old_email = User::where('id', $old_pegawai->user_id)->first()->email;
      $data = Request::all();
      $validati = ([
          'name' => 'required|max:255',
          'email' => 'required|email|max:255|unique:users',
          'nip'=>'required|unique:pegawai',
          'jabatan_id' => 'required',
          'golongan_id' => 'required',
          'poto' => 'required',
          ]);
      if ($old_email==$data['email']) 
      {
          $validati['email'] = '';
          $data['email'] = $old_email;
      }
      if (Input::file() == null)
      {
          $validati['photo'] = '';
      }
      if ($data['nip']==$old_pegawai['nip'])
      {
          $validati['nip'] = '';
      }
      else
      {
          $validati['nip'] = 'required|unique:pegawais';
      }

      $validation = Validator::make(Request::all(), $validati);

      if ($validation->fails()) {
          return redirect('pegawai/'.$id.'/edit')->withErrors($validation)->withInput();
      }

      $user = User::where('id', $old_pegawai->user_id)->first()->update([
          'name' => $data['name'],
          'email' => $data['email'],
          ]);
      $user = User::where('id', $old_pegawai->user_id)->first();
      

      if (Input::file()==null)
      {
          $data['photo'] = $old_pegawai->photo;

      }
      else
      {
          $file = Input::file('photo');
          $destination_path = public_path().'/assets/image';
          $filename = $user->name.'_'.$file->getClientOriginalName();
          $uploadSuccess = $file->move($destination_path,$filename);
          $data['photo'] = $filename;
      }

      pegawai::where('id', $id)->first()->update([
          'nip' => $data['nip'],
          'jabatan_id' => $data['jabatan_id'],
          'golongan_id' => $data['golongan_id'],
          'photo' => $data['photo'],
          ]);
      return redirect('pegawai');
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
        $pegawai=Pegawai::find($id);
        $user=User::where('id',$pegawai->permision)->delete();
        $pegawai->delete();

        return redirect('pegawai');
    }
}
