<?php $__env->startSection('kategori'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo Form::open(['url' => 'tunjanganpegawai']); ?>

<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">Tambah Tunjangan Pegawai</div>
        <div class="panel-body">

                <div class="form-group">
                <div class="form-group <?php echo e($errors->has('kode_tunjangan_id') ? 'has-errors':'message'); ?>" >
                        <label for="kode_tunjangan_id" class="control-label">Kode Tunjangan :</label>
                                <select name="kode_tunjangan_id" class="form-control">
                                    <option value="">Pilih</option>
                                    <?php $__currentLoopData = $tunjangan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tunjangans): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($tunjangans->id); ?>"><?php echo e($tunjangans->kode_tunjangan); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </select>
                                <?php if($errors->has('kode_tunjangan_id')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('kode_tunjangan_id')); ?></strong>
                                    </span>
                                <?php endif; ?>
                </div>
                </div>

                <div class="form-group">
                <div class="form-group <?php echo e($errors->has('pegawai_id') ? 'has-errors':'message'); ?>" >
                <label for="pegawai_id" class="control-label">Nama Pegawai :</label>
                                <select name="pegawai_id" class="form-control">
                                    <option value="">Pilih</option>
                                    <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pegawais): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($pegawais->id); ?>"><?php echo e($pegawais->User->name); ?></option>
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