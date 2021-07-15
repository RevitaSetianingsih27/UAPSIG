<?php
$nama = [
    'name' => 'nama',
    'id' => 'nama',
    'class' => 'form-control',
    'value' => $namaData,
    'disabled' => TRUE
];
$kode_wilayah = [
    'name' => 'kode_wilayah',
    'id' => 'kode_wilayah',
    'class' => 'form-control',
    'value' => $kode_wilayahData,
    'disabled' => TRUE
];
$nilai = [
    'name' => 'nilai',
    'id' => 'nilai',
    'class' => 'form-control',
    'value' => $nilaiData,
];
$submit = [
    'name' => 'submit',
    'id' => 'submit',
    'value' => 'submit',
    'class'=> 'btn btn-primary',
    'type' => 'submit'
];
?>
<?= $this->extend('layout')?>

<?= $this->section('sidebar') ?>
<div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('maps/index') ?>">
              <i class="material-icons">dashboard</i>
              <p>Maps</p>
            </a>
          </li>
          <!-- your sidebar here -->
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('KodeWilayah/index') ?>">
              <i class="material-icons">bubble_chart</i>
              <p>Kode Wilayah</p>
            </a>
          </li>

          <li class="nav-item active">
            <a class="nav-link " href="<?= site_url('Data/index') ?>">
              <i class="material-icons">bar_chart</i>
              <p>Data</p>
            </a>
          </li>
        </ul>
      </div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Data</h4>
                <p class="card-category">Menu Edit Data</p>
            </div>
            <div class="card-body">
                <?= form_open('Data/update/'. $id); ?>
                    <div class="form-group">
                        <?= form_label("Nama Data", "nama") ?>
                        <?= form_input($nama) ?>
                    </div>
                    <div class="form-group">
                        <?= form_label("Kode Wilayah", "kode_wilayah") ?>
                        <br>
                        <?= form_label($kode_wilayah['value']) ?>
                <?= form_hidden('kode_wilayah',$kode_wilayah['value']) ?>
                    </div>
                    <div class="form-group">
                        <?= form_label("Nilai Data", "nilai") ?>
                        <?= form_input($nilai) ?>
                    </div>
                    <?= form_submit($submit) ?>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>