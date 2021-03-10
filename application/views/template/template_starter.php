
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Login Aplikasi</title>


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="<?php echo base_url('assets/css/') ?>bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="<?php echo base_url('assets/css/') ?>nifty.min.css" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="<?php echo base_url('assets/css/') ?>demo/nifty-demo-icons.min.css" rel="stylesheet">


    <!--=================================================-->



    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="<?php echo base_url('assets/plugins/') ?>pace/pace.min.css" rel="stylesheet">
    <script src="<?php echo base_url('assets/plugins/') ?>pace/pace.min.js"></script>
    <!--Themify Icons [ OPTIONAL ]-->
    <link href="<?php echo base_url('assets/') ?>plugins/themify-icons/themify-icons.min.css" rel="stylesheet">


        
    <!--Demo [ DEMONSTRATION ]-->
    <link href="<?php echo base_url('assets/css/') ?>demo/nifty-demo.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/logopgn.png') ?>" />

    
    <style>

        .ball {
            position: absolute;
            border-radius: 100%;
            opacity: 0.7;
            
        }
    
    </style>
        
</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
    <div id="container" class="cls-container">
        
		

        <?php $this->load->view( $folder.'/'. $view ); ?>
		
		
    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->


        
    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--jQuery [ REQUIRED ]-->
    <script src="<?php echo base_url('assets/js/') ?>jquery.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="<?php echo base_url('assets/js/') ?>bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="<?php echo base_url('assets/js/') ?>nifty.min.js"></script>




    <!--=================================================-->
    <script>
        var serverside = "<?php echo base_url() ?>";
        
    </script>
    <script src="<?php echo base_url('assets/js/modules/login.js') ?>"></script>

    <!--Background Image [ DEMONSTRATION ]-->
    <script src="<?php echo base_url('assets/plugins/ball-particle/particle.js') ?>"></script>

</body>
</html>
