<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Halaman Data Pegawai Kantor </h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->

				    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
						<li><a href="<?php echo base_url('dashboard') ?>"><i class="demo-pli-home"></i></a></li>
						<li><a href="<?php echo base_url('account') ?>">Menu Akun</a></li>
						<li><a href="<?php echo base_url('account/viewPegawaiKantor') ?>">Data Pegawai Kantor</a></li>
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
                            <a href="<?php echo base_url('account/tambahAkun?jabatan=pegawai_kantor')?>" id="demo-btn-addrow" class="btn btn-purple btn-labeled"><i class="btn-label ti-plus"></i> Tambah Pegawai Kantor</a>

                            <input type="hidden" name="type" value="<?php echo $this->input->get('v') ?>" />
					    </div>

					</div>
					<!---------------------------------->
					
                        <?php echo $this->session->flashdata('msg') ?>
					    <div class="row">


							<?php if ( $dataOfficer->num_rows() > 0 ) {  ?> 

								<?php foreach ( $dataOfficer->result_array() AS $row ) { 
									
									
									if ( $row['foto'] ) {

										$img = base_url('assets/img/profile-photos/'. $row['foto']);
									} else {
	
										$number = $row['jenis_kelamin'] == "L" ? "1.png" : "7.png";	
										$img = base_url('assets/img/profile-photos/'. $number);
									}	
								?>
								
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
															<li><a href="<?php echo base_url('account/editAkun?jabatan=pegawai_kantor&id='. $row['id_login']) ?>"><i class="icon-lg icon-fw demo-psi-pen-5"></i> Sunting</a></li>
															<li  data-target="#detail-pegawai-<?php echo $row['id_login'] ?>" data-toggle="modal"><a href="#"><i class="icon-lg icon-fw demo-pli-calendar-4"></i> Detail</a></li>
															<li><a 
																href="<?php echo base_url('account/onDeleteAccount?id='. $row['id_login'].'&jabatan='. $row['jabatan']) ?>" 
																onclick="return confirm('Apakah anda yakin ingin menghapus pegawai <?php echo $row['name'] ?>')"><i class="icon-lg icon-fw demo-pli-recycling"></i> Hapus</a></li>
														</ul>
													</div>
												</div>
										
													<img alt="Profile Picture" class="img-lg img-circle mar-ver" src="<?php echo $img ?>">
													<p class="text-lg text-semibold mar-no text-main"><?php echo $row['name'] ?></p>
													<p class="text-sm"><?php echo $row['jabatan'] == "pegawai_kantor" ? "Pegawai Kantor" : "" ?></p>
													<br>
													<!-- Profile Details -->
													<p><i class="demo-pli-mail icon-lg icon-fw"></i><?php echo $row['email'] ?></p>
													<p><i class="demo-pli-old-telephone icon-lg icon-fw"></i><?php echo $row['telp'] ?></p>
												</a>
											</div>
										</div>
									</div>
								</div>
								<!---------------------------------->







								<!--Detail Bootstrap Modal-->
								<!--===================================================-->
								<div id="detail-pegawai-<?php echo $row['id_login'] ?>" class="modal fade" tabindex="-1">
									<div class="modal-dialog modal-md">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
											</div>
											<div class="modal-body">
												<div class="media pad-ver">
													<div class="media-left">
														<div class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src="<?php echo $img ?>"></div>
													</div>
													<div class="media-body pad-top">
														<div class="box-inline">
															<span class="text-lg text-semibold text-main"><?php echo $row['name'] ?></span>
															<p class="text-sm">NIP : '.$nip.'</p>
														</div>
													</div>
													<div class="media-right pad-top">
														<a href="'.base_url('account?v='.$type.'&action=update&id='. encrypt_data( $row['id_user_info'] )).'" class="btn btn-sm btn-default btn-labeled"><i class="btn-label ti-pencil"></i> Sunting</a>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<label class="text-sm"><i class="demo-pli-mail icon-lg icon-fw"></i> '.$row['email'].'</label><br>
														<label class="text-sm"><i class="demo-pli-old-telephone icon-lg icon-fw"></i> '.$row['telp'].'</label>

														'.$detailInfoLogin.'

													</div>
													<div class="col-md-6" style="border-left: 1px solid #e0e0e0">

														<div class="row">
															<div class="col-md-5">

															'.$this->typeAccessSVG( $typeAccount ).'
															</div>
															<div class="col-md-7">
																<small class="text-main text-semibold">Level Akun saat ini</small>
																<h3 style="margin: 0px; margin-top: 5px" class="text-thin">'.ucfirst($row['level']).'</h3>
															</div>
															<div class="col-md-12"><small>Pelajari lebih lanjut tentang <a class="text-semibold btn-link">Hak akses</a>.</small></div>


															'.$detailLoginStatus.'

														</div>
													</div>
												</div>

											</div>
										</div>
									</div>
								</div>
								<!--===================================================-->
								<!--End Detail Bootstrap Modal-->



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


				