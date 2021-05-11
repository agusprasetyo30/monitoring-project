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
									<div class="panel panel-body" style="border : 1px solid #e0e0e0; width:95%; height:290px; position : relative;">
										<!-- Contact Widget -->
										<!---------------------------------->
										<div class="panel pos-rel" style="width:105%;">
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
													<label class="badge badge-danger"><?php echo $row['jabatan'] == "pegawai_kantor" ? "Pegawai Kantor" : "" ?></label>
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
                                                        <p class="text-sm"><?php echo $row['jabatan'] == "pegawai_kantor" ? "Pegawai Kantor" : "" ?></p>
                                                    </div>
                                                </div>
                                                <div class="media-right pad-top">
                                                    <a href="<?php echo base_url('account/editAkun?jabatan=pegawai_kantor&id='. $row['id_login']) ?>" class="btn btn-sm btn-default btn-labeled"><i class="btn-label ti-pencil"></i> Sunting</a>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="text-sm"><i class="demo-pli-mail icon-lg icon-fw"></i><?php echo $row['email'] ?></label><br>
                                                    <label class="text-sm"><i class="demo-pli-old-telephone icon-lg icon-fw"></i><?php echo $row['telp'] ?></label><br>
													<label class="text-sm"><i class="demo-pli-home icon-lg icon-fw"></i><?php echo $row['address'] ?></label>
                                            </div>
                                            <div class="col-md-6" style="border-left: 1px solid #e0e0e0">
                                                    <div class="row">
                                                        <div class="col-md-5">
														<svg style="width:100px" id="e9cc7481-9d21-4aa3-9403-ae7e4b5beac2" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1081.27246 530.3173"><title>personal_file</title><ellipse cx="851.78373" cy="519.3173" rx="229.48873" ry="11" fill="#d0cde1"/><path d="M910.58074,481.36241l17.29172,67.2456s.64044,47.39214,4.483,65.96473,16.65129,63.403,16.65129,63.403l15.37043,2.56174L961.175,617.77491s0-37.78562-3.20217-46.11127-9.60651-93.5034-9.60651-93.5034Z" transform="translate(-59.36377 -184.84135)" fill="#ffb8b8"/><path d="M910.58074,481.36241l17.29172,67.2456s.64044,47.39214,4.483,65.96473,16.65129,63.403,16.65129,63.403l15.37043,2.56174L961.175,617.77491s0-37.78562-3.20217-46.11127-9.60651-93.5034-9.60651-93.5034Z" transform="translate(-59.36377 -184.84135)" opacity="0.1"/><path d="M958.52163,199.50989h-.00006c-21.34755,0-38.65316,19.20543-38.65316,42.89652v30.09978h9.25731l5.35946-11.15221-1.33988,11.15221h59.50245L997.52,262.36782l-1.218,10.13837h6.69933V248.87247C1003.00128,221.6103,983.08706,199.50989,958.52163,199.50989Z" transform="translate(-59.36377 -184.84135)" fill="#2f2e41"/><path d="M894.24966,470.79525s-7.68521,32.66214,2.56174,35.86432,7.68521-35.86432,7.68521-35.86432Z" transform="translate(-59.36377 -184.84135)" fill="#ffb8b8"/><polygon points="847.695 120.081 842.571 125.845 843.852 236.64 832.324 289.156 857.942 291.718 870.75 186.046 866.908 132.25 847.695 120.081" fill="#3f3d56"/><polygon points="847.695 120.081 842.571 125.845 843.852 236.64 832.324 289.156 857.942 291.718 870.75 186.046 866.908 132.25 847.695 120.081" opacity="0.1"/><circle cx="895.73794" cy="55.94173" r="27.51715" fill="#ffb8b8"/><path d="M939.32521,257.29337s8.07169,41.82606,4.40274,46.22881,38.8909-8.0717,38.8909-8.0717-13.942-28.61783-6.60411-44.76122Z" transform="translate(-59.36377 -184.84135)" fill="#ffb8b8"/><path d="M1008.8874,440.69484s7.68521,32.66214-2.56174,35.86432-7.68521-35.86432-7.68521-35.86432Z" transform="translate(-59.36377 -184.84135)" fill="#ffb8b8"/><path d="M949.64723,473.6772s-10.88739,65.3243-10.247,74.93081,0,10.88738,0,10.88738-10.88738,28.17911-14.08955,44.19-10.247,36.50475-10.247,36.50475-8.32565,18.57259-1.28087,18.57259S930.4342,656.201,930.4342,656.201a32.706,32.706,0,0,1,7.04478-20.38918c7.68521-9.71123,30.74084-55.18207,30.74084-60.946s3.84261-22.41519,3.84261-22.41519l14.73-71.08821Z" transform="translate(-59.36377 -184.84135)" fill="#ffb8b8"/><path d="M904.81683,430.12767S893.92945,485.205,903.536,486.48589s23.05563-8.32565,40.34736,2.56173,46.11127,8.32565,46.11127,8.32565,19.85346-50.59431,1.9213-62.76256S904.81683,430.12767,904.81683,430.12767Z" transform="translate(-59.36377 -184.84135)" fill="#2f2e41"/><path d="M916.98508,651.07749a17.05956,17.05956,0,0,1,8.96608-1.28087,11.69566,11.69566,0,0,0,8.32565-1.9213s-5.12348,18.57259-4.483,25.61737-1.92131,37.14519-15.37043,33.943-17.29172-12.80869-12.16825-29.46,3.84261-35.86432,3.84261-35.86432,9.34675-9.65443,11.07772-8.3496S916.98508,651.07749,916.98508,651.07749Z" transform="translate(-59.36377 -184.84135)" fill="#2f2e41"/><path d="M959.89418,674.77356s-6.40435-14.08955-14.08956-1.28087-8.32564,16.01086-8.32564,16.01086-21.77477,19.85346-6.40435,21.77476,27.53868-.64043,27.53868-3.8426,7.68521-2.56174,8.32564-5.12348-1.28087-26.2578-1.28087-26.2578Z" transform="translate(-59.36377 -184.84135)" fill="#2f2e41"/><path d="M974.304,278.665h0s-26.89824,5.12347-30.10041,4.483a15.89863,15.89863,0,0,0-2.183-.2315,32.36577,32.36577,0,0,0-17.87648,4.43318c-8.91836,5.18052-22.20922,14.40015-22.20922,23.337,0,13.44912,17.29173,36.50475,17.29173,36.50475s-16.01086,55.07735-14.73,60.20083-9.60651,22.41519-2.56174,28.1791,74.29038,0,86.45863,5.76391,6.40434-76.85211,6.40434-76.85211,32.66215-74.93081,16.01086-81.97559c-5.38806-2.27956-10.03849-4.02267-13.8645-5.33781A29.30821,29.30821,0,0,0,974.304,278.665Z" transform="translate(-59.36377 -184.84135)" fill="#3f3d56"/><path d="M999.28088,283.148l14.69512,2.42848s6.43921,6.5376,6.43921,9.73977-1.28087,141.536-3.20217,146.019-23.05563,2.56174-23.05563,2.56174L998,365.12359Z" transform="translate(-59.36377 -184.84135)" fill="#3f3d56"/><path d="M969.51,211.32646a20.27175,20.27175,0,0,0-15.995-8.16238h-.75887c-14.63166,0-26.4929,13.24-26.4929,29.57231v.00006h4.90269l.79177-6.02668,1.16089,6.02668h29.07753l2.43614-5.09868-.60905,5.09868h5.72038q4.004,19.88487-11.50616,39.76974H967.982l4.87223-10.19737-1.218,10.19737h18.57546l3.65419-23.454C993.8658,231.4873,983.66009,216.59263,969.51,211.32646Z" transform="translate(-59.36377 -184.84135)" fill="#2f2e41"/><circle cx="915.48701" cy="14.4774" r="14.4774" fill="#2f2e41"/><rect x="98.3821" y="18.589" width="610.03004" height="390.30358" fill="#3f3d56"/><rect x="416.40724" y="89.06048" width="274.65808" height="319.47071" fill="#bda438"/><rect x="509.30592" y="118.78644" width="166.58036" height="6.71695" fill="#fff"/><rect x="509.30592" y="133.56373" width="166.58036" height="6.71695" fill="#fff"/><rect x="509.30592" y="148.34102" width="56.42238" height="6.71695" fill="#fff"/><rect x="167.23804" y="263.23932" width="166.58036" height="6.71695" fill="#fff"/><rect x="167.23804" y="278.01661" width="166.58036" height="6.71695" fill="#fff"/><rect x="167.23804" y="292.7939" width="56.42238" height="6.71695" fill="#fff"/><rect x="470.27557" y="201.18386" width="166.58036" height="6.71695" fill="#fff"/><rect x="470.27557" y="215.96115" width="166.58036" height="6.71695" fill="#fff"/><rect x="470.27557" y="230.41684" width="166.58036" height="6.71695" fill="#fff"/><rect x="470.27557" y="244.87253" width="166.58036" height="6.71695" fill="#fff"/><rect x="470.27557" y="259.32822" width="166.58036" height="6.71695" fill="#fff"/><rect x="470.27557" y="273.7839" width="166.58036" height="6.71695" fill="#fff"/><rect x="470.27557" y="288.23959" width="166.58036" height="6.71695" fill="#fff"/><rect x="470.27557" y="302.69528" width="166.58036" height="6.71695" fill="#fff"/><rect x="470.27557" y="317.15097" width="166.58036" height="6.71695" fill="#fff"/><rect x="470.27557" y="331.60666" width="166.58036" height="6.71695" fill="#fff"/><rect x="470.27557" y="346.06234" width="166.58036" height="6.71695" fill="#fff"/><path d="M370.59141,341.277a60.549,60.549,0,0,1-22.52918,47.19058,59.846,59.846,0,0,1-8.30479,5.65941,58.68092,58.68092,0,0,1-5.43535,2.72492,60.10446,60.10446,0,0,1-19.43568,4.92216q-2.4719.206-4.99442.20235a59.98229,59.98229,0,0,1-9.93105-.81675c-1.15649-.18069-2.29845-.40476-3.426-.665a58.39158,58.39158,0,0,1-5.83288-1.619,60.55985,60.55985,0,0,1-21.30048-12.38853,55.24566,55.24566,0,0,1-4.5174-4.4957A60.69382,60.69382,0,1,1,370.59141,341.277Z" transform="translate(-59.36377 -184.84135)" fill="#bda438"/><path d="M767.41442,374.36886A101.18972,101.18972,0,0,0,666.2247,475.55858v.00013a29.63413,29.63413,0,0,1-29.63413,29.63413H587.44111a88.17961,88.17961,0,0,0-88.17961,88.17961v.00009h268.153V374.36886Z" transform="translate(-59.36377 -184.84135)" fill="#3f3d56"/><rect x="396.53067" y="18.589" width="13.01012" height="390.30358" fill="#2f2e41"/><path d="M136.13848,672.4285c.12253,12.56057-7.30184,17.01851-16.51218,17.10836q-.32091.00313-.63879-.00093-.64043-.00757-1.2678-.046c-8.31838-.50748-14.82226-5.05475-14.93621-16.73606-.11793-12.0887,15.18345-27.49513,16.33116-28.63444l.002-.001c.0436-.04342.06592-.06513.06592-.06513S136.016,659.86894,136.13848,672.4285Z" transform="translate(-59.36377 -184.84135)" fill="#d0cde1"/><ellipse cx="60" cy="502.92867" rx="60" ry="4.23529" fill="#d0cde1"/></svg>
                                                    </div>
                                                        <div class="col-md-7">
                                                            <small class="text-main text-semibold">Wilayah Penugasan</small><br>
															<label class="text-sm"><?php echo $row['wilayah_penugasan'] ?></label><br>
                                                        </div>
                                                       

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
								<svg style="width: 200px" id="b21613c9-2bf0-4d37-bef0-3b193d34fc5d" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 647.63626 632.17383"><path d="M687.3279,276.08691H512.81813a15.01828,15.01828,0,0,0-15,15v387.85l-2,.61005-42.81006,13.11a8.00676,8.00676,0,0,1-9.98974-5.31L315.678,271.39691a8.00313,8.00313,0,0,1,5.31006-9.99l65.97022-20.2,191.25-58.54,65.96972-20.2a7.98927,7.98927,0,0,1,9.99024,5.3l32.5498,106.32Z" transform="translate(-276.18187 -133.91309)" fill="#f2f2f2"/><path d="M725.408,274.08691l-39.23-128.14a16.99368,16.99368,0,0,0-21.23-11.28l-92.75,28.39L380.95827,221.60693l-92.75,28.4a17.0152,17.0152,0,0,0-11.28028,21.23l134.08008,437.93a17.02661,17.02661,0,0,0,16.26026,12.03,16.78926,16.78926,0,0,0,4.96972-.75l63.58008-19.46,2-.62v-2.09l-2,.61-64.16992,19.65a15.01489,15.01489,0,0,1-18.73-9.95l-134.06983-437.94a14.97935,14.97935,0,0,1,9.94971-18.73l92.75-28.4,191.24024-58.54,92.75-28.4a15.15551,15.15551,0,0,1,4.40966-.66,15.01461,15.01461,0,0,1,14.32032,10.61l39.0498,127.56.62012,2h2.08008Z" transform="translate(-276.18187 -133.91309)" fill="#3f3d56"/><path d="M398.86279,261.73389a9.0157,9.0157,0,0,1-8.61133-6.3667l-12.88037-42.07178a8.99884,8.99884,0,0,1,5.9712-11.24023l175.939-53.86377a9.00867,9.00867,0,0,1,11.24072,5.9707l12.88037,42.07227a9.01029,9.01029,0,0,1-5.9707,11.24072L401.49219,261.33887A8.976,8.976,0,0,1,398.86279,261.73389Z" transform="translate(-276.18187 -133.91309)" fill="#bda438"/><circle cx="190.15351" cy="24.95465" r="20" fill="#bda438"/><circle cx="190.15351" cy="24.95465" r="12.66462" fill="#fff"/><path d="M878.81836,716.08691h-338a8.50981,8.50981,0,0,1-8.5-8.5v-405a8.50951,8.50951,0,0,1,8.5-8.5h338a8.50982,8.50982,0,0,1,8.5,8.5v405A8.51013,8.51013,0,0,1,878.81836,716.08691Z" transform="translate(-276.18187 -133.91309)" fill="#e6e6e6"/><path d="M723.31813,274.08691h-210.5a17.02411,17.02411,0,0,0-17,17v407.8l2-.61v-407.19a15.01828,15.01828,0,0,1,15-15H723.93825Zm183.5,0h-394a17.02411,17.02411,0,0,0-17,17v458a17.0241,17.0241,0,0,0,17,17h394a17.0241,17.0241,0,0,0,17-17v-458A17.02411,17.02411,0,0,0,906.81813,274.08691Zm15,475a15.01828,15.01828,0,0,1-15,15h-394a15.01828,15.01828,0,0,1-15-15v-458a15.01828,15.01828,0,0,1,15-15h394a15.01828,15.01828,0,0,1,15,15Z" transform="translate(-276.18187 -133.91309)" fill="#3f3d56"/><path d="M801.81836,318.08691h-184a9.01015,9.01015,0,0,1-9-9v-44a9.01016,9.01016,0,0,1,9-9h184a9.01016,9.01016,0,0,1,9,9v44A9.01015,9.01015,0,0,1,801.81836,318.08691Z" transform="translate(-276.18187 -133.91309)" fill="#bda438"/><circle cx="433.63626" cy="105.17383" r="20" fill="#bda438"/><circle cx="433.63626" cy="105.17383" r="12.18187" fill="#fff"/></svg>
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


				