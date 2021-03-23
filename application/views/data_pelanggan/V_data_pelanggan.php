<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <div class="pad-all text-center">
                        <h3>DATA PELANGGAN</h3>
                        <p1>Data Pelanggan yang Melakukan Piutang</p>
                    </div>
                </div>

                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
    
    
                    <div class="row">
                        <div class="col-md-12 col-md-offset">
                            <div class="panel panel-body" style="border: 1px solid #e0e0e0">
                            
                                <p class="text-main text-semibold">Data Tabel Jenis Pelanggan</p>
                                <a href="#" class="btn btn-sm btn-purple btn-labeled"><i class="btn-label ti-plus"></i> Tambah Baru</a>
                                <a href="#" class="btn btn-sm btn-purple btn-labeled"><i class="btn-label ti-plus"></i> Import Data Excell</a>
                                <hr>

                                <table class="table" id="table-data_pelanggan">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Ref</th>
                                            <th>Nama pelanggan</th>
                                            <th>Alamat</th>
                                            <th>Status</th>
                                            <th>Jenis Rekening</th>
                                            <th>Domisili</th>
                                            <th>Sub Domisili</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>



                                    <?php foreach ( $data_pelanggan->result_array() AS $kolom ) { ?>
                                        <tr>
                                            <td>1</td>
                                            <td> 
                                                <small><?php echo $kolom['no_ref'] ?></small> 
                                            <br></td>
                                            <td> 
                                                <small><?php echo $kolom['nama'] ?></small> 
                                            <br></td>
                                            <td> 
                                                <small><?php echo $kolom['alamat'] ?></small> 
                                            <br></td>
                                            <td> 
                                                <small>Status</small> 
                                            <br></td>
                                            <td> 
                                                <small><?php echo $kolom['jenis_rekening'] ?></small> 
                                            <br></td>
                                            <td> 
                                                <small>Domisili</small> 
                                            <br></td>
                                            <td> 
                                                <small>Sub Domisili</small> 
                                            <br></td>
                                            <td>
                                                <small>Klik tombol dibawah ini</small> <br>
                                                <div class="btn-group mar-rgt">
                                                    <button data-target="#hapus-jenis_pelanggan-" data-toggle="modal" class="btn btn-sm btn-default btn-active-danger">Hapus</button>
                                                    <button class="btn btn-sm btn-default btn-active-warning">Sunting</button>
                                            </div>
                                        </tr>

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