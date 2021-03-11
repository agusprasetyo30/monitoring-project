<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Halaman Data Petugas Lapangan </h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->

				    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
						<li><a href="<?php echo base_url('dashboard') ?>"><i class="demo-pli-home"></i></a></li>
						<li><a href="<?php echo base_url('account') ?>">Menu Akun</a></li>
						<li><a href="<?php echo base_url('account/viewPetugasLapangan') ?>">Data Petugas Lapangan</a></li>
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
                            <a href="<?php echo base_url('account/tambahAkun?jabatan=petugas_lapangan')?>" id="demo-btn-addrow" class="btn btn-purple btn-labeled"><i class="btn-label ti-plus"></i> Tambah Petugas Lapangan</a>

                            <input type="hidden" name="type" value="<?php echo $this->input->get('v') ?>" />
					    </div>
					</div>
					<!---------------------------------->

                        <?php echo $this->session->flashdata('msg') ?>

					    <div class="row">

							<?php if ( $dataOfficer->num_rows() > 0 ) {  ?> 


							<?php foreach ( $dataOfficer->result_array() AS $row ) { ?>
					        
							<!---------------------------------->
							<div class="col-sm-4 col-md-3">
								<div class="panel panel-body" style="border : 1px solid #e0e0e0">
									<!-- Contact Widget -->
									<!---------------------------------->
									<div class="panel pos-rel">
										<div class="pad-all text-center">
											<div class="widget-control">
												<div class="btn-group dropdown">
													<a href="#" class="dropdown-toggle btn btn-trans" data-toggle="dropdown" aria-expanded="false"><i class="demo-psi-dot-vertical icon-lg"></i></a>
													<ul class="dropdown-menu dropdown-menu-right" style="">
														<li><a href="<?php echo base_url('account/editAkun?jabatan=petugas_lapangan&id='. $row['id_login']) ?>"><i class="icon-lg icon-fw demo-psi-pen-5"> </i> Sunting</a></li>
														<li data-target="#detail-pegawai-<?php echo $row['id_login'] ?>" data-toggle="modal"><a href="#"><i class="icon-lg icon-fw demo-pli-calendar-4"></i>Detail</a</li>
														<li><a 
															href="<?php echo base_url('account/onDeleteAccount?id='. $row['id_login'].'&jabatan='. $row['jabatan']) ?>" 
															onclick="return confirm('Apakah anda yakin ingin menghapus pegawai <?php echo $row['name'] ?>')"><i class="icon-lg icon-fw demo-pli-recycling"></i> Hapus</a></li>
													</ul>
												</div>
											</div>
											<a href="#">
												<img alt="Profile Picture" class="img-lg img-circle mar-ver" src="<?php echo base_url() ?>assets/img/profile-photos/8.png">
												<p class="text-lg text-semibold mar-no text-main"><?php echo $row['name'] ?></p>
												<p class="text-sm"><?php echo $row['jabatan'] == "petugas_lapangan" ? "Petugas Lapangan" : "" ?></p>
												<br>
												<!-- Profile Details -->
												<p><i class="demo-pli-mail icon-lg icon-fw"></i><?php echo $row['email'] ?></p>
												<p><i class="demo-pli-old-telephone icon-lg icon-fw"></i><?php echo $row['telp'] ?></p>
												
											</a>
										</div>
									</div>
								</div>
					        </div>




							<!-- MODAL -->
							<div class="modal fade" id="detail-pegawai-<?php echo $row['id_login'] ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="text-center">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
												<h4 class="modal-title">Detail Profil ....</h4>
											</div>
											<!--Default Bootstrap Modal-->
												<!--===================================================-->
												<!--Modal header-->
													<div class="col md-6">
													<img alt="Profile Picture" class="img-lg img-circle mar-ver" src="<?php echo base_url() ?>assets/img/profile-photos/8.png">
														<p class="text-lg text-semibold mar-no text-main"><?php echo $row['name'] ?></p>
														<p class="text-sm">Jabatan</p>
														<br>
													</div>
													<div class="col md-6">
														<!-- Profile Details -->
														<p><i class="demo-pli-mail icon-lg icon-fw"></i>aaaa@gmail.com</p>
														<p><i class="demo-pli-old-telephone icon-lg icon-fw"></i>087837777388</p>	
													</div>
												<!--===================================================-->
												<!--End Default Bootstrap Modal-->
											
											<!--Modal footer-->
											<div class="modal-footer">
												<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
												<button class="btn btn-primary">Save changes</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- END MODAL -->

							<?php } ?>
							
							
							
							<?php } else { ?>


								<div class="col-md-12 text-center">
									<h2>Kosong 😭</h2>
									<p>Anda belum menambahkan apapun</p>
								</div>

							<?php } ?>



					    </div>
					
					    
                </div>
                <!--===================================================-->
                <!--End page content-->
            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->

			
			<!-- MODAL -->
			<div class="modal fade" id="modals" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="text-center">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
								<h4 class="modal-title">Detail Profil ....</h4>
							</div>
							<!--Default Bootstrap Modal-->
								<!--===================================================-->
								<!--Modal header-->
									<div class="col md-6">
									<img alt="Profile Picture" class="img-lg img-circle mar-ver" src="<?php echo base_url() ?>assets/img/profile-photos/8.png">
										<p class="text-lg text-semibold mar-no text-main">Nama</p>
										<p class="text-sm">Jabatan</p>
										<br>
									</div>
									<div class="col md-6">
										<!-- Profile Details -->
										<p><i class="demo-pli-mail icon-lg icon-fw"></i>aaaa@gmail.com</p>
										<p><i class="demo-pli-old-telephone icon-lg icon-fw"></i>087837777388</p>	
									</div>
								<!--===================================================-->
								<!--End Default Bootstrap Modal-->
							
					<!--Modal footer-->
							<div class="modal-footer">
								<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
								<button class="btn btn-primary">Save changes</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END MODAL -->