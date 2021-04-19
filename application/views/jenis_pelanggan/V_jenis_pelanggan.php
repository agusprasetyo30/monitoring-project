<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <div class="pad-all text-center">
                        <h3>MASTER JENIS PELANGGAN</h3>
                        <p1>Data master jenis pelanggan penagihan piutang</p>
                    </div>
                </div>

                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
    
    
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-body" style="border: 1px solid #e0e0e0">
                            
                                <p class="text-main text-semibold">Data Tabel Jenis Pelanggan</p>
                                <a href="#" data-target="#tambah-jenis_pelanggan" data-toggle="modal" class="btn btn-sm btn-purple btn-labeled"><i class="btn-label ti-plus"></i> Tambah Baru</a>


                                <!--Small Bootstrap Modal-->
                                <!--===================================================-->
                                <div id="tambah-jenis_pelanggan" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                                            </div>
                                            
                                            <form action="<?php echo base_url('jenis_pelanggan/prosesTambahJP') ?>" method="POST">
                                            <div class="modal-body">
                                                
                                                <div class="form-group">
                                                    <label for="" class="text-semibold">Nama Jenis Pelanggan</label>
                                                    <input type="text" name="nama_jenis_pelanggan" class="form-control" placeholder="..." id="" required="" />
                                                    <small>Masukkan nama jenis pelanggan</small>
                                                </div>
                                            
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button data-dismiss="modal" class="btn btn-sm btn-default" type="button">Close</button>
                                                <button class="btn btn-sm btn-purple btn-labeled"><i class="btn-label ti-plus"></i> Tambahkan dan Simpan</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--===================================================-->
                                <!--End Small Bootstrap Modal-->


                                <hr>

                                <table class="table" id="table-jenis_pelanggan">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Jenis Pelanggan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>



                                    <?php foreach ( $jenis_pelanggan->result_array() AS $kolom ) { ?>
                                        <tr>
                                            <td>1</td>
                                            <td> 
                                                <small><?php echo $kolom['nama_jenis'] ?></small> 
                                            <br></td>
                                            <td>
                                                <small>Klik tombol dibawah ini</small> <br>
                                                <div class="btn-group mar-rgt">
                                                    <button data-target="#hapus-jenis_pelanggan-<?php echo $kolom['id_jenis_pelanggan'] ?>" data-toggle="modal" class="btn btn-sm btn-danger btn-labeled" ><i class="btn-label ti-trash"></i>Hapus</button>
                                                    <button data-target="#sunting-jenis_pelanggan-<?php echo $kolom['id_jenis_pelanggan'] ?>" data-toggle="modal" class="btn btn-sm btn-warning btn-labeled"><i class="btn-label ti-pencil"></i> Sunting</button>
                                            </div>
                                        </tr>
                                        


                                                <!-- Modal sunting -->
                                                <!--===================================================-->
                                                <div id="sunting-jenis_pelanggan-<?php echo $kolom['id_jenis_pelanggan'] ?>" class="modal fade" tabindex="-1">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">

                                                        <form action="<?php echo base_url('jenis_pelanggan/prosesUbahJP') ?>" method="POST">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="" class="text-semibold">Nama jenis_pelanggan</label>
                                                                    <input type="text" name="nama_jenis_pelanggan" class="form-control" value="<?php echo $kolom['nama_jenis'] ?>" placeholder="..." id="" required="" /> <br>
                                                                    <input type="hidden" name="id" value="<?php echo $kolom['id_jenis_pelanggan'] ?>">

                                                                    <small>Masukkan nama jenis pelanggan</small>
                                                                </div>                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button data-dismiss="modal" class="btn btn-sm btn-default" type="button">Close</button>
                                                                <button class="btn btn-sm btn-warning btn-labeled"><i class="btn-label ti-plus"></i> Simpan dan Perbarui</button>
                                                            </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--===================================================-->
                                                <!-- End Modal Sunting -->



                                                <!-- Modal hapus -->
                                                <!--===================================================-->
                                                <div id="hapus-jenis_pelanggan-<?php echo $kolom['id_jenis_pelanggan'] ?>" class="modal fade" tabindex="-1">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                                                                <h4 class="modal-title" id="mySmallModalLabel">Informasi jenis_pelanggan</h4>
                                                            </div>
                                                            
                                                            <div class="modal-body">

                                                                <label for="">Nama Jenis Pelanggan : <span class="text-main text-semibold"><?php echo $kolom['nama_jenis'] ?></span></label><br>
                                                                <hr>

                                                                <small><span class="text-danger">*</span> Catatan</small> <br>
                                                                <small>Apakah anda yakin ingin menghapus informasi jenis_pelanggan ini. Data yang telah dihapus tidak dapat dipulihkan kembali</small>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button data-dismiss="modal" class="btn btn-sm btn-default" type="button">Batal</button>
                                                                <a href="<?php echo base_url('jenis_pelanggan/prosesHapusJP/'. $kolom['id_jenis_pelanggan']) ?>" class="btn btn-sm btn-danger btn-labeled"><i class="btn-label ti-close"></i> Hapus Sekarang</a>
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