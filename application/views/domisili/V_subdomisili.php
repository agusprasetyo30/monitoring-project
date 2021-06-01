<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <div class="pad-all text-center">
                        <h3>Domisili <?php echo $domisili['kota'] ?></h3>
                        <p1>Data master domisili penagihan piutang</p>
                    </div>
                </div>

                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
    
    
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="panel panel-body" style="border: 1px solid #e0e0e0">
                            
                                <p class="text-main text-semibold">Data Tabel Subdomisili</p>
                                
                                <a href="<?php echo base_url('domisili') ?>" class="btn btn-sm btn-default btn-labeled"><i class="btn-label ti-arrow-left"></i> Kembali</a>
                                <a href="#" data-target="#tambah-domisili" data-toggle="modal" class="btn btn-sm btn-purple btn-labeled"><i class="btn-label ti-plus"></i> Tambah Baru</a>


                                <!--Small Bootstrap Modal-->
                                <!--===================================================-->
                                <div id="tambah-domisili" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                                                <h4 class="modal-title" id="mySmallModalLabel">Informasi Domisili</h4>
                                            </div>
                                            
                                            <form action="<?php echo base_url('domisili/prosesTambahSubDomisili') ?>" method="POST">
                                            <div class="modal-body">
                                                <div>
                                                    <label for="" class="text-semibold">Kode Wilayah</label>
                                                    <input type="hidden" name="id_domisili" value="<?php echo $domisili['id_domisili'] ?>">
                                                    <input type="text" name="kode_wilayah" class="form-control" placeholder="..." id="" required="" />
                                                </div>

                                                <div class="form-group">
                                                    <label for="" class="text-semibold">Nama Kelurahan</label>
                                                    <input type="hidden" name="id_domisili" value="<?php echo $domisili['id_domisili'] ?>">
                                                    <input type="text" name="nama_kelurahan" class="form-control" placeholder="..." id="" required="" />
                                                    <small>Masukkan nama kelurahan</small>
                                                </div>

                                                <div class="form-group">
                                                    <label for="" class="text-semibold">Nama Kecamatan</label>
                                                    <input type="hidden" name="id_domisili" value="<?php echo $domisili['id_domisili'] ?>">
                                                    <input type="text" name="nama_kecamatan" class="form-control" placeholder="..." id="" required="" />
                                                    <small>Masukkan nama kecamatan</small>
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

                                <table class="table" id="table-subdomisili">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Wilayah</th>
                                            <th>Kelurahan</th>
                                            <th>Kecamatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php $no = 1; foreach ( $subdomisili->result_array() AS $kolom ) { ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td>
                                               <label for=""><?php echo $kolom['kode_wilayah'] ?></label>
                                            </td>
                                            <td>
                                                <label for=""><?php echo $kolom['kelurahan'] ?></label>
                                            </td>
                                            <td>
                                                <label for=""><?php echo $kolom['kecamatan'] ?></label>
                                            </td>
                                            <td>
                                                <small>Klik tombol dibawah ini</small> <br>
                                                <div class="btn-group mar-rgt">
                                                    <button data-target="#hapus-subdomisili-<?php echo $kolom['id_subdomisili'] ?>" data-toggle="modal" class="btn btn-sm btn-default btn-active-danger">Hapus</button>
                                                    <button data-target="#sunting-subdomisili-<?php echo $kolom['id_subdomisili'] ?>" data-toggle="modal" class="btn btn-sm btn-default btn-active-warning">Sunting</button>
                                                    
                                                </div>


                                            <!-- Modal sunting -->
                                                <!--===================================================-->
                                                <div id="sunting-subdomisili-<?php echo $kolom['id_subdomisili'] ?>" class="modal fade" tabindex="-1">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                                                                <h4 class="modal-title" id="mySmallModalLabel">Informasi Sub Domisili</h4>
                                                            </div>
                                                            
                                                            <form action="<?php echo base_url('domisili/prosesUbahSubDomisili') ?>" method="POST">
                                                            <div class="modal-body">
                                                                
                                                                <div class="form-group">
                                                                    <label for="" class="text-semibold">Kode Wilayah</label>
                                                                    <input type="text" name="kode_wilayah" class="form-control" value="<?php echo $kolom['kode_wilayah'] ?>" placeholder="..." id="" required="" /> <br>
                                                                    <input type="hidden" name="id_sub" value="<?php echo $kolom['id_subdomisili'] ?>">
                                                                    <input type="hidden" name="id_domisili" value="<?php echo $kolom['id_domisili'] ?>">
                                                                    <small>Masukkan Kode Wilayah</small>
                                                                </div> <br><br>

                                                                <div class="form-group">
                                                                    <label for="" class="text-semibold">Nama Kelurahan</label>
                                                                    <input type="text" name="nama_kelurahan" class="form-control" value="<?php echo $kolom['kelurahan'] ?>" placeholder="..." id="" required="" /> <br>
                                                                    <small>Masukkan Kelurahan</small>
                                                                </div> <br><br>

                                                                 <div class="form-group">
                                                                    <label for="" class="text-semibold">Nama Kecamatan</label>
                                                                    <input type="text" name="nama_kecamatan" class="form-control" value="<?php echo $kolom['kecamatan'] ?>" placeholder="..." id="" required="" /> <br>
                                                                    <small>Masukkan Kecamatan</small>
                                                                </div> <br><br>
                                                                
                                                                
                                                                
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








                                                <!-- Modal Hapus -->

                                           
                                                <!--===================================================-->
                                                <div id="hapus-subdomisili-<?php echo $kolom['id_subdomisili'] ?>" class="modal fade" tabindex="-1">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                                                                <h4 class="modal-title" id="mySmallModalLabel">Informasi Domisili</h4>
                                                            </div>
                                                            
                                                            <div class="modal-body">

                                                            <div class="form-group">
                                                                    <label for="" class="text-semibold">Kode Wilayah</label>
                                                                    <input type="text" name="kode_wilayah" class="form-control" value="<?php echo $kolom['kode_wilayah'] ?>" placeholder="..." id="" required="" /> <br>
                                                                    <input type="hidden" name="id_sub" value="<?php echo $kolom['id_subdomisili'] ?>">
                                                                    <input type="hidden" name="id_domisili" value="<?php echo $kolom['id_domisili'] ?>">
                                                                  
                                                                </div> <br><br>

                                                                <div class="form-group">
                                                                    <label for="" class="text-semibold">Nama Kelurahan</label>
                                                                    <input type="text" name="nama_kelurahan" class="form-control" value="<?php echo $kolom['kelurahan'] ?>" placeholder="..." id="" required="" /> <br>
                                                                    
                                                                </div> <br><br>

                                                                 <div class="form-group">
                                                                    <label for="" class="text-semibold">Nama Kecamatan</label>
                                                                    <input type="text" name="nama_kecamatan" class="form-control" value="<?php echo $kolom['kecamatan'] ?>" placeholder="..." id="" required="" /> <br>
                                                                  
                                                                </div> <br><br>


                                                                <hr>

                                                                <small><span class="text-danger">*</span> Catatan</small> <br>
                                                                <small>Apakah anda yakin ingin menghapus informasi domisili ini. Data yang telah dihapus tidak dapat dipulihkan kembali</small>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button data-dismiss="modal" class="btn btn-sm btn-default" type="button">Batal</button>
                                                                <a href="<?php echo base_url('domisili/prosesHapusSubDomisili/'. $kolom['id_subdomisili'].'/'. $kolom['id_domisili']) ?>" class="btn btn-sm btn-danger btn-labeled"><i class="btn-label ti-close"></i> Hapus Sekarang</a>
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