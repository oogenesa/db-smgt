<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Data Guru Sekolah Minggu.." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form> -->
    <div class="col">
        <form action="" method="post">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Note</label>
                <div class="col-lg-2">
                    <label for="">Tanggal Deadline</label>
                    <input type="date" value="<?= date("Y-m-d"); ?>" class="form-control" name="date_to_complete">
                    <input type="hidden" name="name" id="name" value="<?= $user['name']; ?>">
                </div>
                <div class="col-lg-6">
                    <label for="">Silahkan tulis</label>
                    <textarea class="form-control rounded-0" id="note_text" name="note_text" rows="10"></textarea>
                    <small class="form-text text-danger"><?= form_error('note_text'); ?> </small>
                    <button type="submit" name="tulis" class="btn btn-primary float-right mt-1">Posting</button>
                </div>
            </div>
            <a href="<?= base_url(); ?>feature/index" class="btn btn-primary float-bottom ">Kembali</a>
        </form>

    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->