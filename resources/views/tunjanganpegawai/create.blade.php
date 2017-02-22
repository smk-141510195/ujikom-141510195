@extends('layouts.app')
@section('kategori')
    active
@endsection
@section('content')
{!! Form::open(['url' => 'tunjanganpegawai']) !!}
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">Tambah Tunjangan Pegawai</div>
        <div class="panel-body">

                <div class="form-group">
                <div class="form-group {{$errors->has('kode_tunjangan_id') ? 'has-errors':'message'}}" >
                        <label for="kode_tunjangan_id" class="control-label">Kode Tunjangan :</label>
                                <select name="kode_tunjangan_id" class="form-control">
                                    <option value="">Pilih</option>
                                    @foreach($tunjangan as $tunjangans)
                                    <option value="{{$tunjangans->id}}">{{$tunjangans->kode_tunjangan}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('kode_tunjangan_id'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('kode_tunjangan_id')}}</strong>
                                    </span>
                                @endif
                </div>
                </div>

                <div class="form-group">
                <div class="form-group {{$errors->has('pegawai_id') ? 'has-errors':'message'}}" >
                <label for="pegawai_id" class="control-label">Nama Pegawai :</label>
                                <select name="pegawai_id" class="form-control">
                                    <option value="">Pilih</option>
                                    @foreach($pegawai as $pegawais)
                                    <option value="{{$pegawais->id}}">{{$pegawais->User->name}}</option>
                                    @endforeach
                                </select>
                        @if($errors->has('pegawai_id'))
                            <span class="help-block">
                                <strong>{{$errors->first('pegawai_id')}}</strong>
                            </span>
                        @endif
                       
                </div>
                </div>

                
                <div class="form-group">
                    <input class="btn btn-success" type="submit" name="submit" value="Tambah">
                </div>
    {!! Form::close() !!}
              
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection