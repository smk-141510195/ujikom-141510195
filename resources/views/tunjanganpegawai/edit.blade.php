@extends('layouts.app')
@section('content')
<br>
<div class="container">
   <div class="row">
       <div class="col-md-8 col-md-offset-2">
           <div class="panel panel-default">
               <div class="panel-heading">Update Tunjangan Pegawai</div>
               <div class="panel-body">
   {!! Form::model($tunjanganpegawai,['method'=>'PATCH','route'=>['tunjanganpegawai.update',$tunjanganpegawai->id]]) !!}
   <div class="form-group {{ $errors->has('kode_tunjangan_id') ? ' has-error' : '' }}">
       {!! Form::label('Kode Tunjangan', 'Kode Tunjangan:') !!}
       <select  name="kode_tunjangan_id" class="form-control">
                                  <option value="">Silahkan Pilih Kode Tunjangan</option>
                                       @foreach($tunjangan as $tunjangans)
                                       <option value="{!! $tunjangans->id !!}">Kode : {!! $tunjangans->kode_tunjangan !!}</option>
                                       @endforeach
                                   </select>
                               @if ($errors->has('kode_tunjangan_id'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('kode_tunjangan_id') }}</strong>
                                   </span>
                               @endif
   </div>
       <div class="form-group {{ $errors->has('pegawai_id') ? ' has-error' : '' }}">
       {!! Form::label('Nama Pegawai', 'Nama Pegawai:') !!}
       <select  name="pegawai_id" class="form-control">
                                  <option value="">Silahkan Pilih Nama pegawai</option>
                                       @foreach($pegawai as $pegawais)
                                       <option value="{!! $pegawais->id !!}">NIP : {!! $pegawais->nip !!} Nama : {!! $pegawais->user->name !!}</option>
                                       @endforeach
                                   </select>
                               @if ($errors->has('pegawai_id'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('pegawai_id') }}</strong>
                                   </span>
                               @endif
   </div>
   <div class="form-group">
       {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
   </div>
   </div>
   </div>
   </div>
   </div>
   </div>
   {!! Form::close() !!}
@stop