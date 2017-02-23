@extends('layouts.app')

@section('content')

<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">Tunjangan Pegawai</div>
		<div class="panel-body">
		<center><a class="btn btn-primary" href="{{url('tunjanganpegawai/create')}}">Tambah Data</a></center><br>
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr bgcolor="pink">
						<th>No</th>
						<th>Kode Tunjangan</th>
						<th>Nama Pegawai</th>
						<th colspan="3">Pilihan</th>
					</tr>
				</thead>

				<?php $no=1; ?>
				@foreach ($tunjanganpegawai as $tunjanganpegawais)
				<tbody>
					<tr> 
						<td> {{$no++}} </td>
						<td> {{$tunjanganpegawais->Tunjangan->kode_tunjangan}} </td>
						<td> {{$tunjanganpegawais->Pegawai->User->name}} </td>					
						
						<td>
							<form method="POST" action=" {{route('tunjanganpegawai.destroy', $tunjanganpegawais->id)}} ">
								{{csrf_field()}}
								<input type="hidden" name="_method" value="DELETE">
								<input class="btn btn-xs btn-danger" onclick="return confirm('Apakah yakin ingin menghapus data ?');" type="submit" value="Hapus">
							</form>
						</td>
					</tr>
				</tbody>
				@endforeach
			</table>
		</div>
	</div>
</div>

@endsection