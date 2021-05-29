<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <div class="pad-all text-center">
                        <h3>DETAIL PENUGASAN</h3>
                       
                    </div>
                </div>

                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
    
    
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-body" style="border: 1px solid #e0e0e0">
                            <form action="<?php echo base_url('penugasan/prosesTambahPenugasan') ?>" method="POST">
                                <p class="text-main text-semibold">Data Penugasan</p>
                                      <h9> *Pilih Petugas</h9><br>
                                    
                                      <select id="off" name="officer" required="">
                                      <option value=""selected readonly>Pilih petugas lapangan</option>
                                      <?php
											foreach ($user_officer as $kolom => $value) { ?>
												<option value="<?= $value['id_officer']?>"> <?= $value['name']?></option>
											<?php 
											}
                                            ?>  
                                      </select>
                                      
                                      <br><br>
                                        <!-- Multiple Select Choosen -->
                                        <!--===================================================-->
                                        <h9> *Pilih Data Pelanggan</h9><br>
                                        <select class="selectpicker" name="pelanggan" multiple title="Pilih pelanggan" data-width="100%" >
                                        
                                            <?php
											foreach ($data_pelanggan as $kolom => $value) { ?>
												<option value="<?= $value['id_pelanggan']?>"> <?= $value['no_ref']." - ".$value['nama']." - ".$value['alamat'] ?></option>
											<?php 
											}
                                            ?>  
                                        </select>

                                    <br><br>

                            
                            <!-- Tampilan OPSI 2 -->
                            <div class="col-md-12 col-md-offset">
                                <div class="panel panel-body" style="border: 1px solid #e0e0e0">
                                <br>
                                <p class="text-main text-semibold">Pilih Pelanggan</p>
                                <label class="badge badge-info">Filter berdasarkan</label>
                                            <div class="select">
                                                <select data-placeholder="Pilih berdasarkan..." id="demo-ease" name="wilayah">
                                                <option value=""selected readonly>Pilih wilayah</option>
                                                <option value=""> Kelurahan</option>
                                                <option value="">Kecamatan</option>
    
                                                </select>
                                            </div>
                                
                                    <table class="table" id="table-penugasan">
                                        <thead>
                                        <tr>
					                            <th data-field="state" data-checkbox="true"></th>
					                            <th data-field="id" data-switchable="false">No</th>
					                            <th data-field="name">Nama</th>
					                            <th data-field="date">Alamat</th>
					                        </tr>
                                        <tbody>

                                        <?php $no = 1; foreach ( $data_pelanggan AS $kolom ) { ?>
                                        <tr>
                                        <td>        
                                            <input type="checkbox" id="demo-checkbox-1" name="pelanggan" value="<?php echo $kolom['id_pelanggan']?>" alt="Checkbox" class="magic-checkbox" >
                                            <label for="demo-checkbox-1"> </label>
                
                                        </td>
                                                <td><?php echo $no++ ?></td>
                                                <td> <label for=""><?php echo $kolom['nama'] ?></label></td>
                                                <td> <label for=""><?php echo $kolom['no_ref'] ?></label></td>
                                                <td><label for=""><?php echo $kolom['alamat'] ?></label></td>
                                        
                                                </tr>
                                                <?php } ?>
                                            </tbody>

                                        </thead>
                                    </table>
                                </div>
                                <!-- </form> -->
                            </div>
                                    

                                      <div class="col-md-12 text-right">
                                      <button class="btn btn-sm btn-success btn-labeled"><i class="btn-label ti-check"></i>Submit</button>
					                </div>

					        </div>
                                   
					    </div>
                        </div>
                    </div>
					            <!--===================================================-->
					            <!--End Panel 1-->

                </div>
                                                    
                  

                    

            <script src="<?php echo base_url() ?>assets/plugins/chosen/chosen.jquery.min.js"></script>
           

            <!--Bootstrap Select [ OPTIONAL ]-->
            <script src="<?php echo base_url() ?>assets/plugins/bootstrap-select/bootstrap-select.min.js"></script> 
            <!--Select2 [ OPTIONAL ]-->
            <script src="<?php echo base_url() ?>assets/plugins/select2/js/select2.min.js"></script>

            <!-- Chosen [ OPTIONAL ] -->
            <script src="<?php echo base_url() ?>assets/plugins/chosen/chosen.jquery.min.js"></script>
            
            
            <script>                   
            $('#off').chosen({width:'100%'});



            </script>