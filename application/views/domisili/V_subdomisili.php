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
                                            
                                            <form action="<?php echo base_url('domisili/prosesTambahDomisili') ?>" method="POST">
                                            <div class="modal-body">
                                                
                                                <div class="form-group">
                                                    <label for="" class="text-semibold">Nama Domisili</label>
                                                    <input type="text" name="id_domisili" value="<?php echo $domisili['id_domisili'] ?>">
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
                                            <th>Kelurahan</th>
                                            <th>Kecamatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php foreach ( $subdomisili->result_array() AS $kolom ) { ?>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <small>Informasi Keluharan</small> <br>
                                                <a href="" class="btn-link text-semibold text-main"><?php echo $kolom['kelurahan'] ?></a>
                                            </td>
                                            <td>
                                                <small>Kecamatan</small> <br>
                                                <?php

                                                    $colorBadge = "badge-mint";
                                                ?>
                                                <span for="" class="badge <?php echo $colorBadge ?>"><?php echo $kolom['kecamatan'] ?></span>
                                            </td>
                                            <td>
                                                <small>Klik tombol dibawah ini</small> <br>
                                                <div class="btn-group mar-rgt">
                                                    <button data-target="#hapus-domisili-<?php echo $kolom['id_domisili'] ?>" data-toggle="modal" class="btn btn-sm btn-default btn-active-danger">Hapus</button>
                                                    <button data-target="#sunting-domisili-<?php echo $kolom['id_domisili'] ?>" data-toggle="modal" class="btn btn-sm btn-default btn-active-warning">Sunting</button>
                                                </div>

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