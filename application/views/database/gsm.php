<!-- Begin Page Content -->
<div class="container-fluid">
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row-mt-3">
            <div class="col-lg-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Guru <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif ?>
    <div class="row mt-3">
        <div class="col md-6">
            <a href="<?= base_url(); ?>database/tambahgsm" class="btn btn-primary">Tambah Data Guru</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-6">
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Data Guru Sekolah Minggu.." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <h3>Daftar Guru</h3>
            <?php if (empty($data_guru)) : ?>
                <div class="alert alert-danger" role="alert">Data Guru tidak ditemukan</div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <?php foreach ($data_guru as $dg) : ?>
            <div class="col-lg-4 col-md-6 mb-1">
                <div class="card text-center text-white bg-warning">
                    <div class="card-body">
                        <img src="<?= base_url('assets/img/profilegsm/') .  $dg['image']; ?>" class="card-img-top rounded-circle" alt="..." style="max-height:200px;max-width:200px;vertical-align: middle;">
                        <h3 class="card-title mt-2">Kak <?= ucwords($dg['nick_name']); ?></h3>
                        <h5 class="card-text"><?= $dg['priority_class'] ?></h5>
                        <i class="fad fa-user-tie " <?php if ($dg['sermon'] == 1) {
                                                            echo 'style="color:#ff4db2;"';
                                                        } ?>data-toggle="tooltip" data-placement="bottom" title="Pelayan Firman"></i>
                        <i class="fad fa-user-music " <?php if ($dg['worship_leader'] == 1) {
                                                                echo 'style="color:#ff4db2;"';
                                                            } ?> data-toggle="tooltip" data-placement="bottom" title="Liturgis"></i>
                        <i class="fad fa-user-plus " <?php if ($dg['assistant'] == 1) {
                                                                echo 'style="color:#ff4db2;"';
                                                            } ?> data-toggle="tooltip" data-placement="bottom" title="Pendamping"></i>
                        <i class="fas fa-guitar " <?php if ($dg['guitar'] == 1) {
                                                            echo 'style="color:#ff4db2;"';
                                                        } ?> data-toggle="tooltip" data-placement="bottom" title="Gitaris"></i>
                        <i class="fas fa-piano " <?php if ($dg['keyboard'] == 1) {
                                                            echo 'style="color:#ff4db2;"';
                                                        } ?>data-toggle="tooltip" data-placement="bottom" title="Keyboardis"></i>
                        <i class="fas fa-drum  active" <?php if ($dg['cajon'] == 1) {
                                                                echo 'style="color:#ff4db2;"';
                                                            } ?> data-toggle="tooltip" data-placement="bottom" title="Cajonis"></i>
                        <div class="d-flex flex-row justify-content-center mt-1">
                            <a href="<?= base_url(); ?>database/detailgsm/<?= $dg['id_guru']; ?>" class="badge badge-primary float-right ml-1 ">detail</a>
                            <a href="<?= base_url(); ?>database/ubahgsm/<?= $dg['id_guru']; ?>" class="badge badge-success float-right ml-1 ">ubah</a></li>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
<!-- End of Main Content -->