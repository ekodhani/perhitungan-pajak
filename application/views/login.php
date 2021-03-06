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
        body {
            overflow: hidden;
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
                    <h2>Login Form</h2>
                    <?= $this->session->flashdata('message'); ?>
                    <form action="<?= base_url(); ?>" method="post">
                        <div class="inputBox">
                            <input type="text" placeholder="NIP" name="nip" value="<?= set_value('nip'); ?>">
                            <?= form_error('nip', '<small class="error">', '</small>'); ?>
                        </div>
                        <div class="inputBox">
                            <input type="password" placeholder="Password" name="password">
                            <?= form_error('password', '<small class="error">', '</small>'); ?>
                        </div>
                        <div class="inputBox">
                            <input type="submit" value="Login">
                        </div>
                        <p class="forget">Forgot Password ? <a href="<?= base_url('login/reset_password'); ?>">Reset Password</a></p>
                        <p class="signup">Don't have an account ? <a href="<?= base_url('login/signup'); ?>">Sign Up</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <!-- <script src="<?= base_url('assets/js/script.js'); ?>"></script> -->
</body>

</html>