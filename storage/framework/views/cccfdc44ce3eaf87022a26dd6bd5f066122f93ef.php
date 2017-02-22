<?php $__env->startSection('content'); ?>
	
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">Tambah Data </div>
		<div class="panel-body">
			<form method="POST" action="<?php echo e(url('jabatan')); ?>">
			 	<?php echo e(csrf_field()); ?>

				<div class="form-group">
					<label>Kode Jabatan</label>
					<input class="form-control" type="text" name="kode_jabatan" placeholder="Masukkan Kode Jabatan">
				</div>

				<div class="form-group">
					<label>Nama Jabatan</label>
					<input class="form-control" type="text" name="nama_jabatan" placeholder="Masukkan Nama Jabatan">
				</div>

				<div class="form-group">
					<label>Besaran Uang</label>
					<input class="form-control" type="text" name="besaran_uang" placeholder="Masukkan besaran_uang">
				</div>

				<div class="form-group">
					<input class="btn btn-success" type="submit" name="submit" value="Tambah">
				</div>
			</form>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>