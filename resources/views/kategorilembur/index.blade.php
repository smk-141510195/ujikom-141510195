@extends('layouts.app')

@section('content')

<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">Kategori Lembur</div>
		<div class="panel-body">
		<center><a class="btn btn-primary" href="{{url('kategorilembur/create')}}">Tambah Data</a></center><br>
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr bgcolor="pink">
						<th>No</th>
						<th>Kode Lembur</th>
						<th>Nama Jabatan</th>
						<th>Nama Golongan</th>
						<th>Besaran Uang</th>
						<th colspan="3">Pilihan</th>
					</tr>
				</thead>

				<?php $no=1; ?>
				@foreach ($kategorilembur as $kategorilemburs)
				<tbody>
					<tr> 
						<td> {{$no++}} </td>
						<td> {{$kategorilemburs->kode_lembur}} </td>
						<td> {{$kategorilemburs->Jabatan->nama_jabatan}} </td>
						<td> {{$kategorilemburs->Golongan->nama_golongan}} </td>
						<td> {{$kategorilemburs->besaran_uang}} </td>						
						<td>
							<a class="btn btn-xs btn-warning" href=" {{route('kategorilembur.edit', $kategorilemburs->id)}} ">Ubah</a>
						</td>
						<td>
							<form method="POST" action=" {{route('kategorilembur.destroy', $kategorilemburs->id)}} ">
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