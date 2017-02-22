<?php $__env->startSection('content'); ?>

<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">Ubah Data Kategori Lembur</div>
		<div class="panel-body">
					<?php echo Form::model($kategorilembur,['method'=>'PATCH','route'=>['kategorilembur.update',$kategorilembur->id]]); ?>

					<?php echo Form::hidden('id',null,['class'=>'form-control']); ?>


					<div class="form-group">
                	<div class="form-group <?php echo e($errors->has('kode_lembur') ? 'has-errors':'message'); ?>" >
                        <?php echo Form::label('Kode Lembur', 'Kode Lembur:'); ?>

                        <?php echo Form::text('kode_lembur',null,['class'=>'form-control']); ?>

                                <?php if($errors->has('kode_lembur')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('kode_lembur')); ?></strong>
                                    </span>
                                <?php endif; ?>
                	</div>
                	</div>

					<div class="form-group">
                	<div class="form-group <?php echo e($errors->has('jabatan_id') ? 'has-errors':'message'); ?>" >
                	<label for="jabatan_id" class="control-label">Nama Jabatan :</label>
                                <select name="jabatan_id" class="form-control">
                                    <option value="">Pilih</option>
                                    <?php $__currentLoopData = $jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jabatans): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($jabatans->id); ?>"><?php echo e($jabatans->nama_jabatan); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </select>
                        <?php if($errors->has('jabatan_id')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('jabatan_id')); ?></strong>
                            </span>
                        <?php endif; ?>
                       
                	</div>
                	</div>

                    <div class="form-group">
                	<div class="form-group <?php echo e($errors->has('golongan_id') ? 'has-errors':'message'); ?>" >
                    	<label for="golongan_id" class="control-label">Nama Golongan :</label>
                                <select name="golongan_id" class="form-control">
                                    <option value="">pilih</option>
                                    <?php $__currentLoopData = $golongan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $golongans): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($golongans->id); ?>"><?php echo e($golongans->nama_golongan); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </select>
                        	<?php if($errors->has('golongan_id')): ?>
                            	<span class="help-block">
                                	<strong><?php echo e($errors->first('golongan_id')); ?></strong>
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

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>