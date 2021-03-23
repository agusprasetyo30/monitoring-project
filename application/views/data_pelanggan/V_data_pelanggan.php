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
                                <a href="<?php echo base_url('data_pelanggan/tambahPelanggan')?>" class="btn btn-sm btn-purple btn-labeled"><i class="btn-label ti-plus"></i> Tambah Baru</a>
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
                                                <small><?php echo $kolom['nama_jenis'] ?></small> 
                                            <br></td>
                                            <td> 
                                                <small><?php echo $kolom['wilayah'] ?></small> 
                                            <br></td>
                                            <td> 
                                                <small><?php echo $kolom['kelurahan'] ?></small> 
                                            <br></td>
                                            <td>
                                                <small>Klik tombol dibawah ini</small> <br>
                                                <div class="btn-group mar-rgt">
                                                   
                                                <a href="<?php echo base_url('data_pelanggan/editPelanggan/').$kolom['id_pelanggan'] ?>" class="btn btn-sm btn-default btn-active-warning">Sunting</a>
                                                <a href="<?php echo base_url('data_pelanggan/prosesHapusPelanggan/'. $kolom['id_pelanggan']) ?>" 
												    onclick="return confirm('Apakah anda yakin ingin menghapus pelanggan atas nama <?php echo $kolom['nama'] ?>')" class="btn btn-sm btn-default btn-active-warning">Hapus</a>
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