<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Halaman Penagihan</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="<?php echo base_url('dashboard') ?>"><i class="demo-pli-home"></i></a></li>
					<li class="active">Penagihan</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>

                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">


                        <!-- Contact Toolbar -->
					    <!---------------------------------->
					    <div class="row pad-btm">
					        <div class="col-sm-4 toolbar-left">
					            <button id="demo-btn-addrow" class="btn btn-purple">Add New</button>
					            <button class="btn btn-default"><i class="demo-pli-printer"></i></button>
					        </div>
					        <div class="col-sm-8 toolbar-right text-right">
					            

                                <div class="row">
                                
                                    <div class="col-sm-5">
                                    
                                        Lihat Wilayah
                                        <div class="select">
                                            <select id="demo-ease">

                                                <?php if ( $dataDomisili->num_rows() == 0 ) {


                                                    echo '<option value="">-- Kosong --</option>';
                                                } else {
                                                    
                                                    foreach ( $dataDomisili->result_array() AS $rowDomisili ) {
                                                ?>

                                                    <option value=""><?php echo $rowDomisili['wilayah'].' '.$rowDomisili['kota'] ?></option>
                                                <?php  } } ?>
                                                
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-5">
                                    
                                        Lama Piutang :
                                        <div class="select">
                                            <select id="demo-ease">
                                                <option value="">Keseluruhan</option>
                                                <option value="">Lebih dari 3 bulan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <button class="btn btn-primary">Tampilkan</button>
                                    </div>
                                </div>


					        </div>
					    </div>
					    <!---------------------------------->



                        <div class="row">
                        
                            <div class="col-md-10 col-md-offset-1">
                                <div class="panel panel-body" style="border:1px solid #e0e0e0">
                                

                                    <div class="row">
                                        <div class="col-md-6">
                                        
                                            <h5>Daftar Piutang</h5>
                                            <small>Penjelasan . . .</small> <br><br>
                                        </div>
                                        <div class="col-md-6">
                                            <small>Lihat Berdasarkan : </small> <br>
                                            <label class="badge badge-success">Kota Probolinggo</label>
                                            <label class="badge badge-success">Lama Piutang lebih dari 3 bulan</label>
                                        </div>
                                    </div>

                                    <table id="table-data_piutang" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="10%">No</th>
                                                <th>Informasi</th>
                                                <th width="20%">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ( $i = 0; $i < 5; $i++ ) { ?>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-sm-1">
                                                            <?php
                                                            
                                                                $nomor = rand(1, 10);
                                                            ?>
                                                            <img class="img-circle" src="<?php echo base_url('assets/img/profile-photos/'. $nomor.'.png') ?>" alt="profile" style="width: 45px">
                                                        </div>
                                                        <div class="col-sm-4" style="border-right: 1px solid #b4b4b4">
                                                            <label>
                                                                <span class="text-semibold text-main" style="font-size: 14px">Ely Nur Rahayu</span>
                                                             <br> <small for="">No Ref : 99988822299</small></label>
                                                        </div>

                                                        <div class="col-sm-7">
                                                            <small>Lama Piutang 3 bulan</small>
                                                            <h4 class="text-thin" style="margin: 0px">Total : Rp <?php echo number_format(25000, 2) ?></h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <small>Lihat Lebih lanjut</small>
                                                    <a href="" class="btn btn-sm btn-default btn-labeled"><i class="btn-label ti-pencil"></i> Buat Catatan Penagihan</a>
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



            