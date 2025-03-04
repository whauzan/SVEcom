

<?php $__env->startSection('title'); ?>
    Detail - Sekolah Vokasi E-COM
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content page-details">
    <section
      class="store-breadcrumbs"
      data-aos="fade-down"
      data-aos-delay="100"
    >
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="/index.html">Home</a>
                </li>
                <li class="breadcrumb-item active">Product Details</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>

    <section class="store-gallery mb-3" id="gallery">
      <div class="container">
        <div class="row">
          <div class="col-lg-8" data-aos="zoom-in">
            <transition name="slide-fade" mode="out-in">
              <img
                :src="photos[activePhoto].url"
                :key="photos[activePhoto].id"
                class="w-100 main-image"
                alt=""
              />
            </transition>
          </div>
          <div class="col-lg-2">
            <div class="row">
              <div
                class="col-3 col-lg-12 mt-2 mt-lg-0"
                v-for="(photo, index) in photos"
                :key="photo.id"
                data-aos="zoom-in"
                data-aos-delay="100"
              >
                <a href="#" @click="changeActive(index)">
                  <img
                    :src="photo.url"
                    class="w-100 thumbnail-image"
                    :class="{ active: index == activePhoto }"
                    alt=""
                  />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="store-details-container" data-aos="fade-out">
      <section class="store-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <h1><?php echo e($product->name); ?></h1>
              <div class="owner">By 
                <a href="<?php echo e(route('profile', $product->user->id)); ?>"><?php echo e($product->user->store_name); ?></a> 
              
              </div>
              <div class="price">Rp. <?php echo e(number_format($product->price)); ?></div>
            </div>
            <div class="col-lg-2" data-aos="zoom-in">
              <?php if(auth()->guard()->check()): ?>
              <form action="<?php echo e(route('detail-add', $product->id )); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <button
                  type="submit"
                  class="btn btn-success px-4 text-white btn-block mb-3"
                >
                  Add to Cart
                </button>
              </form>
                
              <?php else: ?> 
                <a href="<?php echo e(route('login')); ?>" class="btn btn-success px-4 text-white btn-block mb-3">
                  Sign In untuk membeli
                </a>
              <?php endif; ?>
              
            </div>
          </div>
        </div>
      </section>

      <section class="store-description">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-8">
              <p>
                <?php echo $product->description; ?>

              </p>
            </div>
          </div>
        </div>
      </section>

      <section class="store-review">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-8 mb-3 mt-3">
              <h5>Customer Review (3)</h5>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-lg-8">
              <ul class="list-unstyled">
                <li class="media">
                  <img
                    src="/images/icons-testimonial-1.png"
                    class="mr-3 rounded-circle"
                    alt=""
                  />
                  <div class="media-body">
                    <h5 class="mt-2 mb-1">Fulan</h5>
                    Hello guys, aku beli kursi ini bagus banget pas duduk
                    rasanya sampe mau meninggal. mantap banget susah rusak
                    dinjek dibakar juga ga rusak
                  </div>
                </li>
                <li class="media">
                  <img
                    src="/images/icons-testimonial-2.png"
                    class="mr-3 rounded-circle"
                    alt=""
                  />
                  <div class="media-body">
                    <h5 class="mt-2 mb-1">akhirusalam</h5>
                    Hello guys, aku beli kursi ini bagus banget pas duduk
                    rasanya sampe mau meninggal.
                  </div>
                </li>
                <li class="media">
                  <img
                    src="/images/icons-testimonial-3.png"
                    class="mr-3 rounded-circle"
                    alt=""
                  />
                  <div class="media-body">
                    <h5 class="mt-2 mb-1">Uwowuwuwuw</h5>
                    Hello guys, aku beli kursi ini bagus banget pas duduk
                    rasanya sampe mau meninggal.
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('addon-script'); ?>
<script src="/vendor/vue/vue.js"></script>
<script>
  var gallery = new Vue({
    el: "#gallery",
    mounted() {
      AOS.init();
    },
    data: {
      activePhoto: 0,
      photos: [
        <?php $__currentLoopData = $product->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          {
            id: <?php echo e($gallery->id); ?>,
            url: "<?php echo e(Storage::url($gallery->photos)); ?>",
          },
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      ],
    },
    methods: {
      changeActive(id) {
        this.activePhoto = id;
      },
    },
  });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecomsvkmm\resources\views/pages/detail.blade.php ENDPATH**/ ?>