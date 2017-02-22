<?php $__env->startSection('content'); ?>

<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">Jabatan</div>
		<div class="panel-body">
		<a class="btn btn-primary" href="<?php echo e(url('pegawai/create')); ?>">Tambah Data</a><br><br>
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr class="bg-primary">
						<th>No</th>
						<th>NIP</th>
						<th>User ID</th>
						<th>Jabatan ID</th>
						<th>Golongan ID</th>
						<th>Photo</th>
						<th colspan="3">Pilihan</th>
					</tr>
				</thead>

				<?php $no=1; ?>
				<?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pegawais): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<tbody>
					<tr> 
						<td> <?php echo e($no++); ?> </td>
						<td> <?php echo e($pegawais->nip); ?> </td>
						<td> <?php echo e($pegawais->user_id); ?> </td>
						<td> <?php echo e($pegawais->Jabatan->kode_jabatan); ?> </td>
						<td> <?php echo e($pegawais->Golongan->kode_golongan); ?> </td>
						<td> <?php echo e($pegawais->photo); ?> </td>						
						<td>
							<a class="btn btn-xs btn-info" href=" <?php echo e(route('golongan.edit', $pegawais->id)); ?> ">Ubah</a>
						</td>
						<td>
							<form method="POST" action=" <?php echo e(route('golongan.destroy', $pegawais->id)); ?> ">
								<?php echo e(csrf_field()); ?>

								<input type="hidden" name="_method" value="DELETE">
								<input class="btn btn-xs btn-danger" onclick="return confirm('Apakah yakin ingin menghapus data ?');" type="submit" value="Hapus">
							</form>
						</td>
					</tr>
				</tbody>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</table>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>