<?php 

	require_once('database.php');

class Penjadwalan extends Database{ 
	public function __construct(){
		parent::__construct();	
	}
	
	// Menghirung Banyaknya Baris dari query yg dieksekusi
	public function hitung_row($sql)
	{
		// dmonh3h3(Adhymas Fajar Sudrajad)1
		$result=mysqli_num_rows($sql);
		return $result;
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
		// dmonh3h3(Adhymas Fajar Sudrajad)2
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
	}
	public function getDataStatusSemprop($nim)
	{
		// sandi
		$query = "SELECT seminar_proposal.status as status_sp from seminar_proposal where nim=$nim";
		$result= $this->eksekusi($query);
		return $result;
	}
	public function getDosenUjibyNiy($niy) // function untuk menampilkan dosen penguji dengan niy dan menampilkan data mahasiswa  yang akan dia uji 
	{
		// sitiapryanti 
		$query = "SELECT * FROM dosen JOIN penguji on dosen.niy = penguji.niy JOIN penjadwalan on penjadwalan.id_jadwal = penguji.id_jadwal 
		JOIN mahasiswa_metopen on mahasiswa_metopen.nim = penjadwalan.nim WHERE mahasiswa_metopen.nim=$niy"; // query mengambil data dosen, data jadwal mahasiswa berdasarkan nim, dan dosen dapat melihat mahasiswa mana yang kan dia uji 
		$hasil=$this->eksekusi($query); // mengeksekusi query yang telah di buat
		return $hasil; // pengembalian dari query yang di panggil
	}
	
	public function cekRuangDalamSehari($ruang,$tanggal)
	{
		// dmonh3h3(Adhymas Fajar Sudrajad)3
		$db_RuangDalamSehari = $this->getDataBanyakRuangDalamSehari($tanggal);
		foreach ($db_RuangDalamSehari as $key) {
			if($ruang==$key['tempat'] && $key['banyak'] >= 3){
				return false;
				break;
			}
		}
		return true;
	}
	public function getDataBanyakPengujiDalamSehari($tgl)
	{
		// andi
		$query = "SELECT penguji.niy as niy, dosen.nama_dosen, (SELECT count(*) from penguji where penguji.niy = dosen.niy ) as jumlahMenguji
			from dosen_penguji join penguji on dosen_penguji.niy_dosen_penguji = penguji.niy
			join dosen on penguji.niy = dosen.niy 
			join penjadwalan on penguji.id_jadwal = penjadwalan.id_jadwal and  penjadwalan.tanggal = '$tgl'
			GROUP BY penguji.niy ";
		$hasil=$this->eksekusi($query);
		return $hasil;

	}

	public function CekPengujiDalamSehari($niy,$tanggal)
	{
		// BIMA
		$db_DosenDalamSehari = $this->getDataBanyakPengujiDalamSehari($tanggal);
		foreach ($db_DosenDalamSehari as $key) {
			if($niy==$key['niy'] && $key['jumlahMenguji'] >= 3){
				return false;
				break;
			}
		}
		return true;
	}
	
	public function getDataBanyakWaktuDalamSehari($tgl) // function untuk menampilkan pada tanggal sekian, dan jam sekian ada berapa banyak yang di uji
	{
		//siti apryanti
		$query = "SELECT tanggal,jam, COUNT(*) as banyak FROM penjadwalan WHERE tanggal='$tgl' GROUP BY jam";
  	$result=$this->eksekusi($query); // query mengambil tanggal dan jam pada tabel penjadwalan lalu di jumlahkan  dan di kelompokan berdasarkan jam 
		return $result; // pengembalian query dari query yang kita panggil
	} 
	
	public function cekRuangWaktuDalamSehari($ruang,$waktu,$tanggal)
	{
		// bima
		$query = "SELECT jam,tempat FROM penjadwalan WHERE tanggal='$tanggal'";
		$result=$this->eksekusi($query);
		foreach ($result as $key) {
			if($ruang==$key['tempat'] && $waktu==$key['jam']){
				return false;
				break;
			}
		}
		return true;
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
	public function cekWaktuDalamSehari($waktu,$tanggal)
	{
		// adil
		$db_WaktuDalamSehari = $this->getDataBanyakWaktuDalamSehari($tanggal);
		foreach ($db_WaktuDalamSehari as $key) {
			if($waktu==$key['jam'] && $key['banyak'] >= 3){
				return false;
				break;
			}
		}
		return true;
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

	public function getDosenPenguji(){
		//Andhika risky
			$query = "SELECT dosen.nama_dosen,dosen.niy from dosen join dosen_penguji on dosen.niy=dosen_penguji.niy_dosen_penguji";
			$sql = $this->eksekusi($query);
			return $sql;
		}
	public function getDataJadwal() // fungsi untuk menampilkan seluruh jadwal dari database dan di tamplkan pada halaman web
	{
		$query ="SELECT * FROM `penjadwalan`"; //  query atau sintax untuk mengambil data jadwal dari tabel penjadwalan
		$sql = $this->eksekusi($query); // mengeksekusi apakah query yang kita buat itu benar
		return $sql; // pengembalian terhadap query yang di panggil 
	}

}
	
?>
