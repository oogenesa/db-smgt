<!-- Begin Page Content -->

<div class="container-fluid mt-4 ">

    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row-mt-3">
            <div class="col-lg-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Anak <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif ?>
    <div class="row mt-3">
        <div class="col md-6">
            <a href="<?= base_url(); ?>database/tambahasm" class="btn btn-primary">Tambah Data Anak</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-6">
            <form action="" method="post" id="pencarian">
                <div class="input-group mb-3">
                    <input id="cari-data" type="text" class="form-control" placeholder="Cari Data Anak Sekolah Minggu.." name="keyword">
                    <div class="input-group-append ">
                        <input class="btn btn-primary" type="submit" value="Cari">
                    </div>
                    <!-- <input type="text" id="coba3"> -->
                </div>
            </form>
            <!-- <form id="coba">
                <input type="submit" value="coba" class="btn btn-primary">
            </form> -->
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-4">
            <form action="" method="post" id="class_masukan">
                <label for="class_name_param">Kelas</label>
                <select name="class_name_param" id="class_name_param" class="form-control">
                    <option value="">Semua</option>
                    <option value="Anak Indria" <?php if ($data_anak[0]['class_name'] == 'Anak Indria') {
                                                    echo 'selected';
                                                } ?>>Anak Indria</option>
                    <option value="Anak Kecil" <?php if ($data_anak[0]['class_name'] == 'Anak Kecil') {
                                                    echo 'selected';
                                                } ?>>Anak Kecil</option>
                    <option value="Anak Besar" <?php if ($data_anak[0]['class_name'] == 'Anak Besar') {
                                                    echo 'selected';
                                                } ?>>Anak Besar</option>
                    <option value="Anak Remaja" <?php if ($data_anak[0]['class_name'] == 'Anak Remaja') {
                                                    echo 'selected';
                                                } ?>>Anak Remaja</option>
                </select>
                <!-- <input type="text" id="coba3"> -->
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3 id="juduls">Database ASM</h3>
            <?php if (empty($data_anak)) : ?>
                <div class="alert alert-danger" role="alert">Data Anak tidak ditemukan</div>
            <?php endif; ?>
            <div class="row">
                <?php foreach ($data_anak as $da) : ?>
                    <div class="col-lg-3 col-md-6 mb-1">
                        <div class="card text-center text-white bg-warning">
                            <div class="card-body">
                                <img src="<?= base_url('assets/img/profileasm/') .  $da['image']; ?>" class="card-img-top rounded-circle" alt="..." style="max-height:125px;max-width:125px;vertical-align: middle;">
                                <h5 class="card-title mt-2"><?= ucwords($da['nick_name']); ?></h5>
                                <h7 class="card-title mt-2"><?= ucwords($da['full_name']); ?></h7>
                                <div class="d-flex flex-row justify-content-center mt-1">
                                    <a href="<?= base_url(); ?>database/detailasm/<?= $da['id']; ?>" class="badge badge-primary float-right ml-1 ">detail</a>
                                    <a href="<?= base_url(); ?>database/ubahasm/<?= $da['id']; ?>" class="badge badge-success float-right ml-1 ">ubah</a></li>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- <table class="table" style="font-size : 12px">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_anak as $da) : ?>
                        <tr>
                            <th><?= $da['full_name']; ?></th>
                            <td><?= $da['class_name']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>database/detailasm/<?= $da['id']; ?>" class="badge badge-primary float-left mr-1 ">detail</a>
                                <a href="<?= base_url(); ?>database/ubahasm/<?= $da['id']; ?>" class="badge badge-success float-left mr-1 ">ubah</a></li>
                                <a href="<?= base_url(); ?>database/hapusasm/<?= $da['id']; ?>" class="badge badge-danger float-left" onclick="return  confirm('yakin?');">hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table> -->


        </div>
    </div>
</div>

<script>
    $('#class_name_param').on('change', function() {
        console.log('get class');
        $("#class_masukan").submit();
    })
    var val = true;
    $('#coba').submit(function(e) {
        e.preventDefault();
        val = !val;
        if (!val) {
            var text = "database"
        } else {
            var text = "data"
        }
        $('#juduls').text(text)

    })

    $('#coba3').on('change', function(e) {
        e.preventDefault();
        console.log(e.target.value)
        $('#juduls').text(e.target.value)
    })

    // $(document).ready(function() {
    //     $('#table1').DataTable({
    //         "scrollY": "500px",
    //         "scrollX": "500px",
    //         "scrollCollapse": true,
    //         "paging": false
    //     });
    // });
</script>
<!-- End of Main Content -->