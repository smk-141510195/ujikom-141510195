<?php $__env->startSection('content'); ?>
                    
    <div class="">
         <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Penggajian</div>
                <div class="panel-body">
                        
         <table class="table table-striped table-hover table-bordered">
          <center>
                <p><img width="200px" height="150px" src="<?php echo url('assets/image/') ?>/<?php echo $penggajian->tunjanganpegawai->pegawai->photo; ?>" class="img-circle" alt="Cinque Terre" ></p>
                        <h3><?php echo e($penggajian->TunjanganPegawai->Pegawai->User->name); ?></h3>
                        
                        <h5><?php echo e($penggajian->TunjanganPegawai->Pegawai->nip); ?></h5>
                        <b><?php if($penggajian->tgl_pengambilan == ""&&$penggajian->status_pengambilan == "0"): ?>
                            Gaji Belum Diambil
                        <?php elseif($penggajian->tgl_pengambilan == ""||$penggajian->status_pengambilan == "0"): ?>
                            Gaji Belum Diambil
                        <?php else: ?>
                            Gaji Sudah Diambil Pada <?php echo e($penggajian->tgl_pengambilan); ?>

                        <?php endif; ?></b>
                        <h5>Gaji Lembur Sebesar Rp.<?php echo e($penggajian->jumlah_uang_lembur); ?><hr> Gaji Pokok Sebesar Rp.<?php echo e($penggajian->gaji_pokok); ?><hr>Mendapat Tunjangan Sebesar Rp.<?php echo e($penggajian->TunjanganPegawai->Tunjangan->besaran_uang); ?><hr>Jadi Total Gaji Rp.<?php echo e($penggajian->total_gaji); ?>

                        </h5>
                        
 <hr><a class="btn btn-success col-md-12" href="<?php echo e(url('penggajian')); ?>">Kembali</a>
                                
                        </center>
                        </div> 
                        
                    </table>
              
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>