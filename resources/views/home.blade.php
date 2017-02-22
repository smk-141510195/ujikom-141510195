@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-heading">
            <center><font size=50>Menu Utama</font></div>
                <center><font size=5><a href="{{ url('/jabatan') }}">Jabatan</a><br>
                <a href="{{ url('/golongan') }}">Golongan</a><br>
                <a href="{{ url('/kategorilembur') }}">Kategori Lembur</a><br>
                <a href="{{ url('/lemburpegawai') }}">Lembur Pegawai</a><br>
                <a href="{{ url('/tunjangan') }}">Tunjangan</a><br>
                <a href="{{ url('/pegawai') }}">Pegawai</a><br>
                <a href="{{ url('/tunjanganpegawai') }}">Tunjangan Pegawai</a><br>
                <a href="{{ url('/penggajian') }}">Penggajian</a><br></font>
                </center>
            </div>
        </div>
    </div>
</div>
@endsection
