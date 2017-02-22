@extends('layouts.app')
@section('kategori')
    active
@endsection
@section('content')
{!! Form::open(['url' => 'tunjangan']) !!}
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">Tambah Tunjangan</div>
        <div class="panel-body">

                <div class="form-group">
                <div class="form-group {{$errors->has('kode_tunjangan') ? 'has-errors':'message'}}" >
                        {!! Form::label('Kode Tunjangan', 'Kode Tunjangan:') !!}
                        {!! Form::text('kode_tunjangan',null,['class'=>'form-control']) !!}
                                @if($errors->has('kode_tunjangan'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('kode_tunjangan')}}</strong>
                                    </span>
                                @endif
                </div>
                </div>

                <div class="form-group">
                <div class="form-group {{$errors->has('jabatan_id') ? 'has-errors':'message'}}" >
                <label for="jabatan_id" class="control-label">Nama Jabatan :</label>
                                <select name="jabatan_id" class="form-control">
                                    <option value="">Pilih</option>
                                    @foreach($jabatan as $jabatans)
                                    <option value="{{$jabatans->id}}">{{$jabatans->nama_jabatan}}</option>
                                    @endforeach
                                </select>
                        @if($errors->has('jabatan_id'))
                            <span class="help-block">
                                <strong>{{$errors->first('jabatan_id')}}</strong>
                            </span>
                        @endif
                       
                </div>
                </div>

                <div class="form-group">
                <div class="form-group {{$errors->has('golongan_id') ? 'has-errors':'message'}}" >
                <label for="golongan_id" class="control-label">Nama Golongan :</label>
                                <select name="golongan_id" class="form-control">
                                    <option value="">Pilih</option>
                                    @foreach($golongan as $golongans)
                                    <option value="{{$golongans->id}}">{{$golongans->nama_golongan}}</option>
                                    @endforeach
                                </select>
                        @if($errors->has('golongan_id'))
                            <span class="help-block">
                                <strong>{{$errors->first('golongan_id')}}</strong>
                            </span>
                        @endif
                       
                </div>
                </div>

                <div class="form-group">
                <div class="form-group {{$errors->has('status') ? 'has-errors':'message'}}" >
                    {!! Form::label('Status', 'Status :') !!}
                    
                                <select name="status" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Duda">Duda</option>
                                    <option value="Janda">Janda</option>
                                </select>
                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                    
                </div>
                </div>

                <div class="form-group">
                <div class="form-group {{$errors->has('jumlah_anak') ? 'has-errors':'message'}}" >
                    {!! Form::label('Jumlah Anak', 'Jumlah Anak :') !!}
                    {!! Form::text('jumlah_anak',null,['class'=>'form-control']) !!}
                    @if($errors->has('jumlah_anak'))
                        <span class="help-block">
                            <strong>{{$errors->first('jumlah_anak')}}</strong>
                        </span>
                    @endif
                </div>
                </div>

                <div class="form-group">
                <div class="form-group {{$errors->has('besaran_uang') ? 'has-errors':'message'}}" >
                    {!! Form::label('Besaran Uang', 'Besaran Uang:') !!}
                    {!! Form::text('besaran_uang',null,['class'=>'form-control']) !!}
                    @if($errors->has('besaran_uang'))
                        <span class="help-block">
                            <strong>{{$errors->first('besaran_uang')}}</strong>
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