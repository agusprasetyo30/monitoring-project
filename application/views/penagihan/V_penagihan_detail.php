<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Halaman Penagihan</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="<?php echo base_url('dashboard') ?>"><i class="demo-pli-home"></i></a></li>
					<li class="active">Penagihan</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>
                        


          
				<!--Page content-->
                <!--===================================================-->
                <div id="page-content">


					<div class="row">
					
						<div class="col-md-10 col-md-offset-1">
							


							<div class="row">
								<div class="col-md-4">
									
									<div class="panel panel-body panel-bordered-default">

										<h4>Riwayat Penagihan</h4>
										<label class="text-main">Daftar riwayat tagihan</label> <br>
										<button data-target="#tambah_pembayaran" data-toggle="modal" class="btn btn-sm btn-primary"><i class="fa fa-money"></i> Tambah Pembayaran</button>
										<!-- Modal Tambah Pembayaran -->
										<!--===================================================-->
										<div class="modal fade" id="tambah_pembayaran" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">

													<!--Modal header-->
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
														<h4 class="modal-title">Tambah Pembayaran</h4>
													</div>

													<!--Modal body-->

													<form action="<?php echo base_url('penagihan/prosesTambahPembayaran') ?>" method="POST">

													<div class="modal-body">
														
														<div class="form-group">

															<label class="text-semibold">Tanggal Penagihan</label>

															<input type="hidden" name="no_ref" value="<?php echo $this->input->get('no_ref') ?>">

															<input type="date" name="tanggal" class="form-control" value="<?php echo date('Y-m-d') ?>">
															<small>Tanggal Catatan Penagihan</small>
														</div>





														<div class="row">
														
															<div class="col-md-6">

																<div class="form-group">

																	<label class="text-semibold">Jenis Pembayaran</label>
																	<div class="radio">
																		<!-- Inline radio buttons -->
																		<input id="demo-inline-form-radio-edit" class="magic-radio" type="radio" name="jenis_pembayaran" value="debit">
																		<label for="demo-inline-form-radio-edit">Debit</label>
											
																		<input id="demo-inline-form-radio-edit-2" class="magic-radio" type="radio" name="jenis_pembayaran" value="tunai">
																		<label for="demo-inline-form-radio-edit-2">Tunai</label> <br>
																		<small>Tanggal Catatan Penagihan</small>
																	</div>
																</div>
															
															</div>
															<div class="col-md-6">

																<div class="form-group">
																	<label class="text-semibold">Pembayaran</label>
																	<input type="number" name="pembayaran" class="form-control" placeholder="..." id="" required="" />
																	<small>Tanggal Catatan Penagihan</small>
																</div>
															
															</div>
														</div>





														<div class="row">

															<div class="col-md-12">
																<div class="form-group">
																	<label class="text-semibold">Bukti Pembayaran</label>
																	<input type="file" name="userfile" class="form-control" required="" />
																	<small>Masukkan bukti pembayaran</small>
																</div>
															</div>
														</div>


														<div class="">
															<div class="form-group">
																<label class="text-semibold">Keterangan</label>
																<textarea name="keterangan" class="form-control" placeholder="Masukkan catatan bila perlu"></textarea>
																<small>Berikan catatan apabila diperlukan (Opsional)</small>
															</div>
														</div>


													
													</div>

													
													

													<!--Modal footer-->
													<div class="modal-footer">
														<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
														<button class="btn btn-primary">Tambahkan dan Simpan</button>
													</div>


													</form>
												</div>
											</div>
										</div>
										<!--===================================================-->
										<!-- End Modal  -->



										<hr>

										<?php if ( count($row['informasi_penagihan']) > 0 ) : ?>


										<?php foreach ( $row['informasi_penagihan'] AS $penagihan ) : 
											
											
											$color = "";
											
											if ( $penagihan['pembayaran'] == 0 ) {

												$color = "#f44336";
											}
										?>

										
										<!-- Modal Sunting Pembayaran -->
										<!--===================================================-->
										<div class="modal fade" id="sunting_pembayaran-<?php echo $penagihan['id_penagihan'] ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">

													<!--Modal header-->
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
														<h4 class="modal-title">Sunting Pembayaran</h4>
													</div>

													<!--Modal body-->

													<form action="<?php echo base_url('penagihan/prosesUbahPembayaran') ?>" method="POST">

													<div class="modal-body">
														
														<div class="form-group">

															<label class="text-semibold">Tanggal Penagihan</label>

															<input type="date" name="tanggal" class="form-control" value="<?php echo $penagihan['tanggal_penagihan'] ?>">
															<input type="hidden" name="no_ref" value="<?php echo $this->input->get('no_ref') ?>">
															<input type="hidden" name="id" value="<?php echo $penagihan['id_penagihan'] ?>">
															
															<small>Tanggal Catatan Penagihan</small>
														</div>

														<div class="row">
														
															<div class="col-md-6">

																<div class="form-group">

																	<label class="text-semibold">Jenis Pembayaran</label>
																	<div class="radio">
																		<!-- Inline radio buttons -->
																		<input id="demo-inline-form-radio-edit" class="magic-radio" type="radio" name="jenis_pembayaran" value="debit"<?php if ( $penagihan['jenis_pembayaran'] == "debit" ) echo 'checked'; ?>>
																		<label for="demo-inline-form-radio-edit">Debit</label>
											
																		<input id="demo-inline-form-radio-edit-2" class="magic-radio" type="radio" name="jenis_pembayaran" value="tunai"<?php if ( $penagihan['jenis_pembayaran'] == "tunai" ) echo 'checked'; ?>>
																		<label for="demo-inline-form-radio-edit-2">Tunai</label> <br>
																		<small>Tanggal Catatan Penagihan</small>
																	</div>
																</div>
															
															</div>
															<div class="col-md-6">

																<div class="form-group">
																	<label class="text-semibold">Pembayaran</label>
																	<input type="number" name="pembayaran" class="form-control" value="<?php echo $penagihan['pembayaran'] ?>" placeholder="..." id="" required="" />
																	<small>Tanggal Catatan Penagihan</small>
																</div>
															
															</div>
														</div>

														<div class="row">

															<div class="col-md-12">
																<div class="form-group">
																	<label class="text-semibold">Bukti Pembayaran</label>
																	<input type="file" name="userfile" class="form-control" required="" />
																	<small>Masukkan bukti pembayaran</small>
																</div>
															</div>
														</div>


														<div class="">
															<div class="form-group">
																<label class="text-semibold">Keterangan</label>
																<textarea name="keterangan" class="form-control" placeholder="Masukkan catatan bila perlu"><?php echo $penagihan['catatan'] ?></textarea>
																<small>Berikan catatan apabila diperlukan (Opsional)</small>
															</div>
														</div>
													
													</div>

													<!--Modal footer-->
													<div class="modal-footer">
														<button data-dismiss="modal" class="btn btn-default" type="button">Reset</button>
														<button class="btn btn-primary">Simpan</button>
													</div>


													</form>
												</div>
											</div>
										</div>
										<!--===================================================-->

										<!-- End Modal  -->

										 <!-- Modal hapus -->
                                                <!--===================================================-->
                                                <div id="hapus-pembayaran-<?php echo $penagihan['id_penagihan'] ?>" class="modal fade" tabindex="-1">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                                                                <h4 class="modal-title" id="mySmallModalLabel">Hapus Pembayaran</h4>
                                                            </div>
                                                            
												
                                                            <div class="modal-body">
                                                                <label for="">Pembayaran dengan nominal : <span class="text-main text-semibold"><?php echo $penagihan['pembayaran'] ?></span></label><br>
                                                                <hr>
																

                                                                <small><span class="text-danger">*</span> Catatan</small> <br>
                                                                <small>Apakah anda yakin ingin menghapus informasi pembayaran ini. Data yang telah dihapus tidak dapat dipulihkan kembali</small>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button data-dismiss="modal" class="btn btn-sm btn-default" type="button">Batal</button>
                                                                <a href="<?php echo base_url('penagihan/prosesHapusPembayaran/'. $penagihan['id_penagihan'].'/'.$penagihan['no_ref'].'/'.$penagihan['pembayaran']) ?>" class="btn btn-sm btn-danger btn-labeled"><i class="btn-label ti-close"></i> Hapus Sekarang</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- End Modal Hapus -->


										<div class="" style="border: 1px solid #e0e0e0; padding: 10px; margin-bottom: 10px">
											<small class="pull-right"><?php echo date('d F Y', strtotime($penagihan['tanggal_penagihan'])) ?></small>
											<h4 style="color: <?php echo $color ?>">Rp <?php echo number_format($penagihan['pembayaran'], 2) ?></h4>
											<small>Keterangan :</small>
											<div class="well well-sm" style="margin: 0px">
												"<?php echo $penagihan['catatan'] ?>"
												<br> <a href="" class="text-sm text-main btn-link"><i class="ti-arrow-down"></i> Unduh Bukti Pembayaran</a>
											</div>

											<div class="dropdown text-right">
					                            <button class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown" type="button">
					                            	Opsi <i class="dropdown-caret"></i>
					                            </button>
					                            <ul class="dropdown-menu dropdown-menu-right">
					                            	<li class="dropdown-header">Pengubahan</li>
					                                <li class=""><button data-target="#sunting_pembayaran-<?php echo $penagihan['id_penagihan'] ?>" data-toggle="modal" class="btn btn-sm btn-primary">Sunting</button></li>
					                                <li class="divider"></li>
					                                <li><button data-target="#hapus-pembayaran-<?php echo $penagihan['id_penagihan'] ?>" data-toggle="modal" class="btn btn-sm btn-primary">Hapus</button></li>
					                            </ul>
					                        </div>
										</div>

										<?php endforeach; endif; ?>


										
									</div>	

								</div>
								<div class="col-md-8">

									<!-- profile -->
									<div class="panel panel-body panel-bordered-default">

										<!-- Header -->
										<div class="row">
											<div class="col-md-3">	
												<svg style="width:130px" id="a139742c-031f-4297-9910-0b661ecf4262" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 888.07971 534.96981"><title>online_payments</title><path d="M214.1947,574.21548l-5.333-21.03429A273.135,273.135,0,0,0,179.8838,542.7848l-.67337,9.77549L176.48,541.79069c-12.212-3.48717-20.51983-5.02321-20.51983-5.02321s11.22195,42.67366,34.7592,75.29821l27.426,4.81755-21.30654,3.072a110.50245,110.50245,0,0,0,9.53073,10.10012c34.24,31.78207,72.377,46.36387,85.18129,32.5693s-4.57282-50.7417-38.81286-82.52378c-10.61474-9.85276-23.94912-17.75951-37.29675-23.98229Z" transform="translate(-155.96015 -182.5151)" fill="#e6e6e6"/><path d="M264.9155,551.37272l6.30738-20.76292a273.13329,273.13329,0,0,0-19.4325-23.8785l-5.6294,8.02019,3.22943-10.63063C240.73891,494.82328,234.421,489.214,234.421,489.214s-12.45157,42.33122-9.16631,82.42573l20.98773,18.30061-19.82728-8.3836a110.50442,110.50442,0,0,0,2.938,13.57259c12.88281,44.90561,37.99241,77.10132,56.0839,71.91112s22.31392-45.80088,9.43111-90.70649c-3.9938-13.92118-11.32161-27.58227-19.53123-39.80866Z" transform="translate(-155.96015 -182.5151)" fill="#e6e6e6"/><rect x="0.07971" y="487.64984" width="888" height="2.24072" fill="#3f3d56"/><path d="M296.338,438.128s-6.91528,83.14848-8.40005,100.9657a126.7102,126.7102,0,0,1-7.42384,32.66491s-2.96954,5.93908-2.96954,11.87815v75.7232s-5.93907,0-4.4543,5.93908,2.96953,16.33245,2.96953,16.33245h22.27153s-1.48476-4.4543,2.96954-5.93907,0-13.36292,0-13.36292l23.7563-89.08612,35.63445-74.23843s20.78676,66.81459,25.24107,74.23843c0,0,16.33245,83.14705,19.302,90.57089s4.4543,7.42384,2.96953,10.39338-1.48476,5.93907,0,7.42384,29.69538,0,29.69538,0l-7.42385-105.41857L417.11284,450.00754l-68.29936-20.78676Z" transform="translate(-155.96015 -182.5151)" fill="#2f2e41"/><path d="M292.39227,669.7533s-7.42384-26.72583-19.302-5.93907-11.87815,28.2106-11.87815,28.2106-19.302,28.21061,7.42384,25.24107,20.78676-16.33245,20.78676-16.33245,10.39338-5.93908,10.39338-10.39338S292.39227,669.7533,292.39227,669.7533Z" transform="translate(-155.96015 -182.5151)" fill="#2f2e41"/><path d="M412.65853,666.78377s7.42384-26.72584,19.302-5.93908,11.87815,28.21061,11.87815,28.21061,19.302,28.2106-7.42384,25.24106-20.78676-16.33245-20.78676-16.33245-10.39338-5.93908-10.39338-10.39338S412.65853,666.78377,412.65853,666.78377Z" transform="translate(-155.96015 -182.5151)" fill="#2f2e41"/><path d="M342.8744,237.68563s2.96954,19.302-5.93907,23.75629,19.302,20.78677,26.72584,20.78677S384.44793,267.381,384.44793,267.381s-7.42385-22.27153-5.93908-26.72584Z" transform="translate(-155.96015 -182.5151)" fill="#a0616a"/><circle cx="203.24671" cy="38.83808" r="31.18014" fill="#a0616a"/><path d="M420.08237,285.19822l-37.118-22.4886s-21.1191,23.97337-43.96746-2.75246l-39.18081,10.39338,5.93908,100.96426s-8.90861,40.08876-5.93908,47.5126-7.42384,10.39338-4.4543,11.87815,0,11.87815,0,11.87815,57.906,29.69537,121.751,7.42384l-5.93908-19.302a15.58017,15.58017,0,0,0-2.96954-14.84769s5.93908-8.90861-1.48476-16.33245c0,0,2.96953-13.36292-4.45431-19.302l-1.48477-20.78676,4.45431-10.39338Z" transform="translate(-155.96015 -182.5151)" fill="#cfcce0"/><path d="M343.24976,206.87536s-3.7173,8.04469,11.15192,4.82681c0,0,5.576,3.21788,5.576-1.60893,0,0,7.43461,8.04469,9.29326,3.21787s5.576,1.60894,5.576,1.60894l3.7173-8.04469,3.71731,4.82681H395.292s3.7173-32.17875-40.89036-28.96087-22.663,54.20194-22.663,54.20194.35921-9.15169,4.07651-4.32487S343.24976,206.87536,343.24976,206.87536Z" transform="translate(-155.96015 -182.5151)" fill="#2f2e41"/><path d="M433.44529,344.589l1.48477,31.18014s5.93908,57.906-5.93907,83.147v13.36291s-2.96954,34.14968-17.81723,32.66491,4.45431-48.99736,4.45431-48.99736l-2.96954-65.32982L409.689,353.49758Z" transform="translate(-155.96015 -182.5151)" fill="#a0616a"/><path d="M403.74992,286.683l14.81131-2.40638a72.31337,72.31337,0,0,1,20.82314,38.04083c4.4543,23.7563,5.93907,28.2106,5.93907,28.2106L409.689,359.43666l-19.302-37.11922Z" transform="translate(-155.96015 -182.5151)" fill="#cfcce0"/><rect x="184.01662" y="87.22321" width="234.31056" height="116.39453" fill="#fff"/><path d="M365.56206,276.73782c-6.01967-3.62-13.278-3.3435-16.0373-3.067,1.05081,2.56549,4.20371,9.10919,10.22338,12.731,6.03437,3.62916,13.28306,3.34441,16.03823,3.06977C374.736,286.907,371.58266,280.36056,365.56206,276.73782Z" transform="translate(-155.96015 -182.5151)" fill="#c57900"/><path d="M393.84906,348.57067H356.22553a8.4653,8.4653,0,1,0,0,16.93059h37.62353a8.4653,8.4653,0,1,0,0-16.93059Z" transform="translate(-155.96015 -182.5151)" fill="#c57900"/><path d="M564.22146,259.21477H353.27787A18.68583,18.68583,0,0,0,334.592,277.90064V380.67657a18.68587,18.68587,0,0,0,18.68587,18.68587H564.22146a18.68587,18.68587,0,0,0,18.68587-18.68587V277.90064A18.68583,18.68583,0,0,0,564.22146,259.21477ZM348.05876,271.9614c.41656-.07532,10.29412-1.75626,18.47328,3.1653,8.17871,4.92063,11.32105,14.43582,11.45057,14.83815l.33067,1.026-1.06138.1883a28.17463,28.17463,0,0,1-4.57756.33619,27.25632,27.25632,0,0,1-13.89618-3.50241c-8.17871-4.91972-11.32059-14.43491-11.4501-14.83723l-.33068-1.026Zm45.7903,95.421H356.22553a10.34647,10.34647,0,0,1,0-20.69294h37.62353a10.34647,10.34647,0,1,1,0,20.69294Zm171.18709-1.88117a11.32027,11.32027,0,0,1-11.28706,11.28706H525.53144a11.32027,11.32027,0,0,1-11.28706-11.28706V348.57067a11.32023,11.32023,0,0,1,11.28706-11.28706h28.21765a11.32023,11.32023,0,0,1,11.28706,11.28706Z" transform="translate(-155.96015 -182.5151)" fill="#c57900"/><path d="M534.467,362.2092H522.23938a3.29206,3.29206,0,0,0,0,6.58412H534.467a3.29206,3.29206,0,0,0,0-6.58412Zm0,4.70294H522.23938a1.41089,1.41089,0,1,1,0-2.82177H534.467a1.41089,1.41089,0,0,1,0,2.82177Z" transform="translate(-155.96015 -182.5151)" fill="#c57900"/><path d="M557.04115,362.2092H544.8135a3.29206,3.29206,0,0,0,0,6.58412h12.22765a3.29206,3.29206,0,0,0,0-6.58412Zm0,4.70294H544.8135a1.41089,1.41089,0,1,1,0-2.82177h12.22765a1.41089,1.41089,0,0,1,0,2.82177Z" transform="translate(-155.96015 -182.5151)" fill="#c57900"/><path d="M534.467,353.7439H522.23938a3.29206,3.29206,0,0,0,0,6.58412H534.467a3.29206,3.29206,0,0,0,0-6.58412Zm0,4.70294H522.23938a1.41088,1.41088,0,1,1,0-2.82176H534.467a1.41088,1.41088,0,1,1,0,2.82176Z" transform="translate(-155.96015 -182.5151)" fill="#c57900"/><path d="M557.04115,353.7439H544.8135a3.29206,3.29206,0,0,0,0,6.58412h12.22765a3.29206,3.29206,0,0,0,0-6.58412Zm0,4.70294H544.8135a1.41088,1.41088,0,1,1,0-2.82176h12.22765a1.41088,1.41088,0,1,1,0,2.82176Z" transform="translate(-155.96015 -182.5151)" fill="#c57900"/><path d="M534.467,345.27861H522.23938a3.29206,3.29206,0,0,0,0,6.58412H534.467a3.29206,3.29206,0,0,0,0-6.58412Zm0,4.70294H522.23938a1.41089,1.41089,0,1,1,0-2.82177H534.467a1.41089,1.41089,0,0,1,0,2.82177Z" transform="translate(-155.96015 -182.5151)" fill="#c57900"/><path d="M557.04115,345.27861H544.8135a3.29206,3.29206,0,0,0,0,6.58412h12.22765a3.29206,3.29206,0,0,0,0-6.58412Zm0,4.70294H544.8135a1.41089,1.41089,0,1,1,0-2.82177h12.22765a1.41089,1.41089,0,0,1,0,2.82177Z" transform="translate(-155.96015 -182.5151)" fill="#c57900"/><path d="M277.54458,326.77175s-13.36291,56.4212,2.96954,56.4212,54.93644-63.84505,54.93644-63.84505,40.08875-20.78676,23.7563-28.2106-37.11922,11.87815-37.11922,11.87815l-23.985,33.29991-1.2561-16.96746Z" transform="translate(-155.96015 -182.5151)" fill="#a0616a"/><path d="M308.72473,279.25915l-8.90862-8.90861s-17.81722,10.39338-19.302,20.78676-8.90861,43.05829-8.90861,43.05829l27.46822,2.22715,8.90861-13.36292Z" transform="translate(-155.96015 -182.5151)" fill="#cfcce0"/><path d="M730.74286,258.1379c-1.11855-3.30279-15.14535-14.52981-6.55009-16.41686l7.04866,9.39858,32.40661-32.406,3.25929,3.25929Z" transform="translate(-155.96015 -182.5151)" fill="#c57900"/><path d="M730.74286,368.33187c-1.11855-3.30278-15.14535-14.5298-6.55009-16.41685l7.04866,9.39858,32.40661-32.406,3.25929,3.25929Z" transform="translate(-155.96015 -182.5151)" fill="#c57900"/><path d="M730.74286,480.10005c-1.11855-3.30278-15.14535-14.5298-6.55009-16.41685l7.04866,9.39858,32.40661-32.406,3.25929,3.25928Z" transform="translate(-155.96015 -182.5151)" fill="#c57900"/><circle cx="672.94144" cy="62.22326" r="10" fill="#3f3d56"/><rect x="710.44122" y="61.22319" width="161" height="2" fill="#3f3d56"/><circle cx="672.94144" cy="172.41724" r="10" fill="#3f3d56"/><rect x="710.44122" y="171.41703" width="161" height="2" fill="#3f3d56"/><circle cx="672.94144" cy="284.18542" r="10" fill="#3f3d56"/><rect x="710.44122" y="283.1851" width="161" height="2" fill="#3f3d56"/><polygon points="600.04 312.485 550.04 312.485 550.04 261.485 584.04 261.485 584.04 263.485 552.04 263.485 552.04 310.485 598.04 310.485 598.04 287.485 600.04 287.485 600.04 312.485" fill="#3f3d56"/><polygon points="600.04 200.485 550.04 200.485 550.04 149.485 584.04 149.485 584.04 151.485 552.04 151.485 552.04 198.485 598.04 198.485 598.04 175.485 600.04 175.485 600.04 200.485" fill="#3f3d56"/><polygon points="600.04 86.485 550.04 86.485 550.04 35.485 584.04 35.485 584.04 37.485 552.04 37.485 552.04 84.485 598.04 84.485 598.04 61.485 600.04 61.485 600.04 86.485" fill="#3f3d56"/></svg>
											</div>
											<div class="col-md-9">
												<h2 class="text-thin">Catatan Penagihan</h2>
												<h4 style="margin: 0px">No Ref : <?php echo $row['informasi_detail']['no_ref'] ?><b class="text-main"></b></h4>
												<br>
											</div>
										</div>




										<!-- Body -->
										<div class="row">
											<div class="col-md-5" style="border-right: 1px solid #e0e0e0">
												<div class="form-group">
													<label>Atas Nama</label>
													<br>
													<!-- Buat namanya -->
													<h4 style="margin: 0px" class="text-primary"><?php echo $row['informasi_detail']['nama'] ?></h4>
													
												</div>

												<div class="form-group">
													<label>Alamat</label>
													<br>
													<!-- Buat namanya -->
													<label style="margin: 0px" class="text-primary"><?php echo $row['informasi_detail']['alamat'] ?></label>
													
												</div>

												<div class="form-group">
													<label>Domisili</label><br>
													<label><i class="fa fa-envelope-o"></i>&nbsp; <?php echo $row['informasi_detail']['wilayah'].' - '. $row['informasi_detail']['kota'] ?></label><br>
													<label><i class="fa fa-phone"></i>&nbsp; <?php echo $row['informasi_detail']['kecamatan'].' - '. $row['informasi_detail']['kelurahan']?></label>
												</div>

											</div>
											<div class="col-md-7">
												<!-- Timeline -->
												<!--===================================================-->
												<div class="timeline">
								
													<!-- Timeline header -->
													<div class="timeline-header">
														<div class="timeline-header-title bg-primary text-bold text-sm">Rincian</div>
													</div>
								
													<div class="timeline-entry">
														<div class="timeline-stat">
															<div class="timeline-icon"><i class="ion-ios-list-outline icon-2x"></i></div>
															<div class="timeline-time"></div>
														</div>
														<div class="timeline-label">
															<p class="text-bold text-main" style="margin: 0px">Penagihan</p>
															<small>Status Penagihan : <?php echo $row['status_piutang']?></small>
														</div>
													</div>

													<div class="timeline-entry">
														<div class="timeline-stat">
															<div class="timeline-icon"><i class="ion-ios-list-outline icon-2x"></i></div>
															<div class="timeline-time"></div>
														</div>
														<div class="timeline-label">
															<p class="text-bold text-main" style="margin: 0px">Total Piutang : <label class="label label-default"><?php echo count($row['informasi_penagihan']) ?> Bulan</label></p>
															<h4 class="text-thin">Rp <?php echo number_format($row['total_tagihan'], 2) ?></h4>
															
															<small>Total yang sudah dibayarkan : </small>
															<h4 class="text-thin">Rp <?php echo number_format($row['total_pelunasan'], 2) ?></h4>
														</div>
													</div>


												</div>
											</div>

										</div>


									
										
									</div>




									<!-- History -->
									<div class="panel panel-body panel-bordered-default">

										<h4>Sejarah Transaksi</h4>
										<label for="">Menampilkan riwayat histori transaksi pembayaran</label>


										<table class="table" width="100%">
										
											<tr>
											
												<th>No</th>
												<th>Aktivitas</th>
												<th>Keterangan</th>
												<th>Waktu</th>
											</tr>
											

											<?php if ( count($row['informasi_riwayat_tr']) > 0 ) { ?>
											
											<?php $no = 1; foreach ( $row['informasi_riwayat_tr'] AS $rowRiwayat ) : ?>
											<tr>
											
												<td><?php echo $no++ ?></td>
												<td><?php echo ucfirst( $rowRiwayat['activity'] ) ?></td>
												<td><?php echo $rowRiwayat['notes'] ?></td>
												<td><?php echo date('Y-m-d H.i A', strtotime( $rowRiwayat['created_at'] )) ?></td>
											</tr>
											
											<?php endforeach; ?>
											<?php } ?>


										</table>

									</div>
									<!-- End History -->





									



								</div>
							</div>


						</div>
					</div>

				</div>
			</div>

    
    