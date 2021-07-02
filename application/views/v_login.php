<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>SIMARSI (Sistem Informasi Manajemen Arsip) | Login</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="<?php echo base_url(); ?>/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="<?php echo base_url(); ?>/assets/css/main.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="<?php echo base_url(); ?>/assets/css/pages/auth-light.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet"></link>
</head>

<body class="bg-silver-300">
    <div class="content">
        <div class="brand">
                <img src="<?php echo base_url(); ?>assets/Lambang_Polda_Lampung.png" width="30%">
        </div>
        <form id="login-form" action="<?php echo base_url(); ?>auth/signin" method="post">
            <h2 class="login-title">SIMARSI</h2>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                    <input class="form-control" type="text" name="username" placeholder="Ketikan Username" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                    <input class="form-control" type="password" name="password" placeholder="Ketikan Password">
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit">Login</button>
            </div>
        </form>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS -->
    <script src="<?php echo base_url(); ?>/assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>/assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>/assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS -->
    <script src="<?php echo base_url(); ?>/assets/vendors/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="<?php echo base_url(); ?>/assets/js/app.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    username: {
                        required: true,
                        username: true
                    },
                    password: {
                        required: true
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
<script type='text/javascript'>
<?php if($this->session->flashdata('error1') == 'failpassword') { ?>
    swal("Login Gagal","Cek kembali password anda !","error");
<?php }else if($this->session->flashdata('error2') == 'failaccount') { ?>
    swal("Login Gagal","Cek kembali username dan password anda !","error");
<?php } ?>
</script>

</body>

</html>