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


                                    <!--Menu list item-->
						            <li class="<?php echo $this->uri->segment(1) == "" ? 'active-sub' : '' ?>">
						                <a href="<?php echo base_url('setting') ?>">
						                    <i class="demo-pli-gear"></i>
						                    <span class="menu-title">Pengaturan Akun</span>
											<i class="arrow"></i>
						                </a>

										 <!--Submenu-->
										 <ul class="collapse">
										 
						                    <li><a href="<?php echo base_url('account/editAkun?jabatan=manajer&id=') ?>">Pengaturan Profile</a></li>
											<li><a href="<?php echo base_url('setting') ?>">Pengaturan Password</a></li>
											
						                </ul>
						            </li>

                                
</ul>