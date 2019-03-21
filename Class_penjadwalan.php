<?php 

	require_once('database.php');

class Penjadwalan{

	// kalau function memakai parameter, silahkan langsung di isi parameter nya

	public function getDataMahasiswaByNim($nim)
	{
		// Dimas
	}
	public function createIdJadwal()
	{
		// Bima
	}
	public function insertJadwal($id_jadwal,$jenis_ujian,$nim,$tanggal,$jam,$tempat)
	{
		// nanda
	}
	public function insertPenguji($id_jadwal,$niy)
	{
		// dimas
	}
	public function getDataPenjadwalan()
	{
		// sandi
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
	public function getDataBanyakRuangDalamSehari($tgl)
	{
		// Andika
	}
	public function getDataBanyakWaktuDalamSehari($tgl)
	{
		// yanti
	}
	public function cekRuangWaktuDalamSehari($tgl)
	{
		// bima
	}
	public function cekNimDataYangSama($nim)
	{
		// andika
	}
	public function cekDuaPengujiYangSama($penguji1,$penguji2)
	{
		// adil
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
}

?>