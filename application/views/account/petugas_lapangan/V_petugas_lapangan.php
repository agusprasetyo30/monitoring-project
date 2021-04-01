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
														<li><a href="<?php echo base_url('account/editAkun?jabatan=petugas_lapangan&id='. $row['id_login']) ?>"><i class="icon-lg icon-fw demo-psi-pen-5"> </i> Sunting</a></li>
														<li data-target="#detail-pegawai-<?php echo $row['id_login'] ?>" data-toggle="modal"><a href="#"><i class="icon-lg icon-fw demo-pli-calendar-4"></i>Detail</a</li>
														<li><a 
															href="<?php echo base_url('account/onDeleteAccount?id='. $row['id_login'].'&jabatan='. $row['jabatan']) ?>" 
															onclick="return confirm('Apakah anda yakin ingin menghapus pegawai <?php echo $row['name'] ?>')"><i class="icon-lg icon-fw demo-pli-recycling"></i> Hapus</a></li>
													</ul>
												</div>
											</div>
											<a href="#">
												<label class="badge badge-success"><?php echo $row['jabatan'] ?></label>
												<img alt="Profile Picture" class="img-lg img-circle mar-ver" src="<?php echo $img ?>">
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
                                                        <p class="text-sm"><?php echo $row['jabatan'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="media-right pad-top">
                                                    <a href="" class="btn btn-sm btn-default btn-labeled"><i class="btn-label ti-pencil"></i> Sunting</a>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="text-sm"><i class="demo-pli-mail icon-lg icon-fw"></i><?php echo $row['email'] ?></label><br>
                                                    <label class="text-sm"><i class="demo-pli-old-telephone icon-lg icon-fw"></i><?php echo $row['telp'] ?></label><br>
													<label class="text-sm"><i class="demo-pli-old-telephone icon-lg icon-fw"></i><?php echo $row['address'] ?></label>
                                            </div>
                                            <div class="col-md-6" style="border-left: 1px solid #e0e0e0">
                                                    <div class="row">
                                                        <div class="col-md-5">
														<div class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src="<?php echo $img ?>"></div>
                                                    </div>
                                                        <div class="col-md-7">
                                                            <small class="text-main text-semibold">Wilayah Penugasan</small>
															<label class="text-sm"><i class="demo-pli-old-telephone icon-lg icon-fw"></i><?php echo $row['wilayah_penugasan'] ?></label><br>
                                                        </div>
                                                        <div class="col-md-12"><small>Pelajari lebih lanjut tentang <a class="text-semibold btn-link">Hak akses</a>.</small></div>

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

								
								<div class="col-md-11 text-center">
								<h4>Data Kosong</h4>
								<svg style="width: 250px" id="e87ddc62-7528-42a5-8b37-f74ed0351019" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1131 812.20611"><title>software engineer</title><rect x="689.32824" y="51.26718" width="80.80153" height="30.0916" fill="#3c9cc7" opacity="0.3"/><rect x="823.62595" width="80.80153" height="30.0916" fill="#3c9cc7" opacity="0.3"/><rect x="829.19847" y="93.06107" width="80.80153" height="30.0916" fill="#3c9cc7" opacity="0.3"/><rect x="570.63359" y="127.61069" width="80.80153" height="30.0916" fill="#3c9cc7" opacity="0.3"/><rect x="545" y="251.32061" width="80.80153" height="30.0916" fill="#3c9cc7" opacity="0.3"/><rect x="667.03817" y="248.53435" width="80.80153" height="30.0916" fill="#3c9cc7" opacity="0.3"/><polyline points="823.626 14.856 770.13 65.616 829.198 108.107" fill="none" stroke="#3f3d56" stroke-miterlimit="10"/><line x1="689.32824" y1="65.61641" x2="611.03435" y2="127.61069" fill="none" stroke="#3f3d56" stroke-miterlimit="10"/><polyline points="585.401 251.297 611.034 157.702 707.439 248.534" fill="none" stroke="#3f3d56" stroke-miterlimit="10"/><rect x="144.32824" y="82.26718" width="80.80153" height="30.0916" fill="#3c9cc7" opacity="0.3"/><rect x="278.62595" y="31" width="80.80153" height="30.0916" fill="#3c9cc7" opacity="0.3"/><rect x="284.19847" y="124.06107" width="80.80153" height="30.0916" fill="#3c9cc7" opacity="0.3"/><rect x="25.63359" y="158.61069" width="80.80153" height="30.0916" fill="#3c9cc7" opacity="0.3"/><rect y="282.32061" width="80.80153" height="30.0916" fill="#3c9cc7" opacity="0.3"/><rect x="122.03817" y="279.53435" width="80.80153" height="30.0916" fill="#3c9cc7" opacity="0.3"/><polyline points="278.626 45.856 225.13 96.616 284.198 139.107" fill="none" stroke="#3f3d56" stroke-miterlimit="10"/><line x1="144.32824" y1="96.61641" x2="66.03435" y2="158.61069" fill="none" stroke="#3f3d56" stroke-miterlimit="10"/><polyline points="40.401 282.297 66.034 188.702 162.439 279.534" fill="none" stroke="#3f3d56" stroke-miterlimit="10"/><line x1="365" y1="139.10687" x2="456.63359" y2="139.10687" fill="none" stroke="#3f3d56" stroke-miterlimit="10"/><rect x="415.5" y="123.70611" width="95" height="30" fill="#3c9cc7"/><line x1="510.62322" y1="138.70611" x2="570.63359" y2="138.70611" fill="none" stroke="#3f3d56" stroke-miterlimit="10"/><line x1="415.04486" y1="138.70611" x2="359.42748" y2="45.8564" fill="none" stroke="#3f3d56" stroke-miterlimit="10"/><ellipse cx="691" cy="714.20611" rx="440" ry="98" fill="#f2f2f2"/><polygon points="894.984 391.611 852.078 606.582 842.79 606.582 841.768 604.994 838.809 600.39 875.964 399.572 881.604 397.21 894.984 391.611" fill="#47465a"/><polygon points="881.604 397.21 841.768 604.994 838.809 600.39 875.964 399.572 881.604 397.21" opacity="0.1"/><polygon points="959.564 684.432 948.533 687.988 945.852 688.855 942.313 680.893 881.604 403.96 887.916 402.545 901.177 399.572 959.564 684.432" fill="#47465a"/><polygon points="948.533 687.988 945.852 688.855 942.313 680.893 881.604 403.96 887.916 402.545 948.533 687.988" opacity="0.1"/><polygon points="433.636 391.611 423.905 670.277 412.753 672.754 411.962 672.931 408.865 667.181 415.058 394.264 421.016 393.415 433.636 391.611" fill="#47465a"/><polygon points="421.016 393.415 412.753 672.754 411.962 672.931 408.865 667.181 415.058 394.264 421.016 393.415" opacity="0.1"/><polygon points="491.581 768.917 480.045 770.907 478.753 771.128 475.215 763.609 419.039 399.572 420.658 399.081 429.213 396.476 491.581 768.917" fill="#47465a"/><polygon points="480.045 770.907 478.753 771.128 475.215 763.609 419.039 399.572 420.658 399.081 480.045 770.907" opacity="0.1"/><path d="M770.24611,412.94872l42.95118,54.88207a13.9279,13.9279,0,0,0,12.58842,5.24947l176.3179-20.64984a13.92791,13.92791,0,0,0,12.30779-13.83336v-40.6875Z" transform="translate(-34.5 -43.89695)" fill="#7a799c"/><path d="M880.3875,377.89835h11.94287a0,0,0,0,1,0,0v17.23649a4.4376,4.4376,0,0,1-4.4376,4.4376H884.8251a4.4376,4.4376,0,0,1-4.4376-4.4376V377.89835A0,0,0,0,1,880.3875,377.89835Z" fill="#47465a"/><path d="M453.539,447.89267l42.95118,54.88206a13.92791,13.92791,0,0,0,12.58842,5.24948l176.3179-20.64984A13.92793,13.92793,0,0,0,697.70425,473.541V432.8535Z" transform="translate(-34.5 -43.89695)" fill="#7a799c"/><path d="M563.68035,412.84229h11.94287a0,0,0,0,1,0,0v17.23649a4.4376,4.4376,0,0,1-4.4376,4.4376H568.118a4.4376,4.4376,0,0,1-4.4376-4.4376V412.84229A0,0,0,0,1,563.68035,412.84229Z" fill="#47465a"/><path d="M502.88475,475.68812l524.45934-61.09027a7.71254,7.71254,0,0,0,2.57751-14.54866l-93.81678-47.18187a108.58678,108.58678,0,0,0-59.80247-11.01708L410.3605,389.3598a8.91843,8.91843,0,0,0-5.45875,15.09495l54.25911,55.66844A52.67339,52.67339,0,0,0,502.88475,475.68812Z" transform="translate(-34.5 -43.89695)" fill="#47465a"/><path d="M1085.04368,406.31845l-5.61-3.101s-6.05628,4.45811-10.99,23.23965,9.22074.20375,9.22074.20375l6.1926-12.82752Z" transform="translate(-34.5 -43.89695)" fill="#47465a"/><path d="M1025.02728,578.37955s-5.75027,26.982-8.40424,34.50162c-1.30042,3.68018-7.58157,7.04629-14.54371,9.62064a97.37869,97.37869,0,0,1-19.07325,4.9762c-7.51958.88466-103.94718-14.15451-150.834-24.32806-31.58664-6.85167-35.66943-14.71185-34.97051-19.1086a6.37978,6.37978,0,0,1,1.79588-3.45015s46.44448-31.40532,62.81063-46.44449,48.65613-3.0963,84.0424,3.0963S1025.02728,578.37955,1025.02728,578.37955Z" transform="translate(-34.5 -43.89695)" fill="#47465a"/><path d="M1079.43367,403.2175s21.6741,14.15451-51.31009,43.34818c0,0-39.669,22.36656-34.50509,114.50318a25.26971,25.26971,0,0,0,3.673,11.702c7.5302,12.3852,23.66634,43.73743-3.22723,47.62992V627.478s48.65613-24.32806,53.96407-45.1175,23.00107-136.23715,31.84764-146.853S1094.47284,408.08311,1079.43367,403.2175Z" transform="translate(-34.5 -43.89695)" fill="#47465a"/><path d="M1002.07933,622.50181a97.37869,97.37869,0,0,1-19.07325,4.9762c-7.51958.88466-103.94718-14.15451-150.834-24.32806-31.58664-6.85167-35.66943-14.71185-34.97051-19.1086,20.76287,7.09937,88.18264,29.63158,112.378,31.49379,28.75135,2.21164,83.67966,8.36,87.842,4.18C999.02277,618.10507,1000.66379,619.80359,1002.07933,622.50181Z" transform="translate(-34.5 -43.89695)" opacity="0.1"/><path d="M749.45667,806.621l42.0212-191.97054s7.51959-20.3471,24.77039-19.46245L832.17209,603.15s-26.53971-6.1926-32.29,14.1545S757.41858,806.621,757.41858,806.621Z" transform="translate(-34.5 -43.89695)" fill="#47465a"/><polygon points="815.808 675.143 832.616 557.926 840.136 557.926 822.885 675.143 815.808 675.143" fill="#47465a"/><path d="M1011.3151,833.60305l-15.92383-183.124s0-15.4815,7.96192-23.00108,33.66494-28.97011,33.66494-28.97011,6.58694-1.55055,11.89488,13.48861,42.0212,165.43083,42.0212,165.43083l-7.07725,3.0963L1038.29713,607.1309l-31.40532,29.636s-6.19259,11.05821-3.0963,21.23176,14.59684,175.60438,14.59684,175.60438Z" transform="translate(-34.5 -43.89695)" fill="#47465a"/><polygon points="927.717 579.158 967.526 590.658 976.373 582.254 953.372 579.158 927.717 579.158" fill="#47465a"/><path d="M608.31275,300.20117l6.45492,96.82373,141.10276-13.71218-5.61479-94.64939a9.51952,9.51952,0,0,0-10.30071-8.9223L617.0133,290.08191A9.51953,9.51953,0,0,0,608.31275,300.20117Z" transform="translate(-34.5 -43.89695)" fill="#7a799c"/><polygon points="768.7 367.282 628.039 382.627 622.731 383.206 581.595 356.667 581.595 350.916 721.37 338.328 768.7 367.282" fill="#7a799c"/><polygon points="628.039 382.627 622.731 383.206 581.595 356.667 581.595 351.518 628.039 382.627" opacity="0.1"/><polygon points="583.364 255.373 588.23 341.627 712.082 330.127 707.658 246.084 583.364 255.373" fill="#9493b6"/><polygon points="657.233 365.513 672.272 375.687 717.832 371.263 702.35 361.532 657.233 365.513" opacity="0.1"/><polygon points="595.749 353.128 614.769 367.282 736.41 355.782 714.736 341.627 595.749 353.128" fill="#9493b6"/><rect x="811.60543" y="222.4199" width="89.79267" height="89.79267" fill="#ff6584"/><rect x="811.60543" y="222.4199" width="89.79267" height="89.79267" opacity="0.1"/><path d="M877.029,307.87069s12.66681,34.30595,0,40.63936,45.38941,0,45.38941,0l16.3613-13.1946s-36.94487-10.55568-31.667-34.83373S877.029,307.87069,877.029,307.87069Z" transform="translate(-34.5 -43.89695)" fill="#fbbebe"/><path d="M877.029,307.87069s12.66681,34.30595,0,40.63936,45.38941,0,45.38941,0l16.3613-13.1946s-36.94487-10.55568-31.667-34.83373S877.029,307.87069,877.029,307.87069Z" transform="translate(-34.5 -43.89695)" opacity="0.1"/><path d="M773.05563,651.98574s47.50054,67.02855,39.58378,85.501-3.69448,30.08368-19.528,36.41708-20.05578,17.94465-6.3334,17.41687,31.667-4.22227,34.30594-8.97232,8.97233-27.44476,17.94465-30.61147S864.89,736.43115,852.751,721.65321s-42.7254-69.21048-40.36292-74.71681S773.05563,651.98574,773.05563,651.98574Z" transform="translate(-34.5 -43.89695)" fill="#fbbebe"/><path d="M872.279,519.512s-98.16779,6.33341-123.50142,30.08368,22.16692,112.418,27.44476,113.47352,46.445-3.1667,44.86162-14.77794-29.55589-59.11179-29.55589-59.11179,36.41708-13.1946,56.47287-16.3613,42.22271-17.94465,42.22271-17.94465Z" transform="translate(-34.5 -43.89695)" fill="#9493b6"/><path d="M827.41736,504.73406s1.58335,58.584,16.3613,60.69514,0-44.86163,0-44.86163l-.52778-17.94465Z" transform="translate(-34.5 -43.89695)" fill="#fbbebe"/><path d="M872.279,351.149s-27.44476-7.91676-32.7226,13.19459-6.86119,93.94552-6.86119,93.94552l-9.50011,58.05622s17.41687-5.27784,21.11135-2.63892l22.16692-27.97254Z" transform="translate(-34.5 -43.89695)" fill="#3c9cc7"/><path d="M872.279,351.149s-27.44476-7.91676-32.7226,13.19459-6.86119,93.94552-6.86119,93.94552l-9.50011,58.05622s17.41687-5.27784,21.11135-2.63892l22.16692-27.97254Z" transform="translate(-34.5 -43.89695)" opacity="0.1"/><path d="M909.77932,663.22549s18.44475,36.2608,29.52821,35.733,21.63914-7.389,26.917,14.25016-1.05556,15.83352,5.27784,28.50033,7.389,34.83373-4.75,40.11157-23.22249,5.80562-23.75027,0,10.55567-5.80562-2.11114-26.38919-39.58378-58.05622-50.66724-61.75071S909.77932,663.22549,909.77932,663.22549Z" transform="translate(-34.5 -43.89695)" fill="#fbbebe"/><path d="M957.78,497.87287s38.00044,63.33406,13.1946,81.80649-98.69557,53.834-98.69557,53.834,39.58378,26.917,41.69492,35.8893-19.00022,33.25038-26.38919,33.77816-29.02811-24.27805-52.2506-30.61146-37.47265-51.72281-12.139-68.6119,49.0839-44.86162,49.0839-44.86162l-7.3847-40.63369Z" transform="translate(-34.5 -43.89695)" fill="#9493b6"/><path d="M924.83989,286.664c0,22.44449-22.99133,40.99863-45.43582,40.99863a40.63935,40.63935,0,1,1,0-81.27871C901.84856,246.38388,924.83989,264.21946,924.83989,286.664Z" transform="translate(-34.5 -43.89695)" fill="#fbbebe"/><path d="M889.69585,345.34334s36.41708-15.83351,36.41708-17.94465,21.11136,4.75006,25.86141,8.97233,7.389,3.69449,10.55568,12.139-15.83352,87.08433-15.83352,87.08433,10.55568,60.69514,16.3613,66.50076S916.085,516.3453,916.085,516.3453s-34.83373,6.33341-40.63935,8.97233-16.3613,6.3334-14.25016,0,11.08346-11.08346-4.22228-19.00022c0,0,5.27784-25.86141,0-37.47265s-29.55589-53.834-10.02789-84.44541,28.50033-41.69493,28.50033-41.69493S882.30688,348.51005,889.69585,345.34334Z" transform="translate(-34.5 -43.89695)" fill="#3c9cc7"/><path d="M901.3071,489.42833S860.14,507.68713,847.737,509.3773s-49.87557,11.19027-29.292,19.63481,51.72281-4.22227,51.72281-4.22227l43.80606-18.47243Z" transform="translate(-34.5 -43.89695)" fill="#fbbebe"/><path d="M945.62933,343.72433s15.20178-7.35331,19.424,18.5081,19.00022,107.66789,0,119.80692-62.80628,31.667-62.80628,31.667-25.8614-17.41686-13.72237-23.75027,41.16713-24.27806,45.3894-30.61146,8.48829-77.027,1.09932-88.63829S945.62933,343.72433,945.62933,343.72433Z" transform="translate(-34.5 -43.89695)" opacity="0.1"/><path d="M944.58537,337.42659s21.11135-1.05557,25.33362,24.80584,19.00022,107.66789,0,119.80692-62.80627,31.667-62.80627,31.667-25.86141-17.41686-13.72238-23.75027,41.16714-24.27806,45.38941-30.61146S935.613,387.03827,928.22407,375.427,944.58537,337.42659,944.58537,337.42659Z" transform="translate(-34.5 -43.89695)" fill="#3c9cc7"/><path d="M869.39363,218.61184c-6.47937.88179-13.42907,3.252-16.68936,8.92037-1.59532,2.77365-2.11107,6.02743-3.34,8.98173-3.39144,8.15262-11.628,13.02111-17.57449,19.54846-7.7497,8.50671-11.59829,21.32569-7.02776,31.88657,1.76985,4.08952,4.64406,7.59294,6.82374,11.47953,6.081,10.84307,6.40545,23.86541,6.5784,36.29605l.34006,24.4413c.05193,3.73208.09336,7.53953-1.0303,11.09882s-3.63293,6.89273-7.19212,8.01668a18.64007,18.64007,0,0,0,21.70774-7.41277,19.04939,19.04939,0,0,1-5.82228,16.89942c9.676-2.27871,17.79017-9.31636,22.90211-17.84195s7.4824-18.44239,8.54471-28.32617c.56186-5.22762.75986-10.63308-.8917-15.62468-1.16321-3.51566-3.1921-6.66756-5.1182-9.83032-4.96553-8.15368-9.43689-16.82614-11.03719-26.23773s.00641-19.738,6.11766-27.07224a24.45445,24.45445,0,0,1,19.315-8.85635,21.50289,21.50289,0,0,1,17.9282,10.97538c1.4118,2.65764,3.42145,6.25954,6.28226,5.32575a15.52284,15.52284,0,0,0,1.549-.76054c3.19044-1.45194,6.81442,1.41256,8.22125,4.62315,4.43733,10.12665-3.73777,21.18131-4.58276,32.20513-.786,10.25474,4.93126,19.92613,11.76532,27.612a90.71726,90.71726,0,0,0,44.35273,27.24968,12.44917,12.44917,0,0,1-6.4337-3.99663,84.47007,84.47007,0,0,0,20.75653-1.74c-7.42625-5.59639-14.90482-11.24044-21.10471-18.17083s-11.1103-15.316-12.44738-24.5182c-1.79441-12.34986,2.80533-25.72347-2.45361-37.04082-4.80791-10.34671-16.73195-16.12851-21.0866-26.674-4.42322-10.71155-7.29082-20.01739-19.00212-24.68049C896.96212,220.29875,883.20371,216.73239,869.39363,218.61184Z" transform="translate(-34.5 -43.89695)" fill="#ff6584"/></svg>
								<p>Klik tombol<span class="text-main">"Tambah"</span> untuk menambah data bagian</p></div>;
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