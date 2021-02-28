        <!-- LOGIN FORM -->
		<!--===================================================-->
        <div class="cls-content" style="z-index: 1">

            <div class="text-center">
                <img src="<?php echo base_url('assets/img/logopgn.png') ?>" alt="logo" style="width: 60px">
                <h1 class="h3">Halaman Login</h1>
		        <p>Masukkan username dan kata sandi anda</p>

            </div>
		    <div class="cls-content-sm panel" style="background-color: #fff;">
		        
                <div class="panel-body">
		            <!-- <div class="mar-ver pad-btm">
		            </div> -->
                    <?php echo $this->session->flashdata('pesan') ?>
		            <form action="<?php echo base_url('login/processLogin') ?>" method="POST">
		                <div class="form-group has-feedback">
		                    <input type="text" name="username" class="form-control" placeholder="Username" autofocus required="">
                            <i class="demo-pli-male form-control-feedback"></i>
		                </div>
		                <div class="form-group has-feedback">
		                    <input type="password" name="password" class="form-control" placeholder="kata sandi" required="">
                            <i class="ti ti-key form-control-feedback"></i>
		                </div>
		                <button class="btn btn-primary btn-block" type="submit">Masuk</button>
		            </form>
		        </div>
		
		        <div class="pad-all">
                    <small>kesulitan mengakses aplikasi, harap hubungi admin</small>
		
		            <div class="media pad-top bord-top">
		                <div class="media-body text-left text-bold text-main">
		                    Internship
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!--===================================================-->