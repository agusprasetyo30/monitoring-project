
<?php
                                        
                                        
    $foto = $this->session->userdata('sess_foto');
    $username = $this->session->userdata('sess_username');
    $name     = $this->session->userdata('sess_name');
    $foto     = $this->session->userdata('sess_foto');
    $jabatan  = $this->session->userdata('sess_jabatan');
    $level    = $this->session->userdata('sess_level');
    
    // pemanggilan gambar
    $img = base_url('assets/img/profile-photos/'. $foto);
?>



<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo @$title ? $title : 'Aplikasi Monitoring Penagihan Piutang' ?></title>


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="<?php echo base_url() ?>assets/css/nifty.min.css" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="<?php echo base_url() ?>assets/css/demo/nifty-demo-icons.min.css" rel="stylesheet">

    <!--jQuery [ REQUIRED ]-->
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>


    <!--=================================================-->



    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="<?php echo base_url() ?>assets/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>assets/plugins/pace/pace.min.js"></script>
    <script>
        var serverside = '<?php echo base_url() ?>';
    </script>


    <!-- Theme -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/themes/theme-dark.min.css') ?>">

    <!--Demo [ DEMONSTRATION ]-->
    <link href="<?php echo base_url() ?>assets/css/demo/nifty-demo.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/') ?>plugins/themify-icons/themify-icons.min.css" rel="stylesheet">
    <!--Ion Icons [ OPTIONAL ]-->
    <link href="<?php echo base_url('assets/') ?>plugins/ionicons/css/ionicons.min.css" rel="stylesheet">
    
    <!--Font Awesome [ OPTIONAL ]-->
    <link href="<?php echo base_url('assets/') ?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!--CSS Loaders [ OPTIONAL ]-->
    <link href="<?php echo base_url() ?>assets/plugins/css-loaders/css/css-loaders.css" rel="stylesheet">
    <!--Spinkit [ OPTIONAL ]-->
    <link href="<?php echo base_url() ?>assets/plugins/spinkit/css/spinkit.min.css" rel="stylesheet">

    <!--Bootstrap Datepicker [ OPTIONAL ]-->
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">

    <!--Bootstrap Timepicker [ OPTIONAL ]-->
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">

    <link rel="shortcut icon" href="<?php echo base_url('assets/img/logopgn.png') ?>" />


    <!--DataTables [ OPTIONAL ]-->
    <link href="<?php echo base_url() ?>assets/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css" rel="stylesheet">

    <!--Chosen [ OPTIONAL ]-->
    <link href="<?php echo base_url() ?>assets/plugins/chosen/chosen.min.css" rel="stylesheet">
    <!--Bootstrap Datepicker [ OPTIONAL ]-->
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">


    

        
</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->


