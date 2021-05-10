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
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-body" style="border: 1px solid #e0e0e0">
                            
                                <p class="text-main text-semibold">Data Tabel Jenis Pelanggan</p>
                           
                                $ambilDataPenagihan = $this->db->get();

                                $data_notif = array();



                                <?php 
                                    $nomor = 1; 
                                    if ( $ambilDataPenagihan->num_rows() > 0 ) {
                                    foreach ( $ambilDataPenagihan->result_array() AS $notifikasi ) : ?>
                                <tr>
                            
                                
                                    <td><?php echo $nomor++?></td>
                                    <td><?php echo ucfirst($notifikasi['tanggal_penagihan']) ?> Atas nama</td>
                                    <td><?php echo $notifikasi['username'] ?></td>
                                 
                                </tr>
                                <?php endforeach; ?>

                                }
                    
                             

                              

                            </div>
                        
                        </div>
                    </div>



                </div>

            </div>
            