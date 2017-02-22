@extends('layouts.app')

@section('content')

<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">Jabatan</div>
		<div class="panel-body">
		<center><a class="btn btn-primary" href="{{url('jabatan/create')}}">Tambah Data</a></center><br>
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr bgcolor="pink">
						<th>No</th>
						<th>Kode Jabatan</th>
						<th>Nama Jabatan</th>
						<th>Besaran Uang</th>
						<th colspan="3">Pilihan</th>
					</tr>
				</thead>

				<?php $no=1; ?>
				@foreach ($jabatan as $jabatans)
				<tbody>
					<tr> 
						<td> {{$no++}} </td>
						<td> {{$jabatans->kode_jabatan}} </td>
						<td> {{$jabatans->nama_jabatan}} </td>
						<td> Rp.{{$jabatans->besaran_uang}} </td>
						<td>
							<a class="btn btn-xs btn-warning" href=" {{route('jabatan.edit', $jabatans->id)}} ">Ubah</a>
						</td>
						<td>
							<form method="POST" action=" {{route('jabatan.destroy', $jabatans->id)}} ">
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