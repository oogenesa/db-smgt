<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">

            <!-- <?= $this->session->flashdata('message'); ?> -->
            <h5>User belum aktivasi </h5>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($get_new_user as $gsm) : ?>
                        <tr>
                            <input type="hidden" id="id" name="id" value="<?= $gsm['id']; ?>">
                            <th scope="row"><?= $i ?></th>
                            <td><?= $gsm['name']; ?></td>
                            <td><?= $gsm['email']; ?></td>
                            <td>
                                <button type="button" class="btn btn-primary" onclick="handleClick(this)">Aktivasi</button>
                                <!-- <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="0" id="is_active" name="is_active" <?php if ($gsm['is_active'] == 1) {
                                                                                                                                echo 'checked="checked"';
                                                                                                                            } ?>> -->
        </div>
        </td>

        </tr>
        <?php $i++; ?>
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
    function handleClick(tes) {
        const a = tes.parentNode.parentNode;
        const id = a.querySelector('#id');
        console.log(id.value);
        $.ajax({
            url: '<?= base_url('admin/change_active') ?>',
            data: {
                id: id.value
            },
            method: 'post',
            //dataType: 'json',
            success: function(data) {
                location.href = "<?= base_url('admin/index') ?>";

            },
            error: function(xhr, status, error) {
                alert('Gagal');

            }
        })
    }
</script>