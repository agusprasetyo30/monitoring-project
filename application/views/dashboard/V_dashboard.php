			        
    		<!--Morris.js [ OPTIONAL ]-->
    		<link href="<?php echo base_url() ?>assets/plugins/morris-js/morris.min.css" rel="stylesheet">
			
			
			<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Dashboard</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li class="active">Dashboard 2</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>

                                
                <!--Fixedbar-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <div class="page-fixedbar-container">
                    <div class="page-fixedbar-content">
                        <div class="nano">
                            <div class="nano-content">

                                <div class="pad-all">
                                    <span class="pad-ver text-main text-sm text-uppercase text-bold">Total Penagihan Masuk</span>
                                    <p class="text-sm">Periode <?php echo date('F Y') ?></p>
                                    <h3 class="text-success">Rp <?php echo number_format($totalPenagihan['bayar'], 2) ?></h3>
                                    <a href="" class="btn btn-block btn-info mar-top">Rincian Detail</a>
                                </div>
                                <hr class="new-section-xs">
                                <div class="pad-hor">
                                    <p class="pad-ver text-main text-sm text-uppercase text-bold">Presentase</p>
                                    <p>Jumlah dari prentase antara <b class="text-main">Piutang</b> dan <b class="text-main">Cabut</b></p>
                                </div>

                                <div class="pad-all">
                                    <!--Progress bars with labels-->
                                    <!--===================================================-->
                                    <small>Piutang</small>
									<div class="progress">
                                        <div style="width: <?php echo $persen_piutang[1] ?>%;" class="progress-bar progress-bar-success"><?php echo intval($persen_piutang[1]) ?>%</div>
                                    </div>

									<small>Pencabutan</small>
                                    <div class="progress">
                                        <div style="width: <?php echo $persen_pencabutan[1] ?>%;" class="progress-bar progress-bar-warning"><?php echo $persen_pencabutan[1] ?>%</div>
                                    </div>
                                </div>
                                <!--===================================================-->
                                <ul class="list-unstyled text-center pad-btm mar-no row">
                                    <li class="col-xs-6">
                                        <span class="text-2x text-normal text-main"><?php echo $persen_piutang[0] ?></span>
                                        <p class="text-muted mar-no">Jumlah Piutang</p>
                                    </li>
                                    <li class="col-xs-6">
                                        <span class="text-2x text-normal text-main"><?php echo $persen_pencabutan[0] ?></span>
                                        <p class="text-muted mar-no">Jumlah Cabut</p>
                                    </li>
                                </ul>

                                <hr class="new-section-xs">

                                
                            </div>
                        </div>
                    </div>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End Fixedbar-->

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
					                <h3 class="text-main text-normal text-2x mar-no">Activated Users</h3>
					                <h5 class="text-uppercase text-muted text-normal">Report for last 7-days ago</h5>
					                <hr class="new-section-xs">
					                <div class="row mar-top">
					                    <div class="col-sm-5">
					                        <div class="text-lg"><p class="text-5x text-thin text-main mar-no">520</p></div>
					                        <p class="text-sm">Since 2016 190 peoples already registered</p>
					                    </div>
					                    <div class="col-sm-7">
					                        <div class="list-group bg-trans mar-no">
					                            <a class="list-group-item" href="#"><i class="demo-pli-information icon-lg icon-fw"></i> Pengguna</a>
					                            <a class="list-group-item" href="#"><i class="demo-pli-mine icon-lg icon-fw"></i> Pengaturan</a>
					                            <a class="list-group-item" href="#"><span class="label label-info pull-right">New</span><i class="demo-pli-credit-card-2 icon-lg icon-fw"></i> Cetak Laporan</a>
					                        </div>
					                    </div>
					                </div>
					                <button class="btn btn-pink mar-ver">View Details</button>
					                <p class="text-xs">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
					            </div>
					            <div class="col-md-7">
									<div id="demo-morris-bar" style="height: 250px"></div>
					                <hr class="new-section-xs bord-no">
					                <ul class="list-inline text-center">
										<li><span class="label label-info">354</span> Piutang</li>
					                    <li><span class="label label-warning">25</span> Pencabutan</li>
					                </ul>
					            </div>
					        </div>
					    </div>
					</div>
					<!--===================================================-->
					<!--End Activated Users chart-->
            
            </div>
        </div>



    <!--=================================================-->


    
	<!--Morris.js [ OPTIONAL ]-->
	<script src="<?php echo base_url() ?>assets/plugins/morris-js/morris.min.js"></script>
	<script src="<?php echo base_url() ?>assets/plugins/morris-js/raphael-js/raphael.min.js"></script>


    <script>
	
	$(document).on('nifty.ready', function() {

			// FLOT CHART
			// =================================================================
			// Require Flot Charts
			// -----------------------------------------------------------------
			// http://www.flotcharts.org/
			// =================================================================
		
		var dataXY = new Array();



		// $.ajax({

		// 	url : 
		// });
		$.get("<?php echo base_url('dashboard/grafik') ?>", function( hasil ) {

			// hasil.forEach( function( item ) {

			// 	dataXY.push({
			// 		x : item.x,
			// 		a : item.y1,
			// 		b : item.y2
			// 	})
			// } );


			Morris.Bar({
				element: 'demo-morris-bar',
				data: hasil,
				xkey: 'x',
				ykeys: ['a', 'b'],
				labels: ['Piutang', 'Pencabutan'],
				gridEnabled: true,
				gridLineColor: 'rgba(0,0,0,.1)',
				gridTextColor: '#8f9ea6',
				gridTextSize: '11px',
				barColors: ['#03a9f4', '#ffb300'],
				resize:true,
				hideHover: 'auto'
			});
		}, "json");


		console.log( dataXY );


		
    });
	
	</script>