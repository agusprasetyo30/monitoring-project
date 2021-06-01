<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <div class="pad-all text-center">
                        <h3>PENUGASAN</h3>
                        <p1>Data penugasan penagihan terhadap petugas lapangan</p>
                    </div>
                </div>

                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
    
    
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-body" style="border: 1px solid #e0e0e0">
                            
                                <p class="text-main text-semibold">Data Penugasan</p>
                              

                                      <h9> *Pilih Petugas</h9><br>
                                    
                                      <select id="off" name="officer" required="">
                                      <option value=""selected readonly>Pilih petugas lapangan</option>

                                      <?php
												foreach ($user_officer as $kolom => $value) { ?>
												<option value="<?= $value['id_officer']?>"> <?= $value['name']?></option>
											<?php 
											}
                                            ?>
                                          
                                      </select>

                                    <br><br>
                                    <form action="<?php echo base_url('penugasan/pilihPenugasan') ?>" method="POST">

                                      <div class="col-md-12 text-right">
                                      <button class="btn btn-sm btn-success btn-labeled"><i class="btn-label ti-check"></i>Submit</button>
					                </div>

					        </div>
                                   
					    </div>
                        </div>
                    </div>
					            <!--===================================================-->
					            <!--End Panel 1-->
                                                    
                    </div>

<script src="<?php echo base_url() ?>assets/plugins/chosen/chosen.jquery.min.js"></script>

<script>

  $('#off').chosen({width:'100%'});



  </script>