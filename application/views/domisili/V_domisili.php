<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <div class="pad-all text-center">
                        <h3>MASTER DOMISILI</h3>
                        <p1>Data master domisili penagihan piutang</p>
                    </div>
                </div>

                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
    
    
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="panel panel-body" style="border: 1px solid #e0e0e0">
                            
                                <p class="text-main text-semibold">Data Tabel Domisili</p>
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
                                            
                                            <form action="<?php echo base_url('domisili/prosesTambahDomisili') ?>" method="POST">
                                            <div class="modal-body">
                                                
                                                <div class="form-group">
                                                    <label for="" class="text-semibold">Nama Domisili</label>
                                                    <input type="text" name="nama_domisili" class="form-control" placeholder="..." id="" required="" />
                                                    <small>Masukkan nama domisili ex.Probolinggo</small>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="">Wilayah</label>
                                                    <div class="radio">
					
                                                        <!-- Inline radio buttons -->
                                                        <input id="demo-inline-form-radio" class="magic-radio" type="radio" name="wilayah" value="kota" checked>
                                                        <label for="demo-inline-form-radio">Kota</label>
                            
                                                        <input id="demo-inline-form-radio-2" class="magic-radio" type="radio" name="wilayah" value="kabupaten">
                                                        <label for="demo-inline-form-radio-2">Kabupaten</label> <br>

                                                        <small>Pilih salah satu</small>
                                                    </div>
                                                    
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

                                <table class="table" id="table-domisili">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kota</th>
                                            <th>Wilayah</th>
                                            <th>Data Kecamatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php $no = 1; foreach ( $domisili AS $kolom ) { ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td>
                                                <small>Informasi Kota</small> <br>
                                                <a href="" class="btn-link text-semibold text-main"><?php echo $kolom['info_domisili']['kota'] ?></a>
                                            </td>
                                            <td>
                                                <small>Wilayah</small> <br>
                                                <?php

                                                    $colorBadge = "";
                                                    if ( $kolom['info_domisili']['wilayah'] == "kota" ) {

                                                        $colorBadge = "badge-mint";
                                                    } else {

                                                        $colorBadge = "badge-primary";
                                                    }
                                                ?>
                                                <span for="" class="badge <?php echo $colorBadge ?>"><?php echo $kolom['info_domisili']['wilayah'] ?></span>
                                            </td>
                                            <td>
                                                <small>Total Kecamatan : </small> <br>
                                                <?php

                                                    if ( $kolom['info_totalsub'] != 0 ) {


                                                        $sub_text = $kolom['info_totalsub'] . " Kecamatan <small>(Klik untuk mendetail)</small>";
                                                    } else {

                                                        $sub_text = "Belum menambahkan kecamatan";
                                                    }
                                                ?>
                                                <a href="<?php echo base_url('domisili/subdomisili/'. $kolom['info_domisili']['id_domisili']) ?>" class="text-main btn-link"><?php echo $sub_text ?></a>
                                            </td>
                                            <td>
                                                <small>Klik tombol dibawah ini</small> <br>
                                                <div class="btn-group mar-rgt">
                                                    <button data-target="#sunting-domisili-<?php echo $kolom['info_domisili']['id_domisili'] ?>" data-toggle="modal" class="btn btn-sm btn-warning btn-labeled"><i class="btn-label ti-pencil"></i>Sunting</button>
                                                    <button data-target="#hapus-domisili-<?php echo $kolom['info_domisili']['id_domisili'] ?>" data-toggle="modal" class="btn btn-sm btn-danger btn-labeled" ><i class="btn-label ti-trash"></i>Hapus</button>
                                                </div>




                                                <!-- Modal sunting -->
                                                <!--===================================================-->
                                                <div id="sunting-domisili-<?php echo $kolom['info_domisili']['id_domisili'] ?>" class="modal fade" tabindex="-1">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                                                                <h4 class="modal-title" id="mySmallModalLabel">Informasi Domisili</h4>
                                                            </div>
                                                            
                                                            <form action="<?php echo base_url('domisili/prosesUbahDomisili') ?>" method="POST">
                                                            <div class="modal-body">
                                                                
                                                                <div class="form-group">
                                                                    <label for="" class="text-semibold">Nama Domisili</label>
                                                                    <input type="text" name="nama_domisili" class="form-control" value="<?php echo $kolom['info_domisili']['kota'] ?>" placeholder="..." id="" required="" /> <br>
                                                                    
                                                                    <input type="hidden" name="id" value="<?php echo $kolom['info_domisili']['id_domisili'] ?>">

                                                                    <small>Masukkan nama domisili ex.Probolinggo</small>
                                                                </div> <br><br>
                                                                
                                                                <div class="form-group">
                                                                    <label for="">Wilayah</label>
                                                                    <div class="radio">
                                    
                                                                        <!-- Inline radio buttons -->
                                                                        <input id="demo-inline-form-radio-edit-<?php echo $kolom['info_domisili']['id_domisili'] ?>" class="magic-radio" type="radio" name="wilayah" value="kota" <?php if ( $kolom['info_domisili']['wilayah'] == "kota" ) echo 'checked'; ?>>
                                                                        <label for="demo-inline-form-radio-edit-<?php echo $kolom['info_domisili']['id_domisili'] ?>">Kota</label>
                                            
                                                                        <input id="demo-inline-form-radio-edit-2-<?php echo $kolom['info_domisili']['id_domisili'] ?>" class="magic-radio" type="radio" name="wilayah" value="kabupaten" <?php if ( $kolom['info_domisili']['wilayah'] == "kabupaten" ) echo 'checked'; ?>>
                                                                        <label for="demo-inline-form-radio-edit-2-<?php echo $kolom['info_domisili']['id_domisili'] ?>">Kabupaten</label> <br>

                                                                        <small>Pilih salah satu</small>
                                                                    </div>
                                                                    
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








                                                <!-- Modal Hapus -->

                                           
                                                <!--===================================================-->
                                                <div id="hapus-domisili-<?php echo $kolom['info_domisili']['id_domisili'] ?>" class="modal fade" tabindex="-1">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                                                                <h4 class="modal-title" id="mySmallModalLabel">Informasi Domisili</h4>
                                                            </div>
                                                            
                                                            <div class="modal-body">

                                                                <label for="">Nama Bagian : <span class="text-main text-semibold"><?php echo $kolom['info_domisili']['kota'] ?></span></label><br>
                                                                <label for="">Wilayah : <span class="text-main text-semibold"><?php echo $kolom['info_domisili']['wilayah'] ?></span></label>


                                                                <hr>

                                                                <small><span class="text-danger">*</span> Catatan</small> <br>
                                                                <small>Apakah anda yakin ingin menghapus informasi domisili ini. Data yang telah dihapus tidak dapat dipulihkan kembali</small>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button data-dismiss="modal" class="btn btn-sm btn-default" type="button">Batal</button>
                                                                <a href="<?php echo base_url('domisili/prosesHapusDomisili/'. $kolom['info_domisili']['id_domisili']) ?>" class="btn btn-sm btn-danger btn-labeled"><i class="btn-label ti-close"></i> Hapus Sekarang</a>
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