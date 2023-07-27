<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-2">
                <button type="button" data-toggle="modal" data-target="#add-customer" class="btn btn-block btn-primary"><i class="fas fa-plus"></i> Add Data</button>
            </div>
            <div class="col-10">
                <?php if (session()->getFlashdata('message')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('message'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Customers</h3>
                        <div class="card-tools">
                            <form action="" method="post" class="input-group input-group" style="width: 200px;">
                                <input type="text" name="keyword" class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 500px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th class="colspan-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $row = 1 ?>
                                <?php foreach ($customers as $c) : ?>
                                    <tr>
                                        <td><?= $row++; ?></td>
                                        <td><?= $c['name']; ?></td>
                                        <td><?= $c['email']; ?></td>
                                        <td><a href="/customer/<?= $c['id']; ?>" class="btn btn-sm btn-info">Detail</a></td>
                                        <td><a href="/customer/edit/<?= $c['id']; ?>" class="btn btn-sm btn-warning">Edit</a></td>
                                        <td>
                                            <form action="/customer/<?= $c['id']; ?>" method="post" class="d-inline">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" onclick="return confirm('Do you want to delete this data?')" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<div class="modal fade" id="add-customer">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form start -->
                <form action="/customer/save" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="form-control" name="photo" id="photo" size="20" required>
                                <label class="custom-file-label" for="photo">Choose file</label>
                            </div>
                            <!-- <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-secondary">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?= $this->endSection(); ?>