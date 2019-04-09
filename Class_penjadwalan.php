<?php 

	require_once('database.php');

class Penjadwalan extends Database{ 
	public function __construct(){
		parent::__construct();
	
	}
	// Menghirung Banyaknya Baris dari query yg dieksekusi
	public function hitung_row($sql)
	{
		// dmonh3h3(Adhymas Fajar Sudrajad)
		$result=mysqli_num_rows($sql);
		return $result;
	}
	// Mengambil seluruh Data Mahasiswa Dan Jadwal
	public function getDataALLMahasiswaByNim($nim){
		// dmonh3h3(Adhymas Fajar Sudrajad)
		$query = "SELECT * FROM mahasiswa_metopen JOIN dosen on dosen.niy = mahasiswa_metopen.dosen 
			JOIN penjadwalan ON penjadwalan.nim = mahasiswa_metopen.nim 
			JOIN penguji ON penguji.id_jadwal = penjadwalan.id_jadwal 
			JOIN dosen_penguji ON penguji.niy=  dosen_penguji.niy_dosen_penguji
			WHERE mahasiswa_metopen.nim=$nim";
		//$sql=$this->eksekusi($query);
		//  cek penguji dan mahasiswa
		$sql=$this->eksekusi($query);
		$hasil=$this->hitung_row($sql);
		// cek Jadwal dan Mahasiswa
		$sql2=$this->getDataPenjadwalanByNIM($nim);
		$hasil_ceknim=$this->hitung_row($sql2);
		if($hasil > 0 && $hasil_ceknim > 0){
			$hasil=$this->eksekusi($query);
			foreach ($hasil as $key) {	
				$_SESSION['masuk']=1;
				$_SESSION['nim']=$key['nim'];
				$_SESSION['nama']=$key['nama'];
				$_SESSION['topik']=$key['topik'];
				$_SESSION['dosen']=$key['dosen'];
				$_SESSION['niy']=$key['niy'];
				$_SESSION['nama_dosen']=$key['nama_dosen'];
				$_SESSION['email']=$key['email'];
				$_SESSION['bidang_keahlian']=$key['bidang_keahlian'];
				$_SESSION['id_jadwal']=$key['id_jadwal'];
				$_SESSION['jenis_ujian']=$key['jenis_ujian'];
				$_SESSION['tanggal']=$key['tanggal'];
				$_SESSION['jam']=$key['jam'];
				$_SESSION['tempat']=$key['tempat'];
				$_SESSION['dosen_uji']=$key['niy_dosen_penguji'];
				
			}
			return $hasil;
		}
		else{
			$query = "SELECT * FROM mahasiswa_metopen JOIN dosen on dosen.niy = mahasiswa_metopen.dosen where mahasiswa_metopen.nim=$nim";
			$hasil=$this->eksekusi($query);
			foreach ($hasil as $key) {	
				$_SESSION['masuk']=2;
				$_SESSION['nim']=$key['nim'];
				$_SESSION['nama']=$key['nama'];
				$_SESSION['topik']=$key['topik'];
				$_SESSION['dosen']=$key['dosen'];
				$_SESSION['niy']=$key['niy'];
				$_SESSION['nama_dosen']=$key['nama_dosen'];
				$_SESSION['email']=$key['email'];
				$_SESSION['bidang_keahlian']=$key['bidang_keahlian'];
			}	
			return $hasil;
		}
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
		$query = "INSERT INTO `penjadwalan` (`id_jadwal`, `jenis_ujian`, `nim`, `tanggal`, `jam`, `tempat`) 
		VALUES ('$id_jadwal', '$jenis_ujian', '$nim', '$tanggal', '$jam', '$tempat')";
		$this->eksekusi($query);
	}
	
	// Insert Dosen Uji ke database
	public function insertPenguji($id_jadwal,$niy)
	{
		// nandah
		$query = "INSERT INTO `penguji` (`id_penguji`, `id_jadwal`, `niy`) VALUES (NULL, '$id_jadwal', '$niy')";
		$this->eksekusi($query);
	}
	public function getDataPenjadwalanByNIM($nim)
	{
		// sandi
		$query = "SELECT * from penjadwalan where nim=$nim";
		$result= $this->eksekusi($query);
		return $result;
	}
		// Mengambil seluruh Data Mahasiswa Dan Jadwal
	public function getDataALLMahasiswaByNim($nim){
		// dmonh3h3(Adhymas Fajar Sudrajad)
		$query = "SELECT * FROM mahasiswa_metopen JOIN dosen on dosen.niy = mahasiswa_metopen.dosen 
			JOIN penjadwalan ON penjadwalan.nim = mahasiswa_metopen.nim 
			JOIN penguji ON penguji.id_jadwal = penjadwalan.id_jadwal 
			JOIN dosen_penguji ON penguji.niy=  dosen_penguji.niy_dosen_penguji
			WHERE mahasiswa_metopen.nim=$nim";
		//$sql=$this->eksekusi($query);
		//  cek penguji dan mahasiswa
		$sql=$this->eksekusi($query);
		$hasil=$this->hitung_row($sql);
		// cek Jadwal dan Mahasiswa
		$sql2=$this->getDataPenjadwalanByNIM($nim);
		$hasil_ceknim=$this->hitung_row($sql2);
		if($hasil > 0 && $hasil_ceknim > 0){
			$hasil=$this->eksekusi($query);
			foreach ($hasil as $key) {	
				$_SESSION['masuk']=1;
				$_SESSION['nim']=$key['nim'];
				$_SESSION['nama']=$key['nama'];
				$_SESSION['topik']=$key['topik'];
				$_SESSION['dosen']=$key['dosen'];
				$_SESSION['niy']=$key['niy'];
				$_SESSION['nama_dosen']=$key['nama_dosen'];
				$_SESSION['email']=$key['email'];
				$_SESSION['bidang_keahlian']=$key['bidang_keahlian'];
				$_SESSION['id_jadwal']=$key['id_jadwal'];
				$_SESSION['jenis_ujian']=$key['jenis_ujian'];
				$_SESSION['tanggal']=$key['tanggal'];
				$_SESSION['jam']=$key['jam'];
				$_SESSION['tempat']=$key['tempat'];
				$_SESSION['dosen_uji']=$key['niy_dosen_penguji'];
				
			}
			return $hasil;
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
