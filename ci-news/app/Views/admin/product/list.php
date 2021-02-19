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

        <div class="container-fluid">


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

<!DOCTYPE html>
<html lang="en">

<div class="container">
    <h1>CRUD</h1>
    <a href="<?php echo site_url('products/add') ?>" class="btn btn-success w-100 my-3"><i class="fas fa-plus"></i> Add New</a>
    <br />
    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Photo</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td width="150">
                        <?php echo $product->name ?>
                    </td>
                    <td>
                        <?php echo $product->price ?>
                    </td>
                    <td>
                        <img src="<?php echo base_url('upload/product/' . $product->image) ?>" width="64" />
                    </td>
                    <td class="small">
                        <?php echo substr($product->description, 0, 120) ?>...</td>
                    <td width="250">
                        <a href="<?= base_url('products/edit/' . $product->product_id) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                        <a href="<?= base_url('products/delete/' . $product->product_id) ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>


        </tbody>
    </table>

</div>



</html>