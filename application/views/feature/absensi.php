<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col md-6">
            <a href="<?= base_url(); ?>feature/tambahabsensi" class="btn btn-primary">Buat Absensi Baru</a>
        </div>
    </div>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 mt-2"><?= $title; ?></h1>
    <form action="" method="post" id="class_masukan">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="class_name_param">Kelas</label>
                <select name="class_name_param" id="class_name_param" class="form-control">
                    <option value="Anak Indria" <?php if ($class_name == 'Anak Indria') {
                                                    echo 'selected';
                                                } ?>>Anak Indria</option>
                    <option value="Anak Kecil" <?php if ($class_name == 'Anak Kecil') {
                                                    echo 'selected';
                                                } ?>>Anak Kecil</option>
                    <option value="Anak Besar" <?php if ($class_name == 'Anak Besar') {
                                                    echo 'selected';
                                                } ?>>Anak Besar</option>
                    <option value="Anak Remaja" <?php if ($class_name == 'Anak Remaja') {
                                                    echo 'selected';
                                                } ?>>Anak Remaja</option>
                </select>
                <!-- <input type="text" id="coba3"> -->
            </div>
            <div class="form-group col-md-4">
                <label for="date_absensi_param">Tanggal</label>
                <div>
                    <input class="form-control" type="date" value="<?= $date_absensi ?>" id="date_absensi_param" name="date_absensi_param">
                    <small class="form-text text-danger"><?= form_error('date_absensi_param'); ?> </small>
                </div>
                <button type="submit" name="find_absensi" id="find_absensi" value="find_absensi" class="btn btn-primary float-right">Cari Absensi</button>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-md-10">
            <h3 id="juduls">Absensi ASM</h3>
            <?php if (empty($absensi)) : ?>
                <div class="alert alert-danger" role="alert">Data Absensi Tidak ditemukan</div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Kegiatan</th>
                        <th>Kehadiran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($absensi as $da) : ?>
                        <tr>
                            <td onclick="location.href='<?= base_url('database/detailasm/') . $da['id_anak']; ?>'" style="cursor:pointer">
                                <img src="<?= base_url('assets/img/profileasm/') .  $da['image']; ?>" class="card-img-top rounded-circle" alt="..." style="max-height:50px;max-width:50px;vertical-align: middle;">

                            </td>
                            <th onclick="location.href='<?= base_url('database/detailasm/') . $da['id_anak']; ?>'" style="cursor:pointer"><?= $da['full_name']; ?></th>
                            <th onclick="location.href='<?= base_url('database/detailasm/') . $da['id_anak']; ?>'" style="cursor:pointer"><?= $da['kegiatan']; ?></th>
                            <td>
                                <?php if ($da['kehadiran'] == 1) : ?>
                                    <h5> <span class="badge badge-success">Hadir</span></h5>
                                <?php else : ?>
                                    <h5> <span class="badge badge-danger"><?= $da['alasan']; ?></span></h5>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->