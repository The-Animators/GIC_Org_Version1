<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Login | Adminox - Responsive Bootstrap 4 Admin Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
  <meta content="Coderthemes" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/gic_img/gic_logo_new.png" style="max-height:100px;width:200px;">
  <!-- <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/gic_img/gic_logo.jpeg" > -->

  <!-- App css -->
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
  <link href="<?php echo base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />
  <link href="<?php echo base_url(); ?>assets/custom_js/custom_css.css" rel="stylesheet" type="text/css" id="app-stylesheet" />
  <!-- CSS Plugins Start For This Page -->
  <?php
  if (isset($css_plugins) && !empty($css_plugins)) :
    foreach ($css_plugins as $css_file) :
      $this->load->view($this->config->item('template_folder') . "plugins/css_plugins/$css_file");
    endforeach;
  endif;
  ?>
  <script src="<?php echo base_url(); ?>assets/js/vendor.min.js"></script>

  <?php $this->load->view("templates/include/custom_script_message"); ?>
</head>

<body class="authentication-bg bg-primary authentication-bg-pattern d-flex align-items-center pb-0 vh-100">


  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

  <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
  </head>
  <?php $this->load->view($login_page); ?>
  <!-- JS Plugins Start For This Page -->
  <?php
  if (isset($js_plugins) && !empty($js_plugins)) :
    foreach ($js_plugins as $js_file) :
      $this->load->view($this->config->item('template_folder') . "plugins/js_plugins/$js_file");
    endforeach;
  endif;
  ?>
  <!-- JS Plugins End For This Page -->
  <script type="text/javascript" src="<?php echo $base_url; ?>assets/custom_js/custom_toast.js"></script>

  <!-- App js -->
  <script src="<?php echo base_url(); ?>assets/js/app.min.js"></script>

</body>

</html>