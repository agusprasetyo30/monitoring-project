<?php 


    require('./vendor/autoload.php');

    use PhpOffice\PhpSpreadsheet\Helper\Sample;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Data_pelanggan extends CI_Controller {

        
        public function __construct()
        {
            parent::__construct();
            //Do your magic here

            
            // load 
            $this->load->model('M_data_pelanggan');
            $this->load->model('M_domisili');
         
        }
        
        public function index()
        {

              // data pelanggan (get all)
              $dataPelanggan = $this->M_data_pelanggan->getDataTable( null, 'data_pelanggan' );

            $data = array(

                'folder'    => "data_pelanggan",
                'view'      => "V_data_pelanggan",

                // variable data
                'data_pelanggan'  => $dataPelanggan,
            );
            $this->load->view('template/template_backend', $data);
        }

        function tambahPelanggan(){
            $data = array(

                'folder'    => "data_pelanggan",
                'view'      => "V_add_pelanggan"
            );
           
        
            $data['master_domisili'] = $this->M_domisili->getDataTable(null, 'master_domisili')->result_array();
            $data['master_subdomisili'] = $this->M_domisili->getDataTable(null, 'master_subdomisili')->result_array();
            // var_dump($data);
            // die();
            $this->load->view('template/template_backend', $data);
        }
        
        // proses tambah pelanggan
        function prosesTambahPelanggan() {
       
            $this->M_data_pelanggan->insertDataPelanggan();
        }

        function editPelanggan($id_pelanggan){

            $data = array(

                'folder'    => "data_pelanggan",
                'view'      => "V_edit_pelanggan"
            );

           
            $data['hasil'] = $this->M_data_pelanggan->getDataTable( $id_pelanggan, 'data_pelanggan' )->result_array()[0];
            $data['master_domisili'] = $this->M_domisili->getDataTable(null, 'master_domisili')->result_array();
            $data['master_subdomisili'] = $this->M_domisili->getDataTable(null, 'master_subdomisili')->result_array();
            // var_dump($data);
            // die();
            $this->load->view('template/template_backend', $data);


        }

        function prosesEditPelanggan($id_pelanggan) {
       
            $this->M_data_pelanggan->editDataPelanggan($id_pelanggan);
        }

        function prosesHapusPelanggan( $id_pelanggan)  {
            // var_dump($this->M_data_pelanggan);
            // die();
            $this->M_data_pelanggan->deleteDataPelanggan( $id_pelanggan );
        }

        function importData(){
            $data = array(

                'folder'    => "data_piutang",
                'view'      => "V_import_excel",

                // variable data
            );
            $data['master_domisili'] = $this->M_domisili->getDataTable(null, 'master_domisili')->result_array();
            $this->load->view('template/template_backend', $data);
        }



        // import excel
        function importPelanggan() {

            $file_excel = $this->M_data_pelanggan->prosesInsertDataExcel();

            // Create new Spreadsheet object
            $spreadsheet = new Spreadsheet();
            $direktori = './assets/excel/'. $file_excel;


            /** Load $inputFileName to a Spreadsheet Object  **/
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($direktori);

            $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true ,true);

            $dataPelanggan = array();
            $dataPiutang = array();


            


            $baris = 6;  // start mulai kolom ke 6
            // foreach ( $sheet AS $row ) {

            //     echo $spreadsheet->getActiveSheet()->getCell('A'. $baris)->getValue();
            //     echo '<hr>';
            //     $baris++;
            // }
            
            // ambil tahun
            $dataTahun = $spreadsheet->getActiveSheet()->getCell('A2')->getValue();
            $tahun = explode('-', $dataTahun);
            $tahun  = $tahun[1];
            

            if ( count($sheet) >= 6 ) {
            
            
                for ( $baris = 6; $baris <= count($sheet); $baris++ ) {

                    // atribut
                    $no_ref = $spreadsheet->getActiveSheet()->getCell('B'.$baris)->getValue();

                    // hiangkan petik
                    $no_ref = substr( $no_ref, 1 );
                    
                    if ( !empty($no_ref) || strlen($no_ref) > 0 ) {
                    
                    
                        $nama   = $spreadsheet->getActiveSheet()->getCell('C'.$baris)->getFormattedValue();
                        $alamat = $spreadsheet->getActiveSheet()->getCell('D'.$baris)->getFormattedValue();
                        $kode_buku = $spreadsheet->getActiveSheet()->getCell('E'.$baris)->getFormattedValue();


                        foreach( range( 'f', 'q' ) as $alphabet ) {

                            // penentuan bulan
                            $nama_bulan = "";
                            switch( $alphabet ) {

                                case 'f':
                                    $nama_bulan = "January";
                                    break;
                                case 'g':
                                    $nama_bulan = "February";
                                    break;
                                case 'h':
                                    $nama_bulan = "March";
                                    break;
                                case 'i':
                                    $nama_bulan = "April";
                                    break;
                                case 'j':
                                    $nama_bulan = "May";
                                    break;
                                case 'k':
                                    $nama_bulan = "June";
                                    break;
                                case 'l':
                                    $nama_bulan = "July";
                                    break;
                                case 'm':
                                    $nama_bulan = "August";
                                    break;
                                case 'n':
                                    $nama_bulan = "September";
                                    break;
                                case 'o':
                                    $nama_bulan = "October";
                                    break;
                                case 'p':
                                    $nama_bulan = "November";
                                    break;
                                case 'q':
                                    $nama_bulan = "December";
                                    break;
                            }

                            $nominal = $spreadsheet->getActiveSheet()->getCell( $alphabet . $baris)->getValue();

                            if ( (strlen($nominal) > 0) || !empty( $nominal ) ) {


                                array_push( $dataPiutang, array(
            
                                    'no_ref'    => $no_ref,
                                    'tahun'     => $tahun,
                                    'bulan'     => $nama_bulan,
                                    'nominal'   => $nominal,
                                    'keterangan'=> $spreadsheet->getActiveSheet()->getCell( 'T' . $baris)->getValue(),
                                    'alasan'    => $spreadsheet->getActiveSheet()->getCell( 'U' . $baris)->getValue(),
                                ) );
                            }
                        }




                        // melengkapi identitas data pelanggan
                        $where = ['kode_wilayah'    => $kode_buku];
                        $table = "master_subdomisili";
                        $getInformasiSubDomisilyByKodeBuku = $this->M_domisili->getDataTable( $where, $table );

                        $id_domisili = null;
                        $id_subdomisili = null;

                        if ( $getInformasiSubDomisilyByKodeBuku->num_rows() == 1 ) {

                            $kolom = $getInformasiSubDomisilyByKodeBuku->row_array();

                            $id_domisili = $kolom['id_domisili'];
                            $id_subdomisili = $kolom['id_subdomisili'];
                        }

                        array_push( $dataPelanggan, array(

                            'no_ref'        => $no_ref,
                            'nama'          => $nama,
                            'alamat'        => $alamat,
                            'pencabutan'    => "tidak",
                            'tanggal_pencabutan' => null,
                            'id_domisili'        => $id_domisili,
                            'id_subdomisili'     => $id_subdomisili
                        ) );

                        // end identitas data pelanggan

                    }

                }



                // eksekusi insert
                $this->M_data_pelanggan->importExcelDataPelanggan( $dataPelanggan, $dataPiutang, $tahun );
                
                
                // set flashdata
                $this->session->set_flashdata('msg', 'tambah');
                redirect('data_pelanggan');

            } else {


                echo "Excel kosong";
            }



            
            
        }




        // proses cetak excel 
        function exportFormatExcel() {


            $tahun = $this->input->post('tahun');
            $tahun_singkat = substr($tahun, -2);

            $domisili = $this->input->post('domisili');

            // Create new Spreadsheet object
            $spreadsheet = new Spreadsheet();

            // Set document properties
            $spreadsheet->getProperties()->setCreator('AE Monitoring')
                        ->setLastModifiedBy('Hayoloo')
                        ->setTitle('Office 2007 XLSX Test Document')
                        ->setSubject('Office 2007 XLSX Test Document')
                        ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
                        ->setKeywords('office 2007 openxml php')
                        ->setCategory('Test result file');



            // Header Wilayah
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', 'LAPORAN DAFTAR PIUTANG '. strtoupper($domisili));
            $spreadsheet->getActiveSheet()->mergeCells('A1:M1');
            $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true); // set bold
            $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(14); // set font



            // Header tahun
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('A2', 'Pada Tahun - '. $tahun);
            $spreadsheet->getActiveSheet()->mergeCells('A2:M2');
            $spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setBold(true); // set bold
            $spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setSize(12); // set font



            // Table 
            $style_col = array(
                'font' => array('bold' => true), // Set font nya jadi bold
                'alignment'      => array(
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                        'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                    ),
                'borders' => array(
                    'top'   => array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom'=> array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left'  => array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );


            // nomor
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('A5', 'NO');
            $spreadsheet->getActiveSheet()->getStyle('A5')->getFont()->setSize(12); // set font
            $spreadsheet->getActiveSheet()->getStyle('A5')->applyFromArray($style_col);

            
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('B5', 'NOMOR REF');
            $spreadsheet->getActiveSheet()->getStyle('B5')->getFont()->setSize(12); // set font
            $spreadsheet->getActiveSheet()->getStyle('B5')->applyFromArray($style_col);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(20); // Set width kolom C

            
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('C5', 'NAMA');
            $spreadsheet->getActiveSheet()->getStyle('C5')->getFont()->setSize(12); // set font
            $spreadsheet->getActiveSheet()->getStyle('C5')->applyFromArray($style_col);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
            
            
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('D5', 'ALAMAT');
            $spreadsheet->getActiveSheet()->getStyle('D5')->getFont()->setSize(12); // set font
            $spreadsheet->getActiveSheet()->getStyle('D5')->applyFromArray($style_col);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(40); // Set width kolom C
            
            
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('E5', 'BUKU');
            $spreadsheet->getActiveSheet()->getStyle('E5')->getFont()->setSize(12); // set font
            $spreadsheet->getActiveSheet()->getStyle('E5')->applyFromArray($style_col);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(10); // Set width kolom C
            
            
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('F5', 'JAN-'. $tahun_singkat);
            $spreadsheet->getActiveSheet()->getStyle('F5')->getFont()->setSize(12); // set font
            $spreadsheet->getActiveSheet()->getStyle('F5')->applyFromArray($style_col);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(15); // Set width kolom C
            
            
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('G5', 'FEB-'. $tahun_singkat);
            $spreadsheet->getActiveSheet()->getStyle('G5')->getFont()->setSize(12); // set font
            $spreadsheet->getActiveSheet()->getStyle('G5')->applyFromArray($style_col);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(15); // Set width kolom C
            
            
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('H5', 'MAR-'. $tahun_singkat);
            $spreadsheet->getActiveSheet()->getStyle('H5')->getFont()->setSize(12); // set font
            $spreadsheet->getActiveSheet()->getStyle('H5')->applyFromArray($style_col);
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(15); // Set width kolom C
            
            
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('I5', 'APR-'. $tahun_singkat);
            $spreadsheet->getActiveSheet()->getStyle('I5')->getFont()->setSize(12); // set font
            $spreadsheet->getActiveSheet()->getStyle('I5')->applyFromArray($style_col);
            $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(15); // Set width kolom C
            
            
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('J5', 'MEI-'. $tahun_singkat);
            $spreadsheet->getActiveSheet()->getStyle('J5')->getFont()->setSize(12); // set font
            $spreadsheet->getActiveSheet()->getStyle('J5')->applyFromArray($style_col);
            $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(15); // Set width kolom C
            
            
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('K5', 'JUNI-'. $tahun_singkat);
            $spreadsheet->getActiveSheet()->getStyle('K5')->getFont()->setSize(12); // set font
            $spreadsheet->getActiveSheet()->getStyle('K5')->applyFromArray($style_col);
            $spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(15); // Set width kolom C
            
            
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('L5', 'JULI-'. $tahun_singkat);
            $spreadsheet->getActiveSheet()->getStyle('L5')->getFont()->setSize(12); // set font
            $spreadsheet->getActiveSheet()->getStyle('L5')->applyFromArray($style_col);
            $spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(15); // Set width kolom C

            
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('M5', 'AGS-'. $tahun_singkat);
            $spreadsheet->getActiveSheet()->getStyle('M5')->getFont()->setSize(12); // set font
            $spreadsheet->getActiveSheet()->getStyle('M5')->applyFromArray($style_col);
            $spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(15); // Set width kolom C
            
            
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('N5', 'SEPT-'. $tahun_singkat);
            $spreadsheet->getActiveSheet()->getStyle('N5')->getFont()->setSize(12); // set font
            $spreadsheet->getActiveSheet()->getStyle('N5')->applyFromArray($style_col);
            $spreadsheet->getActiveSheet()->getColumnDimension('N')->setWidth(15); // Set width kolom C
            
            
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('O5', 'OKT-'. $tahun_singkat);
            $spreadsheet->getActiveSheet()->getStyle('O5')->getFont()->setSize(12); // set font
            $spreadsheet->getActiveSheet()->getStyle('O5')->applyFromArray($style_col);
            $spreadsheet->getActiveSheet()->getColumnDimension('O')->setWidth(15); // Set width kolom C
            
            
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('P5', 'NOV-'. $tahun_singkat);
            $spreadsheet->getActiveSheet()->getStyle('P5')->getFont()->setSize(12); // set font
            $spreadsheet->getActiveSheet()->getStyle('P5')->applyFromArray($style_col);
            $spreadsheet->getActiveSheet()->getColumnDimension('P')->setWidth(15); // Set width kolom C
            
            
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('Q5', 'DES-'. $tahun_singkat);
            $spreadsheet->getActiveSheet()->getStyle('Q5')->getFont()->setSize(12); // set font
            $spreadsheet->getActiveSheet()->getStyle('Q5')->applyFromArray($style_col);
            $spreadsheet->getActiveSheet()->getColumnDimension('Q')->setWidth(15); // Set width kolom C



            $spreadsheet->setActiveSheetIndex(0)->setCellValue('R5', 'GRAND TOTAL');
            $spreadsheet->getActiveSheet()->getStyle('R5')->getFont()->setSize(12); // set font
            $spreadsheet->getActiveSheet()->getStyle('R5')->applyFromArray($style_col);
            $spreadsheet->getActiveSheet()->getColumnDimension('R')->setWidth(18); // Set width kolom C


            $spreadsheet->setActiveSheetIndex(0)->setCellValue('S5', 'LAMA PIUTANG');
            $spreadsheet->getActiveSheet()->getStyle('S5')->getFont()->setSize(12); // set font
            $spreadsheet->getActiveSheet()->getStyle('S5')->applyFromArray($style_col);
            $spreadsheet->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);


            $spreadsheet->setActiveSheetIndex(0)->setCellValue('T5', 'KETERANGAN');
            $spreadsheet->getActiveSheet()->getStyle('T5')->getFont()->setSize(12); // set font
            $spreadsheet->getActiveSheet()->getStyle('T5')->applyFromArray($style_col);
            $spreadsheet->getActiveSheet()->getColumnDimension('T')->setWidth(20); // Set width kolom C



            $spreadsheet->setActiveSheetIndex(0)->setCellValue('U5', 'ALASAN');
            $spreadsheet->getActiveSheet()->getStyle('U5')->getFont()->setSize(12); // set font
            $spreadsheet->getActiveSheet()->getStyle('U5')->applyFromArray($style_col);
            $spreadsheet->getActiveSheet()->getColumnDimension('U')->setWidth(20); // Set width kolom C

            















            // Rename worksheet
            $spreadsheet->getActiveSheet()->setTitle('Report Excel '.date('d-m-Y H'));

            // Set active sheet index to the first sheet, so Excel opens this as the first sheet
            $spreadsheet->setActiveSheetIndex(0);

            // Redirect output to a client’s web browser (Xlsx)
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="RPRT-'.strtoupper($domisili).'-'.$tahun.'.xlsx"');
            header('Cache-Control: max-age=0');
            // If you're serving to IE 9, then the following may be needed
            header('Cache-Control: max-age=1');

            // If you're serving to IE over SSL, then the following may be needed
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
            header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header('Pragma: public'); // HTTP/1.0

            $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
            $writer->save('php://output');
            exit;
        }

    }
    
    /* End of file Data_pelanggan.php */
    

?>