<div class="row">
			<!--Premium Plan-->
			<!--===================================================-->
			<div class="col-sm-8 col-md-offset-2 pricing-featured">
				<div class="panel" style="border: 1px solid #e0e0e0">
					<div class="ribbon ribbon-"><span></span></div>
					<div class="panel-body">
						
						<div class="row">
							<div class="col-md-3">
								<?php echo svg() ?>
							</div>
							<div class="col-md-9">
								<h2 class="text-thin">Informasi Penagihan</h2>
								<p style="margin: 0px">No ref <b class="text-main"></b></p>
							
							</div>
						</div>

						<!-- <hr> -->

						<div class="row">
							<div class="col-md-5" style="border-right: 1px solid #e0e0e0">
								<div class="form-group">
									<label>No Ref</label>
									<h4 style="margin: 0px"></h4>
									<small>Memiliki noref</small>
								</div>


								<div class="form-group">
									<label>Atas Nama</label>
									<h4 style="margin: 0px" class="text-primary"></h4>
									
									<small>Status saat ini yaitu</small>
								</div>


								<div class="form-group">
									<label><i class="fa fa-envelope-o"></i> </label><br>
									<label><i class="fa fa-phone"></i>&nbsp; </label>
								</div>

								<hr>
								
								<small><i class="fa fa-envelope-open-o"></i> Isi pesan atau keperluan :</small>
								<div class="well well-sm" style="border: 1px solid #e0e0e0">
									<div style="text-align: justify;"><small>Rincian Keperluan</small><br>"<span class="text-semibold text-main"></div><br><br>

									<small class="text-muted">Ditulis pada </small>
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
											<small>Antrian dibuat pada </small>
										</div>
									</div>
									
									
									<div class="timeline-entry">
										<div class="timeline-stat">
											<div class="timeline-icon"><i class="ion-ios-bookmarks-outline icon-2x"></i></div>
											<div class="timeline-time">Status</div>
										</div>
										<div class="timeline-label">
											<p class="text-bold text-main" style="margin: 0px">Status Penagihan</p>
											<small>Status permintaan antrian saat ini
											<label href="javascript:void(0)" class="text-semibold text-main"></label></small>
											<!-- <?php echo $buttonStatus ?> -->
										</div>
									</div>
									
									
									<div class="timeline-entry">
										<div class="timeline-stat">
											<div class="timeline-icon"><i class="fa fa-handshake-o" style="font-size: 20px"></i></div>
											<div class="timeline-time">Pelayanan</div>
										</div>
										<div class="timeline-label">
											<p class="text-bold text-main" style="margin: 0px">Pelayanan </p>
											<small>Status permintaan antrian saat ini
											<!-- <?php echo $buttonFinish ?> -->
										</div>
									</div>

								</div>
								<!--===================================================-->
								<!-- End Timeline -->
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>
	</div>
</div>


<!--AcceptSmall Bootstrap Modal-->
<!--===================================================-->
<div id="modal-accept" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
			</div>
			<form action="<?php echo base_url('queue/onUpdateDataAccept') ?>" method="GET">
			
			<input type="hidden" name="id" value="<?php echo encrypt_data($dataQueue['id_antrian']) ?>">
			<div class="modal-body">
				<h4>Pemberitahuan</h4>
				<p>Dengan mensetujui antrian ini, pengguna atas nama <span class="text-semibold text-main"><?php echo $dataQueue['name'] ?></span> dapat menerima kode antrian 
				yang dapat diunduh melalui email. 
				<br><br>
				<label><i class="fa fa-envelope-o"></i> <?php echo $dataQueue['email'] ?></label>
				
				<hr>

				<label>Kode Antrian</label>
				<h5 style="margin: 0px"><?php echo $dataQueue['code'] ?></h5>
				</p>

				<label>Keterangan Tambahan</label>
				<label class="text-semibold">Waktu </label>
				<div class="row">
					<div class="col-md-7">
						<div class="form-group">
							<div id="demo-dp-txtinput">
								<input type="text" class="form-control" name="date" value="<?php echo date('m/d/Y') ?>">
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
						<!--Bootstrap Timepicker : Text Input-->
						<!--===================================================-->
						<input id="demo-tp-textinput" type="text" class="form-control" name="timepicker" value="<?php echo date('H:i A') ?>">
						</div>
					</div>
				</div>


				<label>Keterangan Tambahan</label>
				<label class="text-semibold">Tempat </label>
				<div class="form-group">
					<textarea name="location" class="form-control" placeholder="Tambahkan keterangan tempat atau ruangan . . ." required=""></textarea>
					<small>Menambah informasi keterangan ruangan atau tempat</small>
				</div>

			</div>
			<!--Modal footer-->
			<div class="modal-footer">
				<button data-dismiss="modal" class="btn btn-default btn-sm" type="button">Batal</button>
				<!-- <a href="<?php echo base_url('queue/onUpdateDataQueue?id='. encrypt_data($dataQueue['id_antrian']). '&type-update=accept' ) ?>" class="btn btn-info btn-sm btn-labeled"><i class="btn-label ti-check"></i> Setujui Antrian</a> -->
				<button class="btn btn-info btn-sm btn-labeled"><i class="btn-label ti-check"></i> Setujui Antrian</button>
			</div>
		</div>
	</div>
