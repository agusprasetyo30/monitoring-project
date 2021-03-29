<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <div class="pad-all text-center">
                        <h3>DATA PIUTANG PELANGGAN</h3>
                        <p1>Data piutang yang dimiliki oleh tiap pelanggan</p>
                    </div>
                </div>

                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
    
    
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="panel panel-body" style="border: 1px solid #e0e0e0">
                            
                                <p class="text-main text-semibold">Data Tabel Piutang</p>
                                <a href="<?php echo base_url('data_piutang/tambahPiutang')?>" data class="btn btn-sm btn-purple btn-labeled"><i class="btn-label ti-plus"></i> Tambah Baru</a>

                                <hr>

                                <table class="table" id="table-data_piutang">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Ref</th>
                                            <th>Tahun</th>
                                            <th>Bulan</th>
                                            <th>Nominal</th>
                                            <th>Keterangan</th>
                                            <th>Alasan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    <?php foreach ( $data_piutang->result_array() AS $kolom ) { ?>
                                        <tr>
                                            <td>1</td>
                                            <td> 
                                                <small><?php echo $kolom['no_ref'] ?></small> 
                                            <br></td>

                                            <td> 
                                                <small><?php echo $kolom['tahun'] ?></small> 
                                            <br></td>

                                            <td> 
                                                <small><?php echo $kolom['bulan'] ?></small> 
                                            <br></td>

                                            <td> 
                                                <small><?php echo $kolom['nominal'] ?></small> 
                                            <br></td>

                                            <td> 
                                                <small><?php echo $kolom['keterangan'] ?></small> 
                                            <br></td>

                                            <td> 
                                                <small><?php echo $kolom['alasan'] ?></small> 
                                            <br></td>
                                            <td>
                                                <small>Klik tombol dibawah ini</small> <br>
                                                <div class="btn-group mar-rgt">
                                                <a href="<?php echo base_url('data_piutang/editPiutang/').$kolom['id_piutang'] ?>" class="btn btn-sm btn-default btn-active-warning">Sunting</a>
                                                <button data-target="#hapus-data_piutang-<?php echo $kolom['id_piutang'] ?>" data-toggle="modal" class="btn btn-sm btn-default btn-active-danger">Hapus</button>
                                                  
                                            </div>
                                        </tr>
                                        

                        



                                                <!-- Modal hapus -->
                                                <!--===================================================-->
                                                <div id="hapus-data_piutang-<?php echo $kolom['id_piutang'] ?>" class="modal fade" tabindex="-1">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                                                                <h4 class="modal-title" id="mySmallModalLabel">Informasi jenis_pelanggan</h4>
                                                            </div>
                                                            
                                                            <div class="modal-body">

                                                                <label for="">No Ref : <span class="text-main text-semibold"><?php echo $kolom['no_ref'] ?></span></label><br>
                                                                <hr>

                                                                <small><span class="text-danger">*</span> Catatan</small> <br>
                                                                <small>Apakah anda yakin ingin menghapus informasi jenis_pelanggan ini. Data yang telah dihapus tidak dapat dipulihkan kembali</small>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button data-dismiss="modal" class="btn btn-sm btn-default" type="button">Batal</button>
                                                                <a href="<?php echo base_url('data_piutang/prosesHapusPiutang/'. $kolom['id_piutang']) ?>" class="btn btn-sm btn-danger btn-labeled"><i class="btn-label ti-close"></i> Hapus Sekarang</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- End Modal Hapus -->

     
                                                </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        
                        </div>
                    </div>



                </div>
            </div>



            
            <!--Chosen [ OPTIONAL ]-->
            <script src="<?php echo base_url() ?>assets/plugins/chosen/chosen.jquery.min.js"></script>
            <!--Bootstrap Datepicker [ OPTIONAL ]-->
            <script src="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
            
            <script>

                // No ref
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




