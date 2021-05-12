<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <link rel="shortcut icon" href="<?= base_url('assets/image/favicon.png'); ?>">
    <title><?= $title; ?></title>
    <style>
        section {
            background: linear-gradient(to right, #90CAF9, #047EDF);
        }

        .signup a {
            color: #fed713;
        }

        .error {
            color: #fe7096;
            text-shadow: 2px 2px 4px #dd8da2;
        }
    </style>
</head>

<body>
    <section>
        <div class="box">
            <div class="container">
                <div class="form">
                    <h2><?= $title; ?> Form</h2>
                    <?= $this->session->flashdata('message'); ?>
                    <form action="<?= base_url('login/signup'); ?>" method="post">
                        <div class="inputBox">
                            <input type="text" placeholder="NIP" name="nip" value="<?= set_value('nip')?>">
                            <?= form_error('nip', '<small class="error">', '</small>'); ?>
                        </div>
                        <div class="inputBox">
                            <input type="text" placeholder="Nama" name="nama" value="<?= set_value('nama')?>">
                            <?= form_error('nama', '<small class="error">', '</small>'); ?>
                        </div>
                        <div class="inputBox">
                            <input type="text" placeholder="Jabatan" name="jabatan" value="<?= set_value('jabatan')?>">
                            <?= form_error('jabatan', '<small class="error">', '</small>'); ?>
                        </div>
                        <div class="inputBox">
                            <input type="password" placeholder="Password" name="password">
                            <?= form_error('password', '<small class="error">', '</small>'); ?>
                        </div>
                        <div class="inputBox">
                            <input type="password" placeholder="Retype Password" name="password1">
                            <?= form_error('password1', '<small class="error">', '</small>'); ?>
                        </div>
                        <div class="inputBox">
                            <input type="submit" value="<?= $title; ?>">
                        </div>
                        <p class="signup">Have an account ? <a href="<?= base_url('login'); ?>">Sign In</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <!-- <script src="<?= base_url('assets/js/script.js'); ?>"></script> -->
</body>

</html>