</div>
<!--===================================================-->
<!--End Small Bootstrap Modal-->



<!--Decline Bootstrap Modal-->
<!--===================================================-->
<div id="modal-decline" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
			</div>
			<form action="">
			<div class="modal-body">
				<h4>Pemberitahuan</h4>
				<p>Pengguna atas nama <span class="text-semibold text-main"><?php echo $dataQueue['name'] ?></span>, status antrian ditolak
				<br><br>
				<label><i class="fa fa-envelope-o"></i> <?php echo $dataQueue['email'] ?></label><br>
				
				<hr>

				<label>Kode Antrian</label>
				<h5 style="margin: 0px"><?php echo $dataQueue['code'] ?></h5>
				</p>
				
			</div>
			<!--Modal footer-->
			<div class="modal-footer">
				<button data-dismiss="modal" class="btn btn-default btn-sm" type="button">Batal</button>
				<a href="<?php echo base_url('queue/onUpdateDataQueue?id='. encrypt_data($dataQueue['id_antrian']). '&type-update=decline' ) ?>" class="btn btn-danger btn-sm btn-labeled"><i class="btn-label ti-close"></i> Tolak Antrian</a>
			</div>
			</form>
		</div>
	</div>
</div>
<!--===================================================-->
<!--End Small Bootstrap Modal-->



<!--Decline Bootstrap Modal-->
<!--===================================================-->
<div id="modal-decline" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
			</div>
			<div class="modal-body">
				<h4>Pemberitahuan</h4>
				<p>Pengguna atas nama <span class="text-semibold text-main"><?php echo $dataQueue['name'] ?></span>, status antrian ditolak
				<br><br>
				<label><i class="fa fa-envelope-o"></i> <?php echo $dataQueue['email'] ?></label>
				<hr>

				<label>Kode Antrian</label>
				<h5 style="margin: 0px"><?php echo $dataQueue['code'] ?></h5>
				</p>
			</div>
			<!--Modal footer-->
			<div class="modal-footer">
				<button data-dismiss="modal" class="btn btn-default btn-sm" type="button">Batal</button>
				<a href="<?php echo base_url('queue/onUpdateDataQueue?id='. encrypt_data($dataQueue['id_antrian']). '&type-update=decline' ) ?>" class="btn btn-danger btn-sm btn-labeled"><i class="btn-label ti-close"></i> Tolak Antrian</a>
			</div>
		</div>
	</div>
</div>
<!--===================================================-->
<!--End Small Bootstrap Modal-->




<!--finished Bootstrap Modal-->
<!--===================================================-->
<div id="modal-finished" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
			</div>
			<div class="modal-body">
				<h4>Pemberitahuan</h4>
				<p>Menambahkan keterangan pengantri bahwa telah dilayani atas nama <span class="text-semibold text-main"><?php echo $dataQueue['name'] ?></span>.
				<br><br>
				<a href="<?php echo base_url('queue/printQueue?id='. encrypt_data($dataQueue['id_antrian']) ) ?>" class="btn-link text-main" target="_blank"><i class="fa fa-print"></i> Cetak Antrian - <?php echo $dataQueue['code'] ?></a>
				
				<hr>

				<label>Kode Antrian</label>
				<h5 style="margin: 0px"><?php echo $dataQueue['code'] ?></h5>
				</p>
			</div>
			<!--Modal footer-->
			<div class="modal-footer">
				<button data-dismiss="modal" class="btn btn-default btn-sm" type="button">Batal</button>
				<a href="<?php echo base_url('queue/onUpdateDataQueue?id='. encrypt_data($dataQueue['id_antrian']). '&type-update=finished' ) ?>" class="btn btn-success btn-sm btn-labeled"><i class="btn-label ti-check"></i> Sudah dilayani</a>
			</div>
		</div>
	</div>
