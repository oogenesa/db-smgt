<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <h1 class="h3 mb-4 text-gray-800">
        <!-- use ___PHPSTORM_HELPERS\object; -->

        <?= $title; ?></h1>
    <div class="row mt-3">
        <div class="col-lg-12">
            <form action="" method="post" id="class_masukan">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="class_name_param">Kelas</label>
                        <select name="class_name_param" id="class_name_param" class="form-control">
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
                    </div>
                    <div class="form-group col-md-4">
                        <label for="date_absensi">Tanggal</label>
                        <div>
                            <input class="form-control" type="date" value="<?= date("Y-m-d") ?>" id="date_absensi" name="date_absensi">
                            <small class="form-text text-danger"><?= form_error('date_absensi'); ?> </small>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="kegiatan">Kegiatan</label>
                        <select name="kegiatan" id="kegiatan" class="form-control">
                            <option value="Sekolah Minggu">Sekolah Minggu</option>
                            <option value="Hari Raya Gerejawi">Hari Raya Gerejawi</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="sermon">Pelayan Firman</label>
                        <select name="sermon" id="sermon" class="form-control">
                            <?php foreach ($guru_sermon as $gs) : ?>
                                <option value="<?= $gs['id_guru'] ?>">Kak <?= ucwords($gs['nick_name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="worship_leader">Liturgis</label>
                        <select name="worship_leader" id="worship_leader" class="form-control">
                            <?php foreach ($guru_worship_leader as $gwl) : ?>
                                <option value="<?= $gwl['id_guru'] ?>">Kak <?= ucwords($gwl['nick_name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="guitar">Pemusik</label>
                        <select name="guitar" id="guitar" class="form-control">
                            <?php foreach ($guru_guitar as $gg) : ?>
                                <option value="<?= $gg['id_guru'] ?>">Kak <?= ucwords($gg['nick_name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>



                </div>
            </form>
            <!-- <form id="coba">
                <input type="submit" value="coba" class="btn btn-primary">
            </form> -->
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3 id="juduls"><?= $data_anak[0]['class_name']; ?></h3>
            <?php if (empty($data_anak)) : ?>
                <div class="alert alert-danger" role="alert">Data Anak tidak ditemukan</div>
            <?php endif; ?>
            <?= form_open_multipart('feature/absensi', 'id="cobass"'); ?>
            <table id="table1" class="table table-hover">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Kehadiran</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_anak as $da) : ?>
                        <input type="hidden" id="id" name="id" value="<?= $da['id']; ?>">
                        <tr id="id_anak_<?= $da['id'] ?>">
                            <td>
                                <img id="myImg" src="<?= base_url('assets/img/profileasm/') .  $da['image']; ?>" class="card-img-top rounded-circle" alt="..." style="max-height:50px;max-width:50px;vertical-align: middle;">

                            </td>
                            <td><?= $da['full_name']; ?></td>

                            <td>
                                <div class="form-check">
                                    <input class="form-check-input tes" onchange="handleClick(this)" type="checkbox" data-toggle="toggle" data-on="Hadir" data-off="Tidak Hadir" data-width="200" data-onstyle="success" data-offstyle="danger" value="1" id="kehadiran" name="kehadiran">

                                </div>
                            </td>
                            <td>
                                <select name="alasan" id="alasan" class="form-control ">
                                    <option id="hadir" value="Hadir">Hadir</option>
                                    <option id="sakit" value="Sakit">Sakit</option>
                                    <option id="ijin" value="Ijin">Ijin</option>
                                    <option id="alpa" value="Tanpa Keterangan" selected="selected">Tanpa Keterangan</option>
                                </select>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="<?= base_url(); ?>feature/absensi" class="btn btn-primary float-bottom ">Kembali</a>
            <button type="submit" name="create_absensi" id="create_absensi" value="create_absensi" class="btn btn-primary float-right mb-2 mt-2">Submit Absensi</button>
            </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script>
    function handleClick(tes) {
        // const tes = document.querySelectorAll('.tes');
        const status = tes.checked;
        // console.log(z);
        const a = tes.parentNode.parentNode.parentNode.parentNode;
        // console.log(a);
        const hadir = a.querySelector('#hadir');
        const sakit = a.querySelector('#sakit');
        const ijin = a.querySelector('#ijin');
        const alpa = a.querySelector('#alpa');

        hadir.disabled = !status;
        sakit.disabled = status;
        ijin.disabled = status;
        alpa.disabled = status;

        hadir.selected = status;
        sakit.selected = !status;
        ijin.selected = !status;
        alpa.selected = !status;

    }
    // const tes = document.querySelectorAll('.close');
    // tes.addEventListener('click', function() {
    //     console.log('tes');
    // })


    // var val = true;
    // $('.form-check-input').on('change', () => {
    //     // const origin = document.querySelectorAll('#table1 tr ');
    //     // console.log(origin.data);
    //     val = !val;
    //     if (!val) {
    //         $("option").removeAttr("selected");
    //         $("option").removeAttr("disabled");
    //         $("option[value='Hadir']").attr("selected", true);
    //         $("option[value='Tanpa Keterangan']").attr("disabled", true);
    //         $("option[value='Sakit']").attr("disabled", true);
    //         $("option[value='Ijin']").attr("disabled", true);
    //         console.log('true')
    //     } else {
    //         $("option").removeAttr("selected");
    //         $("option").removeAttr("disabled");
    //         $("option[value='Hadir']").attr("disabled", true);
    //         $("option[value='Sakit']").attr("selected", true);
    //         console.log('false')
    //     }
    //     // var op = document.getElementById("#alasan").getElementsByTagName("option");
    //     // for (var i = 0; i < op.length; i++) {
    //     //     // lowercase comparison for case-insensitivity
    //     //     (op[i].value.toLowerCase() == "hadir") ?
    //     //     op[i].disabled = true: op[i].disabled = false;
    //     // }
    //     // // var tes = document.querySelectorAll('#alasan'),
    //     //     i;
    //     // console.log(tes[0]);
    //     // tes[0].prop('disabled', true);
    //     //console.log(tes[0]);

    //     // for (i = 0; i < tes.length; ++i) {
    //     //     console.log('haha')
    //     // }

    //     // tes.prop('disabled', true);
    // })

    $('#class_name_param').on('change', function() {
        $("#class_masukan").submit();
    })

    $(document).ready(function() {
        $('#table1').DataTable({
            "scrollY": "50vh",
            "scrollCollapse": true,
            // dom: 'Bfrtip',
            // buttons: [
            //     'copy', 'csv', 'excel', 'pdf', 'print'
            // ]
        });

        //$('.dataTables_length').addClass('bs-select');
    });

    function Dataobject(date_absensi, class_name_param, kegiatan, sermon, worship_leader, guitar, id, kehadiran, alasan) {
        this.date_absensi = date_absensi;
        this.class_name_param = class_name_param;
        this.kegiatan = kegiatan;
        this.sermon = sermon;
        this.worship_leader = worship_leader;
        this.guitar = guitar;
        this.id = id;
        this.kehadiran = kehadiran;
        this.alasan = alasan;
    }

    // var val = true;
    $('#cobass').submit(function(e) {
        e.preventDefault();

        const array = [];
        const date_absensi = document.getElementById('date_absensi').value;
        const class_name_param = document.getElementById('class_name_param').value;
        const kegiatan = document.getElementById('kegiatan').value;
        const sermon = document.getElementById('sermon').value;
        const worship_leader = document.getElementById('worship_leader').value;
        const guitar = document.getElementById('guitar').value;
        const id = document.querySelectorAll('#id');
        const kehadiran = document.querySelectorAll('#kehadiran');
        const alasan = document.querySelectorAll('#alasan');
        var object = {};
        for (let i = 0; i < id.length; i++) {
            // console.log(id[i].value);
            // console.log(kehadiran[i].checked);
            // console.log(alasan[i].value);

            object[i] = new Dataobject(date_absensi, class_name_param, kegiatan, sermon, worship_leader, guitar, id[i].value, kehadiran[i].checked, alasan[i].value);
            // console.log(object[i]);
        }

        // array.push(date_absensi, class_name_param, kegiatan, sermon, worship_leader, guitar);
        // console.log(array);
        console.log(object);
        objectjson = JSON.stringify(object);
        console.log(objectjson);

        $.ajax({
            url: '<?= base_url('feature/inputabsensi') ?>',
            data: {
                objectjson: objectjson
            },
            method: 'post',

            // dataType: 'json',
            success: function(data) {
                location.href = "<?= base_url('feature/absensi') ?>";
            },
            error: function(xhr, status, error) {
                alert('Input data di tanggal yang sama tidak diperkenankan');

            }
        })

    })
</script>