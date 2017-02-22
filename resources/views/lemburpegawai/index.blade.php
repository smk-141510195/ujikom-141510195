@extends('layouts.app')

@section('content')

<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">Lembur Pegawai</div>
		<div class="panel-body">
		<center><a class="btn btn-primary" href="{{url('lemburpegawai/create')}}">Tambah Data</a></center><br>
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr bgcolor="pink">
						<th>No</th>
						<th>Kode Lembur ID</th>
						<th>Pegawai ID</th>
						<th>Jumlah Jam</th>
						<th colspan="3">Pilihan</th>
					</tr>
				</thead>

				<?php $no=1; ?>
				@foreach ($lemburpegawai as $lemburpegawais)
				<tbody>
					<tr> 
						<td> {{$no++}} </td>
						<td> {{$lemburpegawais->KategoriLembur->kode_lembur}} </td>
						<td> {{$lemburpegawais->Pegawai->nip}} </td>
						<td> {{$lemburpegawais->jumlah_jam}} </td>						
						<td>
							<a class="btn btn-xs btn-warning" href=" {{route('lemburpegawai.edit', $lemburpegawais->id)}} ">Ubah</a>
						</td>
						<td>
							<form method="POST" action=" {{route('lemburpegawai.destroy', $lemburpegawais->id)}} ">
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