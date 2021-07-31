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
        
        section {
            background: linear-gradient(to right, #FFBF96, #FE7096);
        }

        .signup a {
            color: #fff0a5;
        }

        .error {
            color: #fff0a5;
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
                    <form action="<?= base_url('login/reset_password'); ?>" method="post">
                        <div class="inputBox">
                            <input type="text" placeholder="NIP" name="nip" value="<?= set_value('nip'); ?>">
                            <?= form_error('nip', '<small class="error">', '</small>'); ?>
                        </div>
                        <div class="inputBox">
                            <input type="text" placeholder="Email" name="email">
                            <?= form_error('email', '<small class="error">', '</small>'); ?>
                        </div>
                        <div class="inputBox">
                            <input type="submit" value="Reset">
                        </div>
                        <p class="signup">Back to <a href="<?= base_url('login'); ?>">Login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>