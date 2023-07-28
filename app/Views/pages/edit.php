<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
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
                            <form action="/customer/update/<?= $customer['id']; ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value=<?= $customer['id']; ?>>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value=<?= $customer['name']; ?> required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter email" value=<?= $customer['email']; ?> required>
                                </div>
                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="photo" id="photo" required>
                                            <label class="custom-file-label" for="photo">Choose file</label>
                                        </div>
                                        <!-- <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <a href="/" type="button" class="btn btn-secondary">Cancel</a>
                                </div>
                            </form>
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