<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="col">
        <form action="" method="post">
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="">Tanggal</label>
                    <input type="date" value="<?= date("Y-m-d"); ?>" class="form-control" name="date_kegiatan" id="date_kegiatan">
                    <input type="hidden" name="name" id="name" value="<?= $user['name']; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="kegiatan">Kegiatan</label>
                    <select name="kegiatan" id="kegiatan" class="form-control">
                        <option value="Sekolah Minggu">Sekolah Minggu</option>
                        <option value="Hari Raya Gerejawi">Hari Raya Gerejawi</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="nama">Pendamping Theologi</label>
                    <input type="text" name="theology_mentor" class="form-control" id="theology_mentor" value="<?= set_value('theology_mentor'); ?>">
                    <small class="form-text text-danger"><?= form_error('theology_mentor'); ?> </small>
                </div>
            </div>
            <h4>Anak Indria</h4>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="sermon_ai">Pelayan Firman</label>
                    <select name="sermon_ai" id="sermon_ai" class="form-control">
                        <?php foreach ($guru_sermon as $gs) : ?>
                            <option value="<?= $gs['id_guru'] ?>">Kak <?= ucwords($gs['nick_name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="worship_leader_ai">Liturgis</label>
                    <select name="worship_leader_ai" id="worship_leader_ai" class="form-control">
                        <?php foreach ($guru_worship_leader as $gwl) : ?>
                            <option value="<?= $gwl['id_guru'] ?>">Kak <?= ucwords($gwl['nick_name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="guitar_ai">Pemusik</label>
                    <select name="guitar_ai" id="guitar_ai" class="form-control">
                        <?php foreach ($guru_guitar as $gg) : ?>
                            <option value="<?= $gg['id_guru'] ?>">Kak <?= ucwords($gg['nick_name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="assistant_ai">Pendamping</label>
                    <select name="assistant_ai" id="assistant_ai" class="form-control">
                        <option value="0" selected> </option>
                        <?php foreach ($guru_assistant as $ga) : ?>
                            <option value="<?= $ga['id_guru'] ?>">Kak <?= ucwords($ga['nick_name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-8">
                    <label for="theme">Bahan Kelas Indria dan Kelas Kecil</label>
                    <input type="text" name="theme_ai" class="form-control" id="theme_ai" value="<?= set_value('theme_ai'); ?>">
                    <small class="form-text text-danger"><?= form_error('theme_ai'); ?> </small>
                </div>
            </div>
            <h4>Anak Kecil</h4>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="sermon_ak">Pelayan Firman</label>
                    <select name="sermon_ak" id="sermon_ak" class="form-control">
                        <?php foreach ($guru_sermon as $gs) : ?>
                            <option value="<?= $gs['id_guru'] ?>">Kak <?= ucwords($gs['nick_name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="worship_leader_ak">Liturgis</label>
                    <select name="worship_leader_ak" id="worship_leader_ak" class="form-control">
                        <?php foreach ($guru_worship_leader as $gwl) : ?>
                            <option value="<?= $gwl['id_guru'] ?>">Kak <?= ucwords($gwl['nick_name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="guitar_ak">Pemusik</label>
                    <select name="guitar_ak" id="guitar_ak" class="form-control">
                        <?php foreach ($guru_guitar as $gg) : ?>
                            <option value="<?= $gg['id_guru'] ?>">Kak <?= ucwords($gg['nick_name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="assistant_ak">Pendamping</label>
                    <select name="assistant_ak" id="assistant_ak" class="form-control">
                        <option value="0" selected> </option>
                        <?php foreach ($guru_assistant as $ga) : ?>
                            <option value="<?= $ga['id_guru'] ?>">Kak <?= ucwords($ga['nick_name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <h4>Anak Besar</h4>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="sermon_ab">Pelayan Firman</label>
                    <select name="sermon_ab" id="sermon_ab" class="form-control">
                        <?php foreach ($guru_sermon as $gs) : ?>
                            <option value="<?= $gs['id_guru'] ?>">Kak <?= ucwords($gs['nick_name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="worship_leader_ab">Liturgis</label>
                    <select name="worship_leader_ab" id="worship_leader_ab" class="form-control">
                        <?php foreach ($guru_worship_leader as $gwl) : ?>
                            <option value="<?= $gwl['id_guru'] ?>">Kak <?= ucwords($gwl['nick_name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="guitar_ab">Pemusik</label>
                    <select name="guitar_ab" id="guitar_ab" class="form-control">
                        <?php foreach ($guru_guitar as $gg) : ?>
                            <option value="<?= $gg['id_guru'] ?>">Kak <?= ucwords($gg['nick_name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="assistant_ab">Pendamping</label>
                    <select name="assistant_ab" id="assistant_ab" class="form-control">
                        <option value="0" selected> </option>
                        <?php foreach ($guru_assistant as $ga) : ?>
                            <option value="<?= $ga['id_guru'] ?>">Kak <?= ucwords($ga['nick_name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-8">
                    <label for="theme">Bahan Kelas Besar dan Kelas Remaja</label>
                    <input type="text" name="theme_ab" class="form-control" id="theme_ab" value="<?= set_value('theme_ab'); ?>">
                    <small class="form-text text-danger"><?= form_error('theme_ab'); ?> </small>
                </div>
            </div>
            <h4>Anak Remaja</h4>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="sermon_ar">Pelayan Firman</label>
                    <select name="sermon_ar" id="sermon_ar" class="form-control">
                        <?php foreach ($guru_sermon as $gs) : ?>
                            <option value="<?= $gs['id_guru'] ?>">Kak <?= ucwords($gs['nick_name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="worship_leader_ar">Liturgis</label>
                    <select name="worship_leader_ar" id="worship_leader_ar" class="form-control">
                        <?php foreach ($guru_worship_leader as $gwl) : ?>
                            <option value="<?= $gwl['id_guru'] ?>">Kak <?= ucwords($gwl['nick_name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="guitar_ar">Pemusik</label>
                    <select name="guitar_ar" id="guitar_ar" class="form-control">
                        <?php foreach ($guru_guitar as $gg) : ?>
                            <option value="<?= $gg['id_guru'] ?>">Kak <?= ucwords($gg['nick_name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="assistant_ar">Pendamping</label>
                    <select name="assistant_ar" id="assistant_ar" class="form-control">
                        <option value="0" selected> </option>
                        <?php foreach ($guru_assistant as $ga) : ?>
                            <option value="<?= $ga['id_guru'] ?>">Kak <?= ucwords($ga['nick_name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button type="submit" name="add_schedule" id="add_schedule" value="add_schedule" class="btn btn-primary float-right">Submit Absensi</button>
        </form>




    </div>
</div>