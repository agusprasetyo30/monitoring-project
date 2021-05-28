<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <div class="pad-all text-center">
                        <h3>PENUGASAN</h3>
                        <p1>Data penugasan penagihan terhadap petugas lapangan</p>
                    </div>
                </div>

                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                
                <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="panel panel-body" style="border: 1px solid #e0e0e0">
                            
                                <p class="text-main text-semibold">Penugasan</p>
                                <a href="<?php echo base_url('penugasan/tambahPenugasan')?>" data class="btn btn-sm btn-purple btn-labeled"><i class="btn-label ti-plus"></i> Tambah Baru</a>

                                <hr>

                                <table class="table" id="table-penugasan">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Petugas Lapangan</th>
                                            <th>Jumlah Penugasan</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Action</th>
                                        </tr>
                                    <tbody>
                                    
                                    <!-- //Ambil datanya -->
                                    <?php $no = 1; foreach ( $penugasan AS $kolom ) { ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $kolom['name'] ?></td>
                                            <td>0</td>
                                            <td><?php echo $kolom['nama'] ?></td>
                                            <td>
                                                <small>Klik tombol dibawah ini</small> <br>
                                                <div class="btn-group mar-rgt">
                                                    <a href=""class="btn btn-sm btn-warning btn-labeled"><i class="demo-psi-pencil icon-lg"></i></a>
                                                    <button class="btn btn-sm btn-danger btn-labeled" ><i class="demo-psi-trash icon-lg"></i></button>
                                                    </td>     
                                                </div>
                                            </tr>
                                    <?php } ?>
                                    
                                    </tbody>

                                    </thead>
                                </table>
                    
                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    

            <script src="<?php echo base_url() ?>assets/plugins/chosen/chosen.jquery.min.js"></script>
            
            
            <script>                   
            $('#off').chosen({width:'100%'});



            </script>