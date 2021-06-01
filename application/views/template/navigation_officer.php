<ul id="mainnav-menu" class="list-group">
						
						            <!--Nav-->
						            <li class="list-header">Menu</li>

						
						            <!--Menu list item-->
						            <li class="<?php echo $this->uri->segment(1) == "dashboard" ? 'active-sub' : '' ?>">
						                <a href="<?php echo base_url('dashboard') ?>">
						                    <i class="demo-pli-home"></i>
						                    <span class="menu-title">Halaman Utama</span>
						                </a>
						            </li>

                                    <li class="<?php echo $this->uri->segment(5) == "account" ? 'active-sub' : '' ?>">
						                <a href="<?php echo base_url('account') ?>">
						                    <i class="demo-pli-male"></i>
						                    <span class="menu-title">Akun Pengguna </span>
						                </a>
						            </li>
                                   

                                    <li class="<?php echo $this->uri->segment(3) == "domisili" ? 'active-sub' : '' ?>">
						                <a href="<?php echo base_url('domisili') ?>">
						                    <i class="demo-pli-map-2"></i>
						                    <span class="menu-title">Master Domisili</span>
						                </a>
						            </li>

                                    <li class="<?php echo $this->uri->segment(3) == "data_pelanggan" ? 'active-sub' : '' ?>">
						                <a href="<?php echo base_url('data_pelanggan') ?>">
						                    <i class="demo-pli-male"></i>
						                    <span class="menu-title">Data Pelanggan</span>
						                </a>
						            </li>

                                    <li class="<?php echo $this->uri->segment(3) == "data_piutang" ? 'active-sub' : '' ?>">
						                <a href="<?php echo base_url('data_piutang') ?>">
						                    <i class="demo-pli-coin"></i>
						                    <span class="menu-title">Kelola Data Piutang</span>
						                </a>
						            </li>

									<li class="<?php echo $this->uri->segment(3) == "penugasan" ? 'active-sub' : '' ?>">
						                <a href="<?php echo base_url('penugasan') ?>">
						                    <i class="demo-pli-file-add"></i>
						                    <span class="menu-title">Penugasan</span>
						                </a>
						            </li>

									  <!--Menu list item-->
									  <li class="<?php echo $this->uri->segment(1) == "penagihan" ? 'active-sub' : '' ?>">
						                <a href="<?php echo base_url('penagihan') ?>">
						                    <i class="demo-pli-pencil"></i>
						                    <span class="menu-title">Kelola Penagihan</span>
						                </a>
						            </li>

										 <!--Menu list item-->
									<li class="<?php echo $this->uri->segment(1) == "laporan" ? 'active-sub' : '' ?>">
						                <a href="<?php echo base_url('laporan') ?>">
						                    <i class="demo-pli-file-edit"></i>
						                    <span class="menu-title">Laporan</span>
						                </a>
						            </li>
									<?php
										$sess_level = $this->session->userdata('sess_level');
            							$sess_jabatan = $this->session->userdata('sess_jabatan');
										
									?>
									
									    <!--Menu list item-->
										<li class="<?php echo $this->uri->segment(1) == "" ? 'active-sub' : '' ?>">
						                <a href="<?php echo base_url('setting') ?>">
						                    <i class="demo-pli-gear"></i>
						                    <span class="menu-title">Pengaturan Akun</span>
											<i class="arrow"></i>
						                </a>


										 <!--Submenu-->
										 <ul class="collapse">
										 <?php if ( $sess_level == "employee" || $sess_jabatan == "pegawai_kantor" ) { ?>
						                    <li><a href="<?php echo base_url('account/editAkun?jabatan=pegawai_kantor&id=') ?>">Pengaturan Profile</a></li>
											<?php }?>
											<li><a href="<?php echo base_url('setting') ?>">Pengaturan Password</a></li>
											
						                </ul>
									
						            </li>


                                </ul>
		