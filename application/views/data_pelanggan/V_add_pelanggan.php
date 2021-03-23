        <!--CONTENT CONTAINER-->
                    <!--===================================================-->
                    <div id="content-container">
                        <div id="page-head">
                            
                            <!--Page Title-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <div id="page-title">}
                                <h1 class="page-header text-overflow">Tambah Data Pelanggan </h1>
                            </div>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End page title-->

							<!--Breadcrumb-->
							<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url('data_pelanggan') ?>"><i class="demo-pli-home"></i></a></li>
								<li class="active">Tambah Data Pelanggan</li>
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
                                    <a href="<?php echo base_url('data_pelanggan') ?>" id="demo-btn-addrow" class="btn btn-primary btn-labeled"><i class="btn-label ti-arrow-left"></i> Kembali ke menu utama</a>
                                    
                                </div>
                            </div>
                            <!---------------------------------->


                    <div class="row">
                        
                        <div class="col-md-8 col-md-offset-2">
							
							<?php echo $this->session->flashdata('msg') ?>

                            <div class="panel panel-body" style="border : 1px solid #e0e0e0">
                            <h4>Data Pelanggan</h4>
                                <p>Lengkapi data form dibawah ini</p>

					            <!--===================================================-->
					            <form class="form-horizontal" action="<?php echo base_url('data_pelanggan/prosesTambahPelanggan') ?>" method="POST" enctype="multipart/form-data">
					                <div class="panel-body">
                                    	
					                    <div class="form-group">
					                        <label for="demo-is-inputnormal" class="col-sm-3 control-label">No Ref</label>
					                        <div class="col-sm-6">
					                            <input name="no_ref" type="text" placeholder="Masukkan No Ref..." required="" class="form-control" id="demo-is-inputnormal">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="demo-is-inputnormal" class="col-sm-3 control-label">Nama</label>
					                        <div class="col-sm-6">
					                            <input name="nama_pelanggan" type="text" placeholder="Masukkan Nama..." required="" class="form-control" id="demo-is-inputnormal">
					                        </div>
					                    </div>
					                    <div class="form-group">
					                        <label for="demo-is-inputnormal" class="col-sm-3 control-label">Alamat</label>
					                        <div class="col-sm-8">
                                            <textarea placeholder="Masukkan alamat..." rows="4" class="form-control" name="alamat" required=""></textarea>
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="demo-is-inputnormal" class="col-sm-3 control-label">Status/Jenis Pelanggan</label>
					                        <div class="col-sm-6">
                                            <select data-placeholder="Choose a Country..." id="demo-chosen-select" tabindex="2">
					                            <option value="United States">United States</option>
					                            <option value="United Kingdom">United Kingdom</option>
                                            </select>
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label class="col-sm-3 control-label">Domisili</label>
					                        <div class="col-sm-3">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label class="col-sm-3 control-label">Sub Domisili</label>
					                        <div class="col-sm-3">
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
					                    	<input name="username" type="text" placeholder="Masukkan username..."  class="form-control" id="demo-is-inputnormal" required="">
					                    </div>
					                </div>
                                    <br>
                                    <br>
                                    <div class="form-group">
					                        <label for="demo-is-inputnormal" class="col-sm-3 control-label">Password</label>
					                        <div class="col-sm-6">
					                            <input name="password" type="password" placeholder="Masukkan password..."  class="form-control" id="demo-is-inputnormal" required="">
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