<body>


    <?php
        
        $footerFixed = "";
        $uriSegment = $this->uri->segment(1);
        $mainnav = "mainnav-lg";

       

        // if ( $uriSegment == "account" || $uriSegment == "punishment" || $uriSegment == "email" || $uriSegment == "open-order" ) {

        //     $footerFixed = "footer-fixed";
        
        // } else if ( $uriSegment == "book" || $uriSegment == "close-order" ) {

        //     $footerFixed = 'footer-fixed';
        // }


        // if ( $uriSegment == "history" ) {

        //     $mainnav = "mainnav-sm";
        // }
    ?>
    <div id="container" class="effect aside-float aside-bright <?php echo $mainnav.' '.$footerFixed ?>">
        
        <!--NAVBAR-->
        <!--===================================================-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">

                <!--Brand logo & name-->
                <!--================================-->
                <div class="navbar-header">
                    <a href="" class="navbar-brand text-center">    
                        <img src="<?php echo base_url('assets/img/logopgn.png') ?>" alt="Polinema" class="brand-icon" style="padding: 10px">
                        <div class="brand-title">
                            <span class="brand-text">Monitoring</span>
                        </div>
                    </a>
                </div>
                <!--================================-->
                <!--End brand logo & name-->


                <!--Navbar Dropdown-->
                <!--================================-->
                <div class="navbar-content">
                    <ul class="nav navbar-top-links">

                        <!--Navigation toogle button-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="tgl-menu-btn">
                            <a class="mainnav-toggle" href="#">
                                <i class="demo-pli-list-view"></i>
                            </a>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End Navigation toogle button-->

                    </ul>
                    <ul class="nav navbar-top-links">


                        <!--User dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li id="dropdown-user" class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="ic-user pull-right">
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                    <!--You can use an image instead of an icon.-->
                                    <!--<img class="img-circle img-user media-object" src="<?php echo base_url() ?>assets/img/profile-photos/1.png" alt="Profile Picture">-->
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                    <i class="demo-pli-male"></i>
                                </span>
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                <!--You can also display a user name in the navbar.-->
                                <!--<div class="username hidden-xs">Aaron Chavez</div>-->
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            </a>


                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                                <ul class="head-list">
                                    <li>
                                        <a href="<?php //echo base_url('setting-account') ?>"><i class="demo-pli-male icon-lg icon-fw"></i> Profile</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('login/processlogout') ?>"><i class="demo-pli-unlock icon-lg icon-fw"></i> Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End user dropdown-->
 
                    </ul>
                </div>
                <!--================================-->
                <!--End Navbar Dropdown-->

            </div>
        </header>
        <!--===================================================-->
        <!--END NAVBAR-->

        <div class="boxed">


            <?php $this->load->view( $folder.'/'.$view ) ?>


            

            
            <!--MAIN NAVIGATION-->
            <!--===================================================-->
            <nav id="mainnav-container">
                <div id="mainnav">



                    <!--Menu-->
                    <!--================================-->
                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content">

                                <!--Profile Widget-->
                                <!--================================-->
                                <div id="mainnav-profile" class="mainnav-profile">
                                    <div class="profile-wrap text-center">
                                        <div class="pad-btm">
                                        
                                            <img class="img-circle img-md" src="<?php echo $img ?>" alt="Profile Picture">
                                        </div>
                                        <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                            <span class="pull-right dropdown-toggle">
                                                <i class="dropdown-caret"></i>
                                            </span>
                                            <p class="mnp-name"><?php echo $name ?></p>
                                            <span class="mnp-desc">
                                                <?php

                                                    if ( $jabatan == "petugas_lapangan" ) {

                                                        echo "Petugas Lapangan";
                                                    } else if ( $jabatan == "pegawai_kantor" ) {

                                                        echo "Pegawai Kantor";
                                                    } else if ( $jabatan == "manajer" ) {

                                                        echo "Manajer Kantor Jargas";
                                                    
                                                    
                                                    } else { // super admin

                                                        echo $jabatan;
                                                    }
                                                    
                                                
                                                ?>
                                            </span>
                                        </a>
                                    </div>
                                    <div id="profile-nav" class="collapse list-group bg-trans">
                                    <?php
											
												$id_login = $this->session->userdata('sess_idlogin');
											?>

                                    <li>
                                        <a href="<?php echo base_url('account/editAkun?jabatan='. $jabatan .'&id='.$id_login) ?>" class="list-group-item">
                                            <i class="demo-pli-male icon-lg icon-fw"></i> Pengaturan Akun
                                        </a>
                                         <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="index.html">Dashboard 1</a></li>
											<li><a href="dashboard-2.html">Dashboard 2</a></li>
											<li><a href="dashboard-3.html">Dashboard 3</a></li>
											
						                </ul>
                                    </li>
                                        <a href="<?php echo base_url('login/processlogout') ?>" class="list-group-item">
                                            <i class="demo-pli-unlock icon-lg icon-fw"></i> Logout
                                        </a>
                                    </div>
                                </div>


                                <!--Shortcut buttons-->
                                <!--================================-->
                                <div id="mainnav-shortcut" class="hidden">
                                    <ul class="list-unstyled shortcut-wrap">
                                        <li class="col-xs-3" data-content="My Profile">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
                                                <i class="demo-pli-male"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Messages">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
                                                <i class="demo-pli-speech-bubble-3"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Activity">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                                <i class="demo-pli-thunder"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Lock Screen">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
                                                <i class="demo-pli-lock-2"></i>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!--================================-->
                                <!--End shortcut buttons-->


                                <!-- Navigation sidebar -->

                                <?php

                                    if ( $jabatan == "petugas_lapangan" ) {

                                        $this->load->view('template/navigation_employee');

                                    } else if ( $jabatan == "manajer" ) {
                                        $this->load->view('template/navigation_manajer');



                                    } else {

                                        // view super admin

                                        $this->load->view('template/navigation_officer');
                                    }

                                    
                                
                                ?>


                                <!-- end Navigation sidebar -->


                            </div>
                        </div>
                    </div>
                    <!--================================-->
                    <!--End menu-->

                </div>
            </nav>
            <!--===================================================-->
            <!--END MAIN NAVIGATION-->

        </div>

        
        
        <!-- FOOTER -->
        <!--===================================================-->
        <footer id="footer">

            <!-- Visible when footer positions are fixed -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="show-fixed pad-rgt pull-right">
                You have <a href="#" class="text-main"><span class="badge badge-danger">3</span> pending action.</a>
            </div>




            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <!-- Remove the class "show-fixed" and "hide-fixed" to make the content always appears. -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

            <p class="pad-lft">&#0169; <?php echo date('Y') ?> | Kantor Jargas (Jaringan Gas) Probolinggo</p>



        </footer>
        <!--===================================================-->
        <!-- END FOOTER -->


        <!-- SCROLL PAGE BUTTON -->
        <!--===================================================-->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
        <!--===================================================-->
    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->


    
    
    
    <!--JAVASCRIPT-->
    <!--=================================================-->


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="<?php echo base_url() ?>assets/js/nifty.min.js"></script>




    <!--=================================================-->
    
    
    
    <!--DataTables [ OPTIONAL ]-->
    <script src="<?php echo base_url() ?>assets/plugins/datatables/media/js/jquery.dataTables.js"></script>
	<script src="<?php echo base_url() ?>assets/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
	<script src="<?php echo base_url() ?>assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>

    <script>
    
        $('#table-domisili').dataTable();
        $('#table-subdomisili').dataTable();
        $('#table-jenis_pelanggan').dataTable();
        $('#table-data_pelanggan').dataTable();
        $('#table-data_piutang').dataTable({

            "responsive": true,
        });
    </script>






    



    <?php if ( $this->session->flashdata('msg-greet') == "active" ) { ?>
    <script>
    
        
        $(function() {

            var msg = '<div class="media-left"><span class="icon-wrap icon-wrap-xs icon-circle alert-icon"><i class="ti-face-smile icon-2x"></i></span></div><div class="media-body"><h4 class="alert-title">Hallo !</h4><p class="alert-message">Selamat datang di aplikasi pelayanan antrian.</p></div>'

            $.niftyNoty({
                type: 'info',
                container : 'floating',
                html : msg,
                closeBtn : true,
                timer : 6000,
                floating: {
                    position: 'top-right',
                    animationIn: 'jellyIn',
                    animationOut: 'fadeOutRight'
                },
            });
        });
    
    </script>
    <?php } ?>














    <?php if ( $this->session->flashdata('msg') ) { ?>
    <script>
    
        
        $(function() {

            var msg = 'Pengoperasian <?php echo $this->session->flashdata('msg') ?> data berhasil <br> <small>Pada <?php echo date('d F Y H.i A') ?></small>';

            $.niftyNoty({
                type: 'dark',
                container : 'floating',
                html : msg,
                closeBtn : true,
                timer : 6000,
                floating: {
                    position: 'bottom-left',
                    animationIn: 'jellyIn',
                    animationOut: 'fadeOutRight'
                },
            });
        });
    
    </script>
    <?php } ?>
    
    

</body>
</html>
