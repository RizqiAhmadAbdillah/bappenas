<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-2">
                <a href="/" class="btn btn-block btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-12">

                <!-- Default box -->
                <div class="card card-primary card-outline">
                    <div class="card-body row">
                        <div class="col-3 text-center d-flex align-items-center justify-content-center">
                            <div class="">
                                <img src="/dist/img/<?= $customer['photo']; ?>" alt=<?= $customer['name']; ?>>
                            </div>
                        </div>
                        <div class="col-9">
                            <p class="card-text">
                                <?= $customer['name']; ?>
                            </p>
                            <p class="card-text">
                                <?= $customer['email']; ?>
                            </p>
                            <p class="card-text">
                                Some quick example text to build on the card title and make up the bulk of the card's
                                content.
                            </p>
                            <a href="/customer/edit/<?= $customer['id']; ?>" class="btn btn-warning">Edit</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<?= $this->endSection(); ?>