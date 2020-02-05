<div class="container-fluid">
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Form Tambah Data Guru Sekolah Minggu
                </div>
                <div class="card-body">
                    <!-- <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?> -->
                    <?= form_open_multipart('database/tambahgsm'); ?>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="full_name">Nama Lengkap</label>
                            <input type="text" name="full_name" class="form-control" id="full_name">
                            <small class="form-text text-danger"><?= form_error('full_name'); ?> </small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nick_name">Nama Panggilan</label>
                            <input type="text" name="nick_name" class="form-control" id="nick_name">
                            <small class="form-text text-danger"><?= form_error('nick_name'); ?> </small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="gender">Jenis Kelamin</label>
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
                            <label for="birth_date">Tanggal Lahir</label>
                            <div>
                                <input class="form-control" type="date" value="1990-08-19" id="birth_date" name="birth_date">
                                <small class="form-text text-danger"><?= form_error('birth_date'); ?> </small>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="contact_number">Nomor Handphone</label>
                            <input type="text" name="contact_number" class="form-control" id="contact_number">
                            <small class="form-text text-danger"><?= form_error('contact_number'); ?> </small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input type="text" name="address" class="form-control" id="address">
                        <small class="form-text text-danger"><?= form_error('address'); ?> </small>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="join_date">Tanggal Bergabung</label>
                            <div>
                                <input class="form-control" type="date" value="2011-08-19" id="join_date" name="join_date">
                                <small class="form-text text-danger"><?= form_error('join_date'); ?> </small>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="work_place">Tempat Kerja/Sekolah/Kampus</label>
                            <input type="text" name="work_place" class="form-control" id="work_place">
                            <small class="form-text text-danger"><?= form_error('work_place'); ?> </small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="priority_class">Kelas Utama</label>
                            <select name="priority_class" id="priority_class" class="form-control">
                                <?php foreach ($class as $c) : ?>
                                    <option value="<?= $c['class_name'] ?>"><?= $c['class_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="socmed">Media Sosial</label>
                            <input type="text" name="socmed" class="form-control" id="socmed">
                            <small class="form-text text-danger"><?= form_error('socmed'); ?> </small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="certification_level">Tahap Pembinaan</label>
                            <select name="certification_level" id="certification_level" class="form-control">
                                <option value="Belum Pembinaan">Belum Pembinaan</option>
                                <option value="Pembinaan Dasar">Pembinaan Dasar</option>
                                <option value="Pembinaan Lanjut">Pembinaan Lanjut</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="is_active">Status Aktif</label>
                            <select name="is_active" id="is_active" class="form-control">
                                <option value="1">Aktif</option>
                                <option value="0">Non-aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="service">Pelayanan</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="sermon" name="sermon">
                                <label class="form-check-label" for="sermon">
                                    Pelayan Firman
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="worship_leader" name="worship_leader">
                                <label class="form-check-label" for="worship_leader">
                                    Liturgis
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="asisstant" name="asisstant">
                                <label class="form-check-label" for="asisstant">
                                    Pendamping
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="service">Musik</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" value="1" id="guitar" name="guitar">
                                <label class="form-check-label" for="guitar">
                                    Gitaris
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="keyboard" name="keyboard">
                                <label class="form-check-label" for="keyboard">
                                    Keyboardis
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="cajon" name="cajon">
                                <label class="form-check-label" for="cajon">
                                    Cajonis
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">Foto Guru</div>
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
</div>