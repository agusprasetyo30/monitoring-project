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
					            <!-- <button class="btn btn-default"><i class="demo-pli-printer"></i></button> -->
					        </div>
					        <div class="col-sm-8 toolbar-right text-right">
					            

                                <form action="" method="GET">


                                <?php
                                
                                
                                    $filter_wilayah = $this->input->get('wilayah');
                                    $filter_month = $this->input->get('month');
                                ?>

                                <div class="row">
                                
                                    <div class="col-sm-5">
                                    
                                        Lihat Wilayah
                                        <div class="select">
                                            <select id="demo-ease" name="wilayah">

                                                <?php if ( $dataDomisili->num_rows() == 0 ) {


                                                    echo '<option value="">-- Kosong --</option>';
                                                } else {
                                                    
                                                    echo '<option value="">Tampilkan Keseluruhan</option>';
                                                    foreach ( $dataDomisili->result_array() AS $rowDomisili ) {

                                                        $valueWilayah = $rowDomisili['wilayah'].'-'.$rowDomisili['kota'];
                                                ?>

                                                    <option value="<?php echo $valueWilayah ?>" <?php if ( $valueWilayah == $filter_wilayah ) echo 'selected="selected"'; ?>><?php echo $rowDomisili['wilayah'].' '.$rowDomisili['kota'] ?></option>
                                                <?php  } } ?>
                                                
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                    
                                        Piutang :
                                        <div class="select" >
                                            <select id="demo-ease" name="month">
                                                <option value="" <?php if ( $filter_month == "") echo 'selected="selected"'; ?>>Keseluruhan</option>
                                                <option value="3" <?php if ( $filter_month == "3") echo 'selected="selected"'; ?>>Lebih dari 3 bulan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <button class="btn btn-default btn-hover-primary" style="border: 1px solid #414c57 !important">Tampilkan</button>
                                        <a href="<?php echo base_url('penagihan') ?>" class="btn btn-default btn-primary"><i class="ti-reload"></i></a>
                                    </div>
                                </div>

                                </form>


					        </div>
					    </div>
					    <!---------------------------------->



                        <div class="row">
                        
                            <div class="col-md-11 col-md-offset-1">
                                <div class="panel panel-body" style="border:1px solid #e0e0e0">
                                

                                    <div class="row">
                                        <div class="col-md-6">
                                        
                                            <h5>Daftar Piutang</h5>
                                            <small>Penjelasan . . .</small> <br><br>
                                        </div>
                                        <div class="col-md-6">
                                            <small>Lihat Berdasarkan : </small> <br>

                                            <?php
                                            

                                                $text_wilayah = "Keseluruhan";
                                                if ( !empty($filter_wilayah) )  {

                                                    // pisah 
                                                    $dataWilayah = explode('-', $filter_wilayah);
                                                    $text_wilayah = ucfirst($dataWilayah[0]).' '.$dataWilayah[1];
                                                }


                                                $text_bulan = "Lama Piutang Keseluruhan";
                                                if ( !empty( $filter_month ) ){

                                                    $text_bulan = "Lebih dari 3 bulan";
                                                }
                                            ?>

                                            <label class="badge badge-success"><?php echo $text_wilayah ?></label>
                                            <label class="badge badge-success"><?php echo $text_bulan ?></label>
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
                                            <?php if ( count($dataPiutang) > 0 ) { ?>


                                            <?php 
                                            
                                            $sess_idlogin = $this->session->userdata('sess_idlogin');
                                            $i = 1; foreach ( $dataPiutang AS $row ) {
                                                
                                                // if ( $dataPiutang['informasi'] )

                                                $show = false;
                                                if ( count( $row['informasi_penagihan'] ) > 0 ) {

                                                    foreach ( $row['informasi_penagihan'] AS $rowPenagihan ) {

                                                        if ( $rowPenagihan['id_login'] == $sess_idlogin ) {

                                                            $show = true;
                                                        }
                                                    }

                                                } else {


                                                    $show = true;
                                                }




                                                if ( $show == true ) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i++ ?></td>
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
                                                                <span class="text-semibold text-main" style="font-size: 14px"><?php echo $row['informasi_detail']['nama'] ?></span>
                                                             <br> <small for="">No Ref : <?php echo $row['informasi_detail']['no_ref'] ?></small></label>
                                                        </div>

                                                        <div class="col-sm-4">
                                                            <small>Lama Piutang <?php echo $row['informasi_detail']['total_bulan'] ?> bulan</small>
                                                            <h4 class="text-thin" style="margin: 0px">Total : Rp <?php echo number_format($row['total_tagihan'], 2) ?></h4>
                                                        </div>

                                                        <div class="col-sm-3 text-right">
                                                            <?php
                                                                
                                                                $labelColor = "";
                                                                $text = $row['status_piutang'];

                                                                if ( $row['total_pelunasan'] == 0 ) { 

                                                                    $labelColor = "label-default";
                                                                    $text = "pending";

                                                                } else if ( $row['status_piutang'] == "lunas" ) {

                                                                    $labelColor = "label-success";

                                                                } else if ( $row['status_piutang'] == "cicil" ) {

                                                                    $labelColor = "label-warning";
                                                                } else {

                                                                    $labelColor = "label-danger";
                                                                }
                                                            ?>

                                                            <label class="label <?php echo $labelColor ?>">Status Penagihan : <?php echo $text ?></label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <small>Lihat Lebih lanjut</small>
                                                    <a href="<?php echo base_url('penagihan/detailPenagihan?no_ref='. $row['informasi_detail']['no_ref'])?>" class="btn btn-sm btn-primary btn-labeled"><i class="btn-label ti-pencil"></i> Buat Catatan Penagihan</a>
                                                </td>
                                            </tr>
                                            <?php 
                                            
                                                    } // end show
                                                }  // end foreach
                                        
                                            } else { ?>
                                            
                                            <tr>
                                            
                                                <td colspan="3">
                                                
                                                    <div class="text-center">

                                                        
                                                        <svg style="width: 175px" id="a966dfac-cae6-4172-a83b-9370cd4b99d4" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 811.23312 695.86338"><path d="M993.03839,649.66837,619.78,775.81966a18.5208,18.5208,0,0,1-23.44944-11.60275L423.43282,252.64445A18.52081,18.52081,0,0,1,435.03557,229.195L808.294,103.04372a18.52081,18.52081,0,0,1,23.44944,11.60275l172.8977,511.57246A18.5208,18.5208,0,0,1,993.03839,649.66837Z" transform="translate(-194.38344 -102.06831)" fill="#e6e6e6"/><path d="M983.51208,640.22118,621.62193,762.5303a12.51409,12.51409,0,0,1-15.84421-7.8397L436.72219,254.48642a12.51409,12.51409,0,0,1,7.83969-15.84422L806.452,116.33309a12.51408,12.51408,0,0,1,15.84422,7.83969L991.35178,624.377A12.51409,12.51409,0,0,1,983.51208,640.22118Z" transform="translate(-194.38344 -102.06831)" fill="#fff"/><path d="M892.537,796.43169h-394a18.5208,18.5208,0,0,1-18.5-18.5v-540a18.5208,18.5208,0,0,1,18.5-18.5h394a18.5208,18.5208,0,0,1,18.5,18.5v540A18.5208,18.5208,0,0,1,892.537,796.43169Z" transform="translate(-194.38344 -102.06831)" fill="#ccc"/><path d="M886.537,784.43169h-382a12.51408,12.51408,0,0,1-12.5-12.5v-528a12.51408,12.51408,0,0,1,12.5-12.5h382a12.51408,12.51408,0,0,1,12.5,12.5v528A12.51408,12.51408,0,0,1,886.537,784.43169Z" transform="translate(-194.38344 -102.06831)" fill="#fff"/><path d="M805.15871,381.20852H552.857a8.01411,8.01411,0,0,1,0-16.02823H805.15871a8.01411,8.01411,0,1,1,0,16.02823Z" transform="translate(-194.38344 -102.06831)" fill="#ccc"/><path d="M838.21693,408.25615H552.857a8.01411,8.01411,0,1,1,0-16.02822h285.3599a8.01411,8.01411,0,0,1,0,16.02822Z" transform="translate(-194.38344 -102.06831)" fill="#ccc"/><path d="M805.15871,502.422H552.857a8.01412,8.01412,0,0,1,0-16.02823H805.15871a8.01411,8.01411,0,1,1,0,16.02823Z" transform="translate(-194.38344 -102.06831)" fill="#6c63ff"/><path d="M838.21693,529.46962H552.857a8.01412,8.01412,0,0,1,0-16.02823h285.3599a8.01411,8.01411,0,0,1,0,16.02823Z" transform="translate(-194.38344 -102.06831)" fill="#ccc"/><path d="M805.15871,623.63546H552.857a8.01412,8.01412,0,0,1,0-16.02823H805.15871a8.01411,8.01411,0,1,1,0,16.02823Z" transform="translate(-194.38344 -102.06831)" fill="#ccc"/><path d="M838.21693,650.68309H552.857a8.01411,8.01411,0,0,1,0-16.02823h285.3599a8.01411,8.01411,0,0,1,0,16.02823Z" transform="translate(-194.38344 -102.06831)" fill="#ccc"/><path d="M398.87573,472.69562h-58a4.50508,4.50508,0,0,1-4.5-4.5v-25a33.5,33.5,0,1,1,67,0v25A4.50508,4.50508,0,0,1,398.87573,472.69562Z" transform="translate(-194.38344 -102.06831)" fill="#2f2e41"/><path d="M488.39382,603.16751a10.05576,10.05576,0,0,1-9.2697-12.32186l-30.22529-19.06334,16.91685-7.65858,26.10891,19.277a10.11027,10.11027,0,0,1-3.53077,19.76676Z" transform="translate(-194.38344 -102.06831)" fill="#ffb8b8"/><path d="M467.53666,587.61419a5.39381,5.39381,0,0,1-2.82028-1.11863L381.56705,522.044l-10.72093-19.067a10.578,10.578,0,0,1,.92871-11.78959h0a10.61536,10.61536,0,0,1,15.52842-1.20769l92.68006,75.16965a5.433,5.433,0,0,1,1.38963,7.64292l-8.88544,12.547a5.39113,5.39113,0,0,1-3.63781,2.23666A5.532,5.532,0,0,1,467.53666,587.61419Z" transform="translate(-194.38344 -102.06831)" fill="#2f2e41"/><polygon points="77.194 670.074 88.559 674.673 111.704 633.026 94.931 626.239 77.194 670.074" fill="#ffb8b8"/><path d="M270.18005,767.25892l22.381,9.05613.00091.00037A15.38605,15.38605,0,0,1,301.053,796.35l-.18757.46348-36.64425-14.82769Z" transform="translate(-194.38344 -102.06831)" fill="#2f2e41"/><polygon points="209.619 682.861 221.879 682.86 227.712 635.572 209.617 635.573 209.619 682.861" fill="#ffb8b8"/><path d="M400.87573,780.92671l24.1438-.001h.001A15.38605,15.38605,0,0,1,440.407,796.312v.5l-39.53051.00146Z" transform="translate(-194.38344 -102.06831)" fill="#2f2e41"/><path d="M414.10344,758.19562c-4.86926,0-9.64429-1.98519-12.27942-3.305a4.96781,4.96781,0,0,1-2.67049-3.49082L373.3121,621.11417,306.27188,746.54481a4.98885,4.98885,0,0,1-2.82981,2.38589c-14.43877,4.82471-22.31335-2.76608-25.02948-6.25257a4.91175,4.91175,0,0,1-.55813-5.09258l31.04876-67.45092,18.77366-64.07244,18.97617-46.89055.41422.04429,63.45409,6.6792,7.71608,42.43522,7.77063,141.29376a4.90955,4.90955,0,0,1-.90835,3.15923A12.93315,12.93315,0,0,1,414.10344,758.19562Z" transform="translate(-194.38344 -102.06831)" fill="#2f2e41"/><circle cx="183.76001" cy="345.68636" r="24.56103" fill="#ffb8b8"/><path d="M386.68511,585.4008c-10.69282,0-23.92317-6.25841-39.46088-18.689l-.2647-.21247,10.98555-86.6639.51288-.01889c15.71329-.56776,28.50041,3.42194,39.08728,12.22643l.09089.09443,8.58436,11.03661.00383.20184,1.21049,67.78836-.03069.09561a21.576,21.576,0,0,1-13.78631,13.15776A23.93576,23.93576,0,0,1,386.68511,585.4008Z" transform="translate(-194.38344 -102.06831)" fill="#6c63ff"/><path d="M402.5005,625.91635a5.4613,5.4613,0,0,1-5.26393-4.04872L382.156,564.7771l-9.55345,52.01251a5.42933,5.42933,0,0,1-6.10112,4.4052l-41.6-5.80514a5.43857,5.43857,0,0,1-4.399-7.13425l21.04273-62.021-4.71062-36.33817a27.21029,27.21029,0,0,1,25.851-30.68412l.42169-.01652,20.009,48.25652,3.18232-12.72928,4.98034-27.39911.74364.43084a44.271,44.271,0,0,1,22.11394,40.3562l-1.26184,29.01978L424.054,616.38119a5.44793,5.44793,0,0,1-4.32729,6.35166L403.513,625.82074A5.38036,5.38036,0,0,1,402.5005,625.91635Z" transform="translate(-194.38344 -102.06831)" fill="#2f2e41"/><path d="M411.301,445.69562H375.83545l-.36377-5.0918-1.81836,5.0918h-5.46094l-.7207-10.0918-3.604,10.0918H353.301v-.5a26.52975,26.52975,0,0,1,26.49975-26.5H384.801a26.53,26.53,0,0,1,26.5,26.5Z" transform="translate(-194.38344 -102.06831)" fill="#2f2e41"/><path d="M991.38344,797.93169h-796a1,1,0,1,1,0-2h796a1,1,0,0,1,0,2Z" transform="translate(-194.38344 -102.06831)" fill="#ccc"/><path d="M387.537,598.14753a11.19058,11.19058,0,0,0,12.76969,11.09013A18.841,18.841,0,0,0,417.579,620.55173h0a18.83986,18.83986,0,0,0,18.83989-18.83986V585.38779c0-4.20163-3.40618-5.60771-7.60771-5.60771H406.34679c-4.20153,0-7.60771,1.40608-7.60771,5.60771v1.55764A11.21477,11.21477,0,0,0,387.537,598.14753Zm3.05512,0a8.15631,8.15631,0,0,1,8.147-8.147v11.71132a18.87291,18.87291,0,0,0,.55767,4.55439c-.18523.01262-.36946.02825-.55767.02825A8.15631,8.15631,0,0,1,390.5921,598.14753Z" transform="translate(-194.38344 -102.06831)" fill="#6c63ff"/><path d="M396.55813,595.4541a10.0558,10.0558,0,0,0-15.06856-3.2702l-29.95259-19.489.1142,18.56935,28.426,15.66021a10.11027,10.11027,0,0,0,16.481-11.47035Z" transform="translate(-194.38344 -102.06831)" fill="#ffb8b8"/><path d="M364.12573,606.78814a4.50226,4.50226,0,0,1-3.18213-1.31836l-38.14014-38.14014a10.08633,10.08633,0,0,1-2.71692-9.43213c3.26465-14.273,11.22034-48.37646,14.5791-56.773a29.676,29.676,0,0,1,12.859-14.979l.15-.0752,12.07458,2.231,1.06409,37.24365-14.58582,31.25537,31.014,29.27686a4.484,4.484,0,0,1,.4679,6.02881l-10.02686,12.93847a4.50324,4.50324,0,0,1-3.2738,1.73487C364.31433,606.78521,364.21972,606.78814,364.12573,606.78814Z" transform="translate(-194.38344 -102.06831)" fill="#2f2e41"/><ellipse cx="223.15354" cy="480.86338" rx="14" ry="2" fill="#2f2e41"/></svg>
                                                        <h4>Tidak ada tagihan baru</h4>
                                                        <small>Deskripsi ....</small>

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



            