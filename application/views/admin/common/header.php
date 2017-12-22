<!DOCTYPE html>
<html lang="en">


    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> Admin Panel </title>

        <!-- Bootstrap core CSS -->

        <link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet">

        <link href="<?php echo base_url() ?>fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>css/animate.min.css" rel="stylesheet">

        <!-- Custom styling plus plugins -->
        <link href="<?php echo base_url() ?>css/custom.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/maps/jquery-jvectormap-2.0.3.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/maps/jquery-jvectormap-2.0.3.css" />
        <link href="<?php echo base_url() ?>css/icheck/flat/green.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>css/floatexamples.css" rel="stylesheet" type="text/css" />
        
        <!-- editor -->
  		<link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
  		<link href="<?php echo base_url() ?>css/editor/external/google-code-prettify/prettify.css" rel="stylesheet">
  		<link href="<?php echo base_url() ?>css/editor/index.css" rel="stylesheet">
        
        <!-- multi select -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/multiselect/multi-select.css">
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/imageZoomCrop/style.css" type="text/css" />
         <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/multipleUpload/uploadify.css">
        <script> var BASE_URL = '<?php echo base_url() ?>'; </script>
        <script src="<?php echo base_url() ?>js/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>js/nprogress.js"></script>
        <script src="<?php echo base_url() ?>js/admin/developer.js"></script>

        <!--[if lt IE 9]>
              <script src="../assets/js/ie8-responsive-file-warning.js"></script>
              <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
              <![endif]-->

    </head>

<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="#" class="site_title" style="text-align:center"> <span><?php echo $this->config->item('website_name') ?> </span></a>
          </div>
          <div class="clearfix"></div>

     

          <!-- sidebar menu -->
          <?php $this->load->view('admin/common/sidebar'); ?>
          <!-- sidebar menu -->

  
        </div>
      </div>

      <!-- top navigation -->
      <?php $this->load->view('admin/common/top_sidebar'); ?> 
      <!-- /top navigation -->
