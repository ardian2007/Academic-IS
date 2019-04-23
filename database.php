<?php 
/*penjelasan class registermtp
class registermtp ini digunakan untuk lebih mempermudah mahasiswa yang akan mengambil mata kuliah metopen seperti mengisi data mahasiswa, melihat data mahasiswa yang mengambil matkul metopen, nama dosen pembimbing metopen, bidang minat mahasiswa, terdapat pula fitur pendukung
seperti update dan hapus serta melihat mahasiswa yang dibimbing oleh dosen tertentu dan lebih jelasnya dalam class Database ini terdapat 14 function pendukung yang digunakan yaitu :
1. function_construct 
2. function connect
3. function eksekusi
4. function getDosen
5. function getMhs
6. function register
7. function getJumlahMhs
8. function getJumlahDosen
9. function FormUpdateDataMahasiswaMetopen
10.function UpdateDataMahasiswaMetopen
11.function getJumlahMahasiswaBimbingan 
12.function CariDataMahasiswa
13.function DeleteMahasiswaMetopen
14.function getDataMahasiswaBimbinganDosenTertentu
Untuk penjelasan function-function diatas akan dijelaskan pada class dibawah ini.
*/

class Database
{
	private $host ,$user,$pass,$database,$conn,$result; //tipe data private agar variabel hanya dapat digunakan dalam class
	function __construct(){  //fungsi yang digunakan untuk menginisialisasikan database yang digunakan
		$this->host="localhost";	// variabel host diisi localhost
		$this->user="root";			// variabel user diisi root
		$this->pass="";				// variabel pass diisi kosong
		$this->database="manajemen_skripsi_prpl";	// variabel diisi database yang digunakan yang ada dalam sever localhost yaitu manajemen_skripsi_prpl
	}
	//dibuat oleh agung parmono
	public function connect(){	//fungsi yang digunakan untuk koneksi ke database manajemen_skripsi_prpl
		$this->conn=mysqli_connect($this->host,$this->user,$this->pass);	//menghubungkan ke localhost
		mysqli_select_db($this->conn,$this->database);						//menghubungkan ke database
		if(!$this->conn){ 													//jika koneksi gagal muncul pesan dibawah ini
			return die('Maaf, koneksi belum tersambung: '.mysqli_connect_error()); //Maaf,koneksi belum tersambung
		}
	}
	//dibuat oleh agung parmono
	public function eksekusi($query){	//fungsi yang digunakan untuk eksekusi query yang ada
		$this->result=mysqli_query($this->conn,$query);	//mengembalikan hasil dari query yang dieksekusi
	}
	//dibuat oleh agung parmono
	public function getDosen(){	//fungsi yang dibuat untuk menampilkan seluruh data dosen
		$query="SELECT * FROM dosen";	//query untuk menampilkan seluruh data dosen
		$this->eksekusi($query);		//mengeksekusi query diatas
		return $this->result;			//mengembalikan hasil dari query diatas
	}
	//dibuat oleh ihsan fadhilah
	public function getMhs(){  //fungsi untuk menampilkan data mahasiswa
		$query="SELECT mahasiswa_metopen.nama as nama,mahasiswa_metopen.nim as nim,mahasiswa_metopen.jenis_kelamin as jenis_kelamin,mahasiswa_metopen.topik as topik,dosen.nama as namados,mahasiswa_metopen.bidang_minat as bidang_minat, mahasiswa_metopen.tanggal_mulai as tanggal_mulai FROM mahasiswa_metopen JOIN dosen WHERE mahasiswa_metopen.dosen=dosen.niy"; //query untuk menampilkan nama,,nim,jenis kelamin, topik, nama dosen, bidang minat, dan tanggal mulai mahasiswa itu
		$this->eksekusi($query);	//mengeksekusi query diatas
		return $this->result;		//untuk mengembalikan hasil eksekusi fungsi
	}
	//dibuat oleh agung parmono
	public function register($nim,$nama,$jenis_kelamin,$topik,$dosen,$bidang_minat,$tanggal_mulai){	//fungsi yang digunakan untuk mendaftarkan mahasiswa untuk metopen
		$query = "INSERT INTO mahasiswa_metopen(nim,nama,jenis_kelamin,topik,dosen,bidang_minat,tanggal_mulai) VALUES ('$nim','$nama','$jenis_kelamin','$topik','$dosen','$bidang_minat','$tanggal_mulai')"; //query untuk menambah data mahasiswa berupa nim,nama,jenis kelamin,topik,dosen,bidang minat dan tanggal mulai yang akan disimpan pada tabel mahasiswa_metopen
		$this->eksekusi($query);	//mengeksekusi query diatas
		return $this->result;		//mengembalikan hasil dari query diatas
	}
	//dibuat oleh shindi
	public function getJumlahMhs(){ //fungsi yang di gunakan untuk mengambil jumlah mahasiswa
		$query="SELECT COUNT(nim) as jumlah_mahasiswa FROM mahasiswa_metopen"; //query untuk mengambil jumlah mahasiswa berdasarkan nim
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result;  //mengembalikan hasil dari query diatas
	}
	//dibuat oleh ...
	public function getJumlahDosen(){
		$query="SELECT COUNT(niy) as jumlah_dosen FROM dosen";
		$this->eksekusi($query);
		return $this->result;
	}
	public function FormUpdateDataMahasiswaMetopen($nim){
	//dibuat oleh randi indraguna
		$query = "SELECT nim, nama, jenis_kelamin, topik, dosen, bidang_minat FROM mahasiswa_metopen where nim='$nim'";
		$this->eksekusi($query);
		return $this->result;
		
	}
	
