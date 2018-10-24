<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Surya Sumatera | Status Produksi</title>
    <?php include('header.php'); ?>

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <img src="<?php echo base_url()?>assets/img/logoss.png" height="250" width="250">
                <!-- <h1 class="logo-name">SS</h1> -->

                

            </div>

            <div class="m-t" >
                <br>
                <p>Silahkan login dengan akun anda </p>
                <?php echo form_open('Login/proseslogin')?>
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <?php if(isset($err)) {?>
                    <span class="text-danger">username atau passwsord salah</span>
                <?php } ?>
                <button type="submit" class="btn btn-success block full-width m-b">Login</button>
                <?php echo form_close()?>
            </div>

        </div>
    </div>

    <!-- Mainly scripts -->
    <?php include('footer.php') ?>

</body>

</html>
