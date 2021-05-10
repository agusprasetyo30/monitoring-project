        <!--CONTENT CONTAINER-->
                    <!--===================================================-->
                    <div id="content-container">
                        <div id="page-head">
                            
                            <!--Page Title-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <div id="page-title">
                                <h1 class="page-header text-overflow">Sunting Data Pelanggan </h1>
                            </div>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End page title-->

							<!--Breadcrumb-->
							<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url('data_pelanggan') ?>"><i class="demo-pli-home"></i></a></li>
								<li class="active">Sunting Data Pelanggan</li>
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
					            <form class="form-horizontal" action="<?php echo base_url('data_pelanggan/prosesEditPelanggan/'.$hasil['id_pelanggan']) ?>" method="POST" enctype="multipart/form-data">
					                <div class="panel-body">
                                    	
					                    <div class="form-group">
					                        <label for="demo-is-inputnormal" class="col-sm-3 control-label">No Ref</label>
					                        <div class="col-sm-6">
					                            <input name="no_ref" type="text" value="<?php echo $hasil['no_ref'] ?>" placeholder="Masukkan No Ref..." required="" class="form-control" id="demo-is-inputnormal">
                                            </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="demo-is-inputnormal" class="col-sm-3 control-label">Nama</label>
					                        <div class="col-sm-6">
					                            <input name="nama_pelanggan" type="text" placeholder="Masukkan Nama..." required="" value="<?php echo $hasil['nama'] ?>"class="form-control" id="demo-is-inputnormal">
					                        </div>
					                    </div>
					                    <div class="form-group">
					                        <label for="demo-is-inputnormal" class="col-sm-3 control-label">Alamat</label>
					                        <div class="col-sm-8">
                                            <textarea placeholder="Masukkan alamat..." rows="4" class="form-control" name="alamat" required=""><?php echo $hasil['alamat'] ?></textarea>
					                        </div>
					                    </div>
                                        <!-- <div class="form-group">
					                        <label for="demo-is-inputnormal" class="col-sm-3 control-label">Status/Jenis Pelanggan</label>
					                        <div class="col-sm-6">
											
                                            <select data-placeholder="Choose a Country..." name="jenis" id="jen" tabindex="2">
					                            <option value=""selected readonly>Pilih status pelanggan</option>
												<?php
													foreach ($master_jenis_pelanggan as $kolom => $value) {
													
														if($value['id_jenis_pelanggan'] == $hasil['id_jenis_pelanggan']) {?>
														<option selected value="<?= $value['id_jenis_pelanggan']?>"><?= $value['nama_jenis']?></option>
														<?php }else{?>
															<option value="<?= $value['id_jenis_pelanggan']?>"><?= $value['nama_jenis']?></option>
									
												<?php 
													} }
												?>
                                            </select>
					                        </div>
					                    </div> -->
                                        <div class="form-group">
					                        <label for="demo-is-inputnormal" class="col-sm-3 control-label">Domisili</label>
					                        <div class="col-sm-6">
                                            <select data-placeholder="Choose a Country..." name="domisili" id="dom" tabindex="2">
											<option value=""selected readonly>Pilih Domisili pelanggan</option>
												<?php
													foreach ($master_domisili as $kolom => $value) {
														
														if($value['id_domisili'] == $hasil['id_domisili']) {?>
														<option selected value="<?= $value['id_domisili']?>"><?= $value['kota']." - ".$value['wilayah'] ?></option>
														<?php }else{?>
															<option value="<?= $value['id_domisili']?>"><?= $value['kota']." - ".$value['wilayah'] ?></option>
									
												<?php 
													} }
												?>
                                            </select>
					                        </div>
					                    </div>
										<div class="form-group">
					                        <label for="demo-is-inputnormal" class="col-sm-3 control-label">Sub Domisili</label>
					                        <div class="col-sm-6">
                                            <select data-placeholder="Choose a Country..." name="subdomisili"id="sub" tabindex="2">
											<option value=""selected readonly>Pilih Sub Domisili pelanggan</option>
												<?php
													foreach ($master_subdomisili as $kolom => $value) {
				
													if($value['id_subdomisili'] == $hasil['id_subdomisili']) {?>
														<option selected value="<?= $value['id_subdomisili']?>"><?= $value['kecamatan']." - ".$value['kelurahan'] ?></option>
														<?php }else{?>
															<option value="<?= $value['id_subdomisili']?>"><?= $value['kecamatan']." - ".$value['kelurahan'] ?></option>
									
												<?php 
													} }
												?>
                                            </select>
					                        </div>
					                    </div>


										<div class="form-group pad-ver">
					                    <label class="col-md-3 control-label text-semibold">Pencabutan</label>
					                    <div class="col-md-6">
					                        <div class="radio">
					                            <!-- Inline radio buttons -->
					                            <input id="pencabutan-1" class="magic-radio" type="radio" name="cabut" value="iya" <?php if ( $hasil['pencabutan'] == 'iya' ) echo 'checked' ?> required="" >
					                            <label for="pencabutan-1">Iya</label>
					
					                            <input id="pencabutan-2" class="magic-radio" type="radio" name="cabut" value="tidak" <?php if ( $hasil['pencabutan'] == 'tidak' ) echo 'checked' ?> required="">
					                            <label for="pencabutan-2">Tidak</label>			                 		
					                        </div>
                                            <small class="text-muted">Pilih status pencabutan pelangggan</small>
											</div>
										</div>

                                   
								   </div>

								   <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-sm btn-default" type="button">Close</button>
                                <button class="btn btn-sm btn-warning btn-labeled"><i class="btn-label ti-plus"></i> Simpan dan Perbarui</button>
                                </div>
					            </div>

                            </div>  
					    </div>     
				</form>
				<!--===================================================-->
				<!--End Input Size-->

			<!--Chosen [ OPTIONAL ]-->
			<script src="<?php echo base_url() ?>assets/plugins/chosen/chosen.jquery.min.js"></script>
			<script>
				$('#jen').chosen({width:'100%'});
				$('#dom').chosen({width:'100%'});
				$('#sub').chosen({width:'100%'});
			</script>