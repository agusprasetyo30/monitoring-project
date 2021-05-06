<?php 

    
    require('./vendor/autoload.php');

    use PhpOffice\PhpSpreadsheet\Helper\Sample;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;


    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Laporan extends CI_Controller {
        
        function __construct() {

            parent::__construct();

            // load 
            $this->load->library('pdf');

            $this->load->model('M_laporan');
            $this->load->model('M_domisili');
        
        }

        public function index(){

            // data jenis_pelanggan (get all)
          
            
            $data = array(

                'folder'    => "report",
                'view'      => "V_laporan.php",

            );

            $data['master_domisili'] = $this->M_domisili->getDataTable(null, 'master_domisili')->result_array();
            $this->load->view('template/template_backend', $data);
        }







        // export pengguna
        function exportpengguna() {


            $jabatan =  $this->input->get('jabatan');

            // 1. type
            $dataProfile = array();

            $ambilDataPengguna = $this->M_laporan->getAllPengguna();
            
            $berdasarkan = "";

            if ( $ambilDataPengguna->num_rows() > 0 ) {

                foreach ( $ambilDataPengguna->result_array() AS $rowPengguna )  {

                    if ( $jabatan == "all" ) {

                        array_push( $dataProfile, $rowPengguna );
                        $berdasarkan = "Menampilkan Keseluruhan Akun Pengguna";
                    } else if ( $rowPengguna['jabatan'] == $jabatan ) {

                        array_push( $dataProfile, $rowPengguna );
                        
                        $txtJabatan = explode("_", $jabatan); // hilangkan underscore misal petugas_lapangan menjadi petugas lapangan
                        $berdasarkan = "Menampilkan Pengguna Berdasarkan ". ucwords( implode(" ", $txtJabatan) );

                    }
                }
            }

            
            $sub_header = "";
            $specific = false;
        


            // header attribute
            $name_file = 'RPRT_ACCOUNT'.rand(1, 999999).'-'.date('Y-m-d');
            $pdf = $this->header_attr( $name_file );

            // add a page
            $pdf->AddPage('P', 'A4');


            // Sub header
            // $pdf->Ln(5, false);
            $html = '<table border="0">
                <tr>
                    <td align="center"><h2>LAPORAN PEGAWAI KANTOR</h2></td>
                </tr>
                <tr>
                    <td align="center"><h3>'.$berdasarkan.'</h3></td>
                </tr>
            </table>';

            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->Ln(5, false);


            // table body
            $table_body = "";
            $i = 0; foreach ( $dataProfile AS $rowReq ) {

                $jabatan = "";
                if ( $rowReq['level'] != "superadmin" ) {

                    if ( $rowReq['level'] == "admin" ) {

                        $jabatan = "Manajer";
                    } else {

                        if ( $rowReq['jabatan'] == "petugas_lapangan" ) {

                            $jabatan = "Petugas Lapangan";
                        } else {

                            $jabatan = "Pegawai Kantor";
                        }
                    }
                }

                $table_body .= '<tr>
                    <td align="center">'.($i + 1).'</td>
                    <td>'.$rowReq['name'].'</td>
                    <td>'.ucfirst($rowReq['wilayah_penugasan']).'</td>
                    <td>'.$rowReq['telp'].'</td>
                    <td>'.$rowReq['email'].'</td>
                    <td>'.$jabatan.'</td>
                </tr>';

                $i++;
            }
            
            

            // header table
            $table = '
                <table border="1" width="100%" cellpadding="6">
                    <tr>
                        <th width="5%" height="20" padding="5" align="center"><b>No</b></th>
                        <th width="30%" align="center"><b>Nama Lengkap</b></th>
                        <th width="10%" align="center"><b>Penugasan</b></th>
                        <th width="20%" align="center"><b>Telepon</b></th>
                        <th width="20%" align="center"><b>Email</b></th>
                        <th width="15%" align="center"><b>Jabatan</b></th>
                    </tr>
                    '.$table_body.'
                </table>';

            $pdf->writeHTML($table, true, false, true, false, '');



            $pdf->Ln(10, false);
            $ttd = '
                <table border="0">
                    <tr>
                        <td colspan="2" align="right">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.date('Y').'</td>
                    </tr>
                    <tr>
                        <td colspan="2" height="80"></td>
                    </tr>
                    <tr>
                        <td width="75%"></td>
                        <td width="20%" align="center">(. . . . . . . . . . . . . . . . .)</td>
                    </tr>
                </table>
            ';

            $pdf->writeHTML($ttd, true, false, true, false, '');


            // output
            $pdf->Output($name_file.'.pdf', 'I');

        }



        function exportpelangganPDF() {
            

            $pencabutan = $this->M_laporan->getAllPelangganCabut();

    
            $dataCabut = array();

            if ( $pencabutan->num_rows() > 0 ) {

                foreach ( $pencabutan->result_array() AS $rowCabut )  {

    
                        array_push( $dataCabut, $rowCabut );
                    
            

                    }
                }
            

            
            $sub_header = "";
            $specific = false;
        


            // header attribute
            $name_file = 'RPRT_ACCOUNT'.rand(1, 999999).'-'.date('Y-m-d');
            $pdf = $this->header_attr( $name_file );

            // add a page
            $pdf->AddPage('P', 'A4');


            // Sub header
            // $pdf->Ln(5, false);
            $html = '<table border="0">
                <tr>
                    <td align="center"><h2>LAPORAN PENAGIHAN PIUTANG</h2></td>
                
                </tr>
        
            
            </table>';

            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->Ln(5, false);


            // table body
            $table_body = "";
            $i = 0; foreach ( $dataCabut AS $rowCabut ) {


                $table_body .= '<tr>
                    <td align="center">'.($i + 1).'</td>
                    <td>'.$rowCabut['no_ref'].'</td>
                    <td>'.$rowCabut['nama'].'</td>
                    <td>'.$rowCabut['alamat'].'</td>
                    <td>'.$rowCabut['tanggal_pencabutan'].'</td>
                
                </tr>';

                $i++;
            }
            
            

            // header table
            $table = '
                <table border="1" width="100%" cellpadding="6">
                    <tr>
                        <th width="5%" height="20" padding="5" align="center"><b>No</b></th>
                        <th width="30%" align="center"><b>No.Reff</b></th>
                        <th width="10%" align="center"><b>Nama</b></th>
                        <th width="20%" align="center"><b>Alamat</b></th>
                        <th width="20%" align="center"><b>Tanggal Pencabutan</b></th>
                
                    </tr>
                    '.$table_body.'
                </table>';

            $pdf->writeHTML($table, true, false, true, false, '');



            $pdf->Ln(10, false);
            $ttd = '
                <table border="0">
                    <tr>
                        <td colspan="2" align="right">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.date('Y').'</td>
                    </tr>
                    <tr>
                        <td colspan="2" height="80"></td>
                    </tr>
                    <tr>
                        <td width="75%"></td>
                        <td width="20%" align="center">(. . . . . . . . . . . . . . . . .)</td>
                    </tr>
                </table>
            ';

            $pdf->writeHTML($ttd, true, false, true, false, '');


            // output
            $pdf->Output($name_file.'.pdf', 'I');

        }




        function exportPencabutanExcel() {
            $tahun      = $this->input->get('tahun');
            $domisili   = explode('-', $this->input->get('domisili'));
            // memastikan bahwa format domisili valid
            if ( count( $domisili ) != 2 ) show_404();
            

            $kondisi = "master_domisili.id_domisili = '$domisili[0]'";
            
            $pencabutan = $this->M_laporan->getAllPelangganCabut();
 

            $tahun_singkat = substr($tahun, -2);

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
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', 'LAPORAN DAFTAR PENCABUTAN '. strtoupper($domisili[1]));
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
                    // 'top'   => array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN), // Set border top dengan garis tipis
                    // 'right' => array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN),  // Set border right dengan garis tipis
                    // 'bottom'=> array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    // 'left'  => array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );


            $style_angka = array(
                'font' => array('bold' => false, 'size' => 11), // Set font nya jadi bold
                'alignment'      => array(
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                        'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                    ),
                'borders' => array(
                    // 'top'   => array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN), // Set border top dengan garis tipis
                    // 'right' => array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom'=> array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    // 'left'  => array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );


            $style_huruf = array(
                'font' => array('bold' => false, 'size' => 11), // Set font nya jadi bold
                'alignment'      => array(
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, // Set text jadi ditengah secara horizontal (center)
                        'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                    ),
                'borders' => array(
                    // 'top'   => array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN), // Set border top dengan garis tipis
                    // 'right' => array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom'=> array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    // 'left'  => array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );


            $spreadsheet->getActiveSheet()->getStyle('A5:U5')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
            $spreadsheet->getActiveSheet()->getStyle('A5:U5')->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setARGB('609cd4');

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
            

            $spreadsheet->setActiveSheetIndex(0)->setCellValue('F5', 'GRAND TOTAL');
            $spreadsheet->getActiveSheet()->getStyle('F5')->getFont()->setSize(12); // set font
            $spreadsheet->getActiveSheet()->getStyle('F5')->applyFromArray($style_col);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom C


            $spreadsheet->setActiveSheetIndex(0)->setCellValue('G5', 'LAMA PIUTANG');
            $spreadsheet->getActiveSheet()->getStyle('G5')->getFont()->setSize(12); // set font
            $spreadsheet->getActiveSheet()->getStyle('G5')->applyFromArray($style_col);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);


            $spreadsheet->setActiveSheetIndex(0)->setCellValue('H5', 'KETERANGAN');
            $spreadsheet->getActiveSheet()->getStyle('H5')->getFont()->setSize(12); // set font
            $spreadsheet->getActiveSheet()->getStyle('H5')->applyFromArray($style_col);
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(24); // Set width kolom C



            $spreadsheet->setActiveSheetIndex(0)->setCellValue('I5', 'ALASAN');
            $spreadsheet->getActiveSheet()->getStyle('I5')->getFont()->setSize(12); // set font
            $spreadsheet->getActiveSheet()->getStyle('I5')->applyFromArray($style_col);
            $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(24); // Set width kolom C

         

            // SET VALUE PENCABUTAN
            if ($pencabutan->num_rows() > 0 ) {

                $baris = 6;
                $urutan = 1;
                foreach ( $pencabutan AS $rowPencabutan ) {


                    $spreadsheet->setActiveSheetIndex(0)->setCellValue('A'.$baris, $urutan);
                    $spreadsheet->getActiveSheet()->getStyle('A'. $baris)->getFont()->setBold(false); // set bold
                    $spreadsheet->getActiveSheet()->getStyle('A'. $baris)->applyFromArray($style_angka);


                    // no_Ref
                    $spreadsheet->setActiveSheetIndex(0)->setCellValue('B'.$baris, "'".$rowPencabutan['informasi_detail']['no_ref']);
                    $spreadsheet->getActiveSheet()->getStyle('B'. $baris)->getFont()->setBold(false); // set bold
                    $spreadsheet->getActiveSheet()->getStyle('B'. $baris)->applyFromArray($style_huruf);


                    // nama
                    $spreadsheet->setActiveSheetIndex(0)->setCellValue('C'.$baris, $rowPencabutan['informasi_detail']['nama']);
                    $spreadsheet->getActiveSheet()->getStyle('C'. $baris)->getFont()->setBold(false); // set bold
                    $spreadsheet->getActiveSheet()->getStyle('C'. $baris)->applyFromArray($style_huruf);


                    // alamat
                    $spreadsheet->setActiveSheetIndex(0)->setCellValue('D'.$baris, $rowPencabutan['informasi_detail']['alamat']);
                    $spreadsheet->getActiveSheet()->getStyle('D'. $baris)->getFont()->setBold(false); // set bold
                    $spreadsheet->getActiveSheet()->getStyle('D'. $baris)->applyFromArray($style_huruf);



                    // kode_buku
                    $spreadsheet->setActiveSheetIndex(0)->setCellValue('E'.$baris, $rowPencabutan['informasi_detail']['kode_wilayah']);
                    $spreadsheet->getActiveSheet()->getStyle('E'. $baris)->getFont()->setBold(false); // set bold
                    $spreadsheet->getActiveSheet()->getStyle('E'. $baris)->applyFromArray($style_angka);


                    // BAGIAN PIUTANG 
                    $nominal = "";
                    $grandtotal = $row['total_tagihan'];
                    $keterangan = "";
                    $alasan     = "";

                    // grandtotal
                    $spreadsheet->setActiveSheetIndex(0)->setCellValue('F' . $baris, $grandtotal);
                    $spreadsheet->getActiveSheet()->getStyle('F' . $baris)->getFont()->setBold(false); // set bold
                    $spreadsheet->getActiveSheet()->getStyle('F' . $baris)->applyFromArray($style_angka);



                    // lama piutang
                    $lama_piutang = "";
                    if ( count( $row['informasi_piutang'] ) > 0 ) {

                        $lama_piutang = count( $row['informasi_piutang'] );
                    }

                    $spreadsheet->setActiveSheetIndex(0)->setCellValue('G' . $baris, $lama_piutang);
                    $spreadsheet->getActiveSheet()->getStyle('G' . $baris)->getFont()->setBold(false); // set bold
                    $spreadsheet->getActiveSheet()->getStyle('G' . $baris)->applyFromArray($style_angka);


                    // keterangan
                    $spreadsheet->setActiveSheetIndex(0)->setCellValue('H' . $baris, $keterangan);
                    $spreadsheet->getActiveSheet()->getStyle('H' . $baris)->getFont()->setBold(false); // set bold
                    $spreadsheet->getActiveSheet()->getStyle('H' . $baris)->applyFromArray($style_huruf);
                    
                    // alasan
                    $spreadsheet->setActiveSheetIndex(0)->setCellValue('I' . $baris, $alasan);
                    $spreadsheet->getActiveSheet()->getStyle('I' . $baris)->getFont()->setBold(false); // set bold
                    $spreadsheet->getActiveSheet()->getStyle('I' . $baris)->applyFromArray($style_huruf);


                
                    $baris++;
                    $urutan++;
                }
            }



            // Rename worksheet
            $spreadsheet->getActiveSheet()->setTitle('Report Excel '.date('d-m-Y H'));

            // Set active sheet index to the first sheet, so Excel opens this as the first sheet
            $spreadsheet->setActiveSheetIndex(0);

            // Redirect output to a client’s web browser (Xlsx)
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="RPRT-'.strtoupper($domisili[1]).'-'.$tahun.'.xlsx"');
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
    

        



        // export pelanggan with excel 
        function exportpelanggan() {

            $tahun      = $this->input->get('tahun');
            $domisili   = explode('-', $this->input->get('domisili'));
            // memastikan bahwa format domisili valid
            if ( count( $domisili ) != 2 ) show_404();
            

            $kondisi = "master_domisili.id_domisili = '$domisili[0]'";
            

            $ambilDataPelangganByTahunDomisili = $this->M_laporan->getAlldataPelanggan( $kondisi, $tahun );
            



            $tahun_singkat = substr($tahun, -2);

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
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', 'LAPORAN DAFTAR PIUTANG '. strtoupper($domisili[1]));
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
                    // 'top'   => array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN), // Set border top dengan garis tipis
                    // 'right' => array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN),  // Set border right dengan garis tipis
                    // 'bottom'=> array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    // 'left'  => array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );


            $style_angka = array(
                'font' => array('bold' => false, 'size' => 11), // Set font nya jadi bold
                'alignment'      => array(
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                        'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                    ),
                'borders' => array(
                    // 'top'   => array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN), // Set border top dengan garis tipis
                    // 'right' => array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom'=> array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    // 'left'  => array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );


            $style_huruf = array(
                'font' => array('bold' => false, 'size' => 11), // Set font nya jadi bold
                'alignment'      => array(
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, // Set text jadi ditengah secara horizontal (center)
                        'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                    ),
                'borders' => array(
                    // 'top'   => array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN), // Set border top dengan garis tipis
                    // 'right' => array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom'=> array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    // 'left'  => array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );


            $spreadsheet->getActiveSheet()->getStyle('A5:U5')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
            $spreadsheet->getActiveSheet()->getStyle('A5:U5')->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setARGB('609cd4');

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
            $spreadsheet->getActiveSheet()->getColumnDimension('R')->setWidth(20); // Set width kolom C


            $spreadsheet->setActiveSheetIndex(0)->setCellValue('S5', 'LAMA PIUTANG');
            $spreadsheet->getActiveSheet()->getStyle('S5')->getFont()->setSize(12); // set font
            $spreadsheet->getActiveSheet()->getStyle('S5')->applyFromArray($style_col);
            $spreadsheet->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);


            $spreadsheet->setActiveSheetIndex(0)->setCellValue('T5', 'KETERANGAN');
            $spreadsheet->getActiveSheet()->getStyle('T5')->getFont()->setSize(12); // set font
            $spreadsheet->getActiveSheet()->getStyle('T5')->applyFromArray($style_col);
            $spreadsheet->getActiveSheet()->getColumnDimension('T')->setWidth(24); // Set width kolom C



            $spreadsheet->setActiveSheetIndex(0)->setCellValue('U5', 'ALASAN');
            $spreadsheet->getActiveSheet()->getStyle('U5')->getFont()->setSize(12); // set font
            $spreadsheet->getActiveSheet()->getStyle('U5')->applyFromArray($style_col);
            $spreadsheet->getActiveSheet()->getColumnDimension('U')->setWidth(24); // Set width kolom C

            




            // set value atau isi data pelanggan
            if ( count($ambilDataPelangganByTahunDomisili) > 0 ) {

                $baris = 6;
                $urutan = 1;
                foreach ( $ambilDataPelangganByTahunDomisili AS $row ) {


                    $spreadsheet->setActiveSheetIndex(0)->setCellValue('A'.$baris, $urutan);
                    $spreadsheet->getActiveSheet()->getStyle('A'. $baris)->getFont()->setBold(false); // set bold
                    $spreadsheet->getActiveSheet()->getStyle('A'. $baris)->applyFromArray($style_angka);


                    // no_Ref
                    $spreadsheet->setActiveSheetIndex(0)->setCellValue('B'.$baris, "'".$row['informasi_detail']['no_ref']);
                    $spreadsheet->getActiveSheet()->getStyle('B'. $baris)->getFont()->setBold(false); // set bold
                    $spreadsheet->getActiveSheet()->getStyle('B'. $baris)->applyFromArray($style_huruf);


                    // nama
                    $spreadsheet->setActiveSheetIndex(0)->setCellValue('C'.$baris, $row['informasi_detail']['nama']);
                    $spreadsheet->getActiveSheet()->getStyle('C'. $baris)->getFont()->setBold(false); // set bold
                    $spreadsheet->getActiveSheet()->getStyle('C'. $baris)->applyFromArray($style_huruf);


                    // alamat
                    $spreadsheet->setActiveSheetIndex(0)->setCellValue('D'.$baris, $row['informasi_detail']['alamat']);
                    $spreadsheet->getActiveSheet()->getStyle('D'. $baris)->getFont()->setBold(false); // set bold
                    $spreadsheet->getActiveSheet()->getStyle('D'. $baris)->applyFromArray($style_huruf);



                    // kode_buku
                    $spreadsheet->setActiveSheetIndex(0)->setCellValue('E'.$baris, $row['informasi_detail']['kode_wilayah']);
                    $spreadsheet->getActiveSheet()->getStyle('E'. $baris)->getFont()->setBold(false); // set bold
                    $spreadsheet->getActiveSheet()->getStyle('E'. $baris)->applyFromArray($style_angka);






                    // BAGIAN PIUTANG 
                    $nominal = "";
                    $grandtotal = $row['total_tagihan'];
                    $keterangan = "";
                    $alasan     = "";

                    // pembentukan garis
                    foreach( range( 'f', 'q' ) as $alphabet ) {

                        $spreadsheet->setActiveSheetIndex(0)->setCellValue($alphabet . $baris, $nominal);
                        $spreadsheet->getActiveSheet()->getStyle($alphabet . $baris)->getFont()->setBold(false); // set bold
                        $spreadsheet->getActiveSheet()->getStyle($alphabet . $baris)->applyFromArray($style_angka);
                    }

                    if ( count($row['informasi_piutang']) > 0 ) {

                        $posisi_bulan = [

                            'January'   => "F",
                            'February'  => "G",
                            'March'     => "H",
                            'April'     => "I",
                            'May'       => "J",
                            'June'      => "K",
                            'July'      => "L",
                            'August'    => "M",
                            'September' => "N",
                            'October'   => "O",
                            'November'  => "P", 
                            'December'  => "Q"
                        ];
                        foreach ( $row['informasi_piutang'] AS $rowPiutang ) {

                            $index = $rowPiutang['bulan'];

                            $spreadsheet->setActiveSheetIndex(0)->setCellValue($posisi_bulan[ $index ] . $baris, $rowPiutang['nominal']);
                            $spreadsheet->getActiveSheet()->getStyle($posisi_bulan[ $index ] . $baris)->getFont()->setBold(false); // set bold
                            $spreadsheet->getActiveSheet()->getStyle($posisi_bulan[ $index ] . $baris)->applyFromArray($style_angka);

                            $keterangan = $rowPiutang['keterangan'];
                            $alasan     = $rowPiutang['alasan'];
                        }

                    }


                    // grandtotal
                    $spreadsheet->setActiveSheetIndex(0)->setCellValue('R' . $baris, $grandtotal);
                    $spreadsheet->getActiveSheet()->getStyle('R' . $baris)->getFont()->setBold(false); // set bold
                    $spreadsheet->getActiveSheet()->getStyle('R' . $baris)->applyFromArray($style_angka);



                    // lama piutang
                    $lama_piutang = "";
                    if ( count( $row['informasi_piutang'] ) > 0 ) {

                        $lama_piutang = count( $row['informasi_piutang'] );
                    }

                    $spreadsheet->setActiveSheetIndex(0)->setCellValue('S' . $baris, $lama_piutang);
                    $spreadsheet->getActiveSheet()->getStyle('S' . $baris)->getFont()->setBold(false); // set bold
                    $spreadsheet->getActiveSheet()->getStyle('S' . $baris)->applyFromArray($style_angka);


                    // keterangan
                    $spreadsheet->setActiveSheetIndex(0)->setCellValue('T' . $baris, $keterangan);
                    $spreadsheet->getActiveSheet()->getStyle('T' . $baris)->getFont()->setBold(false); // set bold
                    $spreadsheet->getActiveSheet()->getStyle('T' . $baris)->applyFromArray($style_huruf);
                    
                    // alasan
                    $spreadsheet->setActiveSheetIndex(0)->setCellValue('U' . $baris, $alasan);
                    $spreadsheet->getActiveSheet()->getStyle('U' . $baris)->getFont()->setBold(false); // set bold
                    $spreadsheet->getActiveSheet()->getStyle('U' . $baris)->applyFromArray($style_huruf);

        

                
                    $baris++;
                    $urutan++;
                }
            }












            // Rename worksheet
            $spreadsheet->getActiveSheet()->setTitle('Report Excel '.date('d-m-Y H'));

            // Set active sheet index to the first sheet, so Excel opens this as the first sheet
            $spreadsheet->setActiveSheetIndex(0);

            // Redirect output to a client’s web browser (Xlsx)
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="RPRT-'.strtoupper($domisili[1]).'-'.$tahun.'.xlsx"');
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
    

        



        // header attr
        function header_attr( $title ) {

            // create new PDF document
            $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            // set document information
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Dwi Nur Cahyo');
            $pdf->SetTitle($title);
            // $pdf->SetSubject('TCPDF Tutorial');
            // $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

            // set default header data
            $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

            // set header and footer fonts
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

            // set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

            // set margins
            $pdf->SetMargins(PDF_MARGIN_LEFT, 35, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            // set auto page breaks
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            // set image scale factor
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

            // set some language-dependent strings (optional)
            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            // ---------------------------------------------------------

            // set font
            $pdf->SetFont('times', '', 10);

            return $pdf;
        }
    }

    
    /* End of file Dashboard.php */
    