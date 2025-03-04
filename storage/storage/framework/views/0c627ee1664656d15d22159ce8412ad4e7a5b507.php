

<?php $__env->startSection('title'); ?>
    Dashboard Setting-Sekolah Vokasi E-COM
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
>
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Store Setting</h2>
            <p class="dashboard-subtitle">Look what you have made today!</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
              <div class="col-12">
                <form action="<?php echo e(route('dashboard-setting-redirect', 'dashboard-setting-store')); ?>" method="POST" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Nama Toko</label>
                            <input type="text" class="form-control" name="store_name" value="<?php echo e($user->store_name); ?>"/>
                          </div>
                        </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Kategori</label>
                                  <select name="categories_id" class="form-control">
                                    <option value="<?php echo e($user->categories_id); ?>">Tidak Ganti</option>
                                      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Deskripsi Toko</label>
                                <textarea
                                  name=""
                                  id=""
                                  class="form-control"
                                ></textarea>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Toko</label>
                                <p class="text-muted">
                                  Apakah anda juga ingin membuka Toko dan
                                  memulai berjualan?
                                </p>
                                <div
                                  class="custom-control custom-radio custom-control-inline"
                                >
                                  <input
                                    type="radio"
                                    class="custom-control-input"
                                    name="store_status"
                                    id="openStoreTrue"
                                    value="1"
                                    <?php echo e($user->store_status == 1 ? 'checked' : ''); ?>

                                  />
                                  <label
                                    for="openStoreTrue"
                                    class="custom-control-label"
                                  >
                                    Buka
                                  </label>
                                </div>
                                <div
                                  class="custom-control custom-radio custom-control-inline"
                                >
                                  <input
                                    type="radio"
                                    class="custom-control-input"
                                    name="store_status"
                                    id="openStoreFalse"
                                    value="0"
                                    <?php echo e($user->store_status == 0 || $user->store_status == NULL ? 'checked' : ''); ?>

                                  />
                                  <label
                                    for="openStoreFalse"
                                    class="custom-control-label"
                                  >
                                    Tutup Sementara
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col text-right">
                              <button
                                type="submit"
                                class="btn btn-success px-5"
                              >
                                Simpan
                              </button>
                            </div>
                          </div>
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
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecomsvkmm\resources\views/pages/dashboard-settings.blade.php ENDPATH**/ ?>