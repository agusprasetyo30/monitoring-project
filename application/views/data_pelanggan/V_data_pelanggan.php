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
                                <a href="<?php echo base_url('data_pelanggan/importData')?>" class="btn btn-sm btn-purple btn-labeled"><i class="btn-label ti-plus"></i> Import Data Excel</a>
                                <hr>

                                <table class="table" id="table-data_pelanggan" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="10%">No Ref</th>
                                            <th width="15%">Nama</th>
                                            <th>Alamat</th>
                                            <th width="15%">Pencabutan</th>
                                            <th>Domisili</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>



                                    <?php $no = 1; foreach ( $data_pelanggan->result_array() AS $kolom ) { ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td> 
                                                <?php echo $kolom['no_ref'] ?>
                                            <br></td>
                                            <td> 
                                                <?php echo $kolom['nama'] ?>
                                            <br></td>
                                            <td> 
                                                <?php echo $kolom['alamat'] ?>
                                            <br></td>
                                            <td> 
                                                <label class="badge badge-default"><?php echo $kolom['pencabutan'] ?></label>
                                                <?php 
                                                
                                                    if ( $kolom['pencabutan'] == "iya" ) {

                                                        echo '<br>';
                                                        echo '<small>Pada '.date('d M Y').'</small>';
                                                    }
                                                ?>
                                            <br></td>
                                            <td> 
                                                <?php echo $kolom['wilayah'].' - '.$kolom['kelurahan'] ?>
                                            <br></td>
                                            <td width="20%">
                                                <small>Klik tombol dibawah ini</small> <br>
                                                <div class="btn-group mar-rgt">
                                                   
                                                <a href="<?php echo base_url('data_pelanggan/editPelanggan/').$kolom['id_pelanggan'] ?>" class="btn btn-sm btn-warning btn-labeled"><i class="btn-label ti-pencil"></i>Sunting</a>
                                                <a href="<?php echo base_url('data_pelanggan/prosesHapusPelanggan/'. $kolom['id_pelanggan']) ?>" 
												    onclick="return confirm('Apakah anda yakin ingin menghapus pelanggan atas nama <?php echo $kolom['nama'] ?>')" class="btn btn-sm btn-danger btn-labeled" ><i class="btn-label ti-trash"></i>Hapus</a>
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