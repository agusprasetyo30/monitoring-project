            <!--Bootstrap Timepicker [ OPTIONAL ]-->
            <link href="<?php echo base_url() ?>assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">


            <!--Bootstrap Datepicker [ OPTIONAL ]-->
            <link href="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
            
            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <div class="text-center pad-btm">
                        <h3>Cetak Laporan</h3>
                        <p>Mencetak rekapan laporan dalam bentuk file.</p>
                    </div>

                </div>

                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">

                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel">
                                <div class="panel-body">
                                    

                                    <!-- Account -->
                                    <div class="row">
                                        <div class="col-md-3">
                                            <?php echo svg("account") ?>
                                        </div>
                                        <div clss="col-md-9">
                                            <h4>Akun Pengguna</h4>
                                            <p>Rekapan keseluruhan data pengguna yang tersimpan</p>

                                            <small>Pilih menu opsi dibawah ini untuk mencetak :</small>
                                            <div class="">
                                                <form action="<?php echo base_url('laporan/exportpengguna') ?>" method="GET">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select name="jabatan" class="form-control" id="">
                                                            <option value="all">Keseluruhan</option>
                                                            <option value="petugas_lapangan">Petugas Lapangan</option>
                                                            <option value="pegawai_kantor">Pegawai Kantor</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5 text-right" style="border-left: 1px solid #e0e0e0">
                                                    <button class="btn btn-icon"><?php echo svg("pdf") ?></button>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-12"><hr></div>
                                    </div>


                                    <!-- Piutang Pelanggan -->
                                    <div class="row">
                                        <div class="col-md-3">
                                            <?php echo svg("rekap") ?>
                                        </div>
                                        <div clss="col-md-9">
                                            <h4>Laporan Piutang</h4>
                                            <p>Informasi laporan penagihan piutang</p>

                                            <small>Pilih menu opsi dibawah ini untuk mencetak :</small>
                                            <div class="">
                                                <div class="row">

                                                    <form action="<?php echo base_url('laporan/exportpelanggan') ?>" method="GET">
                                                    <div class="col-md-2">
                                                        <select id="tahun-" class="form-control" name="tahun" required="">
                                                            <option value="">Silahkan pilih tahun</option>
                                                            <?php 
                                                            
                                                                    $tahun = substr(date('Y'), -2);
                                                                    for ( $i = 18; $i <= intval($tahun); $i++ ) { ?>
                                                                    <option value="20<?php echo $i ?>">20<?php echo $i ?></option>
                                                                    <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <select  id="domisili" name="domisili" required="">
                                                                <option value="">Silahkan pilih domisili</option>
                                                                <?php
                                                                    foreach ($master_domisili as $kolom => $value) { ?>
                                                                    <option value="<?= $value['id_domisili'].'-'.$value['kota']?>"><?= $value['kota']." - ".$value['wilayah'] ?></option>
                                                                <?php 
                                                                }
                                                                ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 text-right" style="border-left: 1px solid #e0e0e0">
                                                        <button class="btn btn-icon"><?php echo svg("xls") ?></button>
                                                       
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-12"><hr></div>
                                    </div>



                                    <!-- Cabut PDF -->
                                    <div class="row">
                                        <div class="col-md-3">
                                            <?php echo svg("account") ?>
                                        </div>
                                        <div clss="col-md-9">
                                            <h4>Laporan Pencabutan</h4>
                                            <p>Rekapan keseluruhan data pelanggan yang telah tercabut</p>

                                                <form action="<?php echo base_url('laporan/exportpelangganPDF') ?>" method="GET">
                                                <div class="row">
                                                    
                                                    <div class="col-md-8 text-right" >
                                                    <button class="btn btn-icon"><?php echo svg("pdf") ?></button>
                                                    
                                                    </div>
                                                </div>
                                                </form>
                                                
                                         
                                        </div>
                                        <div class="col-md-12"><hr></div>
                                    </div>



                                     <!-- Cabut Excell -->
                                     <div class="row">
                                        <div class="col-md-3">
                                            <?php echo svg("rekap") ?>
                                        </div>
                                        <div clss="col-md-9">
                                            <h4>Laporan Pencabutan </h4>
                                            <p>Rekapan pelanggan yang telah tercabut</p>

                                            <small>Pilih menu opsi dibawah ini untuk mencetak :</small>
                                            <div class="">
                                                <div class="row">

                                                    <form action="<?php echo base_url('laporan/exportPencabutanExcel') ?>" method="GET">
                                                    <div class="col-md-8 text-right">
                                                        <button class="btn btn-icon"><?php echo svg("xls") ?></button>
                                                       
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-12"><hr></div>
                                    </div>




                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        <!--Chosen [ OPTIONAL ]-->
          <script src="<?php echo base_url() ?>assets/plugins/chosen/chosen.jquery.min.js"></script>

          <script>

            $('#tahun').chosen({width:'100%'});
            $('#domisili').chosen({width:'100%'});


            </script>
    



            <?php
            
            
                function svg( $type ) {

                    if ( $type == "account" ){

                        $img = '<svg id="a9f9b6b5-770f-43b9-9650-dab4e61227c5" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" style="width: 150px" viewBox="0 0 806.00748 609.71553"><path d="M854.56633,579.69009H213.72783a16.51868,16.51868,0,0,1-16.5-16.5V168.03628a12.10185,12.10185,0,0,1,12.08789-12.08838H858.76921a12.31112,12.31112,0,0,1,12.29712,12.29736V563.19009A16.51867,16.51867,0,0,1,854.56633,579.69009Z" transform="translate(-196.99626 -145.14223)" fill="#f2f2f2"/><path d="M833.84652,558.85777H236.60177c-8.755,0-15.87756-6.66993-15.87756-14.86817v-344.105c0-6.08008,5.278-11.02685,11.76563-11.02685H837.76352c6.59521,0,11.96069,5.02832,11.96069,11.20849V543.9896C849.72421,552.18784,842.60141,558.85777,833.84652,558.85777Z" transform="translate(-196.99626 -145.14223)" fill="#fff"/><path d="M870.83659,170.09243H196.99626V161.692a16.57377,16.57377,0,0,1,16.56006-16.54981H854.27654A16.57369,16.57369,0,0,1,870.83659,161.692Z" transform="translate(-196.99626 -145.14223)" fill="#3f3d56"/><circle cx="30.09536" cy="12.5" r="4.28342" fill="#fff"/><circle cx="46.35417" cy="12.5" r="4.28342" fill="#fff"/><circle cx="62.61297" cy="12.5" r="4.28342" fill="#fff"/><path d="M389.34433,242.90775H283.794a15.99572,15.99572,0,0,0-16,16v71.83a15.99571,15.99571,0,0,0,16,16h105.5503a16.002,16.002,0,0,0,16-16v-71.83A16.002,16.002,0,0,0,389.34433,242.90775Z" transform="translate(-196.99626 -145.14223)" fill="#f9a826"/><path d="M463.7928,258.904v71.8385a16,16,0,0,0,16,16H585.34066a16,16,0,0,0,16-16V258.904a16,16,0,0,0-16-16H479.7928A16,16,0,0,0,463.7928,258.904Z" transform="translate(-196.99626 -145.14223)" fill="#f9a826"/><path d="M659.7928,258.904v71.8385a16,16,0,0,0,16,16H781.34066a16,16,0,0,0,16-16V258.904a16,16,0,0,0-16-16H675.7928A16,16,0,0,0,659.7928,258.904Z" transform="translate(-196.99626 -145.14223)" fill="#e6e6e6"/><path d="M267.7928,417.904v71.8385a16,16,0,0,0,16,16H389.34066a16,16,0,0,0,16-16V417.904a16,16,0,0,0-16-16H283.7928A16,16,0,0,0,267.7928,417.904Z" transform="translate(-196.99626 -145.14223)" fill="#e6e6e6"/><path d="M463.7928,417.904v71.8385a16,16,0,0,0,16,16H585.34066a16,16,0,0,0,16-16V417.904a16,16,0,0,0-16-16H479.7928A16,16,0,0,0,463.7928,417.904Z" transform="translate(-196.99626 -145.14223)" fill="#e6e6e6"/><path d="M659.7928,417.904v71.8385a16,16,0,0,0,16,16H781.34066a16,16,0,0,0,16-16V417.904a16,16,0,0,0-16-16H675.7928A16,16,0,0,0,659.7928,417.904Z" transform="translate(-196.99626 -145.14223)" fill="#f9a826"/><circle cx="139.57047" cy="149.68102" r="22" fill="#fff"/><path d="M370.18417,348.73777H302.94442a33.36821,33.36821,0,0,1,6.00977-8.22,32.89139,32.89139,0,0,1,23.33008-9.66h8.56006A32.988,32.988,0,0,1,370.18417,348.73777Z" transform="translate(-196.99626 -145.14223)" fill="#fff"/><circle cx="335.57047" cy="149.68102" r="22" fill="#fff"/><path d="M566.18417,348.73777H498.94442a33.36821,33.36821,0,0,1,6.00977-8.22,32.89139,32.89139,0,0,1,23.33008-9.66h8.56006A32.988,32.988,0,0,1,566.18417,348.73777Z" transform="translate(-196.99626 -145.14223)" fill="#fff"/><circle cx="531.57047" cy="149.68102" r="22" fill="#fff"/><path d="M762.18417,348.73777H694.94442a33.36821,33.36821,0,0,1,6.00977-8.22,32.89139,32.89139,0,0,1,23.33008-9.66h8.56006A32.988,32.988,0,0,1,762.18417,348.73777Z" transform="translate(-196.99626 -145.14223)" fill="#fff"/><circle cx="139.57047" cy="308.68102" r="22" fill="#fff"/><path d="M370.18417,507.73777H302.94442a33.36821,33.36821,0,0,1,6.00977-8.22,32.89139,32.89139,0,0,1,23.33008-9.66h8.56006A32.988,32.988,0,0,1,370.18417,507.73777Z" transform="translate(-196.99626 -145.14223)" fill="#fff"/><circle cx="335.57047" cy="308.68102" r="22" fill="#fff"/><path d="M566.18417,507.73777H498.94442a33.36821,33.36821,0,0,1,6.00977-8.22,32.89139,32.89139,0,0,1,23.33008-9.66h8.56006A32.988,32.988,0,0,1,566.18417,507.73777Z" transform="translate(-196.99626 -145.14223)" fill="#fff"/><circle cx="531.57047" cy="308.68102" r="22" fill="#fff"/><path d="M762.18417,507.73777H694.94442a33.36821,33.36821,0,0,1,6.00977-8.22,32.89139,32.89139,0,0,1,23.33008-9.66h8.56006A32.988,32.988,0,0,1,762.18417,507.73777Z" transform="translate(-196.99626 -145.14223)" fill="#fff"/><path d="M1002.00374,754.85777h-261a1,1,0,0,1,0-2h261a1,1,0,0,1,0,2Z" transform="translate(-196.99626 -145.14223)" fill="#3f3d56"/><polygon points="670.716 597.522 658.457 597.521 652.624 550.233 670.718 550.234 670.716 597.522" fill="#a0616a"/><path d="M649.69935,594.01828h23.64387a0,0,0,0,1,0,0v14.88687a0,0,0,0,1,0,0H634.81249a0,0,0,0,1,0,0v0A14.88686,14.88686,0,0,1,649.69935,594.01828Z" fill="#2f2e41"/><polygon points="716.716 597.522 704.457 597.521 698.624 550.233 716.718 550.234 716.716 597.522" fill="#a0616a"/><path d="M695.69935,594.01828h23.64387a0,0,0,0,1,0,0v14.88687a0,0,0,0,1,0,0H680.81249a0,0,0,0,1,0,0v0A14.88686,14.88686,0,0,1,695.69935,594.01828Z" fill="#2f2e41"/><path d="M912.21515,601.82551a10.74271,10.74271,0,0,1-2.06221-16.343l-8.0725-114.55784,23.253,2.25509.63868,112.18665a10.80091,10.80091,0,0,1-13.757,16.45914Z" transform="translate(-196.99626 -145.14223)" fill="#a0616a"/><path d="M867.13337,718.84125,853.637,718.1977a4.499,4.499,0,0,1-4.28587-4.46289c-3.5581-54.91919-8.48584-113.80722-.94189-136.55664a4.5011,4.5011,0,0,1,5.14646-4.48536l53.99366,7.83789a4.47385,4.47385,0,0,1,3.85353,4.41993c6.89356,26.9364,7.20508,75.78189,6.94434,126.53418a4.5005,4.5005,0,0,1-4.5,4.53417H899.29719a4.47887,4.47887,0,0,1-4.44531-3.80078l-8.97706-57.06738a3.5,3.5,0,0,0-6.93286.12793l-7.12622,59.60254a4.5171,4.5171,0,0,1-4.46875,3.96582Q867.24079,718.84711,867.13337,718.84125Z" transform="translate(-196.99626 -145.14223)" fill="#2f2e41"/><path d="M876.63435,584.95648c-11.89942-6.61132-21.197-8.34863-25.67994-8.79589a4.41806,4.41806,0,0,1-3.05346-1.67286,4.47788,4.47788,0,0,1-.93115-3.40136l12.9375-96.05078a33.21916,33.21916,0,0,1,19.36352-25.957,32.30591,32.30591,0,0,1,31.39551,2.46094q.665.44238,1.30517.90332A33.17816,33.17816,0,0,1,924.608,487.01605c-7.93359,32.45508-10.65869,85.66211-11.12451,95.999a4.46544,4.46544,0,0,1-2.918,4.00488,45.08471,45.08471,0,0,1-15.22583,2.71094A38.1245,38.1245,0,0,1,876.63435,584.95648Z" transform="translate(-196.99626 -145.14223)" fill="#3f3d56"/><path d="M907.34418,509.41765a4.4817,4.4817,0,0,1-1.85872-3.40065l-1.70385-30.87615A12.39863,12.39863,0,0,1,928.128,471.214l7.48456,27.60491a4.50507,4.50507,0,0,1-3.16561,5.52076l-21.29065,5.77257A4.4829,4.4829,0,0,1,907.34418,509.41765Z" transform="translate(-196.99626 -145.14223)" fill="#3f3d56"/><circle cx="690.45974" cy="266.33344" r="24.56103" fill="#a0616a"/><path d="M798.45229,459.7303a10.52582,10.52582,0,0,1,.23929,1.64013l42.95745,24.782,10.44142-6.01094,11.13116,14.57228-22.33714,15.92056-49.00792-38.66268a10.49579,10.49579,0,1,1,6.57574-12.24133Z" transform="translate(-196.99626 -145.14223)" fill="#a0616a"/><path d="M843.18331,484.04509a4.48167,4.48167,0,0,1,1.29314-3.65336l21.86341-21.86849a12.39862,12.39862,0,0,1,19.16808,15.51622l-15.57,23.9922a4.50507,4.50507,0,0,1-6.22447,1.32511l-18.5043-12.00853A4.48291,4.48291,0,0,1,843.18331,484.04509Z" transform="translate(-196.99626 -145.14223)" fill="#3f3d56"/><path d="M904.83661,430.90724c-4.582,4.88079-13.09132,2.26067-13.68835-4.40717a8.05387,8.05387,0,0,1,.01013-1.55569c.30826-2.95357,2.01461-5.63506,1.60587-8.7536a4.59044,4.59044,0,0,0-.8401-2.14892c-3.65125-4.88933-12.22228,2.18687-15.6682-2.23929-2.113-2.714.3708-6.98713-1.25066-10.02051-2.14005-4.00358-8.47881-2.0286-12.45388-4.22116-4.42275-2.43948-4.15821-9.22524-1.24686-13.35269,3.55053-5.03359,9.77573-7.71951,15.92336-8.10661s12.25292,1.27475,17.9923,3.51145c6.52108,2.54134,12.98768,6.05351,17.00066,11.78753,4.88022,6.97317,5.34986,16.34793,2.90917,24.50174C913.64535,420.86237,908.57827,426.92156,904.83661,430.90724Z" transform="translate(-196.99626 -145.14223)" fill="#2f2e41"/></svg>';
                    } else if ( $type == "rekap" ) {

                        $img = '<svg id="aa148906-9946-4a00-bfdb-f78e96a2b6cd" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" style="width: 150px" viewBox="0 0 848.67538 469.44265"><path d="M612.36555,682.31865a207.53414,207.53414,0,0,1-40.54,1.96c-32.66016-1.65-64.78027-11.15-92.23-29.01-12.17041-7.92-23.78027-17.65-30.08008-30.72-8.55029-17.75-5.56006-40.22,6.6499-55.68a56.01494,56.01494,0,0,1,16.14014-13.77c.91992-.52,1.85986-1.02,2.81006-1.5a60.55749,60.55749,0,0,1,33.48-6.13c19.57959,2.14,37.6499,14.1,48.08984,30.81,9.29981,14.9,12.54,32.48,14.4502,50.1.35986,3.32.66992,6.65.96973,9.96a146.37967,146.37967,0,0,1-7.81006,28.06,9.81128,9.81128,0,0,0-.43994,1.36q3,6.51,5.71,13.14a11.55657,11.55657,0,0,0,5.53027,1.4h37.18994Z" transform="translate(-175.66231 -215.27867)" fill="#f2f2f2"/><path d="M568.79524,683.16869a2.03341,2.03341,0,0,1-2.69971-1.06c-.16016-.38-.31006-.76-.47021-1.14q-2.15992-5.25-4.52979-10.4a316.78429,316.78429,0,0,0-88.17041-114.1,1.47787,1.47787,0,0,1-.61963-1.37,2.03241,2.03241,0,0,1,2.81006-1.5,1.92729,1.92729,0,0,1,.41992.26,317.52029,317.52029,0,0,1,44.25977,43.95,322.504,322.504,0,0,1,34.91015,51.66q4.06494,7.5,7.71973,15.21c.48047,1.02.96045,2.05,1.43018,3.07995q3,6.51,5.71,13.14c.03027.07.06006.15.09033.22A1.47968,1.47968,0,0,1,568.79524,683.16869Z" transform="translate(-175.66231 -215.27867)" fill="#fff"/><circle cx="260.50305" cy="297" r="39" fill="#f9a826"/><path d="M432.29956,527.15627a4.04474,4.04474,0,0,1-2.43372-.80842l-.04353-.03268-9.16526-7.01725a4.07192,4.07192,0,1,1,4.95308-6.46445l5.93657,4.55208,14.029-18.29592a4.07178,4.07178,0,0,1,5.709-.75362l-.08723.11844.08949-.11671a4.07649,4.07649,0,0,1,.75362,5.709l-16.50151,21.52039A4.07356,4.07356,0,0,1,432.29956,527.15627Z" transform="translate(-175.66231 -215.27867)" fill="#fff"/><path d="M1023.147,684.72133H176.853a1.19069,1.19069,0,0,1,0-2.38137h846.294a1.19069,1.19069,0,0,1,0,2.38137Z" transform="translate(-175.66231 -215.27867)" fill="#3f3d56"/><circle cx="165.54584" cy="107.00476" r="28.93994" fill="#2f2e41"/><ellipse cx="312.2682" cy="300.329" rx="11.97515" ry="8.98136" transform="translate(-296.56574 93.49262) rotate(-45)" fill="#2f2e41"/><ellipse cx="360.35876" cy="292.78538" rx="8.98136" ry="11.97515" transform="translate(-226.11098 293.88362) rotate(-66.86956)" fill="#2f2e41"/><path d="M421.79385,489.36573A10.74265,10.74265,0,0,0,415.541,474.126l-41.81616-88.45907L354.59693,399.08l47.1186,82.7347a10.80091,10.80091,0,0,0,20.07832,7.55106Z" transform="translate(-175.66231 -215.27867)" fill="#ffb8b8"/><path d="M383.31437,400.425l-22.20855,9.93087a4.81689,4.81689,0,0,1-6.60409-3.09631l-6.54916-23.35317a13.37737,13.37737,0,0,1,24.45588-10.84991l13.00137,20.38209a4.81688,4.81688,0,0,1-2.09545,6.98643Z" transform="translate(-175.66231 -215.27867)" fill="#ccc"/><path d="M280.74681,498.1357a10.74271,10.74271,0,0,0,7.44458-14.69441l39.60233-89.47208-22.65457-5.706L273.335,478.00558a10.80091,10.80091,0,0,0,7.41184,20.13012Z" transform="translate(-175.66231 -215.27867)" fill="#ffb8b8"/><polygon points="94.289 445.033 105.809 449.227 127.47 406.789 110.467 400.599 94.289 445.033" fill="#ffb8b8"/><path d="M264.972,662.26332h38.53072a0,0,0,0,1,0,0v14.88687a0,0,0,0,1,0,0H279.85884A14.88686,14.88686,0,0,1,264.972,662.26333v0A0,0,0,0,1,264.972,662.26332Z" transform="translate(146.5349 1180.96579) rotate(-159.99348)" fill="#2f2e41"/><path d="M297.20006,635.88967a4.77367,4.77367,0,0,1-2.04387-.45889l-13.23928-6.2709a4.79861,4.79861,0,0,1-2.46853-5.9897L316.81215,519.702a4.81658,4.81658,0,0,1,8.66077-.84149l19.76235,32.93709a4.82207,4.82207,0,0,1,.052,4.86807l-43.88711,76.802A4.84031,4.84031,0,0,1,297.20006,635.88967Z" transform="translate(-175.66231 -215.27867)" fill="#2f2e41"/><circle cx="166.46368" cy="113.91339" r="24.56103" fill="#ffb8b8"/><path d="M376.873,440.86165,333.385,428.9021l-23.12961-46.25868A14.576,14.576,0,0,1,323.2929,361.5488h34.59941a14.557,14.557,0,0,1,9.73013,3.72135c9.28142,8.3145,28.78088,32.2848,9.43874,75.17337Z" transform="translate(-175.66231 -215.27867)" fill="#ccc"/><path d="M322.4327,409.97074l-22.03343-10.31358a4.81687,4.81687,0,0,1-1.97428-7.02163l13.39047-20.22269a13.37737,13.37737,0,0,1,24.19805,11.41336l-6.92414,23.16293a4.81689,4.81689,0,0,1-6.65667,2.98161Z" transform="translate(-175.66231 -215.27867)" fill="#ccc"/><polygon points="173.428 456.629 185.687 456.629 191.52 409.341 173.425 409.342 173.428 456.629" fill="#ffb8b8"/><path d="M346.463,668.40445h38.53073a0,0,0,0,1,0,0v14.88687a0,0,0,0,1,0,0H361.34984A14.88686,14.88686,0,0,1,346.463,668.40447v0A0,0,0,0,1,346.463,668.40445Z" transform="translate(555.82523 1136.40041) rotate(179.99738)" fill="#2f2e41"/><path d="M353.71912,653.88805a4.79132,4.79132,0,0,1-4.69769-3.81439c-3.524-16.60391-21.82634-101.6514-36.11121-145.4588-14.53417-44.57049,10.2183-64.87171,15.32784-68.48853a3.7629,3.7629,0,0,0,1.25282-1.51258l3.7122-8.16606a4.83433,4.83433,0,0,1,4.39715-2.82656h.03006c27.82859.16621,37.184,8.93856,39.91435,12.70277a4.761,4.761,0,0,1,.75368,3.92623l-17.60768,72.64473a3.75009,3.75009,0,0,0-.07291,1.37669L378.136,646.17147a4.81781,4.81781,0,0,1-4.22284,5.42l-19.62855,2.26417A4.92263,4.92263,0,0,1,353.71912,653.88805Z" transform="translate(-175.66231 -215.27867)" fill="#2f2e41"/><path d="M316.31807,313.74325a33.40494,33.40494,0,0,0,19.09068,5.89985,20.47079,20.47079,0,0,1-8.11361,3.338,67.35875,67.35875,0,0,0,27.514.1546,17.80736,17.80736,0,0,0,5.75978-1.97824,7.28919,7.28919,0,0,0,3.55521-4.7547c.60365-3.44852-2.08348-6.58157-4.876-8.69308A35.96737,35.96737,0,0,0,329.02361,301.67c-3.37626.87272-6.75852,2.34726-8.9515,5.05866s-2.84257,6.8915-.75322,9.68353Z" transform="translate(-175.66231 -215.27867)" fill="#2f2e41"/><circle cx="591.50305" cy="192" r="13" fill="#f9a826"/><path d="M765.87676,412.23787a1.34825,1.34825,0,0,1-.81124-.26947l-.01451-.01089-3.05509-2.33909a1.3573,1.3573,0,1,1,1.651-2.15481l1.97885,1.51736,4.67635-6.09864a1.35725,1.35725,0,0,1,1.903-.25121l-.02908.03948.02983-.0389a1.35883,1.35883,0,0,1,.25121,1.903l-5.50051,7.17346A1.35784,1.35784,0,0,1,765.87676,412.23787Z" transform="translate(-175.66231 -215.27867)" fill="#fff"/><circle cx="591.50305" cy="230" r="13" fill="#f9a826"/><path d="M765.87676,450.23787a1.34825,1.34825,0,0,1-.81124-.26947l-.01451-.01089-3.05509-2.33909a1.3573,1.3573,0,1,1,1.651-2.15481l1.97885,1.51736,4.67635-6.09864a1.35725,1.35725,0,0,1,1.903-.25121l-.02908.03948.02983-.0389a1.35883,1.35883,0,0,1,.25121,1.903l-5.50051,7.17346A1.35784,1.35784,0,0,1,765.87676,450.23787Z" transform="translate(-175.66231 -215.27867)" fill="#fff"/><circle cx="598.50305" cy="274" r="13" fill="#f9a826"/><path d="M772.87676,494.23787a1.34825,1.34825,0,0,1-.81124-.26947l-.01451-.01089-3.05509-2.33909a1.3573,1.3573,0,1,1,1.651-2.15481l1.97885,1.51736,4.67635-6.09864a1.35725,1.35725,0,0,1,1.903-.25121l-.02908.03948.02983-.0389a1.35883,1.35883,0,0,1,.25121,1.903l-5.50051,7.17346A1.35784,1.35784,0,0,1,772.87676,494.23787Z" transform="translate(-175.66231 -215.27867)" fill="#fff"/><path d="M899.5214,597.81813c-.13479,0-.21961-.00349-.24924-.00523l-16.13966.00174v-2.3797h16.198c.375.01336,8.02654.22949,15.07646-8.32488,10.50588-12.74905,19.13345-44.30968.57285-122.264-24.95721-104.82061-4.14182-197.42377,5.9658-232.37211a11.60395,11.60395,0,0,0-11.16442-14.8156H668.747a11.65594,11.65594,0,0,0-9.3994,4.78438c-4.28183,5.89-10.15787,17.20518-13.8349,37.665l-2.34194-.42063c3.75663-20.90428,9.82381-32.55237,14.25205-38.64338a14.04138,14.04138,0,0,1,11.32419-5.76508H909.78124a13.984,13.984,0,0,1,13.45058,17.85646c-10.05562,34.76707-30.76324,126.88976-5.93676,231.16018,18.82147,79.05061,9.77327,111.29506-1.13117,124.42465C908.97135,597.37949,901.04648,597.81813,899.5214,597.81813Z" transform="translate(-175.66231 -215.27867)" fill="#e6e6e6"/><path d="M856.0919,641.24763c-.13479,0-.21961-.00349-.24924-.00523l-16.13965.00174v-2.3797h16.198c.37706.01162,8.02654.22949,15.07646-8.32488,10.50588-12.74905,19.13345-44.30968.57285-122.264-24.95721-104.82061-4.14182-197.42377,5.9658-232.37211a11.60395,11.60395,0,0,0-11.16442-14.8156H625.31749a11.65594,11.65594,0,0,0-9.3994,4.78438c-4.28183,5.89-10.15787,17.20518-13.83476,37.665l-2.34222-.42063c3.75677-20.90429,9.82395-32.55238,14.25219-38.64338a14.04138,14.04138,0,0,1,11.32419-5.76508H866.35174a13.984,13.984,0,0,1,13.45058,17.85646c-10.05562,34.76707-30.76324,126.88976-5.93675,231.16018,18.82146,79.05061,9.77326,111.29506-1.13117,124.42465C865.54185,640.809,857.617,641.24763,856.0919,641.24763Z" transform="translate(-175.66231 -215.27867)" fill="#ccc"/><path d="M830.43537,551.15868c-24.83007-104.27-4.12011-196.4,5.93995-231.16a13.99387,13.99387,0,0,0-13.4502-17.86H581.88557a14.03109,14.03109,0,0,0-11.32031,5.76c-9.73,13.38-29.91993,57.75-7.36963,180.52,12.05957,65.68,11.87988,110.46,7.93994,139.96-2.21045,16.61005-5.62012,28.37-8.71045,36.30005l-.32959.84a13.63942,13.63942,0,0,0-1,5.05,13.83428,13.83428,0,0,0,4.52979,10.4,13.24271,13.24271,0,0,0,3.16992,2.2,13.41211,13.41211,0,0,0,3.03027,1.11,13.67578,13.67578,0,0,0,3.27.39H812.41535c.03028,0,.10987.01.25.01,1.52,0,9.4502-.44,16.64014-9.1C840.20539,662.44866,849.2552,630.20867,830.43537,551.15868Zm-2.89013,122.81c-7.04981,8.56-14.69971,8.34-15.06983,8.33H575.09553a11.63613,11.63613,0,0,1-9.63037-5.11,11.36694,11.36694,0,0,1-1.60986-9.43,9.81128,9.81128,0,0,1,.43994-1.36,146.37967,146.37967,0,0,0,7.81006-28.06c5.64013-30.75,6.68994-78.2-6.56983-150.35-22.37988-121.86-2.58984-165.56,6.94971-178.69a11.68138,11.68138,0,0,1,9.40039-4.78H822.92512a11.60377,11.60377,0,0,1,11.16016,14.81c-10.10987,34.95-30.91993,127.56-5.96,232.38C846.68537,629.65868,838.05549,661.21868,827.54524,673.96868Z" transform="translate(-175.66231 -215.27867)" fill="#3f3d56"/><path d="M715.9248,415.679h-124.186a9.51879,9.51879,0,1,1,0-19.03758h124.186a9.51879,9.51879,0,1,1,0,19.03758Z" transform="translate(-175.66231 -215.27867)" fill="#ccc"/><path d="M715.9248,456.679h-124.186a9.51879,9.51879,0,1,1,0-19.03758h124.186a9.51879,9.51879,0,1,1,0,19.03758Z" transform="translate(-175.66231 -215.27867)" fill="#ccc"/><path d="M725.9248,498.679h-124.186a9.51879,9.51879,0,1,1,0-19.03758h124.186a9.51879,9.51879,0,1,1,0,19.03758Z" transform="translate(-175.66231 -215.27867)" fill="#ccc"/><path d="M732.9248,542.679h-124.186a9.51879,9.51879,0,1,1,0-19.03758h124.186a9.51879,9.51879,0,1,1,0,19.03758Z" transform="translate(-175.66231 -215.27867)" fill="#ccc"/><path d="M732.97746,341.76923h-89.2387a9.5188,9.5188,0,1,1,0-19.03759h89.2387a9.51879,9.51879,0,1,1,0,19.03759Z" transform="translate(-175.66231 -215.27867)" fill="#f9a826"/><circle cx="606.50305" cy="317.88152" r="13" fill="#ccc"/><path d="M738.9248,585.679h-124.186a9.51879,9.51879,0,1,1,0-19.03758h124.186a9.51879,9.51879,0,1,1,0,19.03758Z" transform="translate(-175.66231 -215.27867)" fill="#ccc"/><circle cx="612.50305" cy="360.88152" r="13" fill="#ccc"/></svg>';
                    } else if ($type == "pdf" ) {

                        $img = '<?xml version="1.0" encoding="iso-8859-1"?>
                        <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                        <svg version="1.1" style="width: 30px;" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                        <path style="fill:#E2E5E7;" d="M128,0c-17.6,0-32,14.4-32,32v448c0,17.6,14.4,32,32,32h320c17.6,0,32-14.4,32-32V128L352,0H128z"/>
                        <path style="fill:#B0B7BD;" d="M384,128h96L352,0v96C352,113.6,366.4,128,384,128z"/>
                        <polygon style="fill:#CAD1D8;" points="480,224 384,128 480,128 "/>
                        <path style="fill:#F15642;" d="M416,416c0,8.8-7.2,16-16,16H48c-8.8,0-16-7.2-16-16V256c0-8.8,7.2-16,16-16h352c8.8,0,16,7.2,16,16
                            V416z"/>
                        <g>
                            <path style="fill:#FFFFFF;" d="M101.744,303.152c0-4.224,3.328-8.832,8.688-8.832h29.552c16.64,0,31.616,11.136,31.616,32.48
                                c0,20.224-14.976,31.488-31.616,31.488h-21.36v16.896c0,5.632-3.584,8.816-8.192,8.816c-4.224,0-8.688-3.184-8.688-8.816V303.152z
                                 M118.624,310.432v31.872h21.36c8.576,0,15.36-7.568,15.36-15.504c0-8.944-6.784-16.368-15.36-16.368H118.624z"/>
                            <path style="fill:#FFFFFF;" d="M196.656,384c-4.224,0-8.832-2.304-8.832-7.92v-72.672c0-4.592,4.608-7.936,8.832-7.936h29.296
                                c58.464,0,57.184,88.528,1.152,88.528H196.656z M204.72,311.088V368.4h21.232c34.544,0,36.08-57.312,0-57.312H204.72z"/>
                            <path style="fill:#FFFFFF;" d="M303.872,312.112v20.336h32.624c4.608,0,9.216,4.608,9.216,9.072c0,4.224-4.608,7.68-9.216,7.68
                                h-32.624v26.864c0,4.48-3.184,7.92-7.664,7.92c-5.632,0-9.072-3.44-9.072-7.92v-72.672c0-4.592,3.456-7.936,9.072-7.936h44.912
                                c5.632,0,8.96,3.344,8.96,7.936c0,4.096-3.328,8.704-8.96,8.704h-37.248V312.112z"/>
                        </g>
                        <path style="fill:#CAD1D8;" d="M400,432H96v16h304c8.8,0,16-7.2,16-16v-16C416,424.8,408.8,432,400,432z"/><g></g><g></g><g></g><g></g><g></g><g>
                        </g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>';
                    } else if ( $type == "xls" ) {

                        $img = '<?xml version="1.0" encoding="iso-8859-1"?>
                        <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                        <svg version="1.1" style="width: 30px;" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                        <path style="fill:#E2E5E7;" d="M128,0c-17.6,0-32,14.4-32,32v448c0,17.6,14.4,32,32,32h320c17.6,0,32-14.4,32-32V128L352,0H128z"/>
                        <path style="fill:#B0B7BD;" d="M384,128h96L352,0v96C352,113.6,366.4,128,384,128z"/>
                        <polygon style="fill:#CAD1D8;" points="480,224 384,128 480,128 "/>
                        <path style="fill:#84BD5A;" d="M416,416c0,8.8-7.2,16-16,16H48c-8.8,0-16-7.2-16-16V256c0-8.8,7.2-16,16-16h352c8.8,0,16,7.2,16,16
                            V416z"/>
                        <g>
                            <path style="fill:#FFFFFF;" d="M144.336,326.192l22.256-27.888c6.656-8.704,19.584,2.416,12.288,10.736
                                c-7.664,9.088-15.728,18.944-23.408,29.04l26.096,32.496c7.04,9.6-7.024,18.8-13.936,9.328l-23.552-30.192l-23.152,30.848
                                c-6.528,9.328-20.992-1.152-13.696-9.856l25.712-32.624c-8.064-10.112-15.872-19.952-23.664-29.04
                                c-8.048-9.6,6.912-19.44,12.8-10.464L144.336,326.192z"/>
                            <path style="fill:#FFFFFF;" d="M197.36,303.152c0-4.224,3.584-7.808,8.064-7.808c4.096,0,7.552,3.6,7.552,7.808v64.096h34.8
                                c12.528,0,12.8,16.752,0,16.752H205.44c-4.48,0-8.064-3.184-8.064-7.792v-73.056H197.36z"/>
                            <path style="fill:#FFFFFF;" d="M272.032,314.672c2.944-24.832,40.416-29.296,58.08-15.728c8.704,7.024-0.512,18.16-8.192,12.528
                                c-9.472-6-30.96-8.816-33.648,4.464c-3.456,20.992,52.192,8.976,51.296,43.008c-0.896,32.496-47.968,33.248-65.632,18.672
                                c-4.24-3.456-4.096-9.072-1.792-12.544c3.328-3.312,7.024-4.464,11.392-0.88c10.48,7.152,37.488,12.528,39.392-5.648
                                C321.28,339.632,268.064,351.008,272.032,314.672z"/>
                        </g>
                        <path style="fill:#CAD1D8;" d="M400,432H96v16h304c8.8,0,16-7.2,16-16v-16C416,424.8,408.8,432,400,432z"/><g></g><g></g><g></g><g></g><g></g><g></g>
                        <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>';
                    }

                    return $img;
                }
            
            ?>




            