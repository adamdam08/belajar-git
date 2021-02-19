<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- MY CSS -->
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div id="content-wrapper">
        <div class="container my-5  ">
            <h1>Create</h1>
            <?php
            $session = \Config\Services::session();
            if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>

            <div class="card mb-3">
                <div class="card-header">
                    <a href="<?php echo site_url('products/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
                <div class="card-body">

                    <form action="<?= base_url('products/savedata') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="name">Name*</label>
                            <input class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : '' ?>" type="text" name="name" placeholder="Product name" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('name'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price">Price*</label>
                            <input class="form-control <?= ($validation->hasError('price')) ? 'is-invalid' : '' ?>" type="number" name="price" min="0" placeholder="Product price" />
                            <div class="invalid-feedback">
                                <?php $validation->getError('price'); ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="name">Photo</label>
                            <input class="form-control-file" type="file" name="image" />
                            <div class="invalid-feedback">
                                <?php $validation->getError('image'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Description*</label>
                            <textarea class="form-control <?= ($validation->hasError('description')) ? 'is-invalid' : '' ?>" name="description" placeholder="Product description..."></textarea>
                            <div class="invalid-feedback">
                                <?php $validation->getError('description'); ?>
                            </div>
                        </div>

                        <input class="btn btn-success" type="submit" name="btn" value="Save" />
                    </form>

                </div>

                <div class="card-footer small text-muted">
                    * required fields
                </div>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->

    <!-- MY JavaScript -->
    <script src="/js/main.js"></script>
    <!-- End of My JavaScript -->
</body>

</html>