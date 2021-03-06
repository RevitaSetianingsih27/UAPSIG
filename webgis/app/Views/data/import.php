<?php
$csv = [
    'name'=>'csv',
    'id' =>'csv'
];

$nama = [
    'name' => 'nama',
    'id' => 'nama',
    'class' => 'form-control',
    'value' => null,
];

$submit = [
    'name' =>'submit',
    'id' => 'submit',
    'value' => 'Submit',
    'class' => 'btn btn-primary',
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
                <h4 class="card-title">Tambah Data</h4>
                <p class="card-category">Menu Tambah Data</p>
            </div>
            <div class="card-body">
                <?= form_open_multipart('Data/import') ?>
                    <div class="form-group">
                        <?= form_label("Nama Data", "nama") ?>
                        <?= form_input($nama) ?>
                    </div>
                    <?= form_upload($csv) ?>
                    <?= form_submit($submit) ?>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>