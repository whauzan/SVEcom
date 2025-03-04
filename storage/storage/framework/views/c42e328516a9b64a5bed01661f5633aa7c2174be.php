

<?php $__env->startSection('title'); ?>
    Dashboard Account-Sekolah Vokasi E-COM
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">My Account</h2>
                <p class="dashboard-subtitle">Update yout current profile</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form action="<?php echo e(route('dashboard-setting-redirect', 'dashboard-setting-account')); ?>" id="locations" method="POST" enctype="multipart/form-data" >
                      <?php echo csrf_field(); ?>
                      <div class="card">
                        <div class="card-body">
                          <div class="row mb-2">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="name">Nama</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  name="name"
                                  id="name"
                                  value="<?php echo e($user->name); ?>"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="email">E-mail</label>
                                <input
                                  type="email"
                                  class="form-control"
                                  name="email"
                                  id="email"
                                  value="<?php echo e($user->email); ?>"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="address_one">Alamat</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  name="address_one"
                                  id="address_one"
                                  value="<?php echo e($user->address_one); ?>"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="address_two">Alamat Detail</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  name="address_two"
                                  id="address_two"
                                  value="<?php echo e($user->address_two); ?>"
                                />
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="provinces_id">Provinsi </label>
                                <select name="provinces_id" id="provinces_id" class="form-control" v-if="provinces" v-model="provinces_id" >
                                  <option v-for="province in provinces" :value="province.id"> {{ province.name }} </option>
                                </select>
                                <select v-else class="form-control"></select>
                              </div> 
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="regencies_id">Kota </label>
                                <select name="regencies_id" id="regencies_id" class="form-control" v-if="regencies" v-model="regencies_id" >
                                  <option v-for="regency in regencies" :value="regency.id"> {{ regency.name }} </option>
                                </select>
                                <select v-else class="form-control"></select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="zip_code">Kode POS</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  name="zip_code"
                                  id="zip_code"
                                  value=" <?php echo e($user->zip_code); ?>"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="country">Negara</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  name="country"
                                  id="country"
                                  value="<?php echo e($user->country); ?>"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="phone_number">Nomor Telpon</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  name="phone_number"
                                  id="phone_number"
                                  value="<?php echo e($user->phone_number); ?>"
                                />
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

<?php $__env->stopSection(); ?>

<?php $__env->startPush('addon-script'); ?>
<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
  var locations = new Vue({
    el: "#locations",
    mounted() {
      AOS.init();
      this.getProvincesData();
    },
    data: {
      provinces: null,
      regencies: null,
      provinces_id: null,
      regencies_id: null,
    },
    methods: {
      getProvincesData() {
        var self = this;
        axios.get('<?php echo e(route('api-provinces')); ?>')
          .then(function(response){
              self.provinces = response.data;
          })
      },

      getRegenciesData() {
        var self = this;
        axios.get('<?php echo e(url('api/regencies')); ?>/' + self.provinces_id)
          .then(function(response){
              self.regencies = response.data;
          })
      },
    },
    watch: {
      provinces_id: function(val, oldVal) {
        this.regencies_id = null;
        this.getRegenciesData();
      }
    }

  });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecomsvkmm\resources\views/pages/dashboard-account.blade.php ENDPATH**/ ?>