<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>

    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.min.css">
</head>

<body>
    INI NANTI DIGANTI SAMA LOGIN YANG BENERAN
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="card col-md-4 offset-md-4 pt-3 pb-3">
                <form action="" method="POST">
                    <!-- <?php echo $this->session->flashdata('msg'); ?> -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email'); ?>">
                        <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                        <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script src="<?= base_url('assets/'); ?>js/bootstrap.bundle.min.js"></script>

</body>

</html>