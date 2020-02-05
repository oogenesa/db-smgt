<div class="container-fluid">
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Form Edit Data Anak Sekolah Minggu
                </div>
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <?php
                    $golda = ['A', 'B', 'O', 'AB'];

                    ?>
                    <?= form_open_multipart('database/ubahasm/' . $data_anak['id']); ?>

                    <input type="hidden" name="id" value="<?= $data_anak['id']; ?>">

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" name="full_name" class="form-control" id="full_name" value="<?= $data_anak['full_name']; ?>">
                            <small class="form-text text-danger"><?= form_error('full_name'); ?> </small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nama">Nama Panggilan</label>
                            <input type="text" name="nick_name" class="form-control" id="nick_name" value="<?= $data_anak['nick_name']; ?>">
                            <small class="form-text text-danger"><?= form_error('nick_name'); ?> </small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nama">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="male" <?php if ($data_anak['gender'] == 'male') {
                                                            echo 'selected';
                                                        } ?>>Laki-laki</option>
                                <option value="female" <?php if ($data_anak['gender'] == 'female') {
                                                            echo 'selected';
                                                        } ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="blood_type">Golongan Darah</label>
                            <select name="blood_type" id="blood_type" class="form-control">
                                <option value="Belum cek" <?php if ($data_anak['blood_type'] == 'Belum cek') {
                                                                echo 'selected';
                                                            } ?>>Belum cek</option>
                                <option value="A" <?php if ($data_anak['blood_type'] == 'A') {
                                                        echo 'selected';
                                                    } ?>>A</option>
                                <option value="B" <?php if ($data_anak['blood_type'] == 'B') {
                                                        echo 'selected';
                                                    } ?>>B</option>
                                <option value="O" <?php if ($data_anak['blood_type'] == 'O') {
                                                        echo 'selected';
                                                    } ?>>O</option>
                                <option value="AB" <?php if ($data_anak['blood_type'] == 'AB') {
                                                        echo 'selected';
                                                    } ?>>AB</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="mother_name">Nama Ibu</label>
                            <input type="text" name="mother_name" class="form-control" id="mother_name" value="<?= $data_anak['mother_name']; ?>">
                            <small class="form-text text-danger"><?= form_error('mother_name'); ?> </small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="father_name">Nama Ayah</label>
                            <input type="text" name="father_name" class="form-control" id="father_name" value="<?= $data_anak['father_name']; ?>">
                            <small class="form-text text-danger"><?= form_error('father_name'); ?> </small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="mother_contact">Nomor Handphone Ibu</label>
                            <input type="text" name="mother_contact" class="form-control" id="mother_contact" value="<?= $data_anak['mother_contact']; ?>">
                            <small class="form-text text-danger"><?= form_error('mother_contact'); ?> </small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="father_contact">Nomor Handphone Ayah</label>
                            <input type="text" name="father_contact" class="form-control" id="father_contact" value="<?= $data_anak['father_contact']; ?>">
                            <small class="form-text text-danger"><?= form_error('father_contact'); ?> </small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="mother_job">Pekerjaan Ibu</label>
                            <input type="text" name="mother_job" class="form-control" id="mother_job" value="<?= $data_anak['mother_job']; ?>">
                            <small class="form-text text-danger"><?= form_error('mother_job'); ?> </small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="father_job">Pekerjaan Ayah</label>
                            <input type="text" name="father_job" class="form-control" id="father_job" value="<?= $data_anak['father_job']; ?>">
                            <small class="form-text text-danger"><?= form_error('father_job'); ?> </small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="birth_date">Tanggal Lahir</label>
                            <div>
                                <input class="form-control" type="date" value="<?= $data_anak['birth_date']; ?>" id="birth_date" name="birth_date">
                                <small class="form-text text-danger"><?= form_error('birth_date'); ?> </small>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="school_name">Sekolah</label>
                            <input type="text" name="school_name" class="form-control" id="school_name" value="<?= $data_anak['school_name']; ?>">
                            <small class="form-text text-danger"><?= form_error('school_name'); ?> </small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat Dominisili</label>
                        <input type="text" name="address" class="form-control" id="address" value="<?= $data_anak['address']; ?>">
                        <small class="form-text text-danger"><?= form_error('address'); ?> </small>
                    </div>
                    <div class="form-group">
                        <label for="hobby">Minat dan Bakat</label>

                        <select name="hobby" id="hobby" class="form-control">
                            <option value="Musik" <?php if ($data_anak['hobby'] == 'Musik') {
                                                        echo 'selected';
                                                    } ?>>Musik</option>
                            <option value="Menanyi" <?php if ($data_anak['hobby'] == 'Menyanyi') {
                                                        echo 'selected';
                                                    } ?>>Menanyi</option>
                            <option value="Olahraga" <?php if ($data_anak['hobby'] == 'Olahraga') {
                                                            echo 'selected';
                                                        } ?>>Olahraga</option>
                            <option value="Menari <?php if ($data_anak['hobby'] == 'Menari') {
                                                        echo 'selected';
                                                    } ?>">Menari</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="class_name">Kelas Sekolah Minggu</label>
                            <select name="class_name" id="class_name" class="form-control">
                                <option value="<?= $data_anak['class_name']; ?>" selected><?= $data_anak['class_name']; ?></option>
                                <?php foreach ($class as $c) : ?>
                                    <option value="<?= $c['class_name'] ?>"><?= $c['class_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="school_grade">Kelas Sekolah</label>
                            <select name="school_grade" id="school_grade" class="form-control">
                                <?php if ($data_anak['class_name'] == 'Anak Indria') : ?>
                                    <option value="0" selected>0</option>
                                <?php else : ?>
                                    <option value="0">0</option>
                                    <?php foreach ($class_school as $cs) : ?>
                                        <?php if ($cs['id_class'] != 0) : ?>
                                            <?php if ($cs['id_class'] == $data_anak['school_grade']) : ?>
                                                <option value="<?= $cs['id_class'] ?>" selected><?= $cs['id_class'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $cs['id_class'] ?>"><?= $cs['id_class'] ?></option>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2">Foto Anak</div>
                        <div class="col-sm-10">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/img/profileasm/') . $data_anak['image']; ?>" class="img-thumbnail">
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