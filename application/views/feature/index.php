<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row-mt-3">
            <div class="col-lg-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Note <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif ?>
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row mt-1 mb-2">
        <div class="col md-6">
            <a href="<?= base_url(); ?>feature/tambahnote" class="btn btn-primary">Tambah Note</a>
        </div>
    </div>
    <div class="row">
        <?php foreach ($note as $n) : ?>
            <div class="col-lg-3 col-md-6 mb-1">
                <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">

                    <div class="card-body">
                        <h5><?= $n['user_name']; ?></h5>
                        <p class="card-text"><?= $n['note_text']; ?></p>
                        <p class="card-title">Deadline <?= $n['date_to_complete']; ?></p>
                        <!-- <a href="<?= base_url(); ?>feature/hapusnote/" class="badge badge-primary float-right ml-1 "><i class="fas fa-trash"> </i> </a> -->
                    </div>

                </div>
            </div>
        <?php endforeach; ?>

    </div>
    <!-- <div class="col">
            <div class="row no-gutters">

                <div class="media">
                    <img class="d-flex rounded-circle avatar z-depth-1-half mr-3" src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" alt="Avatar">
                    <div class="media-body">
                        <h5 class="mt-0 font-weight-bold blue-text">Anna Smith</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus
                        odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate
                        fringilla. Donec lacinia congue felis in faucibus.

                        <div class="media mt-3 shadow-textarea">
                            <img class="d-flex rounded-circle avatar z-depth-1-half mr-3" src="https://mdbootstrap.com/img/Photos/Avatars/avatar-8.jpg" alt="Generic placeholder image">
                            <div class="media-body">
                                <h5 class="mt-0 font-weight-bold blue-text">Danny Tatuum</h5>
                                <div class="form-group basic-textarea rounded-corners">
                                    <textarea class="form-control z-depth-1" id="exampleFormControlTextarea345" rows="3" placeholder="Write your comment..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="media">
                    <img class="d-flex rounded-circle avatar z-depth-1-half mr-3" src="https://mdbootstrap.com/img/Photos/Avatars/avatar-10.jpg" alt="Avatar">
                    <div class="media-body">
                        <h5 class="mt-0 font-weight-bold blue-text">Caroline Horwitz</h5>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis odit minima eaque dignissimos recusandae
                        officiis commodi nulla est, tempore atque voluptas non quod maxime, iusto, debitis aliquid? Iure ipsum,
                        itaque.
                    </div>
                </div>

            </div>
        </div> -->


</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->