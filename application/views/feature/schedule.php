<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 mt-2"><?= $title; ?></h1>
    <form action="" method="post" id="month_masukan">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="month_param">Bulan</label>
                <select name="month_param" id="month_param" class="form-control">
                    <option value="01" <?php if ($month == '01') {
                                            echo 'selected';
                                        } ?>>Januari</option>
                    <option value="02" <?php if ($month == '02') {
                                            echo 'selected';
                                        } ?>>Februari</option>
                    <option value="03" <?php if ($month == '03') {
                                            echo 'selected';
                                        } ?>>Maret</option>
                    <option value="04" <?php if ($month == '04') {
                                            echo 'selected';
                                        } ?>>April</option>
                    <option value="05" <?php if ($month == '05') {
                                            echo 'selected';
                                        } ?>>Mei</option>
                    <option value="06" <?php if ($month == '06') {
                                            echo 'selected';
                                        } ?>>Juni</option>
                    <option value="07" <?php if ($month == '07') {
                                            echo 'selected';
                                        } ?>>Juli</option>
                    <option value="08" <?php if ($month == '08') {
                                            echo 'selected';
                                        } ?>>Agustus</option>
                    <option value="09" <?php if ($month == '09') {
                                            echo 'selected';
                                        } ?>>September</option>
                    <option value="10" <?php if ($month == '10') {
                                            echo 'selected';
                                        } ?>>Oktober</option>
                    <option value="11" <?php if ($month == '11') {
                                            echo 'selected';
                                        } ?>>November</option>
                    <option value="12" <?php if ($month == '12') {
                                            echo 'selected';
                                        } ?>>Desember</option>


                </select>
                <!-- <input type="text" id="coba3"> -->
            </div>

        </div>
    </form>
    <div class="row">
        <div class="col-md-10">
            <h3 id="juduls">Jadwal dan Pelayanan Guru Sekolah Minggu</h3>
            <?php if (empty($schedule)) : ?>
                <div class="alert alert-danger" role="alert">Belum ada jadwal untuk bulan ini</div>
            <?php endif; ?>
            <table class="table table-hover" id="tableschedule">
                <thead>
                    <tr class="table-danger">
                        <th>Date</th>
                        <th>Pendamping Teologi</th>
                        <th>Kelas</th>
                        <th>Pelayan Firman</th>
                        <th>Liturgis</th>
                        <th>Pemusik</th>

                    </tr>
                </thead>
                <?php $i = 0; ?>
                <tbody>
                    <?php foreach ($schedule as $sc) : ?>
                        <?php $i++ ?>
                        <tr <?php if ($i % 2 != 0) {
                                echo 'class="table-secondary"';
                            } ?>>
                            <th rowspan="6"><?= date('d-m-Y', strtotime($sc['date_kegiatan'])); ?></th>
                            <!-- <th rowspan="4"><?= $sc[0]['data'][0]['id']; ?></th> -->
                        </tr>

                        <tr <?php if ($i % 2 != 0) {
                                echo 'class="table-secondary"';
                            } ?>>
                            <th rowspan="5"><?= ucwords($sc[0]['data'][0]['theology_mentor']); ?></th>
                        </tr>

                        <?php foreach ($sc[0]['data'] as $s) : ?>
                            <tr <?php if ($i % 2 != 0) {
                                    echo 'class="table-secondary"';
                                } ?>>

                                <!-- <th><?= $s[0]; ?></th> -->
                                <td><?= $s['class_name']; ?></td>
                                <td onclick="location.href='<?= base_url('database/detailgsm/') . $s['id_guru_sermon']; ?>'" style="cursor:pointer">Kak <?= ucwords($s['name_sermon']); ?></td>
                                <td onclick="location.href='<?= base_url('database/detailgsm/') . $s['id_guru_worship_leader']; ?>'" style="cursor:pointer">Kak <?= ucwords($s['name_worship_leader']); ?></td>
                                <td onclick="location.href='<?= base_url('database/detailgsm/') . $s['id_guru_guitar']; ?>'" style="cursor:pointer">Kak <?= ucwords($s['name_guitar']); ?></td>
                                <!-- <td>Pelayan Firman</td>
                                <td>Liturgis</td>
                                <td>Pemusik</td> -->
                            </tr>
                        <?php endforeach; ?>

                    <?php endforeach; ?>

                </tbody>
            </table>


        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script>
    $('#month_param').on('change', function() {
        $("#month_masukan").submit();
    })
    $(document).ready(function() {
        $('#tableschedule').DataTable({
            "scrollY": "50vh",
            "scrollCollapse": true,
        });
        $('.dataTables_length').addClass('bs-select');
    });
</script>