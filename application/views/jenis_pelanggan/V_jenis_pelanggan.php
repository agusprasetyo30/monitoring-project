<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <div class="pad-all text-center">
                        <h3>MASTER JENIS PELANGGAN</h3>
                        <p1>Data master domisili penagihan piutang</p>
                    </div>
                </div>

                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">

                <!DOCTYPE html>
<html>
<head>
    <!-- Load file CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Load file library jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Load file library Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Load file library JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class='container'>
    
        <table class="table table-bordered">
        <button type="button" id="btn-tambah" data-toggle="modal" data-target="#form-modal" class="btn btn-success pull-left">
            <span class="glyphicon glyphicon-plus"></span>  Tambah Data
        </button>
        <br><br><br>

        <!-- <a href="<?php echo base_url()?>mahasiswa/tambah" class="btn btn-primary demo-pli-plus" role="button">Tambah Data</a> -->
            <thead>
                <tr>
                    <th> No</th> <th>Nama Jenis</th> <th>Dibuat tanggal</th> <th colspan='3'>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no=1;

               
                ?>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo "Piutang";?></td>
                    <td><?php echo "28/02/2021 22:50";?></td>

                    <td>

                    <a href="#" class="btn btn-warning btn-lg">
                    <span class="glyphicon glyphicon-pencil"></span> Update
                    </a>

                    <a href="#" class="btn btn-danger btn-lg">
                    <span class="glyphicon glyphicon-trash"></span> Delete 
                    </a>

                    </td>
          
                    <!-- <td> <a href="#" class="btn btn-warning" role="button">Update</a> <a href="#" class="btn btn-danger" role="button">Delete</a></td> -->
                   
                </tr>
                <?php
                        $no++;
                
                 ?>
            </tbody>
        </table>
        
    </div>
</body>
</html>

                </div>
            </div>