<?php 


$btnReset = '<a  href="" class="btn btn-default btn-hover-mint btn-icon btn-sm"><i class="ti-reload"></i></a>';

$colorStatus = "";
$textStatus  = "Ditolak";
$buttonStatus= '<button class="btn btn-sm btn-danger btn-labeled disabled"><i class="btn-label ti-close"></i> Antrian di tolak</button> '. $btnReset;

$buttonFinish= '<button class="btn btn-sm btn-default btn-labeled disabled"><i class="btn-label ti-close"></i> Status Antrian Harus di setujui </button>';
if (  "pending" ) {

	$colorStatus = "pending";
	$textStatus  = "Pending";
	$buttonStatus = '
	<button class="btn btn-sm btn-default btn-hover-info btn-labeled" data-target="#modal-accept" data-toggle="modal"><i class="btn-label ti-check"></i> Setujui Antrian</button>
	<button class="btn btn-sm btn-default btn-hover-danger btn-labeled" data-target="#modal-decline" data-toggle="modal"><i class="btn-label ti-close"></i> Tolak antrian</button>';
	
} else if ( "accept" ) {

	$colorStatus = "accept";
	$textStatus  = "Disetujui";
	$buttonStatus = '<button class="btn btn-sm btn-info btn-labeled disabled"><i class="btn-label ti-check"></i> Antrian telah di setujui</button> '.$btnReset.'<br>
	
	<a href="'.base_url('queue/printQueue?id='. encrypt_data($dataQueue['id_antrian']) ).'" class="btn-link text-main text-sm" target="_blank"><i class="fa fa-print"></i> Cetak Antrian - '.$dataQueue['code'] .'</a>';
	$buttonFinish= '<button class="btn btn-sm btn-warning btn-labeled" data-target="#modal-finished" data-toggle="modal"><i class="btn-label ti-check"></i> Tambahkan keterangan antrian selesai</button>';
} else if ("finished" ) {

	$colorStatus = "finish";
	$textStatus  = "Selesai";
	$btnReset = '<button type="button" class="btn btn-mint disabled btn-sm"><i class="ti-minus"></i></button>';
	$buttonStatus = '<button class="btn btn-sm btn-info btn-labeled disabled"><i class="btn-label ti-check"></i> Antrian telah di setujui</button> '.$btnReset.'<br>
	
	<a href="'.base_url('queue/printQueue?id='. encrypt_data($dataQueue['id_antrian']) ).'" class="btn-link text-main" target="_blank"><i class="fa fa-print"></i> Cetak Antrian - '.$dataQueue['code'] .'</a>';

	$buttonFinish= '<button class="btn btn-sm btn-success btn-labeled disabled"><i class="btn-label ti-check"></i> Antrian telah selesai</button>';
}

?>
<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head"></div>

                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    
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
		

		<div class="row">
			<!--Premium Plan-->
			<!--===================================================-->
			<div class="col-sm-8 col-md-offset-2 pricing-featured">
				<div class="panel" style="border: 1px solid #e0e0e0">
					<div class="ribbon ribbon-<?php echo $colorStatus ?>"><span><?php echo $textStatus ?></span></div>
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
											<?php echo $buttonStatus ?>
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
											<?php echo $buttonFinish ?>
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


					


				

					<!--===================================================-->
					<!-- END OF MAIL INBOX -->


					</div>
					<!--===================================================-->
					<!--End page content-->

					</div>
					</div>
					<!--===================================================-->
					<!--END CONTENT CONTAINER-->

