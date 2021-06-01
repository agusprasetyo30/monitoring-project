<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container" style="margin-bottom: 25px">
    <div id="page-head">
        
        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Pengaturan Akun Login</h1>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard') ?>"><i class="demo-pli-home"></i></a></li>
        <li><a href="<?php echo base_url('setting') ?>">Menu Pengaturan </a></li>
        <li class="active">Pengaturan Password</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->

    </div>

    
    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        
        <!-- Contact Toolbar -->
        <!---------------------------------->
        <div class="row pad-btm">
            <div class="col-sm-6 toolbar-left">
                <a href="<?php echo base_url('dashboard') ?>" id="demo-btn-addrow" class="btn btn-primary btn-labeled"><i class="btn-label ti-arrow-left"></i> Kembali ke halaman sebelumnya</a>
            </div>
        </div>
        <!---------------------------------->

        <div class="row">
            
            <div class="col-md-8 col-md-offset-2">


                 <?php echo $this->session->flashdata('refresh') ?>
                <?php echo $this->session->flashdata('msg') ?>
                <form action="<?php echo base_url('setting/prosesUbahPassword') ?>" method="POST">

                <!-- Information detail -->
                <div class="panel panel-body" style="border : 1px solid #e0e0e0">

                    <form method="GET" id="form-account">

                    <div class="row">
                        <div class="col-md-5">
                            <div class="media pad-ver" style="margin-top: 30%">
					            <div class="media-left">
					                <div href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src="<?php echo base_url() ?>assets/img/default-user.png"></div>
					            </div>
					            <div class="media-body pad-top">
					                <div class="box-inline">
                                        <span class="text-lg text-semibold text-main"><?php echo $account['username'] ?></span>
					                    <p class="text-sm"><?php echo date('d F Y H.i A', strtotime($account['last_logged'])) ?></p>
					                </div>
					            </div>
					        </div>
                        </div>

                        <div class="col-md-7" style="border-left: 1px solid #e0e0e0">
                        
                            <h5 ><i class="ti-signal"></i> Informasi Akun</h5>
                            <p class="text-sm text-muted">Kata sandi secara default adalah sama seperti username yang digunakan, apakah anda ingin merubahnya ?</p>

                            <hr>
                            <div class="">
                                <div class="form-group">
                                    <label class="text-semibold">Username <small>*</small> </label>
                                    <h5 style="margin: 0px" class="text-thin">@<?php echo $account['username'] ?></h5>
                                    <input type="hidden" name="id" value="<?php echo $account['id_login'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="text-semibold">Kata sandi lama</label>
                                    <input type="password" name="old-password" class="form-control input-sm" <?php echo $account['username'] ?>placeholder="kata sandi lama" required="" />
                                    <small>Masukkan kata sandi lama anda</small>
                                </div>
                                
                                <div class="form-group">
                                    <label class="text-semibold">Kata sandi baru</label>
                                    <input type="password" name="new-password" class="form-control input-sm" placeholder="kata sandi baru" required="" />
                                    <small>Masukkan kata sandi baru</small>
                                </div>
                                <div class="form-group text-right">
                                    <button type="reset" class="btn btn-default btn-sm">Reset</button>
                                    <button class="btn btn-primary btn-labeled btn-sm"><i class="fa fa-paper-plane-o"></i> Perbarui dan Simpan</button>
                                </div>
                            </div>
                        </div>


                    </div>



                    </form>

                </div>
            
            </div>
        
        </div>
        
    </div>
</div>




<script>

    $(function() {



        $('#form-account').on('submit', function( e ) {

            $.ajax({

                type : "GET",
                url  : serverside + 'setting/onUpdateAccount',
                data : $(this).serialize(),
                dataType : "json",
                success : function( res ) {

                    if ( res ) {

                        notification("dark", "Kata sandi berhasil di perbarui", "center-right");
                    } else {

                        notification("dark", "Kata sandi lama anda salah", "center-right");
                    }
                }
            });
            e.preventDefault();
        });


        function notification( type, html, position = 'bottom-left' ) {

            $.niftyNoty({
                type: type,
                container : 'floating',
                html : html,
                closeBtn : false,
                timer : 6000,
                floating: {
                    position: position,
                    animationIn: 'jellyIn',
                    animationOut: 'jellyOut'
                },
            });
        }
    }); 

</script>