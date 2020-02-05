    <!-- .container>.row.mt-3>.col-md-6 -->
    <?php
    $age = intval(date('Y', time() - strtotime($data_guru['birth_date']))) - 1970;
    $color = 'color:#2f00ff;';
    if ($data_guru['gender'] == 'female') {
        $color = 'color:#ff4db2;';
    }
    ?>
    <div class="container-fluid">
        <div class="row ">
            <div class="card mb-3 col-lg-10" style="max-width: 720px;">
                <div class="row no-gutters ">
                    <div class="col-md-6">
                        <img src="<?= base_url('assets/img/profilegsm/') . $data_guru['image']; ?>" class="card-img" alt="...">
                        <div class="row mt-3">
                            <i class="fas fa-<?= $data_guru['gender']; ?> fa-5x ml-4 " style="<?= $color; ?>"></i>
                            <h4 class="card-title ml-4 mt-3"><?= ucwords($data_guru['full_name']); ?></h4>
                        </div>
                        <h6 class="card-subtitle mb-3 mt-3 text-muted">Kak <?= ucwords($data_guru['nick_name']); ?></h6>
                        <p class="card-text">Umur : <?= $age; ?> tahun</p>
                        <p class="card-text">Golongan darah : <?= $data_guru['blood_type']; ?></p>
                        <p class="card-text">Tanggal Lahir <?= date('d F Y', strtotime($data_guru['birth_date'])); ?></p>


                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h7 class="card-text">Alamat</h7>
                            <p class="card-text"><?= $data_guru['address']; ?></p>
                            <h7 class="card-text">Tempat Kerja/Sekolah/Kampus</h7>
                            <p class="card-text"><?= $data_guru['work_place']; ?></p>
                            <p class="card-text">GSM sejak <?= date('M-Y', strtotime($data_guru['join_date'])); ?></p>
                            <p class="card-text">Media Sosial <?= $data_guru['socmed']; ?></p>

                            <p class="card-text">Pelayanan</p>
                            <i class="fad fa-user-tie fa-2x" <?php if ($data_guru['sermon'] == 1) {
                                                                    echo 'style="color:#ff4db2;"';
                                                                } ?>data-toggle="tooltip" data-placement="bottom" title="Pelayan Firman"></i>
                            <i class="fad fa-user-music fa-2x" <?php if ($data_guru['worship_leader'] == 1) {
                                                                    echo 'style="color:#ff4db2;"';
                                                                } ?> data-toggle="tooltip" data-placement="bottom" title="Liturgis"></i>
                            <i class="fad fa-user-plus fa-2x" <?php if ($data_guru['assistant'] == 1) {
                                                                    echo 'style="color:#ff4db2;"';
                                                                } ?> data-toggle="tooltip" data-placement="bottom" title="Pendamping"></i>
                            <i class="fas fa-guitar fa-2x" <?php if ($data_guru['guitar'] == 1) {
                                                                echo 'style="color:#ff4db2;"';
                                                            } ?> data-toggle="tooltip" data-placement="bottom" title="Gitaris"></i>
                            <i class="fas fa-piano fa-2x" <?php if ($data_guru['keyboard'] == 1) {
                                                                echo 'style="color:#ff4db2;"';
                                                            } ?>data-toggle="tooltip" data-placement="bottom" title="Keyboardis"></i>
                            <i class="fas fa-drum fa-2x active" <?php if ($data_guru['cajon'] == 1) {
                                                                    echo 'style="color:#ff4db2;"';
                                                                } ?> data-toggle="tooltip" data-placement="bottom" title="Cajonis"></i>

                            <p class="card-text mb-3 mt-3">Tahap Pembinaan: <?= $data_guru['certification_level']; ?></p>
                            <h3 class="card-text mb-3 mt-3"><?= $data_guru['priority_class']; ?></h3>
                            <p></p>
                            <h1></h1>
                            <p></p>
                            <h1></h1>
                            <a href="<?= base_url(); ?>database/gsm" class="btn btn-primary float-bottom ">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>