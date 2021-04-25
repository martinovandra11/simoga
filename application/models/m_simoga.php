<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_simoga extends CI_Model{

     public function get_all_data(){ //Nampilin Semua Data
          return $this->db->query("SELECT * FROM sortasi_plasma")->result_array();
     }

     public function get_data(){ //nampilin semua data pada table sortasi_plasma pada hari ini
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function bulan_ini(){//nampilin semua data pada table sortasi_plasma pada bulan ini
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW())")->result_array();
     }

     public function count_today(){
          return $this->db->query("SELECT COUNT(id_rekap) as JumlahPerHari FROM sortasi_plasma WHERE YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW()) AND DAY(tanggal)=DAY(NOW())")->result_array();
     }

     public function count_mounth(){
          return $this->db->query("SELECT COUNT(id_rekap) as JumlahPerBulan FROM sortasi_plasma WHERE YEAR(tanggal) = YEAR(NOW()) AND MONTH(tanggal)= MONTH(NOW())")->result_array();
     }

     public function today($tgl){
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE tanggal = '$tgl'")->result_array();
     }

     public function kurang_duapuluh(){
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE durasi < 20")->result_array();
     }

     public function countkurang_duapuluh(){
          return $this->db->query("SELECT COUNT(id_rekap) AS KurangDuaPuluh FROM sortasi_plasma WHERE durasi < 20")->result_array();
     }

     public function lebih_limaton(){
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE bruto > 5000")->result_array();
     }

     public function countlebih_limaton(){
          return $this->db->query("SELECT COUNT(id_rekap) AS LebihLimaTon FROM sortasi_plasma WHERE bruto > 5000")->result_array();
     }

     public function dualima(){
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE bruto > 5000 && durasi < 20")->result_array();
     }

     public  function count_dualima(){
          return $this->db->query("SELECT COUNT(id_rekap) AS DuaLima FROM sortasi_plasma WHERE bruto > 5000 && durasi < 20")->result_array();
     }

     public function get_kebun(){
          return $this->db->query("SELECT DISTINCT kode_kebun FROM sortasi_plasma WHERE kode_kebun !=''")->result_array();
     }

     public function filter_kebun($kebun){
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE kode_kebun ='$kebun'")->result_array();
     }
     
     public function filter_rentang($tgl1,$tgl2){
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE (tanggal BETWEEN '$tgl1' AND '$tgl2')")->result_array();
     }

     public function filterentang_tgl1($tgl1){
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE (tanggal BETWEEN '$tgl1' AND NOW(tanggal)")->result_array();
     }

     public function filterentang_tgl2($tgl2){
          return $this->db->query("SELECT * FROM `sortasi_plasma` WHERE tanggal <= '$tgl2'")->result_array();
     }

     public function list_grading(){
          return $this->db->query("SELECT DISTINCT grade FROM sortasi_plasma WHERE grade !=''")->result_array();
     }
     
     public function filter_grading($filter){ 
          return $this->db->query("SELECT * FROM sortasi_plasma WHERE grade ='$filter'")->result_array();
     } 

     public function grading_info(){
          return $this->db->query("SELECT * FROM grade ")->result_array();
     }
}

?>