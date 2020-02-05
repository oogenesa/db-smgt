    <!-- .container>.row.mt-3>.col-md-6 -->
    <?php
    $age = intval(date('Y', time() - strtotime($data_anak['birth_date']))) - 1970;
    $color = 'color:#2f00ff;';
    if ($data_anak['gender'] == 'female') {
        $color = 'color:#ff4db2;';
    }
    ?>
    <div class="container-fluid">
        <div class="row ">
            <div class="card mb-3 col-lg-10" style="max-width: 720px;">
                <div class="row no-gutters ">
                    <div class="col-md-6">
                        <img id="myImg" src="<?= base_url('assets/img/profileasm/') . $data_anak['image']; ?>" class="card-img" alt="...">
                        <div class="row mt-3">
                            <i class="fas fa-<?= $data_anak['gender']; ?> fa-5x ml-4 " style="<?= $color; ?>"></i>
                            <h4 class="card-title ml-4 mt-3"><?= ucwords($data_anak['full_name']); ?></h4>
                        </div>
                        <h6 class="card-subtitle mb-3 mt-3 text-muted">Saya biasa di panggil <?= ucwords($data_anak['nick_name']); ?></h6>
                        <p class="card-text">Saya berumur : <?= $age; ?> tahun</p>
                        <p class="card-text">Golongan darah : <?= $data_anak['blood_type']; ?></p>
                        <p class="card-text">Tanggal Lahir <?= date('d F Y', strtotime($data_anak['birth_date'])); ?></p>


                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h7 class="card-text text-center">Alamat</h7>
                            <p class="card-text"><?= $data_anak['address']; ?></p>
                            <p class="card-text mt-2">Kegemaran saya <?= ucwords($data_anak['hobby']); ?></p>
                            <p class="card-text mt-2">Saya bersekolah di <?= ucwords($data_anak['school_name']); ?></p>
                            <h7 class="card-text text-center">Orang Tua</h7>
                            <p class="card-text"><?= ucwords($data_anak['father_name']);
                                                    ?> (<?= $data_anak['mother_contact']; ?>) bekerja sebagai <?= ucwords($data_anak['father_job']); ?></p>
                            <p class="card-text"><?= ucwords($data_anak['mother_name']); ?> (<?= $data_anak['father_contact']; ?>) bekerja sebagai <?= ucwords($data_anak['mother_job']); ?></p>

                            <h3 class="card-text mb-3 mt-3"><?= $data_anak['class_name']; ?></h3>
                            <p></p>
                            <h1></h1>
                            <p></p>
                            <h1></h1>
                            <a href="<?= base_url(); ?>database/asm" class="btn btn-primary float-bottom ">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-lg-4 col-md-6">
            <div class="row">
                <h5>Statistic Kehadiran</h5>
                <table class="table">
                    <thead>
                        <?php foreach ($kehadiran as $ked) : ?>
                            <th><?= date('d-m-Y', strtotime($ked['date_absensi'])) ?></th>
                        <?php endforeach; ?>
                    </thead>
                    <tbody>
                        <tr>
                            <?php foreach ($kehadiran as $ked) : ?>
                                <td>
                                    <?php if ($ked['kehadiran'] == 1) : ?>
                                        <h5> <span class="badge badge-success">Hadir</span></h5>
                                    <?php else : ?>
                                        <h5> <span class="badge badge-danger"><?= $ked['alasan']; ?></span></h5>
                                    <?php endif; ?>
                                </td>
                            <?php endforeach; ?>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>