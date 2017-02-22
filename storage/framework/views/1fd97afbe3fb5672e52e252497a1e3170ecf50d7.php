<?php $__env->startSection('content'); ?>
    <?php echo Form::open(['url' => 'golongan']); ?>




    <div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">Tambah Golongan</div>
        <div class="panel-body">
                    
    <div class="form-group">
     <div class="form-group <?php echo e($errors->has('kode_golongan') ? 'has-errors':'message'); ?>" >
        <?php echo Form::label('Kode Golongan', 'Kode Golongan:'); ?>

        <?php echo Form::text('kode_golongan',null,['class'=>'form-control']); ?>

         <?php if($errors->has('kode_golongan')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('kode_golongan')); ?></strong>
        </span>
        <?php endif; ?>
    </div>
    </div>
    <div class="form-group">
         <div class="form-group <?php echo e($errors->has('nama_golongan') ? 'has-errors':'message'); ?>" >

        <?php echo Form::label('Nama Golongan', 'Nama Golongan:'); ?>

        <?php echo Form::text('nama_golongan',null,['class'=>'form-control']); ?>

         <?php if($errors->has('nama_golongan')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('nama_golongan')); ?></strong>
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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>