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
                            <a href="<?php echo base_url('account/tambahAkun')?>" id="demo-btn-addrow" class="btn btn-purple btn-labeled"><i class="btn-label ti-plus"></i> Tambah User Baru</a>

                            <input type="hidden" name="type" value="<?php echo $this->input->get('v') ?>" />
					    </div>
					</div>
					<!---------------------------------->
					
					    <div class="row">

							<?php foreach ( $dataOfficer->result_array() AS $row ) { ?>
					        
							<!---------------------------------->
							<div class="col-sm-4 col-md-3">
								<div class="panel panel-body" style="border : 1px solid #e0e0e0">
									<!-- Contact Widget -->
									<!---------------------------------->
									<div class="panel pos-rel">
										<div class="pad-all text-center">
											<div class="widget-control">
												<a href="#" class="add-tooltip btn btn-trans" data-original-title="Favorite"><span class="favorite-color"><i class="demo-psi-star icon-lg"></i></span></a>
												<div class="btn-group dropdown">
													<a href="#" class="dropdown-toggle btn btn-trans" data-toggle="dropdown" aria-expanded="false"><i class="demo-psi-dot-vertical icon-lg"></i></a>
													<ul class="dropdown-menu dropdown-menu-right" style="">
														<li><a href="<?php echo base_url('account/editAkun') ?>"><i class="icon-lg icon-fw demo-psi-pen-5"></i> Sunting</a></li>
														<li><a href="#"><i class="icon-lg icon-fw demo-pli-recycling"></i> Hapus</a></li>
														<li><a href="#"><i class="icon-lg icon-fw demo-pli-calendar-4"></i> Detail</a></li>
													</ul>
												</div>
											</div>
											<a href="#">
												<img alt="Profile Picture" class="img-lg img-circle mar-ver" src="assets/img/profile-photos/8.png">
												<p class="text-lg text-semibold mar-no text-main"><?php echo $row['name'] ?></p>
												<p class="text-sm">Pegawai Kantor</p>
												<p class="text-sm">Hamba Allah yang masih berusaha untuk istiqomah dengan hal-hal yang baik, aamiin.. </p>
											</a>
										</div>
									</div>
								</div>
					        </div>
							<!---------------------------------->

							<?php } ?>
					    </div>
					
					    
                </div>
                <!--===================================================-->
                <!--End page content-->

            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->