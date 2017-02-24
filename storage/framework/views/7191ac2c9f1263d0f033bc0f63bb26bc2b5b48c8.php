<?php $__env->startSection('content'); ?>

<div class="col-md-12">
   <div class="panel panel-info">
        <div class="panel-heading">Penggajian</div>
        <div class="panel-body">
        <center><a class="btn btn-primary" href="<?php echo e(url('penggajian/create')); ?>">Tambah Data</a></center><br><br>
            <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr bgcolor="pink">
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>Nip Pegawai</th> 
                            <th>Photo</th>
                            <th>Status Pengambilan</th>
                            <th colspan="3"> <center>Opsi</center></th>
                            </tr>
                        </thead>

                        <?php 
                            $no=1 ;
                         ?>
                        <tbody>
                        <?php $__currentLoopData = $penggajian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $penggajians): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <td><?php echo e($no++); ?></td>                        
                        <td><?php echo e($penggajians->TunjanganPegawai->Pegawai->User->name); ?></td>
                        <td><?php echo e($penggajians->TunjanganPegawai->Pegawai->nip); ?></td>
                        <td><img src="assets/image/<?php echo e($penggajians->tunjanganpegawai->pegawai->photo); ?>" width="100" height="100">
                        </td>
                        <td><b><?php if($penggajians->tgl_pengambilan == ""&&$penggajians->status_pengambilan == "0"): ?>
                        Gaji Belum Diambil
                        		<div >
                                    <a class="btn btn-primary" href="<?php echo e(route('penggajian.edit',$penggajians->id)); ?>">Ubah Pengambilan</a>
                                </div>
                            
                        <?php elseif($penggajians->tgl_pengambilan == ""||$penggajians->status_pengambilan == "0"): ?>
                            Gaji Belum Diambil
                            <div>
                                    <a class="btn btn-primary" href="<?php echo e(route('penggajian.edit',$penggajians->id)); ?>">Ubah Pengambilan</a>
                                </div>
                        <?php else: ?>
                            Gaji Sudah Diambil Pada <?php echo e($penggajians->tgl_pengambilan); ?>

                        <?php endif; ?></b></td>


                        </h5>
                        
                                <td><a class="btn btn-warning form-control" href="<?php echo e(route('penggajian.show',$penggajians->id)); ?>">Lihat</a></td>
                                     <td><?php echo Form::open(['method'=>'DELETE','route'=>['penggajian.destroy',$penggajians->id]]); ?>

                                    <?php echo Form::submit('Delete',['class'=>'btn btn-danger col-md-12']); ?></td>
                                    <?php echo Form::close(); ?>

                                
                        </center>
                        </div> 
                          </tbody>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        
                    </table>
                </div>

           
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>