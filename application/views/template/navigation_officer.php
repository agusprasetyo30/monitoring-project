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
                                    <li class="<?php echo $this->uri->segment(2) == "jenis_pelanggan" ? 'active-sub' : '' ?>">
						                <a href="<?php echo base_url('jenis_pelanggan') ?>">
						                    <i class="demo-pli-check"></i>
						                    <span class="menu-title">Master Jenis Pelanggan </span>
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


                                </ul>