<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Halaman Utama</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="http://localhost:8000/req-web-internship-queue-hae/dashboard"><i class="demo-pli-home"></i></a></li>
					<li class="active">Dashboard Admin</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->
                </div>

                
                 <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    
					<!--Activated Users Chart-->
					<!--===================================================-->
					<div class="panel">
					
					    <!--Chart information-->
					    <div class="panel-body">
					        <div class="row mar-top">
					            <div class="col-md-5">
					                <h3 class="text-main text-normal text-2x mar-no">Aktivitas Penagihan Piutang</h3>
					                <h5 class="text-uppercase text-muted text-normal">Jumlah dan tampilan statistik per-bulan <?php echo date('F'); ?> </h5>
					                <hr class="new-section-xs">
					                <div class="row mar-top">
					                    <div class="col-sm-5">
					                        <div class="text-lg"><p class="text-5x text-thin text-main mar-no"><?php echo $calPenagihan->jumlah ?></p></div>
					                        <p class="text-sm">Pelanggan yang telah dilakukan penagihan, selama periode tahun</p>
					                    </div>
					                    <div class="col-sm-7">
					                        <div class="list-group bg-trans mar-no">
					                            <a class="list-group-item" href="#"><i class="demo-pli-mine icon-lg ion-stats-bars"></i> Presentase Piutang</a>
                                                <a class="list-group-item" href="#"><i class="demo-pli-mine icon-lg ion-calculator"></i> Pembayaran</a>
					                            <a class="list-group-item" href="#"><i class="demo-pli-credit-card-2 icon-lg icon-fw"></i>Laporan</a>
					                        </div>
					                    </div>
					                </div>
					                <button class="btn btn-pink mar-ver">View Details</button>
					                <p class="text-xs">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
					            </div>
					            <div class="col-md-7">
                                
					                <div id="demo-bar-chart" style="height:250px"></div>
					                <hr class="new-section-xs bord-no">
					                <ul class="list-inline text-center">
					                    <li><span class="label label-info">354</span> Piutang</li>
					                    <li><span class="label label-warning">74</span> Pembayaran</li>
					                    <li><span class="label label-default">25</span> Pencabutan</li>
					                </ul>
					            </div>
					        </div>
					    </div>
					</div>
					<!--===================================================-->
					<!--End Activated Users chart-->


                    <div class="row">
					    <div class="col-lg-3">
					        <div class="row">
					            <div class="col-md-12">
					
					                <!--Tile-->
					                <!--===================================================-->
					                <div class="panel panel-default panel-colorful">
					                    <div class="pad-all text-center">
					                        <span class="text-3x text-thin"><?php echo $calAccount->jml ?></span>
					                        <p style="margin: 0px">Total Pengguna</p>
					                        <i class="ti-medall-alt"></i>
					                    </div>
					                </div>
                                    <small>Pegawai Kantor, Petugas Lapangan, Manajer</small>
					                <!--===================================================-->

					            </div>







                        
					
                </div>
                <!--===================================================-->
                <!--End page content-->
            
            </div>



    <!--=================================================-->


    
    <!--Flot Chart [ OPTIONAL ]-->
    <script src="<?php echo base_url() ?>assets/plugins/flot-charts/jquery.flot.min.js"></script>
	<script src="<?php echo base_url() ?>assets/plugins/flot-charts/jquery.flot.resize.min.js"></script>
	<script src="<?php echo base_url() ?>assets/plugins/flot-charts/jquery.flot.pie.min.js"></script>
	<script src="<?php echo base_url() ?>assets/plugins/flot-charts/jquery.flot.tooltip.min.js"></script>


    <script>
	
	$(function() {


		// FLOT CHART
		// =================================================================
		// Require Flot Charts
		// -----------------------------------------------------------------
		// http://www.flotcharts.org/
		// =================================================================


		var d1 = [[0, 85], [1, 45], [2, 58], [3, 35], [4, 95], [5, 25], [6, 65], [7, 12]],
		    d2 = [[0, 50], [1, 30], [2, 80], [3, 29], [4, 95], [5, 70], [6, 15], [7, 73]];

		$.plot("#demo-bar-chart", [
			{
				label: "Piutang",
				data: d1
			},{
				label: "Pencabutan",
				data: d2
			}],{
			series: {
				bars: {
					show: true,
					lineWidth: 0,
					barWidth: 0.25,
					align: "center",
					order: 1,
					fillColor: { colors: [ { opacity: .9 }, { opacity: .9 } ] }
				}
			},
			colors: ['#03a9f4', '#ffb300'],
			grid: {
				borderWidth: 0,
				hoverable: true,
				clickable: true
			},
			yaxis: {
				ticks: 4, tickColor: 'rgba(0,0,0,.02)'
			},
			xaxis: {
				ticks: 7,
				tickColor: 'transparent'
			},
			tooltip: {
				show: true,
				content: "<div class='flot-tooltip text-center'><h5 class='text-main'>%s</h5>%y.0 </div>"
			}
		});

	});
	
	</script>