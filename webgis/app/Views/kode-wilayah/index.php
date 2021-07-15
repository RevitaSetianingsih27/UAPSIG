<?= $this->extend('layout') ?>

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
          <li class="nav-item active">
            <a class="nav-link" href="<?= site_url('KodeWilayah/index') ?>">
              <i class="material-icons">bubble_chart</i>
              <p>Kode Wilayah</p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('Data/index') ?>">
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
                <h4 class="card-title">Kode Wilayah</h4>
                <p class="card-category">Menu Kode Wilayah</p>
            </div>
            <div class="card-body">
                <a href="<?= site_url('KodeWilayah/import') ?>" class="btn btn-primary">Tambah Data</a>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="text-primary">
                            <tr>
                                <th>No.</th>
                                <th>Kode Wilayah</th>
                                <th>Nama Wilayah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($kodeWilayah as $key=>$value): ?>
                            <tr>
                                <td><?= $key+1 ?>.</td>
                                <td><?= $value->kode_wilayah ?></td>
                                <td><?= $value->nama_wilayah ?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>