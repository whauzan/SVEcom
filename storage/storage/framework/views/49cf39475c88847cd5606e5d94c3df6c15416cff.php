

<?php $__env->startSection('title'); ?>
    Transaksi-Sekolah Vokasi E-COM
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
    >
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Admin Dashboard - Transaksi</h2>
            <p class="dashboard-subtitle">Edit Transaksi</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo e(route('withdraw.update', $item->id)); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo method_field('PUT'); ?>
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Kode Transaksi</label>
                                            <input type="text" name="name" class="form-control" value="<?php echo e($item->transaction_details_id); ?>" required disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Total Penarikan </label>
                                            <input type="number" name="total_withdraw" class="form-control" value="<?php echo e($item->total_withdraw); ?>" required disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nomor Rekening</label>
                                            <input type="text" name="rekening" class="form-control" value="<?php echo e($item->rekening); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Bank Tujuan</label>
                                            <select name="status" class="form-control">
                                                <option value="<?php echo e($item->bank); ?>" selected><?php echo e($item->bank); ?></option>
                                                    <option value="" disabled>--------------------</option>
                                                    <option value="BRI">BRI</option>
                                                    <option value="MANDIRI">MANDIRI</option>
                                                    <option value="BNI">BNI</option>
                                                    <option value="BTN">BTN</option>
                                                    <option value="BCA">BCA</option>
                                                    <option value="BSI">BSI</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Status Penarikan</label>
                                            <select name="status" class="form-control">
                                                <option value="<?php echo e($item->status); ?>" selected><?php echo e($item->status); ?></option>
                                                    <option value="" disabled>--------------------</option>
                                                    <option value="PENDING">PENDING</option>
                                                    <option value="PROCESS">PROCESS</option>
                                                    <option value="SUCCESS">SUCCESS</option>
                                                    <option value="CANCELLED">CANCELLED</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success px-5">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('addon-script'); ?>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector("#editor"))
          .then((editor) => {
            console.log(editor);
          })
          .catch((error) => {
            console.error(error);
          });
      </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecomsvkmm\resources\views/pages/admin/withdraw/edit.blade.php ENDPATH**/ ?>