<?= $this->extend('layout') ?>

<?= $this->section('head') ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<?= $this->endSection() ?>

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
                <h4 class="card-title">Data</h4>
                <p class="card-category">Menu Data</p>
            </div>
            <div class="card-body">
                <a href="<?= site_url('Data/import') ?>" class="btn btn-primary">Tambah Data</a>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="text-primary">
                            <tr>
                                <th>No.</th>
                                <th>Nama Data</th>
                                <th>Kode Wilayah</th>
                                <th>Nilai Data</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data->getResult() as $key=>$value): ?>
                            <tr>
                                <td> <?= $key+1 ?>.</td>
                                <td> <?= $value->nama ?> </td>
                                <td> <?= $value->kode_wilayah ?> </td>
                                <td> <?= $value->nilai ?> </td>
                                <td>
                                    <a href="<?= site_url('Data/edit/'.$value->kode_wilayah); ?>"><button class="btn btn-success"><i class="fas fa-edit"></i> Edit </button>
                                    <a href="<?= site_url('Data/hapus/'.$value->kode_wilayah); ?>"style="color:white"><button class="btn btn-danger"><i class="fas fa-trash"></i> Hapus </a>
                                </td>
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