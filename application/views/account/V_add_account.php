        <!--CONTENT CONTAINER-->
                    <!--===================================================-->
                    <div id="content-container">
                        <div id="page-head">
                            
                            <!--Page Title-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <div id="page-title">
                                <h1 class="page-header text-overflow">Menu Halaman Data Pegawai Kantor </h1>
                            </div>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End page title-->

							<!--Breadcrumb-->
							<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url('account') ?>"><i class="demo-pli-home"></i></a></li>
								<li><a href="<?php echo base_url('account') ?>">Menu Akun</a></li>
								<li><a href="<?php echo base_url('account') ?>">Data...</a></li>
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
                                    <a href="<?php echo base_url('account') ?>" id="demo-btn-addrow" class="btn btn-primary btn-labeled"><i class="btn-label ti-arrow-left"></i> Kembali ke menu utama</a>
                                    <input type="hidden" name="type" value="<?php echo $this->input->get('v') ?>" />
                                </div>
                            </div>
                            <!---------------------------------->


                    <div class="row">
                        
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-body" style="border : 1px solid #e0e0e0">
                            <h4>Data Pegawai...</h4>
                                <p>Lengkapi data form dibawah ini</p>
					            <!--===================================================-->
					            <form class="form-horizontal" action="<?php echo base_url('account/prosesTambahAkun') ?>" method="POST">
					                <div class="panel-body">
                                    	
					                    <div class="form-group">
					                        <label for="demo-is-inputnormal" class="col-sm-3 control-label">Nama Lengkap</label>
					                        <div class="col-sm-6">
					                            <input name="nama" type="text" placeholder="Masukkan nama lengkap..."  class="form-control" id="demo-is-inputnormal">
					                        </div>
					                    </div>
					                    <div class="form-group">
					                        <label for="demo-is-inputnormal" class="col-sm-3 control-label">Alamat</label>
					                        <div class="col-sm-8">
                                            <textarea placeholder="Masukkan alamat..." rows="4" class="form-control" name="alamat"></textarea>
					                        </div>
					                    </div>

                                        <div class="form-group pad-ver">
					                    <label class="col-md-3 control-label text-semibold">Jenis Kelamin</label>
					                    <div class="col-md-6">
					                        <div class="radio">
					                            <!-- Inline radio buttons -->
					                            <input id="gender-1" class="magic-radio" type="radio" name="gender" value="L">
					                            <label for="gender-1">Laki-laki</label>
					
					                            <input id="gender-2" class="magic-radio" type="radio" name="gender" value="P">
					                            <label for="gender-2">Perempuan</label>					
					                        </div>
                                            <small class="text-muted">Pilih jenis kelamin</small>
											</div>
										</div>

					                    <div class="form-group">
					                        <label class="col-sm-3 control-label">Nomor Telepon</label>
					                        <div class="col-sm-3">
					                            <input name="notelp" type="text" placeholder="081..."  class="form-control">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="demo-is-inputnormal" class="col-sm-3 control-label">Email</label>
					                        <div class="col-sm-6">
					                            <input name="email" type="text" placeholder="Email..."  class="form-control" id="demo-is-inputnormal">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="demo-is-inputnormal" class="col-sm-3 control-label">Tanggal Lahir</label>
					                        <div class="col-sm-6">
					                            <input name="tanggallahir" type="date" class="form-control" id="demo-is-inputnormal">
					                        </div>
					                    </div>
										<div class="form-group">
					                        <label for="demo-is-inputnormal" class="col-sm-3 control-label">Tempat Lahir</label>
					                        <div class="col-sm-6">
					                            <input name="tempatlahir" type="text" placeholder="Masukkan Tempat Lahir..."  class="form-control" id="demo-is-inputnormal">
					                        </div>
					                    </div>
										<div class="form-group pad-ver">
					                    <label class="col-md-3 control-label text-semibold">Wilayah Penugasan</label>
					                    <div class="col-md-6">
					                        <div class="radio">
					                            <!-- Inline radio buttons -->
					                            <input id="wilayah-1" class="magic-radio" type="radio" name="wilayah" value="Kota" >
					                            <label for="wilayah-1">Kota</label>
					
					                            <input id="wilayah-2" class="magic-radio" type="radio" name="wilayah" value="Kab">
					                            <label for="wilayah-2">Kabupaten</label>					
					                        </div>
                                            <small class="text-muted">Pilih wilayah penugasan</small>
											</div>
										</div>

                                    </div>
					            </div>
                            </div>  
					    </div>

                        <div class="row">
                        
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-body" style="border : 1px solid #e0e0e0">
                            <h4>Akun Hak Akses</h4>
                                <p>Tambahkan informasi data login dibawah ini</p>
					            <!--===================================================-->
					            <form class="form-horizontal">
                                    <br>
                                    <div class="form-group">
					                    <label for="demo-is-inputnormal" class="col-sm-3 control-label">Username</label>
					                    <div class="col-sm-6">
					                    	<input name="username" type="text" placeholder="Masukkan username..."  class="form-control" id="demo-is-inputnormal">
					                    </div>
					                </div>
                                    <br>
                                    <br>
                                    <div class="form-group">
					                        <label for="demo-is-inputnormal" class="col-sm-3 control-label">Password</label>
					                        <div class="col-sm-6">
					                            <input name="password" type="password" placeholder="Masukkan password..."  class="form-control" id="demo-is-inputnormal">
					                        </div>
					                </div>
                                    </div>
					            </div>
                            </div>  
					    </div>

						<div class="panel-footer">
							<div class="row">
					                <div class="col-md-10 text-right">
										<a href="<?php echo base_url('account') ?>" class="btn btn-default btn-hover-primary btn-labeled" style="color: #294f75; border: 1px solid #294f75 !important"><i class="btn-label ti-exchange-vertical"></i> Reset</a>
                    					<button class="btn btn-primary btn-labeled btn-submit"><i class="btn-label ti-check"></i> Tambahkan dan Simpan</button>
					                </div>
					            </div>
					    </div>
				</form>
					            <!--===================================================-->
					            <!--End Input Size-->