@extends('layouts.app')
@section('content')

<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">Ubah Data Kategori Lembur</div>
		<div class="panel-body">
					{!! Form::model($kategorilembur,['method'=>'PATCH','route'=>['kategorilembur.update',$kategorilembur->id]])!!}
					{!! Form::hidden('id',null,['class'=>'form-control']) !!}

					<div class="form-group">
                	<div class="form-group {{$errors->has('kode_lembur') ? 'has-errors':'message'}}" >
                        {!! Form::label('Kode Lembur', 'Kode Lembur:') !!}
                        {!! Form::text('kode_lembur',null,['class'=>'form-control']) !!}
                                @if($errors->has('kode_lembur'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('kode_lembur')}}</strong>
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
                                    <option value="">pilih</option>
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
            </div>
        </div>
    </div>
</div>

@endsection
