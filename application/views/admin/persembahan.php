<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800 mt-2"><?= $title; ?></h1>
    <?php if ($this->session->flashdata('flash_success')) : ?>
        <div class="row-mt-3">
            <div class="col-lg-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Persembahan <strong>berhasil</strong> <?= $this->session->flashdata('flash_success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif ?>
    <?php if ($this->session->flashdata('flash_fail')) : ?>
        <div class="row-mt-3">
            <div class="col-lg-6">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data Persembahan <strong>Gagal</strong> <?= $this->session->flashdata('flash_fail'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif ?>
    <div class="row-mt-3">
        <div class="col">
            <?= form_open_multipart('admin/persembahan'); ?>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="date_kegiatan">Tanggal</label>
                    <div>
                        <input class="form-control" type="date" value="<?= date("Y-m-d") ?>" id="date_kegiatan" name="date_kegiatan">
                        <small class="form-text text-danger"><?= form_error('date_kegiatan'); ?> </small>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="class_name">Kelas Sekolah Minggu</label>
                    <select name="class_name" id="class_name" class="form-control">

                        <?php foreach ($class as $c) : ?>
                            <option value="<?= $c['class_name'] ?>"><?= $c['class_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="pundi">Pundi 1</label>
                    <input type="text" name="pundi_1" class="form-control" id="pundi_1" autocomplete="off" value="<?= set_value('pundi_1'); ?>" placeholder="Rp">
                    <small class="form-text text-danger"><?= form_error('pundi_1'); ?> </small>
                </div>
                <div class="form-group col-md-3">
                    <label for="pundi">Pundi 2</label>
                    <input type="text" name="pundi_2" class="form-control" id="pundi_2" autocomplete="off" value="<?= set_value('pundi_2'); ?>" placeholder="Rp">
                    <small class="form-text text-danger"><?= form_error('pundi_2'); ?> </small>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Foto</div>
                <div class="col-sm-10">

                    <div class="col-sm-9">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                </div>

            </div>
            <input type="hidden" name="name" id="name" value="<?= $user['name']; ?>">
            <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
<script>
    function commafy(num) {
        var str = num.toString().split('.');
        if (str[0].length >= 5) {
            str[0] = str[0].replace(/(\d)(?=(\d{3})+$)/g, '$1,');
        }
        if (str[1] && str[1].length >= 5) {
            str[1] = str[1].replace(/(\d{3})/g, '$1 ');
        }
        return str.join('.');
    }
    $('#pundi_1').on('change', function(e) {
        e.preventDefault();
        const a = e.target.value;
        b = commafy(a);
        console.log(b);
        $('#pundi_1').val(b);
    });
    $('#pundi_2').on('change', function(e) {
        e.preventDefault();
        const a = e.target.value;
        b = commafy(a);
        console.log(b);
        $('#pundi_2').val(b);
    });
</script>