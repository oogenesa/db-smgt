<!-- Begin Page Content -->
<?php
function getAge($date)
{
    $range  = date_parse($date);
    $tes = strtotime($date);
    $datebirthday = date('m-d', $tes);
    $datenow = date('m-d');

    if (($datebirthday == $datenow)) {
        return intval(date('Y', time() - strtotime($date))) - 1970;
    } else {
        return ((intval(date('Y', time() - strtotime($date))) - 1970) + 1);
    }
}
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <h3 class="h3 mb-4 text-gray-800">Anak Sekolah Minggu</h3>
    <div class="row">
        <?php if (empty($birthday_asm)) : ?>
            <div class="alert alert-danger" role="alert">Tidak ada ASM ulang tahun untuk seminggu ke depan</div>
        <?php endif; ?>
        <?php foreach ($birthday_asm as $ba) : ?>
            <div class="col-lg-4 col-md-6 mb-1">
                <div class="card text-center text-white bg-info">
                    <div class="card-body">
                        <img src="<?= base_url('assets/img/profileasm/') .  $ba['image']; ?>" class="card-img-top rounded-circle" alt="..." style="max-height:200px;max-width:200px;vertical-align: middle;">
                        <h3 class="card-title mt-2"><?= ucwords($ba['nick_name']); ?></h3>
                        <h5 class="card-text"><?= $ba['class_name'] ?></h5>
                        <h5 class="card-text"><?= getAge($ba['birth_date']) ?> tahun</h5>
                        <h5 class="card-text"><?= date('d-m-Y', strtotime($ba['birth_date'])); ?></h5>

                        <div class="d-flex flex-row justify-content-center mt-1">
                            <a href="<?= base_url(); ?>database/detailasm/<?= $ba['id']; ?>" class="badge badge-primary float-right ml-1 ">detail</a>

                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <h3 class="h3 mb-4 mt-4 text-gray-800">Guru Sekolah Minggu</h3>
    <div class="row">
        <?php if (empty($birthday_gsm)) : ?>
            <div class="alert alert-danger" role="alert">Tidak ada GSM ulang tahun untuk seminggu ke depan</div>
        <?php endif; ?>
        <?php foreach ($birthday_gsm as $bg) : ?>
            <div class="col-lg-4 col-md-6 mb-1">
                <div class="card text-center text-white bg-warning">
                    <div class="card-body">
                        <img src="<?= base_url('assets/img/profilegsm/') .  $bg['image']; ?>" class="card-img-top rounded-circle" alt="..." style="max-height:200px;max-width:200px;vertical-align: middle;">
                        <h3 class="card-title mt-2">Kak <?= ucwords($bg['nick_name']); ?></h3>
                        <h5 class="card-text"><?= getAge($bg['birth_date']) ?> tahun</h5>
                        <h5 class="card-text"><?= $bg['birth_date'] ?></h5>

                        <div class="d-flex flex-row justify-content-center mt-1">
                            <a href="<?= base_url(); ?>database/detailgsm/<?= $bg['id_guru']; ?>" class="badge badge-primary float-right ml-1 ">detail</a>

                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->