<!--CONTENT CONTAINER-->
                    <!--===================================================-->
                    <div id="content-container">
                    <br><br>
                            
                            <!--Page Title-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <div id="page-title">
                                <h1 class="page-header text-overflow">Import Data Excel </h1>
                            </div>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End page title-->

                <!--Breadcrumb-->
							<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url('data_pelanggan') ?>"><i class="demo-pli-home"></i></a></li>
								<li><a href="<?php echo base_url('data_pelanggan') ?>">Menu Data Pelanggan</a></li>
						    	<li class="active">Import Data Excel</li>
							</ol>
							<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
							<!--End breadcrumb-->
                        


          
                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    
					<div class="row">
                    <div class="col-md-10 col-md-offset-1">
					    <div class="eq-height">
					        <div class="col-sm-4 eq-box-sm">
					
					            <!--Panel 1-->
					            <!--===================================================-->
					            <div class="panel">
					                  <div class="panel panel-body" style="border: 1px solid #e0e0e0">
                                      <p class="text-main text-semibold">Unduh Format Excel</p>
                                      <h9> Pilih format tahun dan domisili</h9>
                                      <br><br>

                                      <h9> * Pilih Tahun</h9><br>
                                    
                                      <select id="tahun" name="tahun">
                                           <option value="United States">Silahkan pilih tahun </option>
                                            <option value="United States">2020</option>
					                        <option value="United Kingdom">2021</option>
                                      </select>
     
                                      <br><br><br>

                                      <h9> * Pilih Domisili</h9><br>
                                      <select  id="domisili" name="domisili">
                                            <option value="United States">Silahkan pilih domisili</option>
                                            <?php
												foreach ($master_domisili as $kolom => $value) { ?>
												<option value="<?= $value['id_domisili']?>"><?= $value['kota']." - ".$value['wilayah'] ?></option>
											<?php 
											}
                                            ?>
                                      </select>


                                      <br><br>
                                      <div class="col-md-12 text-right">
                                      <button class="btn btn-sm btn-success btn-labeled"><i class="btn-label ti-import"></i>Unduh Data</button>
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
                                <p class="text-main text-semibold">Import Format Excel</p>
                                <hr>
                                <h9> Masukkan file Excel | .xlsx</h9>
                                <br><br>

                                <div class="form-group">
					                <div class="col-sm-8">
					                    <input name="foto" type="file" placeholder="Masukkan Foto.."  class="form-control" id="demo-is-inputnormal">
					                </div>
                                 </div>

                                 <br><br>
                                      <div class="col-md-12 text-right">
                                      <button class="btn btn-sm btn-success btn-labeled"><i class="btn-label ti-import"></i>Import Data</button>
					                </div>

					            </div>
					            </div>
                                </div>

                               
					            <!--===================================================-->
					            <!--End Panel 2-->
					
                               
					        </div>


					    </div>
					</div>
            </div>
    </div>

          <!--Chosen [ OPTIONAL ]-->
          <script src="<?php echo base_url() ?>assets/plugins/chosen/chosen.jquery.min.js"></script>

          <script>

            $('#tahun').chosen({width:'100%'});
            $('#domisili').chosen({width:'100%'});


            </script>
    
    