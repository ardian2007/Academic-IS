<?php
	// change the name of this file
	class Database
	{
		private $host ,$user,$pass,$database,$conn,$result;
		function __construct(){
			$this->host="localhost";
			$this->user="root";
			$this->pass="";
			$this->database="manajemen_skripsi_prpl";
		}

		public function connect(){
			$this->conn=mysqli_connect($this->host,$this->user,$this->pass);
			mysqli_select_db($this->conn,$this->database);
			if(!$this->conn){
				return die('Maaf, koneksi belum tersambung: '.mysqli_connect_error());
			}
		}

		public function eksekusi($query){
			$this->result=mysqli_query($this->conn,$query);
		}

		public function show_data($jey) // menampilkan data skripsi mahasiswa, yang nanti ingin melakukan bimbingan
		{
			$query = "SELECT skripsi.id_skripsi as idsk, dosen.nama as namdos ,skripsi.judul_skripsi as judul , mahasiswa_metopen.nama as name , mahasiswa_metopen.nim as nim from dosen join mahasiswa_metopen on dosen.niy = mahasiswa_metopen.dosen join skripsi on mahasiswa_metopen.nim = skripsi.nim and mahasiswa_metopen.nim = $jey ";
			$this->eksekusi($query);
			return $this->result;
		}

		public function masuk_ke_log($id,$materi,$id_skripsi,$tanggal,$jam) // input data ke tabel logbook_bimbingan 
		{
			$query = "INSERT INTO logbook_bimbingan values ('','$materi','$id_skripsi','$tanggal','$jam')";
			$this->eksekusi($query);
			return $this->result;
		}

		public function select_one_mahasiswa($key)  // di gunakan ketika ingin melihat log bimbingan satu mahasiswa
		{
			$query = "SELECT *,mahasiswa_metopen.nama as namaa, mahasiswa_metopen.nim as Nm, dosen.nama as namdis from logbook_bimbingan join skripsi on logbook_bimbingan.id_skripsi = skripsi.id_skripsi join mahasiswa_metopen on mahasiswa_metopen.nim = skripsi.nim join dosen on dosen.niy = mahasiswa_metopen.Dosen and skripsi.nim = $key";
			$this->eksekusi($query);
			return $this->result;
		}




		

		// fungsi buat rizki
		public function jumlah_bimbingan_mahasiswa()      // tambah parameter jika di perlukan
		{
			$query = "SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.nama as name, dosen.nama as namdos, skripsi.judul_skripsi as judul, COUNT(logbook_bimbingan.id_skripsi) AS jumlah_bimbingan FROM logbook_bimbingan RIGHT JOIN skripsi on logbook_bimbingan.id_skripsi = skripsi.id_skripsi join mahasiswa_metopen on mahasiswa_metopen.nim = skripsi.nim join dosen on dosen.niy = mahasiswa_metopen.Dosen GROUP BY logbook_bimbingan.id_skripsi";                // isi sesuai tugas fungsi masing masing
			$this->eksekusi($query);
			return $this->result;
		}

		// fungsi buat ennu intan iksan (1700018126)
		public function delete_data($id)  
		{
			$query = "DELETE FROM logbook_bimbingan WHERE $id";
			$this->eksekusi($query);
			return $this->result;
		}

		//dibuat oleh Arifaleo Nurdin (1700018158)
		public function mencari_mhs_dgn_dos_yg_sama($key)
		{
			$query = "SELECT mahasiswa_metopen.nama as namaa, mahasiswa_metopen.nim as Nm, skripsi.judul_skripsi as judul, logbook_bimbingan.materi_bimbingan as materi, logbook_bimbingan.tanggal_bimbingan as tanggal from logbook_bimbingan join skripsi on logbook_bimbingan.id_skripsi = skripsi.id_skripsi join mahasiswa_metopen on mahasiswa_metopen.nim = skripsi.nim join dosen on dosen.niy = mahasiswa_metopen.Dosen and dosen.nama = '$key' ";
			$this->eksekusi($query);
			return $this->result;
			
		}

		// fungsi buat dendi
		public function a4() // tambah parameter jika di perlukan
		{
			$query = "";             // isi sesuai tugas fungsi masing masing
			$this->eksekusi($query);
			return $this->result;
		}

		// fungsi buat gino
		public function a5() // tambah parameter jika di perlukan
		{
			$query = "";                  // isi sesuai tugas fungsi masing masing
			$this->eksekusi($query);
			return $this->result;
		}

		//fungsi nur
			public function update_data ($materi_bimbingan,$tanggal_bimbingan,$jam,$id_logbook) // tambah parameter jika di perlukan
		{
			$query = "UPDATE `logbook_bimbingan` SET `materi_bimbingan`=$materi_bimbingan,`tanggal_bimbingan`=$tanggal_bimbingan,`jam`=$jam WHERE $id_logbook";              // isi sesuai tugas fungsi masing masing

			//$query = "";              // isi sesuai tugas fungsi masing masing
			$this->eksekusi($query);
			return $this->result;
		}


		//fungsi ancas
		public function getDataSkripsiFromSemprop($one,$two,$three,$four,$five,$six) 
		{
			$query = "INSERT INTO skripsi values ('$one','$two','$three','$four','$five','$six')";
			$this->eksekusi($query);
			return $this->result;
		}
		public function update_skripsi($status,$nim)
		{
			$query = "UPDATE skripsi SET jenis='$status' WHERE skripsi.nim = $nim";
			$this->eksekusi($query);
			return $this->result;
		}
		public function getDataSempropMetopen() 
		{
			$query = "SELECT mahasiswa_metopen.nama as nama,seminar_proposal.id_seminar as id_seminar, seminar_proposal.nim as nim,seminar_proposal.status as status,mahasiswa_metopen.topik as topik FROM seminar_proposal join mahasiswa_metopen on seminar_proposal.nim = mahasiswa_metopen.nim";
			$this->eksekusi($query);
			return $this->result;
		}

		

	}
?>

