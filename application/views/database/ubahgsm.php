<div class="container-fluid">
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Form Edit Data Guru Sekolah Minggu
                </div>
                <div class="card-body">
                    <!-- <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
            </div>
            <?php endif; ?> -->
                    <?= form_open_multipart('database/ubahgsm/' . $data_guru['id_guru']); ?>

                    <input type="hidden" name="id_guru" value="<?= $data_guru['id_guru']; ?>">

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="full_name">Nama Lengkap</label>
                            <input type="text" name="full_name" class="form-control" id="full_name" value="<?= $data_guru['full_name']; ?>">
                            <small class="form-text text-danger"><?= form_error('full_name'); ?> </small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nick_name">Nama Panggilan</label>
                            <input type="text" name="nick_name" class="form-control" id="nick_name" value="<?= $data_guru['nick_name']; ?>">
                            <small class="form-text text-danger"><?= form_error('nick_name'); ?> </small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nama">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="male" <?php if ($data_guru['gender'] == 'male') {
                                                            echo 'selected';
                                                        } ?>>Laki-laki</option>
                                <option value="female" <?php if ($data_guru['gender'] == 'female') {
                                                            echo 'selected';
                                                        } ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="blood_type">Golongan Darah</label>
                            <select name="blood_type" id="blood_type" class="form-control">
                                <option value="Belum cek" <?php if ($data_guru['blood_type'] == 'Belum cek') {
                                                                echo 'selected';
                                                            } ?>>Belum cek</option>
                                <option value="A" <?php if ($data_guru['blood_type'] == 'A') {
                                                        echo 'selected';
                                                    } ?>>A</option>
                                <option value="B" <?php if ($data_guru['blood_type'] == 'B') {
                                                        echo 'selected';
                                                    } ?>>B</option>
                                <option value="O" <?php if ($data_guru['blood_type'] == 'O') {
                                                        echo 'selected';
                                                    } ?>>O</option>
                                <option value="AB" <?php if ($data_guru['blood_type'] == 'AB') {
                                                        echo 'selected';
                                                    } ?>>AB</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="birth_date">Tanggal Lahir</label>
                            <div>
                                <input class="form-control" type="date" value="<?= $data_guru['birth_date']; ?>" id="birth_date" name="birth_date">
                                <small class="form-text text-danger"><?= form_error('birth_date'); ?> </small>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="contact_number">Nomor Handphone</label>
                            <input type="text" name="contact_number" class="form-control" id="contact_number" value="<?= $data_guru['contact_number']; ?>">
                            <small class="form-text text-danger"><?= form_error('contact_number'); ?> </small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input type="text" name="address" class="form-control" id="address" value="<?= $data_guru['address']; ?>">
                        <small class="form-text text-danger"><?= form_error('address'); ?> </small>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="join_date">Tanggal Bergabung</label>
                            <div>
                                <input class="form-control" type="date" value="<?= $data_guru['join_date']; ?>" id="join_date" name="join_date">
                                <small class="form-text text-danger"><?= form_error('join_date'); ?> </small>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="work_place">Tempat Kerja/Sekolah/Kampus</label>
                            <input type="text" name="work_place" class="form-control" id="work_place" value="<?= $data_guru['work_place']; ?>">
                            <small class="form-text text-danger"><?= form_error('work_place'); ?> </small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="priority_class">Kelas Utama</label>
                            <select name="priority_class" id="priority_class" class="form-control">
                                <option value="<?= $data_guru['priority_class']; ?>" selected><?= $data_guru['priority_class']; ?></option>
                                <?php foreach ($class as $c) : ?>
                                    <option value="<?= $c['priority_class'] ?>"><?= $c['priority_class'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="socmed">Media Sosial</label>
                            <input type="text" name="socmed" class="form-control" id="socmed" value="<?= $data_guru['socmed']; ?>">
                            <small class="form-text text-danger"><?= form_error('socmed'); ?> </small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="certification_level">Tahap Pembinaan</label>
                            <select name="certification_level" id="certification_level" class="form-control">
                                <option value="Belum Pembinaan" <?php if ($data_guru['certification_level'] == 'Belum Pembinaan') {
                                                                    echo 'selected';
                                                                } ?>>Belum Pembinaan</option>
                                <option value="Pembinaan Dasar" <?php if ($data_guru['certification_level'] == 'Pembinaan Dasar') {
                                                                    echo 'selected';
                                                                } ?>>Pembinaan Dasar</option>
                                <option value="Pembinaan Lanjut" <?php if ($data_guru['certification_level'] == 'Pembinaan Lanjut') {
                                                                        echo 'selected';
                                                                    } ?>>Pembinaan Lanjut</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="is_active">Status Aktif</label>
                            <select name="is_active" id="is_active" class="form-control">
                                <option value="1" <?php if ($data_guru['is_active'] == 1) {
                                                        echo 'selected';
                                                    } ?>>Aktif</option>
                                <option value="0" <?php if ($data_guru['is_active'] != 1) {
                                                        echo 'selected';
                                                    } ?>>Non-aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="service">Pelayanan</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="sermon" name="sermon" <?php if ($data_guru['sermon'] == '1') {
                                                                                                                        echo 'checked="checked"';
                                                                                                                    } ?>>
                                <label class="form-check-label" for="sermon">
                                    Pelayan Firman
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="worship_leader" name="worship_leader" <?php if ($data_guru['worship_leader'] == 1) {
                                                                                                                                        echo 'checked="checked"';
                                                                                                                                    } ?>>
                                <label class="form-check-label" for="worship_leader">
                                    Liturgis
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="assistant" name="assistant" <?php if ($data_guru['assistant'] == 1) {
                                                                                                                                echo 'checked="checked"';
                                                                                                                            } ?>>
                                <label class="form-check-label" for="assistant">
                                    Pendamping
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="service">Musik</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="guitar" name="guitar" <?php if ($data_guru['guitar'] == 1) {
                                                                                                                        echo 'checked="checked"';
                                                                                                                    } ?>>
                                <label class="form-check-label" for="guitar">
                                    Gitaris
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="keyboard" name="keyboard" <?php if ($data_guru['keyboard'] == 1) {
                                                                                                                            echo 'checked="checked"';
                                                                                                                        } ?>>
                                <label class="form-check-label" for="keyboard">
                                    Keyboardis
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="cajon" name="cajon" <?php if ($data_guru['cajon'] == 1) {
                                                                                                                        echo 'checked="checked"';
                                                                                                                    } ?>>
                                <label class="form-check-label" for="cajon">
                                    Cajonis
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">Foto Guru</div>
                        <div class="col-sm-10">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/img/profilegsm/') . $data_guru['image']; ?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</div>