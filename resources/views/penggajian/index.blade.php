@extends('layouts.app')
@section('content')
				<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">Penggajian</div>
		<div class="panel-body">
				        <table class="table table-striped table-bordered table-hover">
				        
										<thead>
											<tr bgcolor="pink">
												<th>No</th>
												<th>Pegawai</th>
												<th>Jumlah Jam Lembur</th>
												<th>Jumlah Uang Lembur</th>
												<th>Gaji Pokok</th>
												<th>Total Gaji</th>
												<th>Tanggal Pengambilan</th>
												<th>Status Pengambilan</th>
												<th>Petugas Penerimaan</th>
											</tr>
										</thead>
										@php $no=1;   @endphp
										<tbody>
											@foreach($pegawai as $data)
											<tr>
												<td>{{$no++}}</td>
												<td>{{$data->User->name}}</td>
												
												<td>
													
												@foreach($lemburpegawai as $data2)
													@if($data2->pegawai_id == $data->id)
														{{$data2->jumlah_jam}}
														@php $b=$data2->Jumlah_jam*$data2->kategorilembur->besaran_uang; @endphp

													@endif
												@endforeach
												</td>
												<td>
													
												@foreach($lemburpegawai as $data2)
													@if($data2->pegawai_id == $data->id)
														{{$data2->jumlah_jam*$data2->kategorilembur->besaran_uang}}
														@php $b=$data2->jumlah_jam*$data2->kategorilembur->besaran_uang; @endphp

													@endif
												@endforeach
												</td>
												<td>{{$data->golongan->besaran_uang+$data->jabatan->besaran_uang}}
												@php $c=$data->golongan->besaran_uang+$data->jabatan->besaran_uang; @endphp</td>

												<td>@foreach($tunjangan as $data1)
														@foreach($penggajian as $data3)
															@if($data3->tunjangan_pegawai_id == $data1->id && $data1->pegawai->id == $data->id)
															{{$data3->jumlah_uang_lembur*$data3->gaji_pokok}}
															
															@endif
														@endforeach
													@endforeach
													</td>
												<td>
													
												@foreach($tunjangan as $data1 )
													
													@foreach($penggajian as $data3)
														@if($data3->tunjangan_pegawai_id == $data1->id && $data1->pegawai->id == $data->id )  
															{{$data3->status_pengambilan}}
														@elseif($data3->tunjangan_pegawai_id != $data1->id && $data1->pegawai->id != $data->id )
														
														@elseif($data3->tunjangan_pegawai_id == $data1->id && $data1->pegawai->id != $data->id )
															
														@else
														Belum diambial
														@endif
												@endforeach
												@endforeach
												</td>
												<td>@foreach($tunjangan as $data1 )
													@foreach($penggajian as $data3)
														@if($data3->tunjangan_pegawai_id == $data1->id && $data1->pegawai->id == $data->id )  
															{{$data3->status_pengambilan}}
														@elseif($data3->tunjangan_pegawai_id != $data1->id && $data1->pegawai->id != $data->id )
														
														@elseif($data3->tunjangan_pegawai_id == $data1->id && $data1->pegawai->id != $data->id )
															
														@else
														Belum diambial
														<form class="form-horizontal" role="form" method="POST" action="{{ url('/penggajian') }}">
							                        {{ csrf_field() }}
							                        	@foreach($tunjangan as $data1)
															@if($data1->pegawai_id == $data->id)
									                        	<input type="hidden" name="tunjangan_pegawai_id" value="{{$data1->id}}">
																@php $a=$data1->tunjangan->besar_uang; ; @endphp
															@endif
														@endforeach
							                        	@foreach($lemburp as $data2)
															@if($data2->pegawai_id == $data->id)
																<input type="hidden" name="jumlah_jam_lembur" value="{{$data2->Jumlah_jam}}">
																<input type="hidden" name="jumlah_uang_lembur" value="{{$data2->Jumlah_jam*$data2->kategori->besar_uang}}">
															@endif
														@endforeach
														<input type="hidden" name="gaji_pokok" value="{{$data->golongan->besar_uang+$data->jabatan->besar_uang}}">
							                        <input type="hidden" name="tanggal_pengambilan" value="{{date('Y-m-d')}}" >
							                        <input type="hidden" name="status_pengambilan" value="1" >
							                       <input type="hidden" name="petugas_penerima" value="dj">
							                        <div class="form-group">
							                            <div class="col-md-10 col-md-offset-0">
							                                <button type="submit" class="btn btn-primary form-control">
							                                    Ambil
							                                </button>
							                            </div>
							                        </div>
							                    </form>
														@endif
														@endforeach
													@endforeach

													
												</td>
												<td></td>
												
											</tr>
											@endforeach
										</tbody>
									</table>
				                </div>
				            </div>
				        </div>
	        		</div>
        	</div>
        </div>

 						</div>
                    </div>
                </div>
@endsection