	public function UpdateDataMahasiswaMetopen($nim,$nama,$jenis_kelamin,$topik,$dosen,$bidang_minat){
	//dibuat oleh randi indraguna
		$query="UPDATE mahasiswa_metopen SET nim='$nim',nama='$nama',jenis_kelamin='$jenis_kelamin',topik='$topik',dosen='$dosen',bidang_minat='$bidang_minat' WHERE nim='$nim' ";
		$this->eksekusi($query);
		return $this->result;
	}
	public function getJumlahMahasiswaBimbingan(){ //fungsi untuk mendapatkan jumlah mahasiswa bimbingan setiap dosennya 
		//dibuat oleh ihsan fadhilah
		$query = "SELECT dosen.nama as nama, dosen.niy as niy, COUNT(nim) as jumlah_mahasiswa FROM mahasiswa_metopen JOIN dosen ON mahasiswa_metopen.dosen = dosen.niy";  //query untuk mendapatkan jumlah mahasiswa bimbingan setiap dosennya
		$this->eksekusi($query);	//berguna untuk mengeksekusi query sql diatas yang telah dibuat
		return $this->result;		//untuk mengembalikan hasil eksekusi fungsi
	}

	public function CariDataMahasiswa($nim){ // function digunakan untuk mempermudah mencari data mahasiswa
		//dibuat oleh Nur Fadhilah Alfianty Firman
		$query = "SELECT * FROM mahasiswa_metopen WHERE nim LIKE '%$nim'"; //digunakan untuk menampilkan data mahasiswa metopen dan mencari dengan nim
		$query="SELECT mahasiswa_metopen.nama as nama,mahasiswa_metopen.nim as nim,mahasiswa_metopen.jenis_kelamin as jenis_kelamin,mahasiswa_metopen.topik as topik,dosen.nama as namados,mahasiswa_metopen.bidang_minat as bidang_minat, mahasiswa_metopen.tanggal_mulai as tanggal_mulai FROM mahasiswa_metopen JOIN dosen WHERE mahasiswa_metopen.dosen=dosen.niy";
		$this->eksekusi($query); // berguna untuk mengeksekusi query sql diatas yang telah dibuat
		return $this->result; //untuk mengembalikan hasil eksekusi fungsi 
	}
	public function DeleteMahasiswaMetopen($nim){ // Fungsi ini untuk menghapus data mahasiswa metopen
		// Dikerjakan oleh Eef Mekelliano
		$query="DELETE FROM mahasiswa_metopen WHERE nim='$nim'"; // Query ini digunakan untuk menghapus data mahasiswa yang telah mendaftar metopen
		$this->eksekusi($query); // untuk mengeksekusi query sql diatas yang telah dibuat
		return $this->result; // untuk mengembalikan hasil eksekusi pada fungsi ini.
	}
	public function getDataMahasiswaBimbinganDosenTertentu($niy){ //fungsi ini digunakan untuk menampilkan data mahasiswa bimbingan dari dosen tertentu dengan paramater $niy 
		//Dikerjakan oleh amir fauzi ansharif
		$query="SELECT dosen.nama as nama_dosen, dosen.niy as niy, mahasiswa_metopen.nama as nama_mhs FROM dosen JOIN mahasiswa_metopen WHERE dosen.niy = '$niy'"; //query ini digunakan untuk menampilkan data mahasiswa bimbingan dari dosen tertentu
		$this->eksekusi($query); //untuk mengeksekusi query diatas
		return $this->result; //untuk mengembalikan hasil eksekusi query diatas
	}
}
 ?>