<?php $__env->startSection('kategori'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo Form::open(['url' => 'lemburpegawai']); ?>

<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">Tambah Lembur Pegawai</div>
        <div class="panel-body">

                <div class="form-group">
                <div class="form-group <?php echo e($errors->has('kode_lembur_id') ? 'has-errors':'message'); ?>" >
                        <label for="kode_lembur_id" class="control-label">Kode Lembur ID :</label>
                                <select name="kode_lembur_id" class="form-control">
                                    <option value="">pilih</option>
                                    <?php $__currentLoopData = $kategorilembur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategorilemburs): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($kategorilemburs->id); ?>"><?php echo e($kategorilemburs->kode_lembur); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </select>
                                <?php if($errors->has('kode_lembur_id')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('kode_lembur_id')); ?></strong>
                                    </span>
                                <?php endif; ?>
                </div>
                </div>

                <div class="form-group">
                <div class="form-group <?php echo e($errors->has('pegawai_id') ? 'has-errors':'message'); ?>" >
                <label for="pegawai_id" class="control-label">Pegawai ID :</label>
                                <select name="pegawai_id" class="form-control">
                                    <option value="">pilih</option>
                                    <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pegawais): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($pegawais->id); ?>"><?php echo e($pegawais->nip); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </select>
                        <?php if($errors->has('pegawai_id')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('pegawai_id')); ?></strong>
                            </span>
                        <?php endif; ?>
                       
                </div>
                </div>

                <div class="form-group">
                <div class="form-group <?php echo e($errors->has('jumlah_jam') ? 'has-errors':'message'); ?>" >
                    <?php echo Form::label('Jumlah Jam', 'Jumlah Jam :'); ?>

                    <?php echo Form::text('jumlah_jam',null,['class'=>'form-control']); ?>

                    <?php if($errors->has('jumlah_jam')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('jumlah_jam')); ?></strong>
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
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>