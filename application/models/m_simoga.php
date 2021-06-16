<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_simoga extends CI_Model
{


     //EXCEL
     public function export_detail_pks($kk, $tgl1)
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE kode_kebun = '$kk' AND tanggal = '$tgl1'")->result_array();
     }

     public function grafik_bongkar()
     {
          return $this->db->query("SELECT COUNT(id_rekap) AS hitung
          FROM sortasi_plasma 
          WHERE bruto < 5000 && durasi < 20 && tanggal = DATE(NOW())")->result_array();
     }

     public function grafik_bongkar2()
     {
          return $this->db->query("SELECT COUNT(id_rekap) AS hitung
          FROM sortasi_plasma 
          WHERE bruto > 5000 && durasi < 20 && tanggal = DATE(NOW())")->result_array();
     }

     public function pembelian()
     {
          return $this->db->query("SELECT SUM(netto) as totalplasma 
          FROM sortasi_plasma 
          WHERE (jenis = 'plasma' 
          OR jenis = 'plasma / t' 
          OR jenis = 'plasma A1+' OR jenis = 'plasma A2+' OR jenis = 'plasma A3') AND tanggal = DATE(NOW())")->result_array();
     }

     public function pihaktiga()
     {
          return $this->db->query("SELECT SUM(netto) as totalp3 
          FROM sortasi_plasma 
          WHERE (jenis = 'p3' OR jenis = 'kkpa' OR jenis = 'pt') 
          AND tanggal  = DATE(NOW())")->result_array();
     }

     public function grafik_pks()
     {
          return $this->db->query("SELECT kode_kebun, SUM(netto) AS netto 
          FROM `sortasi_plasma` WHERE tanggal = DATE(NOW()) GROUP by kode_kebun")->result_array();
     }

     //grafik
     public function g_grade()
     {
          return $this->db->query("SELECT DISTINCT grade FROM sortasi_plasma WHERE tanggal = DATE(NOW())")->result_array();
     }

     public function count_pembelian2($tgl1, $tgl2, $kodekebun){
          return $this->db->query("SELECT kode_kebun, SUM(netto) AS totalnetto FROM `sortasi_plasma` 
          WHERE tanggal BETWEEN '$tgl1' AND '$tgl2' 
          AND kode_kebun = '$kodekebun' GROUP BY kode_kebun")->result_array();
     }

     public function count_pembelian2_pihak3($tgl1, $tgl2, $kodekebun){
          return $this->db->query("SELECT kode_kebun, SUM(netto) AS totalnetto FROM `sortasi_plasma` 
          WHERE tanggal BETWEEN '$tgl1' AND '$tgl2' 
          AND kode_kebun = '$kodekebun' 
          AND (jenis = 'p3' OR jenis = 'kkpa' OR jenis = 'pt') GROUP BY kode_kebun")->result_array();
     }

     public function tabel_pemebelian($tgl1, $tgl2, $kodekebun){
          return $this->db->query("SELECT tanggal, grade, SUM(netto) AS totalnettopks 
          FROM sortasi_plasma 
          WHERE tanggal BETWEEN '$tgl1' AND '$tgl2' 
          AND kode_kebun = '$kodekebun' GROUP BY tanggal")->result_array();
     }

     public function tabel_pemebelian2($tgl1, $tgl2, $kodekebun){
          return $this->db->query("SELECT grade.grade,
          (SELECT SUM(netto) as a FROM sortasi_plasma 
          WHERE sortasi_plasma.grade = grade.grade AND sortasi_plasma.kode_kebun = '$kodekebun' 
          AND sortasi_plasma.tanggal 
          BETWEEN '$tgl1' AND '$tgl2') as totalnetto FROM grade WHERE grade.unit = '$kodekebun'")->result_array();
     }
     //DATA PER GRADING
     public function pks()
     {
          return $this->db->query("SELECT DISTINCT kode_kebun FROM sortasi_plasma WHERE tanggal = DATE(NOW()) ORDER BY kode_kebun ")->result_array();
     }

     public function detail_pks_tanggal($nama, $tgl)
     {
          return $this->db->query("SELECT * FROM sortasi_plasma 
          WHERE kode_kebun = '$nama' 
          AND tanggal = '$tgl'")->result_array();
     }

     public function detail_pks($nama)
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE kode_kebun = '$nama' AND tanggal = DATE(NOW())")->result_array();
     }

     public function count_grading()
     {
          return $this->db->query("SELECT COUNT(*) AS hitung FROM sortasi_plasma")->result_array();
     }

     public function count_gradinginfo()
     {
          return $this->db->query("SELECT COUNT(*) AS hitung FROM grade")->result_array();
     }

     //EDIT
     public function get_by_id($id)
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE id_rekap = $id")->row();
     }

     public function update_rekap($id, $data)
     {
          $this->db->where('id_rekap', $id);
          $this->db->update('sortasi_plasma', $data);
     }

     //tabel_Dashboard
     public function sum_bruto_today()
     {
          return $this->db->query("SELECT SUM(bruto) AS JumlahBruto FROM sortasi_plasma WHERE YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function sum_netto_today()
     {
          return $this->db->query("SELECT SUM(netto) AS JumlahNetto FROM sortasi_plasma WHERE YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function all_netto()
     {
          return $this->db->query("SELECT SUM(netto) AS AllGrade FROM sortasi_plasma")->result_array();
     }

     //all_grade
     public function atu_plus()
     {
          return $this->db->query("SELECT COUNT(id_rekap) AS atu_plus FROM sortasi_plasma WHERE grade = 'A1+'")->result_array();
     }

     public function grade_a()
     {
          return $this->db->query("SELECT COUNT(id_rekap) as GradeA FROM sortasi_plasma WHERE grade = 'A'")->result_array();
     }

     public function grade_a1()
     {
          return $this->db->query("SELECT COUNT(id_rekap) as GradeA1 FROM sortasi_plasma WHERE grade = 'A1'")->result_array();
     }

     public function grade_a2()
     {
          return $this->db->query("SELECT COUNT(id_rekap) as GradeA2 FROM sortasi_plasma WHERE grade = 'A2'")->result_array();
     }

     public function grade_aplus()
     {
          return $this->db->query("SELECT COUNT(id_rekap) as GradeAplus FROM sortasi_plasma WHERE grade = 'A+'")->result_array();
     }

     public function grade_a3()
     {
          return $this->db->query("SELECT COUNT(id_rekap) as GradeA3 FROM sortasi_plasma WHERE grade = 'A3'")->result_array();
     }

     public function grade_pls()
     {
          return $this->db->query("SELECT COUNT(id_rekap) as GradePLS FROM sortasi_plasma WHERE grade = 'PLS'")->result_array();
     }

     public function grade_B()
     {
          return $this->db->query("SELECT COUNT(id_rekap) as GradeB FROM sortasi_plasma WHERE grade = 'B'")->result_array();
     }

     public function grade_Apha()
     {
          return $this->db->query("SELECT COUNT(id_rekap) as GradeApha FROM sortasi_plasma WHERE grade = 'A ALPHA'")->result_array();
     }

     public function grade_plsa()
     {
          return $this->db->query("SELECT COUNT(id_rekap) as GradePlsa FROM sortasi_plasma WHERE grade = 'PLS A'")->result_array();
     }

     public function grade_apls()
     {
          return $this->db->query("SELECT COUNT(id_rekap) as GradeApls FROM sortasi_plasma WHERE grade = 'A1/PLASMA'")->result_array();
     }
     //view grade_today
     public function view_atu_plus()
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE grade = 'A1+' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function view_a()
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE grade = 'A' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function view_a1()
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE grade = 'A1' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function view_a2()
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE grade = 'A2' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function view_aplus()
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE grade = 'A+' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function view_a3()
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE grade = 'A3' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function sum_bruto_yes()
     {
          return $this->db->query("SELECT SUM(bruto) AS JumlahBruto FROM sortasi_plasma WHERE YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW() - INTERVAL 1 DAY)")->result_array();
     }

     public function sum_netto_yes()
     {
          return $this->db->query("SELECT SUM(netto) AS JumlahNetto FROM sortasi_plasma WHERE YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW() - INTERVAL 1 DAY)")->result_array();
     }

     public function trip_yes()
     {
          return $this->db->query("SELECT COUNT(id_rekap) AS TripKemarin FROM sortasi_plasma WHERE YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW() - INTERVAL 1 DAY)")->result_array();
     }

     public function view_pls()
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE grade = 'PLS' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function view_a_alpha()
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE grade = 'A ALPHA' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function view_plsa()
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE grade = 'PLS A' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function view_a1pls()
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE grade = 'A1 / PLASMA' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function view_b()
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE grade = 'B' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     //grade_today
     public function atu_plus_today()
     {
          return $this->db->query("SELECT COUNT(id_rekap) AS atu_plus FROM sortasi_plasma WHERE grade = 'A1+' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function grade_a_today()
     {
          return $this->db->query("SELECT COUNT(id_rekap) as GradeA FROM sortasi_plasma WHERE grade = 'A' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function grade_a1_today()
     {
          return $this->db->query("SELECT COUNT(id_rekap) as GradeA1 FROM sortasi_plasma WHERE grade = 'A1' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function grade_a2_today()
     {
          return $this->db->query("SELECT COUNT(id_rekap) as GradeA2 FROM sortasi_plasma WHERE grade = 'A2' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function grade_aplus_today()
     {
          return $this->db->query("SELECT COUNT(id_rekap) as GradeAplus FROM sortasi_plasma WHERE grade = 'A+' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function grade_a3_today()
     {
          return $this->db->query("SELECT COUNT(id_rekap) as GradeA3 FROM sortasi_plasma WHERE grade = 'A3' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function grade_pls_today()
     {
          return $this->db->query("SELECT COUNT(id_rekap) as GradePLS FROM sortasi_plasma WHERE grade = 'PLS' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function grade_B_today()
     {
          return $this->db->query("SELECT COUNT(id_rekap) as GradeB FROM sortasi_plasma WHERE grade = 'B' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function grade_Apha_today()
     {
          return $this->db->query("SELECT COUNT(id_rekap) as GradeApha FROM sortasi_plasma WHERE grade = 'A ALPHA' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function grade_plsa_today()
     {
          return $this->db->query("SELECT COUNT(id_rekap) as GradePlsa FROM sortasi_plasma WHERE grade = 'PLS A' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function grade_apls_today()
     {
          return $this->db->query("SELECT COUNT(id_rekap) as GradeApls FROM sortasi_plasma WHERE grade = 'A1/PLASMA' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function sum_bruto()
     {
          return $this->db->query("SELECT SUM(bruto) AS JumlahBruto FROM sortasi_plasma")->result_array();
     }

     public function sum_netto()
     {
          return $this->db->query("SELECT SUM(netto) AS JumlahNetto FROM sortasi_plasma")->result_array();
     }

     //sum_netto_grade_today
     public function atu_plus_netto()
     {
          return $this->db->query("SELECT SUM(netto) AS atu_plus FROM sortasi_plasma WHERE grade = 'A1+' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function grade_a_netto()
     {
          return $this->db->query("SELECT SUM(netto) AS GradeA FROM sortasi_plasma WHERE grade = 'A' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function grade_a1_netto()
     {
          return $this->db->query("SELECT SUM(netto) AS GradeA1 FROM sortasi_plasma WHERE grade = 'A1' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function grade_a2_netto()
     {
          return $this->db->query("SELECT SUM(netto) AS GradeA2 FROM sortasi_plasma WHERE grade = 'A2' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function grade_aplus_netto()
     {
          return $this->db->query("SELECT SUM(netto) AS GradeAplus FROM sortasi_plasma WHERE grade = 'A+' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function grade_a3_netto()
     {
          return $this->db->query("SELECT SUM(netto) AS GradeA3 FROM sortasi_plasma WHERE grade = 'A3' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function grade_pls_netto()
     {
          return $this->db->query("SELECT SUM(netto) AS GradePLS FROM sortasi_plasma WHERE grade = 'PLS' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function grade_B_netto()
     {
          return $this->db->query("SELECT SUM(netto) AS GradeB FROM sortasi_plasma WHERE grade = 'B' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function grade_Apha_netto()
     {
          return $this->db->query("SELECT SUM(netto) AS GradeApha FROM sortasi_plasma WHERE grade = 'A ALPHA' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function grade_plsa_netto()
     {
          return $this->db->query("SELECT SUM(netto) AS GradePlsa FROM sortasi_plasma WHERE grade = 'PLS A' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function grade_apls_netto()
     {
          return $this->db->query("SELECT SUM(netto) AS GradeApls FROM sortasi_plasma WHERE grade = 'A1/PLASMA' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }


     //Laporan Bongkar Hari ini
     public function count_bagian1()
     {
          return $this->db->query("SELECT COUNT(id_rekap) AS KurangDuaPuluh FROM sortasi_plasma WHERE bruto < 5000 && durasi < 20 && YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal) = DAY(NOW())")->result_array();
     }

     public function count_bagian2()
     {
          return $this->db->query("SELECT COUNT(id_rekap) AS LebihDuaPuluh FROM sortasi_plasma WHERE bruto > 5000 && durasi < 20 && YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal) = DAY(NOW())")->result_array();
     }

     public function bagian1()
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE bruto < 5000 && durasi < 20 && YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal) = DAY(NOW())")->result_array();
     }

     public function bagian2()
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE bruto > 5000 && durasi < 20 && YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal) = DAY(NOW())")->result_array();
     }

     public function get_all_data()
     { //Nampilin Semua Data
          return $this->db->query("SELECT * FROM sortasi_plasma")->result_array();
     }

     public function count_alldata()
     {
          return $this->db->query("SELECT COUNT(*) AS totalData FROM sortasi_plasma")->result_array();
     }

     public function get_data()
     { //nampilin semua data pada table sortasi_plasma pada hari ini
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function bulan_ini()
     { //nampilin semua data pada table sortasi_plasma pada bulan ini
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW())")->result_array();
     }

     public function count_today()
     {
          return $this->db->query("SELECT COUNT(id_rekap) as JumlahPerHari 
          FROM sortasi_plasma WHERE 
          YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function count_yesterday()
     {
          return $this->db->query("SELECT COUNT(id_rekap) as Kemarin 
          FROM sortasi_plasma WHERE 
          YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW() - INTERVAL 1 DAY)")->result_array();
     }

     public function count_mounth()
     {
          return $this->db->query("SELECT COUNT(id_rekap) as JumlahPerBulan FROM sortasi_plasma WHERE YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW())")->result_array();
     }

     public function today($tgl)
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE tanggal = '$tgl'")->result_array();
     }

     public function kurang_duapuluh()
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE bruto < 5000 && durasi < 20 && YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW())")->result_array();
     }

     public function kurang_duapuluh_sgh()
     {
          return $this->db->query("SELECT * FROM `sortasi_plasma` WHERE MONTH(tanggal) = MONTH(NOW()) AND YEAR(tanggal) = YEAR(NOW()) AND bruto < 5000 && durasi < 20 AND kode_kebun in ('SGH','SPA','SGO')")->result_array();
     }

     public function kurang_duapuluh_tpu()
     {
          return $this->db->query("SELECT * FROM `sortasi_plasma` WHERE MONTH(tanggal) = MONTH(NOW()) AND YEAR(tanggal) = YEAR(NOW()) AND bruto < 5000 && durasi < 20 AND kode_kebun in ('TPU','TME')")->result_array();
     }

     public function kurang_duapuluh_sbt()
     {
          return $this->db->query("SELECT * FROM `sortasi_plasma` WHERE MONTH(tanggal) = MONTH(NOW()) AND YEAR(tanggal) = YEAR(NOW()) AND bruto < 5000 && durasi < 20 AND kode_kebun in ('SBT','LDA')")->result_array();
     }

     public function kurang_duapuluh_sta()
     {
          return $this->db->query("SELECT * FROM `sortasi_plasma` WHERE MONTH(tanggal) = MONTH(NOW()) AND YEAR(tanggal) = YEAR(NOW()) AND bruto < 5000 && durasi < 20 AND kode_kebun in ('STA','TER','SIN')")->result_array();
     }

     public function countkurang_duapuluh()
     {
          return $this->db->query("SELECT COUNT(id_rekap) AS KurangDuaPuluh FROM sortasi_plasma WHERE bruto < 5000 && durasi < 20 && YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW())")->result_array();
     }
     //Laporan Bongkar Bulan Ini
     public function sumbruto_bulanini()
     {
          return $this->db->query("SELECT SUM(bruto) AS Sum_bruto FROM sortasi_plasma WHERE bruto < 5000 && durasi < 20 && YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW())")->result_array();
     }

     public function sumnetto_bulanini()
     {
          return $this->db->query("SELECT SUM(netto) AS Sum_netto FROM sortasi_plasma WHERE bruto < 5000 && durasi < 20 && YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW())")->result_array();
     }

     public function sumbruto2_bulanini()
     {
          return $this->db->query("SELECT SUM(bruto) AS Sum_bruto FROM sortasi_plasma WHERE bruto > 5000 && durasi < 20 && YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW())")->result_array();
     }

     public function sumnetto2_bulanini()
     {
          return $this->db->query("SELECT SUM(netto) AS Sum_netto FROM sortasi_plasma WHERE bruto > 5000 && durasi < 20 && YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW())")->result_array();
     }

     //Laporan Bongkar Hari Ini
     public function sumbruto_hariini()
     {
          return $this->db->query("SELECT SUM(bruto) AS Sum_bruto FROM sortasi_plasma WHERE bruto < 5000 && durasi < 20 && YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal) = DAY(NOW())")->result_array();
     }

     public function sumnetto_hariini()
     {
          return $this->db->query("SELECT SUM(netto) AS Sum_netto FROM sortasi_plasma WHERE bruto < 5000 && durasi < 20 && YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal) = DAY(NOW())")->result_array();
     }

     public function sumbruto2_hariini()
     {
          return $this->db->query("SELECT SUM(bruto) AS Sum_bruto FROM sortasi_plasma WHERE bruto > 5000 && durasi < 20 && YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal) = DAY(NOW())")->result_array();
     }

     public function sumnetto2_hariini()
     {
          return $this->db->query("SELECT SUM(netto) AS Sum_netto FROM sortasi_plasma WHERE bruto > 5000 && durasi < 20 && YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal) = DAY(NOW())")->result_array();
     }

     public function lebih_limaton()
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE bruto > 5000")->result_array();
     }

     public function countlebih_limaton()
     {
          return $this->db->query("SELECT COUNT(id_rekap) AS LebihLimaTon FROM sortasi_plasma WHERE bruto > 5000 AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW())")->result_array();
     }

     public function dualima()
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE bruto > 5000 && durasi < 20 && YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW())")->result_array();
     }

     public function dualima_sgh()
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) && bruto > 5000 && durasi < 20 AND kode_kebun in ('SGH','SPA','SGO')")->result_array();
     }

     public function dualima_tpu()
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) && bruto > 5000 && durasi < 20 AND kode_kebun in ('TPU','TME')")->result_array();
     }

     public function dualima_sbt()
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) && bruto > 5000 && durasi < 20 AND kode_kebun in ('SBT','LDA')")->result_array();
     }

     public function dualima_sta()
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) && bruto > 5000 && durasi < 20 AND kode_kebun in ('STA','TER','SIN')")->result_array();
     }

     public  function count_dualima()
     {
          return $this->db->query("SELECT COUNT(id_rekap) AS DuaLima FROM sortasi_plasma WHERE bruto > 5000 && durasi < 20 AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW())")->result_array();
     }

     public function get_kebun()
     {
          return $this->db->query("SELECT DISTINCT kode_kebun FROM sortasi_plasma WHERE kode_kebun !=''")->result_array();
     }

     public function get_kebun_today($kebun)
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE kode_kebun ='$kebun' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function filter_kebun($kebun)
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE kode_kebun ='$kebun'")->result_array();
     }

     public function filter_kebun_bulanini($kebun)
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE kode_kebun ='$kebun' AND YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal) = MONTH(NOW())")->result_array();
     }

     public function filter_all($tgl1, $tgl2, $kbn)
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE (tanggal BETWEEN '$tgl1' AND '$tgl2') AND kode_kebun='$kbn'")->result_array();
     }

     public function filter_rentang($tgl1, $tgl2)
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE (tanggal BETWEEN '$tgl1' AND '$tgl2')")->result_array();
     }

     public function filterentang_tgl1($tgl1)
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE (tanggal BETWEEN '$tgl1' AND NOW())")->result_array();
     }

     public function filterentang_tgl2($tgl2)
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE tanggal <= '$tgl2'")->result_array();
     }

     public function list_grading()
     {
          return $this->db->query("SELECT DISTINCT grade FROM sortasi_plasma WHERE grade !=''")->result_array();
     }

     public function filter_grading_kebun($filter, $kbn)
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE grade = '$filter' AND kode_kebun = '$kbn'")->result_array();
     }

     public function filter_grading($filter)
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE grade ='$filter'")->result_array();
     }

     public function filter_kebun1($kbn)
     {
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE kode_kebun ='$kbn'")->result_array();
     }

     public function grading_info()
     {
          return $this->db->query("SELECT * FROM grade ")->result_array();
     }

     public function grading_info_dropdown()
     {
          return $this->db->query("SELECT DISTINCT grade FROM grade WHERE grade !=''")->result_array();
     }

     public function grading_info_dropdown2()
     {
          return $this->db->query("SELECT DISTINCT unit FROM grade WHERE unit !=''")->result_array();
     }

     public function kbn_grd($grd, $kebun)
     {
          return $this->db->query("SELECT * FROM grade WHERE grade = '$grd' && unit = '$kebun'")->result_array();
     }

     public function filter_grade($grd)
     {
          return $this->db->query("SELECT * FROM grade WHERE grade = '$grd'")->result_array();
     }

     public function filter_pks($kebun)
     {
          return $this->db->query("SELECT * FROM grade WHERE unit = '$kebun'")->result_array();
     }

     public function hapus_data($where, $table)
     {
          $this->db->where($where);
          $this->db->delete($table);
     }

     public function totalpkssgh()
     {
          return $this->db->query("SELECT kode_kebun, 
          SUM(netto) as totalpkssgh 
          FROM sortasi_plasma WHERE tanggal = DATE(NOW()) AND (kode_kebun = 'SPA' OR kode_kebun = 'SGH' OR kode_kebun = 'SGO') 
          GROUP BY kode_kebun")->result_array();
     }

     public function totalpkssbt()
     {
          return $this->db->query("SELECT kode_kebun, 
          SUM(netto) as totalpkssbt
          FROM sortasi_plasma WHERE tanggal = DATE(NOW()) AND (kode_kebun = 'SBT' OR kode_kebun = 'LDA') 
          GROUP BY kode_kebun")->result_array();
     }

     public function totalpkstpu()
     {
          return $this->db->query("SELECT kode_kebun, 
          SUM(netto) as totalpkstpu
          FROM sortasi_plasma WHERE tanggal = DATE(NOW()) AND (kode_kebun = 'TPU' OR kode_kebun = 'TME') 
          GROUP BY kode_kebun")->result_array();
     }

     public function totalpkssta()
     {
          return $this->db->query("SELECT kode_kebun, 
          SUM(netto) as totalpkssta
          FROM sortasi_plasma WHERE tanggal = DATE(NOW()) AND (kode_kebun = 'STA' OR kode_kebun = 'TER' OR kode_kebun = 'SIN') 
          GROUP BY kode_kebun")->result_array();
     }
}
