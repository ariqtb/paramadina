<?php $session = \Config\Services::session();
use App\Models\Dasbor_model;

$m_dasbor = new Dasbor_model();
?>
<div class="alert alert-info">
	<h4>Welcome To Admin Paramadina Bogor Homeschooling <em class="text-warning"><?= $session->get('nama') ?></em></h4>
	<hr>
	<p>Terwujudnya Generasi Muda Yang Berwawasan Global, Berkarakter dan Terus Tumbuh Menjadi Pembelajar Sepanjang Hayat</p>
</div>

 <!-- Info boxes -->
<div class="row">
  <div class="col-12 col-sm-6 col-md-3">
    <a href="<?= base_url('admin/pendaftar') ?>">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Registrant</span>
            <span class="info-box-number">
              <?php print_r($pendaftar) ?>
              <!-- <small>Registrant</small> -->
            </span>
          </div>
        <!-- /.info-box-content -->
      </div>
      </a>
    <!-- /.info-box -->
  </div>
  <!-- /Galeri -->
  <div class="col-12 col-sm-6 col-md-3">
    <a href="<?= base_url('admin/galeri') ?>">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-images"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Gallery</span>
            <span class="info-box-number">
              <?= $galeri ?>
              <!-- <small>Konten</small> -->
            </span>
          </div>
        <!-- /.info-box-content -->
      </div>
    </a>
    <!-- /.info-box -->
  </div>
  <!-- /Youtube -->
  <div class="col-12 col-sm-6 col-md-3">
    <a href="<?= base_url('admin/guru') ?>">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-chalkboard-teacher"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Teacher</span>
              <span class="info-box-number"><?= $guru ?></span>
            </div>
          <!-- /.info-box-content -->
        </div>
      </a>
    <!-- /.info-box -->
  </div>
  <!-- /Pesan Iklan -->
  <div class="col-12 col-sm-6 col-md-3">
    <a href="<?= base_url('admin/artikel') ?>">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-newspaper"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Article</span>
            <span class="info-box-number"><?= $artikel ?></span>
          </div>
        <!-- /.info-box-content -->
      </div>
    </a>
    <!-- /.info-box -->
  </div>
</div>
<div class="row">
  <!-- /Bintang Radio -->
  <div class="col-12 col-sm-6 col-md-3">
    <a href="<?= base_url('admin/testimoni') ?>">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-comments"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Testimonial</span>
            <span class="info-box-number"><?= $testimoni ?></span>
          </div>
        <!-- /.info-box-content -->
      </div>
    </a>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <!-- /PTQ -->
  <div class="col-12 col-sm-6 col-md-3">
    <a href="<?= base_url('admin/program') ?>">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-school"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Program</span>
            <span class="info-box-number"><?= $program ?></span>
          </div>
        <!-- /.info-box-content -->
      </div>
    </a>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix hidden-md-up"></div>
  <!-- /Client -->


</div>
<!-- /.row -->

<div class="row">
  <!-- /Pengguna Website -->

  <!-- /.col -->
  <!-- /Setting Website -->
  <div class="col-12 col-sm-6 col-md-3">
    <a href="<?= base_url('admin/konfigurasi') ?>">
      <div class="info-box mb-3">
          <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-wrench"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Settings</span>
            </div>
        </div>
    </a>
      <!-- /.info-box-content -->
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <!-- /.col -->
  <!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix hidden-md-up"></div>

</div>
<!-- /.row -->