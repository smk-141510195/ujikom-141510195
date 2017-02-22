<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-heading">
            <center><font size=50>Menu Utama</font></div>
                <center><font size=5><a href="<?php echo e(url('/jabatan')); ?>">Jabatan</a><br>
                <a href="<?php echo e(url('/golongan')); ?>">Golongan</a><br>
                <a href="<?php echo e(url('/kategorilembur')); ?>">Kategori Lembur</a><br>
                <a href="<?php echo e(url('/lemburpegawai')); ?>">Lembur Pegawai</a><br>
                <a href="<?php echo e(url('/tunjangan')); ?>">Tunjangan</a><br>
                <a href="<?php echo e(url('/pegawai')); ?>">Pegawai</a><br>
                <a href="<?php echo e(url('/tunjanganpegawai')); ?>">Tunjangan Pegawai</a><br>
                <a href="<?php echo e(url('/penggajian')); ?>">Penggajian</a><br></font>
                </center>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>