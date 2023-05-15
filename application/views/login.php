<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=$title?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/css/all.min.css"/>
    <style>
        .error{
            color:red;
        }
    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Sistema</b>Control</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <form id="form-login" method="post">
        <input type="email" name="email" class="form-control mb-2" placeholder="Email" data-rule-required="true" data-msg-required="Requerido">
        <input type="password" name="password" class="form-control mb-2" placeholder="Password" data-rule-required="true" data-msg-required="Requerido" autocomplete="off">
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-primary btn-block" onclick="login()"> <span id="loader"></span> Iniciar Sesión</button>
            </div>
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>/assets/dist/js/adminlte.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
     function login(){
        if ($("#form-login").valid()) {
            $.ajax({                  
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/welcome/login",
            beforeSend: function() {
                $("#loader").addClass('fa fa-refresh fa-spin');
            },
            data: $("#form-login").serialize()
            })
            .done(function (respuesta) {
                $("#loader").removeClass('fa fa-refresh fa-spin');
                let response = JSON.parse(respuesta);
                Swal.fire({
                    icon: response.type,
                    title: response.mensaje,
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    if(response.redirect != 'null'){
                        window.location.href = response.redirect;
                    }
                })
            })
        }
    }
</script>
</body>
</html>
