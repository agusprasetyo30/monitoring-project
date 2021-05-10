<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <div class="pad-all text-center">
                        <h3>Notifikasi Penagihan</h3>
                        <p1>Cek notifikasi dari hasil penagihan</p>
                    </div>
                </div>

                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    <div class="row">
                            <?php if ( $notifikasi->num_rows() > 0 ) {?>
                                <?php foreach ( $notifikasi->result_array() AS $row ) : ?>
                                    <div class="col-md-12 text-left">
                                        <div class="panel panel-body" style="border: 1px solid #e0e0e0; background-color:#FF6347; color:#FFFFFF">
                                            <p>Pada tanggal <?php echo ucfirst($row['tanggal_penagihan'])?></p> 
                                            Atas nama <?php echo $row['username'] ?>
                                            Telah melakukan penagihan kepada no_ref <?php echo $row['no_ref'] ?>
                                            sebesar <?php echo $row['pembayaran'] ?> <br>
                                            Status tagihan : <?php echo $row['status_penagihan'] ?>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            <?php } ?>
                       
                    </div>



                </div>

            </div>
            