<?php


	function svg() {

		return '<?xml version="1.0" encoding="iso-8859-1"?>
		<!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
		<svg style="width: 130px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
		<g>
			<circle style="fill:#2C5871;" cx="256" cy="256" r="256"/>
			<path style="fill:#133142;" d="M511.324,273.684C510.699,273.679,390.2,153.539,390.2,152.54H140.692
				c0,10.752-8.714,19.466-19.466,19.466v18.79l-0.538-0.133l-29.138,80.973c1.198,0.43,2.314,0.983,3.369,1.613l-0.466,1.295
				c1.198,0.43,2.314,0.983,3.369,1.613l-0.466,1.295c1.198,0.43,2.314,0.983,3.369,1.613l-0.466,1.295
				c0.758,0.271,1.434,0.666,2.135,1.019c2.248,4.572,2.739,9.999,0.876,15.171c0,0,209.372,208.584,209.178,209.137
				C421.094,481.208,503.537,387.732,511.324,273.684z"/>
			<path style="fill:#D7ECED;" d="M103.281,296.54l234.767,84.475c3.64-10.117,14.792-15.365,24.909-11.725l29.138-80.973
				c-10.117-3.64-15.365-14.792-11.725-24.904l-234.772-84.475c-3.64,10.117-14.792,15.365-24.909,11.725l-29.138,80.973
				C101.673,275.272,106.921,286.423,103.281,296.54z M332.365,255.585l-4.925-1.772l1.771-4.925l4.925,1.772L332.365,255.585z
				 M328.822,265.436l-4.925-1.772l1.772-4.925l4.925,1.772L328.822,265.436z M325.274,275.292l-4.925-1.772l1.772-4.925l4.925,1.772
				L325.274,275.292z M321.731,285.143l-4.925-1.772l1.772-4.925l4.925,1.772L321.731,285.143z M290.217,357.258l4.925,1.772
				l-1.772,4.925l-4.925-1.772L290.217,357.258z M293.76,347.407l4.925,1.772l-1.772,4.925l-4.925-1.772L293.76,347.407z
				 M297.308,337.556l4.925,1.772l-1.772,4.925l-4.925-1.772L297.308,337.556z M300.851,327.706l4.925,1.772l-1.772,4.925
				l-4.925-1.772L300.851,327.706z M295.035,296.545c3.384-9.4,13.747-14.28,23.148-10.895c9.4,3.384,14.28,13.747,10.895,23.148
				c-3.016,8.381-11.576,13.128-20.06,11.668l-1.469,4.086l-4.925-1.772l1.434-3.983C295.936,314.767,291.891,305.28,295.035,296.545z
				"/>
			<path style="fill:#E64500;" d="M145.597,178.939l146.534,52.726l-42.317,117.601L103.281,296.54
				c3.64-10.117-1.608-21.268-11.725-24.909l29.138-80.973C130.806,194.299,141.957,189.051,145.597,178.939z"/>
			<path style="fill:#FFFFFF;" d="M121.226,172.006v86.057c10.752,0,19.466,8.714,19.466,19.466H390.2
				c0-10.752,8.714-19.466,19.466-19.466v-86.057c-10.752,0-19.466-8.714-19.466-19.466H140.692
				C140.692,163.292,131.978,172.006,121.226,172.006z M342.385,273.874h-5.238v-5.238h5.238V273.874z M342.385,263.404h-5.238v-5.233
				h5.238V263.404z M342.385,252.933h-5.238V247.7h5.238V252.933z M342.385,242.463h-5.238v-5.233h5.238V242.463z M337.147,153.462
				h5.238v5.233h-5.238V153.462z M337.147,163.932h5.238v5.233h-5.238V163.932z M337.147,174.403h5.238v5.238h-5.238V174.403z
				 M337.147,184.873h5.238v5.238h-5.238V184.873z M337.147,199.578v-4.234h5.238v4.342c8.474,1.5,14.925,8.863,14.925,17.772
				c0,9.989-8.1,18.089-18.089,18.089c-9.994,0-18.089-8.1-18.089-18.089C321.126,208.179,328.141,200.617,337.147,199.578z"/>
			<path style="fill:#FC611F;" d="M140.692,277.524h155.73V152.54h-155.73c0,10.752-8.714,19.466-19.466,19.466v86.057
				C131.978,258.063,140.692,266.778,140.692,277.524z"/>
		</g>
		<g>
		</g>
		<g>
		</g>
		<g>
		</g>
		<g>
		</g>
		<g>
		</g>
		<g>
		</g>
		<g>
		</g>
		<g>
		</g>
		<g>
		</g>
		<g>
		</g>
		<g>
		</g>
		<g>
		</g>
		<g>
		</g>
		<g>
		</g>
		<g>
		</g>
		</svg>
		';
	}
?>