</div>
<!--===================================================-->
<!--End Small Bootstrap Modal-->




















<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head"></div>
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
				<div class="row">
                    
					    <!-- MAIL INBOX -->
					    <!--===================================================-->
					    <div class="panel">
					        <div class="panel-body">
					            <div class="fixed-fluid">
					                <div class="fixed-sm-200 pull-sm-left fixed-right-border">
					
										<input type="hidden" name="status_antrian" value="all" />
										<input type="hidden" name="specific" />
					
					                    <p class="pad-hor mar-top text-main text-bold text-sm text-uppercase">Informasi Penagihan</p>
					                    <div class="list-group bg-trans pad-btm bord-btm">
					                        <a href="javascript:void(0)" class="list-group-item select-by" data-status="pending">
					                            <i class="ti-email icon-lg icon-fw"></i> Akan Ditagih
					                        </a>
					                        <a href="javascript:void(0)" class="list-group-item select-by" data-status="accept">
					                            <i class="ti-time icon-lg icon-fw"></i> Sudah Ditagih
					                        </a>
					                       

											<?php if ( $this->session->userdata('sess_level') != "super_admin" ) { ?>
					                        <a href="javascript:void(0)" class="list-group-item select-by" data-status="priority">
					                            &nbsp;<i class="ti-star icon-lg icon-fw"></i> Prioritas <span id="qty-priority"></span>
					                        </a>
											<?php } ?>
					                    </div>
										
										<?php if ( $this->session->userdata('sess_level') == "super_admin" ) { ?>
					                   
										<?php } else { ?>
											
									
					                    <div class="list-group bg-trans pad-ver bord-ver">

					                        <p class="pad-hor mar-top text-main text-bold text-sm text-uppercase">Jenis Bagian</p>
					
					                        <!-- Menu list item -->
					                        <a href="javascript:void(0)" data-bagian="tu" class="list-group-item select-bagian list-item-sm">
					                            <span class="badge badge-purple badge-icon badge-fw pull-left"></span>
					                            Kota
					                        </a>
					                        <a href="javascript:void(0)" data-bagian="renvapor" class="list-group-item select-bagian list-item-sm">
					                            <span class="badge badge-info badge-icon badge-fw pull-left"></span>
					                            Kabupaten
					                        </a>
					                      

					                    </div>
										<?php } ?>
					
					
					                </div>
					                <div class="fluid">
					                    <div id="demo-email-list">
					                        <div class="row">
					                            <div class="col-sm-7 toolbar-left">
					
					                                <!-- Mail toolbar -->
					                                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					
					                                <!--Refresh button-->
					                                <button id="ref-btn" class="btn btn-default" type="button"><i class="demo-psi-repeat-2"></i></button>
					
					                            </div>
					                            <div class="col-sm-5 toolbar-right">
													<div class="form-group has-feedback">
														<input type="text" class="form-control" name="keyword" placeholder="Cari">
														<i class="ti-search form-control-feedback"></i>
													</div>
					                            </div>
					                        </div>
					
					                        <!--Mail list group-->
											<hr>
											
											<label class="text-main text-semibold">INFORMASI DETAIL</label>
											<h5 class="text-thin" style="margin: 0px"><span id="text-bagian">Penagihan</span> | 
											<br><br><br><br>
											  <!--Purple Panel-->
					        <!--===================================================-->
					       <!-- Contact Toolbar -->
						</h5> 

					            <ul id="demo-mail-list" class="mail-list pad-top">
								    </ul>
					        </div>
				
			                </div>
			            </div>
						</div>
					    </div>
					
					    <!--===================================================-->
					    <!-- END OF MAIL INBOX -->
					
                </div>
                <!--===================================================-->
                <!--End page content-->

            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->


