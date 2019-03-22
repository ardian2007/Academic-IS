<?php 

	require_once('database.php');

class Penjadwalan{

	// kalau function memakai parameter, silahkan langsung di isi parameter nya
	// Mengambil Data Mahasiswa Dan 
	public function getaMahasiswaDanDosenBimbinganByNim($nim)
	{
		// dmonh3h3(Adhymas Fajar Sudrajad)
		$query = "SELECT * FROM mahasiswa_metopen JOIN dosen on dosen.niy = mahasiswa_metopen.dosen"
		$this->eksekusi($query);
		return $this->result;
	}
	// Mengambil seluruh Data Mahasiswa Dan Jadwal
	public function getDataALLMahasiswaByNim($nim)
	{
		// dmonh3h3(Adhymas Fajar Sudrajad)
		$query = "SELECT * FROM mahasiswa_metopen JOIN dosen on dosen.niy = mahasiswa_metopen.dosen 
			JOIN penjadwalan ON penjadwalan.nim = mahasiswa_metopen.nim 
			JOIN penguji ON penguji.id_jadwal = penjadwalan.id_jadwal 
			JOIN dosen_penguji ON penguji.niy =  dosen_penguji.niy_dosen_penguji 
			WHERE mahasiswa_metopen.nim=$nim"
		$this->eksekusi($query);
		return $this->result;
	}
	public function createIdJadwal($id, $penguji1, $penguji2, $tanggal, $jam, $tempat)
	{
		$id_jadwal 	= $id;
		$id_jadwal .= substr($penguji1,5,8);
		$id_jadwal .= substr($penguji2,5,8);
		$id_jadwal .= substr($tanggal,8,10);
		$id_jadwal .= $jam;
		$id_jadwal .= $tempat;
		return $id_jadwal;
		// Bima

	}
	public function insertJadwal($id_jadwal,$jenis_ujian,$nim,$tanggal,$jam,$tempat)
	{
		// nanda
		$query = "INSERT INTO penjadwalan values ('','$id_jadwal, $jenis_ujian, $nim, $tanggal, $jam, $tempat)";
		$this->execute($query);
		return $this->result;
	}
	// Insert Dosen Uji ke database
	public function insertPenguji($id_jadwal,$niy)
	{
		// dmonh3h3(Adhymas Fajar Sudrajad)
		$query = "INSERT INTO `penguji` (`id_penguji`, `id_jadwal`, `niy`) VALUES (NULL, '$id_jadwal', '$niy');"
		$this->eksekusi($query);
	}
	public function getDataPenjadwalan()
	{
		// sandi
		$query = "SELECT from * penjadwalan";
		$this->eksekusi($query);
		return $this->result;
	}
	public function getDataBanyakPengujiDalamSehari($tgl)
	{
		// andi
		$query = "SELECT penguji.niy as niy, dosen.nama as nama, (SELECT count(*) from penguji where penguji.niy = dosen.niy ) as jumlahMenguji
			from dosen_penguji join penguji on dosen_penguji.niy_dosen_penguji = penguji.niy
			join dosen on penguji.niy = dosen.niy 
			join penjadwalan on penguji.id_jadwal = penjadwalan.id_jadwal and  SUBSTRING(penjadwalan.id_jadwal, 9, 2) = '$tgl'
			GROUP BY penguji.niy ";
		$this->eksekusi($query);
		return $this->result;

	}
	public function getDataBanyakWaktuDalamSehari($tgl)
	{
		//yanti
	
		$query = "SELECT SUBSTRING(id_jadwal, 9, 2), COUNT(*) FROM penjadwalan WHERE SUBSTRING(id_jadwal, 9, 2)=$tgl GROUP BY SUBSTRING(id_jadwal, 9, 2)";
  		$this->execute($query);
  		return $this->result;

	}
	public function cekRuangWaktuDalamSehari($tgl)
	{
		// bima
		$query = "SELECT jam, tempat FROM penjadwalan WHERE SUBSTRING(tanggal, 9, 2)=$tgl";
		$this->eksekusi($query);
	}
	
	public function cekDuaPengujiYangSama($penguji1,$penguji2)
	{
		// adil
		if($penguji1==$penguji2){
			return false;
		}else{
			return true;
		}
	}
	public function cekKuotaPenguji($niy)
	{
		// andi
		$query = "SELECT dosen.nama as nama,dosen.niy as niy, count(*) as jumlahMenguji
					from dosen_penguji join penguji on dosen_penguji.niy_dosen_penguji = penguji.niy
					join dosen on penguji.niy = dosen.niy 
					join penjadwalan on penguji.id_jadwal = penjadwalan.id_jadwal and  penguji.niy = '$niy' ";
		$this->eksekusi($query);
		return $this->result;
	} 


	public function getDataBanyakRuangDalamSehari($tgl){
		//Andika Risky
    		$nilai_ruang = TRUE;
    			for ($i=0; $i < $n_ruang; $i++) { 
      				if($tempat==$db_ruang[$i] && $db_banyak_ruang[$i] >= 3){
        			$nilai_ruang = FALSE;
            $this->execute($nilai_ruang);
            return $this->result;
     }}}

	public function cekNimdataYangSama($nim){
		//Andika Risky
	    $nilai_nim = TRUE;
	     for ($i=0; $i < $n_nim ; $i++) { 
	       if($nim==$db_nim[$i]){
	          $nilai_nim = FALSE;
	            $this->execute($nilai_nim);
	            return $this->result;
	}}}
}

?>
