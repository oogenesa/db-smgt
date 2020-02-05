<div class="container-fluid">
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Form Tambah Data Anak Sekolah Minggu
                </div>
                <div class="card-body">
                    <!-- <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
            </div>
            <?php endif; ?> -->
                    <?= form_open_multipart('database/tambahasm'); ?>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" name="full_name" class="form-control" id="full_name" value="<?= set_value('full_name'); ?>">
                            <small class="form-text text-danger"><?= form_error('full_name'); ?> </small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nama">Nama Panggilan</label>
                            <input type="text" name="nick_name" class="form-control" id="nick_name" value="<?= set_value('nick_name'); ?>">
                            <small class="form-text text-danger"><?= form_error('nick_name'); ?> </small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nama">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="male">Laki-laki</option>
                                <option value="female">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="blood_type">Golongan Darah</label>
                            <select name="blood_type" id="blood_type" class="form-control">
                                <option value="Belum cek">Belum cek</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="O">O</option>
                                <option value="AB">AB</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="mother_name">Nama Ibu</label>
                            <input type="text" name="mother_name" class="form-control" id="mother_name" value="<?= set_value('mother_name'); ?>">
                            <small class="form-text text-danger"><?= form_error('mother_name'); ?> </small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="father_name">Nama Ayah</label>
                            <input type="text" name="father_name" class="form-control" id="father_name" value="<?= set_value('father_name'); ?>">
                            <small class="form-text text-danger"><?= form_error('father_name'); ?> </small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="mother_contact">Nomor Handphone Ibu</label>
                            <input type="text" name="mother_contact" class="form-control" id="mother_contact" value="<?= set_value('mother_contact'); ?>">
                            <small class="form-text text-danger"><?= form_error('mother_contact'); ?> </small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="father_contact">Nomor Handphone Ayah</label>
                            <input type="text" name="father_contact" class="form-control" id="father_contact" value="<?= set_value('father_contact'); ?>">
                            <small class="form-text text-danger"><?= form_error('father_contact'); ?> </small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="mother_job">Pekerjaan Ibu</label>
                            <input type="text" name="mother_job" class="form-control" id="mother_job" value="<?= set_value('mother_job'); ?>">
                            <small class="form-text text-danger"><?= form_error('mother_job'); ?> </small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="father_job">Pekerjaan Ayah</label>
                            <input type="text" name="father_job" class="form-control" id="father_job" value="<?= set_value('father_job'); ?>">
                            <small class="form-text text-danger"><?= form_error('father_job'); ?> </small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="birth_date">Tanggal Lahir</label>
                            <div>
                                <input class="form-control" type="date" value="<?= set_value('birth_date'); ?>" id="birth_date" name="birth_date">
                                <small class="form-text text-danger"><?= form_error('birth_date'); ?> </small>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="school_name">Sekolah</label>
                            <input type="text" name="school_name" class="form-control" id="school_name" value="<?= set_value('school_name'); ?>">
                            <small class="form-text text-danger"><?= form_error('school_name'); ?> </small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat Domisili Anak</label>
                        <input type="text" name="address" class="form-control" id="address" value="<?= set_value('address'); ?>">
                        <small class="form-text text-danger"><?= form_error('address'); ?> </small>
                    </div>
                    <!-- <div class="form-group">
                        <label for="address">Minat dan Bakat</label>
                        <input type="text" name="hobby" class="form-control" id="hobby">
                        <small class="form-text text-danger"><?= form_error('hobby'); ?> </small>
                    </div> -->
                    <div class="form-group">
                        <label for="hobby">Minat dan Bakat</label>

                        <select name="hobby" id="hobby" class="form-control">
                            <option value="Musik">Musik</option>
                            <option value="Menanyi">Menanyi</option>
                            <option value="Olahraga">Olahraga</option>
                            <option value="Menari">Menari</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="class_name">Kelas Sekolah Minggu</label>
                            <select name="class_name" id="class_name" class="form-control">

                                <?php foreach ($class as $c) : ?>
                                    <option value="<?= $c['class_name'] ?>"><?= $c['class_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="school_grade">Kelas Sekolah</label>
                            <select name="school_grade" id="school_grade" class="form-control">
                                <option value="0">0</option>
                                <?php foreach ($class_school as $cs) : ?>
                                    <?php if ($cs['id_class'] != 0) : ?>
                                        <option value="<?= $cs['id_class'] ?>"><?= $cs['id_class'] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">Foto Anak</div>
                        <div class="col-sm-10">

                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>