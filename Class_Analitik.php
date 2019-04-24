<?php 

//Class analitik digunakan untuk merepresentasikan data hasil analisis dengan output berupa berbagai bentuk diagram (pie, bar), agar data yang ditampilkan lebih menarik

class Analitik
{
private $host ,$user,$pass,$database,$conn,$result;  //tipe data private agar variabel hanya dapat digunakan dalam class
	function __construct(){  //fungsi yang digunakan untuk menginisialisasikan database yang digunakan
		$this->host="localhost";   // variabel host diisi localhost
		$this->user="root";   // variabel user diisi root
		$this->pass="";   // variabel pass diisi kosong
		$this->database="manajemen_skripsi_prpl";  // variabel diisi database yang digunakan yang ada dalam sever localhost yaitu manajemen_skripsi_prpl
	}

	public function connect(){   //fungsi yang digunakan untuk koneksi ke database manajemen_skripsi_prpl
		$this->conn=mysqli_connect($this->host,$this->user,$this->pass);   //menghubungkan ke localhost
		mysqli_select_db($this->conn,$this->database);  //menghubungkan ke database
		if(!$this->conn){   //menghubungkan ke database
			return die('Maaf, koneksi belum tersambung: '.mysqli_connect_error()); //Maaf,koneksi belum tersambung
		}
	}
	public function eksekusi($query){  //fungsi yang digunakan untuk eksekusi query yang ada
		$this->result=mysqli_query($this->conn,$query);  //mengembalikan hasil dari query yang dieksekusi
	}

	//Di buat oleh Muhammad Nashir A (1700018117)
	public function getruang1(){
		$query="SELECT count(tempat)as jumlah1 from penjadwalan where tempat='1'";  //Query menampilkan jumlah pemakai ruangan di ruang 1, karena ini pakai jenis enum
		$this->eksekusi($query);  //mengeksekusi query diatas
		return $this->result;  //mengembalikan hasil dari query diatas
	}

	//Di buat oleh Muhammad Nashir A (1700018117)
	public function getruang2(){
		$query="SELECT count(tempat)as jumlah2 from penjadwalan where tempat='2'";   //Query menampilkan jumlah pemakai ruangan di ruang 2, karena ini pakai jenis enum
		$this->eksekusi($query);  //mengeksekusi query diatas
		return $this->result;  //mengembalikan hasil dari query diatas
	}

	//Di buat oleh Muhammad Nashir A (1700018117)
	public function getruang3(){
		$query="SELECT count(tempat)as jumlah3 from penjadwalan where tempat='3'";   //Query menampilkan jumlah pemakai ruangan di ruang 3, karena ini pakai jenis enum
		$this->eksekusi($query);  //mengeksekusi query diatas
		return $this->result;  //mengembalikan hasil dari query diatas
	}

	// di buat oleh : RICCO YHANDY FERNANDO (1700018154)
	public function getsistemcerdas(){
		$query="SELECT count(bidang_minat)as jumlah_bidang_minat1 from mahasiswa_metopen where bidang_minat='sistemcerdas'";
		//query tersebut menjelaskan tentang menampilkan jumlah mahasiswa yang mengambil bidang minat sistemcerdas
		$this->eksekusi($query);// mengeksekusi query diatas
		return $this->result;   // mengembalikan hasil dari query diatas
	}
	
	//dibuat oleh : LATIFATUL MUJAHIDAH (1700018159)
	public function getrelata(){
		$query="SELECT count(bidang_minat)as jumlah_bidang_minat2 from mahasiswa_metopen where bidang_minat='relata'";
		//query tersebut menjelaskan tentang tampilan jumlah mahasiswa yang mengambil bidang minat relata
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //mengembalikan hasil query diatas
	}
	public function lulus(){
		$query="SELECT COUNT(id_seminar) AS jml_lulus FROM seminar_proposal WHERE status='lulus' GROUP BY status";
		$this->eksekusi($query);
		return $this->result;
	}
	public function tidaklulus(){
		$query="SELECT COUNT(id_seminar) AS jml_tdk_lulus FROM seminar_proposal WHERE status='tidak_lulus' GROUP BY status";
		$this->eksekusi($query);
		return $this->result;
	}
	public function getall(){
		$query="SELECT * from penjadwalan";
		$this->eksekusi($query);
		return $this->result;
	}
	 //dibuat oleh : Tiara Anggraini Gaib (1700018175)
	public function tanggal_pendadaran(){    
		$query="SELECT id_jadwal, nim, tanggal, jam, tempat FROM penjadwalan GROUP BY jenis_ujian"; //untuk menampilkan tanggal pendadaran 
		$this->eksekusi($query);// mengeksekusi query diatas
		return $this->result;//mengembalikan hasil query diatas
	}
	//dibuat oleh : Tiara Anggraini Gaib (1700018175)
	public function jumlah_pendadaran(){   
		$query="SELECT tanggal, COUNT(nim) AS jumlah_pendadaran FROM penjadwalan WHERE jenis_ujian='UNDARAN' GROUP BY jenis_ujian"; //untuk menampilkan jumlah orang yang pendadaran pada setiap tanggal 
		$this->eksekusi($query);// mengeksekusi query diatas
		return $this->result;//mengembalikan hasil query diatas
	}
	//dibuat oleh : Rifka Riyani Radilla (1700018171)
	public function tanggal_seminar(){
		$query="SELECT tanggal FROM penjadwalan GROUP BY tanggal"; //untuk menampilkan tanggal dari tabel penjadwalan
		$this->eksekusi($query); //untuk mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}
	//dibuat oleh : Rifka Riyani Radilla (1700018171) 
	public function jumlah_seminar(){
		$query="SELECT tanggal, COUNT(nim) AS jumlah FROM penjadwalan WHERE jenis_ujian='SEMPROP' GROUP BY tanggal"; //untuk menampilkan jumlah mahasiswa yang semprop pada setiap tanggal
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}

	//Dibuat oleh : Heronitah Yanzyah (1700018129) 
	public function jenis_kelamin(){
		$query="SELECT jenis_kelamin as Gender, COUNT(jenis_kelamin) as Jumlah FROM mahasiswa_metopen WHERE jenis_kelamin = 'perempuan' OR jenis_kelamin = 'Laki-laki' GROUP BY jenis_kelamin"; //untuk menampilkan jumlah kelulusan mahasiswa berdasarkan jenis kelamin 
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}
}

 ?>