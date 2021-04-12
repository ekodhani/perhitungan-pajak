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
    </style>
</head>

<body>
    <section>
        <!-- <div class="color"></div>
        <div class="color"></div>
        <div class="color"></div> -->
        <div class="box">
            <div class="container">
                <div class="form">
                    <h2>Login Form</h2>
                    <?= $this->session->flashdata('message'); ?>
                    <form action="<?= base_url(); ?>" method="post">
                        <div class="inputBox">
                            <input type="text" placeholder="NIP" name="nip">
                        </div>
                        <div class="inputBox">
                            <input type="password" placeholder="Password" name="password">
                        </div>
                        <div class="inputBox">
                            <input type="submit" value="Login">
                        </div>
                        <p class="forget">Forgot Password ? <a href="#">Reset Password</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <!-- <script src="<?= base_url('assets/js/script.js'); ?>"></script> -->
</body>

</html>