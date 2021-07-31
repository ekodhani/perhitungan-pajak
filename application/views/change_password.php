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
                    <h2><?= $title; ?> NIP:</h2>
                    <h2><?= $this->session->userdata('reset_nip'); ?></h2>
                    <?= $this->session->flashdata('message'); ?>
                    <form action="<?= base_url('login/changePassword'); ?>" method="post">
                        <div class="inputBox">
                            <input type="password" placeholder="New Password" name="password1">
                            <?= form_error('password1', '<small class="error">', '</small>'); ?>
                        </div>
                        <div class="inputBox">
                            <input type="password" placeholder="Repeat Password" name="password2">
                            <?= form_error('password2', '<small class="error">', '</small>'); ?>
                        </div>
                        <div class="inputBox">
                            <input type="submit" value="Change">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>