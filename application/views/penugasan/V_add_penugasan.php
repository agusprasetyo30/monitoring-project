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

                            
                            <!-- Tampilan OPSI 2 -->
                            <div class="col-md-12 col-md-offset">
                                <div class="panel panel-body" style="border: 1px solid #e0e0e0">
                                <br>
                                <p class="text-main text-semibold">Pilih Pelanggan</p>
                                <label class="badge badge-info">Filter berdasarkan</label> <br>
                                            <div class="select">
                                                <select data-placeholder="Pilih berdasarkan..." id="demo-ease" name="wilayah" onchange="cariPelanggan(this.value)">
                                                <option value=""selected readonly>Pilih wilayah</option>
                                                
                                                <?php foreach ( $sub_domisili->result_array() AS $subdomi ) {
                                                    
                                                    $filter_subdomisili = $this->input->get('sub-domisili');    
                                                    $select = "";


                                                    if ( $filter_subdomisili == $subdomi['id_subdomisili'] ) {

                                                        $select = 'selected="selected"';
                                                    }


                                                ?>
                                                <option value="<?php echo $subdomi['id_subdomisili'] ?>" <?php echo $select ?>> <?php echo $subdomi['kode_wilayah'].' - '. $subdomi['kelurahan'].' '.$subdomi['kecamatan'] ?></option>
                                                <?php } ?>
    
                                                </select>
                                            </div>
                                

                                    <hr>
                                    <table class="table" id="table-penugasan">
                                        <thead>
                                        <tr>
					                            <th data-field="state" data-checkbox="true"></th>
					                            <th data-field="id" data-switchable="false">No</th>
					                            <th data-field="name">Nama</th>
					                            <th data-field="date">Alamat</th>
					                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php $no = 1; 
                                        
                                        $filter_subdomisili = $this->input->get('sub-domisili');
                                        
                                        $data = [];

                                        // apakah kita melakukan filter
                                        if ( $filter_subdomisili == true ) {


                                            foreach ( $data_pelanggan AS $kolom ) {

                                                if ( $filter_subdomisili == $kolom['id_subdomisili'] ) {

                                                    array_push( $data, $kolom );
                                                }
                                            }

                                        } else {


                                            $data = $data_pelanggan;
                                        }

                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        foreach ( $data AS $kolom ) {
                                            
                                            
                                            $style = "";
                                            $name = "pelanggan[]";
                                            $checkbox = "";
                                            foreach ( $info_penugasan->result_array() AS $penugasan ) {

                                                if ( $kolom['id_pelanggan'] == $penugasan['id_pelanggan'] ) {

                                                    $style = 'text-decoration: line-through';
                                                    $name = "none";
                                                    $checkbox = "checked disabled";
                                                }

                                                

                                            }
                                        ?>
                                            <tr>
                                                <td>        
                                                    <input type="checkbox" id="demo-checkbox-<?php echo $kolom['id_pelanggan'] ?>" name="<?php echo $name ?>" value="<?php echo $kolom['id_pelanggan']?>" alt="Checkbox" class="magic-checkbox" <?php echo $checkbox ?> >
                                                    <label for="demo-checkbox-<?php echo $kolom['id_pelanggan'] ?>"> </label>
                        
                                                </td>
                                                <td><?php echo $no++ ?></td>
                                                <td> <label for="" style="<?php echo $style ?>"><?php echo $kolom['nama'] ?></label></td>
                                                <td> <label for="" style="<?php echo $style ?>"><?php echo $kolom['no_ref'] ?></label> <label for="" style="<?php echo $style ?>"><?php echo $kolom['alamat'] ?></label></td>
                                        
                                                </tr>
                                            <?php } ?>
                                        </tbody>

                                        
                                    </table>
                                </div>
                                
                            </div>
                                    

                                      <div class="col-md-12 text-right">
                                      <button class="btn btn-sm btn-success btn-labeled"><i class="btn-label ti-check"></i>Submit</button>
					                </div>


                                    </form>

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
            

            function cariPelanggan( value ) {

                window.location.href = "<?php echo base_url('penugasan/tambahPenugasan?sub-domisili=') ?>" + value;
            }


            </script>