<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_simoga extends CI_Model{

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
}

?>