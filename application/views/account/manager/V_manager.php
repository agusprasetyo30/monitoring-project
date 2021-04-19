<!--CONTENT CONTAINER-->
                    <!--===================================================-->
                    <div id="content-container">
                            
                            <!--Page Title-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <div id="page-title">
                                <h1 class="page-header text-overflow">Halaman Data Manager </h1>
                            </div>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End page title-->

                <!--Breadcrumb-->
							<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url('dashboard') ?>"><i class="demo-pli-home"></i></a></li>
								<li><a href="<?php echo base_url('account') ?>">Menu Akun</a></li>
								<!-- <li><a href="<?php echo base_url('account/viewManager') ?>">Data Manager</a></li> -->
								<li class="active">Data Manager</li>
							</ol>
							<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
							<!--End breadcrumb-->
                        


          
                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
				<div class="row pad-btm">
					    <div class="col-sm-6 toolbar-left">
                            <a href="<?php echo base_url('account') ?>" id="demo-btn-addrow" class="btn btn-primary btn-labeled"><i class="btn-label ti-arrow-left"></i> Kembali ke menu utama</a>
                           
                            <input type="hidden" name="type" value="<?php echo $this->input->get('v') ?>" />
					    </div>

					</div>
					
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
                    <div class="col-md-10 col-md-offset-1">
					    <div class="eq-height">
					        <div class="col-sm-4 eq-box-sm">
					
					            <!--Panel 1-->
					            <!--===================================================-->
					            <div class="panel">
					                  <div class="panel panel-body" style="border: 1px solid #e0e0e0">
                                      <p class="text-main text-semibold">Data Manajer Jargas Probolingo</p>
                                      <h9> Manajer Rayon Pasuruan - Probolinggo</h9>
									  
                                      <br><br>

                                      <br><br>
                                      <div class="col-md-12 text-right">
                                      <!-- <button class="btn btn-sm btn-success btn-labeled"><i class="btn-label ti-import"></i>Unduh Data</button> -->
					                </div>

					                </div>
                                   
					            </div>
					            <!--===================================================-->
					            <!--End Panel 1-->
                               
					        </div>
					        <div class="col-sm-8 eq-box-sm">
					
					            <!--Panel 2-->
					            <!--===================================================-->
					            <div class="panel">
                                <div class="panel panel-body" style="border: 1px solid #e0e0e0">
                                <p class="text-main text-semibold">Biodata Manajer</p>
                                <hr>


								<div class="comments media-block">
								<a class="media-left" href="#"><img class="img-circle img-md" alt="Profile Picture" src="<?php echo $img ?>"></a>
					                        <div class="media-body">
					                            <div class="comment-header">
					                            <p><i class="demo-pli-male icon-lg icon-fw"></i> Nama : <?php echo $row['name'] ?></p>
													<p><i class="demo-pli-map-marker-2 icon-lg icon-fw"></i> Alamat : <?php echo $row['address'] ?></p>
													<p><a href="#" class="btn-link"><i class="demo-pli-internet icon-lg icon-fw"></i> Email : <?php echo $row['email'] ?></a></p>
													<p><i class="demo-pli-old-telephone icon-lg icon-fw"></i>No Telp : <?php echo $row['telp'] ?></p>
					                            </div>
 
					                        </div>
					                    </div>

								<hr>

                                 
                                      <div class="col-md-12 text-right">
                                      <button class="btn btn-sm btn-success btn-labeled"><a href="<?php echo base_url('account/editAkun?jabatan=manajer&id='. $row['id_login']) ?>"><i class="btn-label ti-pencil"></i>Sunting</a></button>
					                </div>

					            </div>
					            </div>
                                </div>

                               
					            <!--===================================================-->
					            <!--End Panel 2-->
					
                               
					        </div>


					    </div>

						<?php } ?>
							
							<?php } else { ?>
							
								
								<div class="col-md-11 text-center">
								<h4>Data Kosong</h4>
								
								</div>
							
							<?php } ?>
					
					</div>
				
            </div>	
    </div>

