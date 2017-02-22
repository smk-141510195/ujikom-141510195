@extends('layouts.app')
@section('kategori')
    active
@endsection
@section('content')
{!! Form::open(['url' => 'lemburpegawai']) !!}
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">Tambah Lembur Pegawai</div>
        <div class="panel-body">

                <div class="form-group">
                <div class="form-group {{$errors->has('kode_lembur_id') ? 'has-errors':'message'}}" >
                        <label for="kode_lembur_id" class="control-label">Kode Lembur ID :</label>
                                <select name="kode_lembur_id" class="form-control">
                                    <option value="">pilih</option>
                                    @foreach($kategorilembur as $kategorilemburs)
                                    <option value="{{$kategorilemburs->id}}">{{$kategorilemburs->kode_lembur}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('kode_lembur_id'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('kode_lembur_id')}}</strong>
                                    </span>
                                @endif
                </div>
                </div>

                <div class="form-group">
                <div class="form-group {{$errors->has('pegawai_id') ? 'has-errors':'message'}}" >
                <label for="pegawai_id" class="control-label">Pegawai ID :</label>
                                <select name="pegawai_id" class="form-control">
                                    <option value="">pilih</option>
                                    @foreach($pegawai as $pegawais)
                                    <option value="{{$pegawais->id}}">{{$pegawais->nip}}</option>
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
                <div class="form-group {{$errors->has('jumlah_jam') ? 'has-errors':'message'}}" >
                    {!! Form::label('Jumlah Jam', 'Jumlah Jam :') !!}
                    {!! Form::text('jumlah_jam',null,['class'=>'form-control']) !!}
                    @if($errors->has('jumlah_jam'))
                        <span class="help-block">
                            <strong>{{$errors->first('jumlah_jam')}}</strong>
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