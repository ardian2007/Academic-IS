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
		$this->eksekusi($query);
		return $this->result;
	}
	// Insert Dosen Uji ke database
	public function insertPenguji($id_jadwal,$niy)
	{
		// dmonh3h3(Adhymas Fajar Sudrajad)
		$query = "INSERT INTO `penguji` (`id_penguji`, `id_jadwal`, `niy`) VALUES (NULL, '$id_jadwal', '$niy');"
		$this->eksekusi($query);
	}
	public function getDataPenjadwalanByNIM($nim)
	{
		// sandi
		$query = "SELECT * from penjadwalan where nim=$nim";
		$result= $this->eksekusi($query);
		return $result;
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
		$query = "SELECT tanggal,jam, COUNT(*) as banyak FROM penjadwalan WHERE tanggal='$tgl' GROUP BY jam";
  	$result=$this->eksekusi($query);
		return $result;
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
		$query = "SELECT count(*) as jumlahMenguji
					from dosen_penguji join penguji on dosen_penguji.niy_dosen_penguji = penguji.niy
					join dosen on penguji.niy = dosen.niy 
					join penjadwalan on penguji.id_jadwal = penjadwalan.id_jadwal and  penguji.niy = '$niy' ";
		$this->eksekusi($query);
		
		foreach ($this->result as $kuota) {
			# code...
			if($kuota[jumlahMenguji]<=3)
			{
				return true;
			}else
			{
				return false;
			}
		}
	
	} 


    public function getDataBanyakRuangDalamSehari(){
            //Andika risky
           $query="SELECT SUBSTRING(id_jadwal, 12, 1)AS id_jadwal, COUNT(*)as hitung FROM penjadwalan WHERE 
		   SUBSTRING(id_jadwal, 9, 2) GROUP BY SUBSTRING(id_jadwal, 12, 1)";
			$sql = $this->eksekusi($query);
			while ($row = $sql->fetch_assoc()){
				echo $row['id_jadwal'];
				echo $row['hitung'];
				echo"<br>";
			} 
			if(!$sql) {
				echo "tidak ditemukan";
			}   
		}

	public function cekNimdataYangSama($nim){
		   //Andika Risky
			$nim = $_POST['nim'];
       		$query="SELECT nim from penjadwalan WHERE nim = $nim";
			$sql = $this->eksekusi($query);
			$ketemu = true;
			if ($row = $sql->fetch_assoc()){
				if(sizeof($row) > 0){
					return true;
					// echo $row['nim'];
				}
			} 
			else {
				return 0;
				// echo "tidak ditemukan";
			}
	   }
}

?>
