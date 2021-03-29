        <!--CONTENT CONTAINER-->
                    <!--===================================================-->
                    <div id="content-container">
                        <div id="page-head">
                            
                            <!--Page Title-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <div id="page-title">
                                <h1 class="page-header text-overflow">Sunting Data Piutang </h1>
                            </div>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End page title-->

							<!--Breadcrumb-->
							<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url('data_pelanggan') ?>"><i class="demo-pli-home"></i></a></li>
								<li class="active">Sunting Data Piutang</li>
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
                                    <a href="<?php echo base_url('data_piutang') ?>" id="demo-btn-addrow" class="btn btn-primary btn-labeled"><i class="btn-label ti-arrow-left"></i> Kembali ke menu utama</a>
                                    
                                </div>
                            </div>
                            <!---------------------------------->


                    <div class="row">
                        
                        <div class="col-md-8 col-md-offset-2">
							
							<?php echo $this->session->flashdata('msg') ?>

                            <div class="panel panel-body" style="border : 1px solid #e0e0e0">
                            <h4>Data Piutang</h4>
                                <p>Lengkapi data form dibawah ini</p>

					            <!--===================================================-->
                                
					            <form class="form-horizontal" action="<?php echo base_url('data_piutang/prosesEditPiutang/'.$hasil['id_piutang']) ?>" method="POST" enctype="multipart/form-data">
					                <div class="panel-body">

                                    <!-- ISI FORM -->                           
                                        <div class="form-group">
                                        <label for="" class="text-semibold">No ref</label>
                                        <input type="text" name="no_ref" class="form-control" value="<?php echo $hasil['no_ref'] ?>" placeholder="..." id="" required="" /> <br>
                                        <input type="hidden" name="id" value="<?php echo $hasil['id_piutang'] ?>">

                                        <small>Masukkan no ref</small>
                                        </div>  

                                    <div class="form-group">
                                        <label for="" class="text-semibold">Tahun</label>
                                        <input type="year" name="tahun" class="form-control" value="<?php echo $hasil['tahun'] ?>" placeholder="..." id="" required="" /> <br>
                                        <small>Masukkan tahun</small>
                                    </div>    

                                    <div class="form-group">
                                        <label for="" class="text-semibold">Bulan</label>
                                        <input type="year" name="bulan" class="form-control" value="<?php echo $hasil['bulan'] ?>" placeholder="..." id="" required="" /> <br>
                                        <small>Masukkan nama jenis pelanggan</small>
                                    </div>  

                                    <div class="form-group">
                                        <label for="" class="text-semibold">Nominal</label>
                                        <input type="number" name="nominal" class="form-control" value="<?php echo $hasil['nominal'] ?>" placeholder="..." id="" required="" /> <br>
                                        <small>Masukkan nama jenis pelanggan</small>
                                    </div>  

                                    <div class="form-group">
                                        <label for="" class="text-semibold">Keterangan</label>
                                        <input type="text" name="keterangan" class="form-control" value="<?php echo $hasil['keterangan'] ?>" placeholder="..." id=""  /> <br>
                                        <small>Masukkan nama jenis pelanggan</small>
                                    </div>  

                                    <div class="form-group">
                                        <label for="" class="text-semibold">Alasan</label>
                                        <input type="text" name="alasan" class="form-control" value="<?php echo $hasil['alasan'] ?>" placeholder="..." id="" /> <br>
                                        <small>Masukkan nama jenis pelanggan</small>
                                    </div>  
                                    <!-- TUTUP FORM -->

                                   </div>
					            </div>
                            </div>  
					    </div>  

                        <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-sm btn-default" type="button">Close</button>
                                <button class="btn btn-sm btn-warning btn-labeled"><i class="btn-label ti-plus"></i> Simpan dan Perbarui</button>
                                </div>
				</form>
		<!--===================================================-->
		<!--End Input Size-->




        <!--Chosen [ OPTIONAL ]-->
        <script src="<?php echo base_url() ?>assets/plugins/chosen/chosen.jquery.min.js"></script>
            <!--Bootstrap Datepicker [ OPTIONAL ]-->
            <script src="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
            
			<script>
				$('#no_ref').chosen({width:'100%'});

                // year
                $('#dp-tahun').datepicker({
                    format: "yyyy",
                    todayBtn: "linked",
                    viewMode: "years", 
                    minViewMode: "years",
                });


                // bulan
                $('#dp-bulan').datepicker({
                    format: "MM",
                    todayBtn: "linked",
                    viewMode: "months", 
                    minViewMode: "months",

                });
            
            </script>

