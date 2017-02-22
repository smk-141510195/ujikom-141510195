<?php $__env->startSection('content'); ?>
	
<?php echo Form::open(['url' => 'jabatan']); ?>

<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">Tambah Jabatan</div>
        <div class="panel-body">

                    

				<div class="form-group">
     			<div class="form-group <?php echo e($errors->has('kode_jabatan') ? 'has-errors':'message'); ?>" >
                        <?php echo Form::label('Kode Jabatan', 'Kode Jabatan:'); ?>

        				<?php echo Form::text('kode_jabatan',null,['class'=>'form-control']); ?>

         						<?php if($errors->has('kode_jabatan')): ?>
        							<span class="help-block">
            							<strong><?php echo e($errors->first('kode_jabatan')); ?></strong>
        							</span>
       		 					<?php endif; ?>
    			</div>
    			</div>

    			<div class="form-group">
         		<div class="form-group <?php echo e($errors->has('nama_jabatan') ? 'has-errors':'message'); ?>" >
					<?php echo Form::label('Nama Jabatan', 'Nama Jabatan:'); ?>

        			<?php echo Form::text('nama_jabatan',null,['class'=>'form-control']); ?>

         				<?php if($errors->has('nama_jabatan')): ?>
        					<span class="help-block">
            					<strong><?php echo e($errors->first('nama_jabatan')); ?></strong>
        					</span>
        				<?php endif; ?>
    			</div>
    			</div>

     			<div class="form-group">
     			<div class="form-group <?php echo e($errors->has('besaran_uang') ? 'has-errors':'message'); ?>" >
        			<?php echo Form::label('Besaran Uang', 'Besaran Uang:'); ?>

        			<?php echo Form::text('besaran_uang',null,['class'=>'form-control']); ?>

         			<?php if($errors->has('besaran_uang')): ?>
        				<span class="help-block">
            				<strong><?php echo e($errors->first('besaran_uang')); ?></strong>
        				</span>
        			<?php endif; ?>
    			</div>
    			</div>

				<div class="form-group">
                    <input class="btn btn-success" type="submit" name="submit" value="Tambah">
                </div>
    <?php echo Form::close(); ?>

              

			</form>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>