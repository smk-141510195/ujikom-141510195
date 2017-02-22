@section('content1')
				<div class="col-md-15 col-md-offset-0">
                    <div class="panel panel-primary">
                        <div class="panel-body">
        <div class="col-md-15 col-md-offset-0">
            <div class="panel panel-primary">
			    <div class="panel-heading">Data Penggajian</div>
	                <div class="panel-body">
				        
				        <table border="2" class="table table-success table-border table-hover">
										<thead >
											<tr>
												<th>No</th>
												<th>Pegawai</th>
												<th>Jumlah Uang Tunjangan</th>
												<th>Jumlah Jam Lembur</th>
												<th>Jumlah Uang Lembur</th>
												<th>gaji Pokok</th>
												<th>Total Gaji</th>
												<th>Tanggal Pengambilan</th>
												<th>Status Pengambilan</th>
												<th>Petugas Penerimaan</th>
											</tr>
										</thead>
										@php $no=1;   @endphp
										<tbody>
											@foreach($pegawai as $pegawais)
											<tr>
												<td>{{$no++}}</td>
												<td>{{$pegawais->User->name}}</td>
												<td>
												@foreach($tunjangan as $tunjangans)
													
													@if($tunjangans->pegawai_id == $pegawais->id)
														{{$tunjangans->Tunjangan->besaran_uang}}
														@php $a=$tunjangans->tunjangan->besaran_uang; ; @endphp
													@endif

												@endforeach
												</td>
												<td>
													
												@foreach($lemburpegawai as $lemburpegawais)
													@if($lemburpegawais->pegawai_id == $pegawais->id)
														{{$lemburpegawais->jumlah_jam}}
														@php $b=$lemburpegawais->jumlah_jam*$lemburpegawais->KategoriLembur->besaran_uang; @endphp

													@endif
												@endforeach
												</td>
												<td>
													
												@foreach($lemburpegawai as $lemburpegawais)
													@if($lemburpegawais->pegawai_id == $pegawais->id)
														{{$lemburpegawais->jumlah_jam*$lemburpegawais->KategoriLembur->besaran_uang}}
														@php $b=$lemburpegawais->jumlah_jam*$lemburpegawais->KategoriLembur->besaran_uang; @endphp

													@endif
												@endforeach
												</td>
												<td>{{$pegawais->Golongan->besaran_uang+$pegawais->Jabatan->besar_uang}}</td>
												@php $c=$pegawais->Golongan->besaran_uang+$pegawais->Jabatan->besaran_uang; @endphp

												<td>{{$a + $b + $c}}</td>
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
												<td>dj</td>
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