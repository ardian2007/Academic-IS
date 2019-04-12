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
			$query = "SELECT skripsi.jenis as model,skripsi.id_skripsi as idsk, dosen.nama_dosen as namdos ,skripsi.judul_skripsi as judul , mahasiswa_metopen.nama as name , mahasiswa_metopen.nim as nim from dosen join mahasiswa_metopen on dosen.niy = mahasiswa_metopen.dosen join skripsi on mahasiswa_metopen.nim = skripsi.nim and mahasiswa_metopen.nim = $jey ";
			$this->eksekusi($query);
			return $this->result;
		}

		public function masuk_ke_log($id,$materi,$id_skripsi,$tanggal,$jam,$jenis) // input data ke tabel logbook_bimbingan 
		{
			$query = "INSERT INTO logbook_bimbingan values ('','$materi','$id_skripsi','$tanggal','$jam','$jenis')";
			$this->eksekusi($query);
			return $this->result;
		}

		public function select_one_mahasiswa($key)  // di gunakan ketika ingin melihat log bimbingan satu mahasiswa
		{
			$query = "SELECT *,logbook_bimbingan.jenis as model,logbook_bimbingan.id_logbook as id,mahasiswa_metopen.nama as namaa, mahasiswa_metopen.nim as Nm, dosen.nama_dosen as namdis from logbook_bimbingan join skripsi on logbook_bimbingan.id_skripsi = skripsi.id_skripsi join mahasiswa_metopen on mahasiswa_metopen.nim = skripsi.nim join dosen on dosen.niy = mahasiswa_metopen.Dosen and skripsi.nim = $key";
			$this->eksekusi($query);
			return $this->result;
		}

		public function select_one_mahasiswa_by_id_log($key)  // di gunakan ketika ingin melihat log bimbingan satu mahasiswa
		{
			$query = "SELECT *,logbook_bimbingan.jenis as model,logbook_bimbingan.id_logbook as id,mahasiswa_metopen.nama as namaa, mahasiswa_metopen.nim as Nm, dosen.nama_dosen as namdis from logbook_bimbingan join skripsi on logbook_bimbingan.id_skripsi = skripsi.id_skripsi join mahasiswa_metopen on mahasiswa_metopen.nim = skripsi.nim join dosen on dosen.niy = mahasiswa_metopen.Dosen and logbook_bimbingan.id_logbook = $key";
			$this->eksekusi($query);
			return $this->result;
		}



		

		// fungsi buat rizki 1700018120
		// fungsi di bawah ini untuk melihat total jumlah bimbingan satu mahasiswa

		public function jumlah_bimbingan_mahasiswa()      // tambah parameter jika di perlukan
		{
			$query = "SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.nama as name, dosen.nama_dosen as namdos, skripsi.judul_skripsi as judul,skripsi.jenis as model, COUNT(logbook_bimbingan.id_skripsi) AS jumlah_bimbingan FROM logbook_bimbingan right JOIN skripsi on logbook_bimbingan.id_skripsi = skripsi.id_skripsi join mahasiswa_metopen on mahasiswa_metopen.nim = skripsi.nim join dosen on dosen.niy = mahasiswa_metopen.Dosen GROUP BY skripsi.id_skripsi HAVING COUNT(skripsi.id_skripsi)>=0 ";                // isi sesuai tugas fungsi masing masing
			$this->eksekusi($query);
			return $this->result;
		}

		//intan 1700018126
		//fungsi ini lebih mengarah kepada nim mahasiswa atau nama dosen pembimbing yang di cari
		public function jumlah_bimbingan_mahasiswa_hasil_search($cari)
		{
			$query = "SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.nama as name, dosen.nama_dosen as namdos, skripsi.judul_skripsi as judul,skripsi.jenis as model, COUNT(logbook_bimbingan.id_skripsi) AS jumlah_bimbingan FROM logbook_bimbingan LEFT JOIN skripsi on logbook_bimbingan.id_skripsi = skripsi.id_skripsi join mahasiswa_metopen on mahasiswa_metopen.nim = skripsi.nim join dosen on dosen.niy = mahasiswa_metopen.Dosen WHERE mahasiswa_metopen.nim like '%$cari%' or dosen.nama_dosen like '%$cari%' GROUP BY logbook_bimbingan.id_skripsi ";                // isi sesuai tugas fungsi masing masing
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
			$query = "SELECT mahasiswa_metopen.nama as namaa, mahasiswa_metopen.nim as Nm, skripsi.judul_skripsi as judul, logbook_bimbingan.materi_bimbingan as materi, logbook_bimbingan.tanggal_bimbingan as tanggal from logbook_bimbingan join skripsi on logbook_bimbingan.id_skripsi = skripsi.id_skripsi join mahasiswa_metopen on mahasiswa_metopen.nim = skripsi.nim join dosen on dosen.niy = mahasiswa_metopen.Dosen and dosen.nama_dosen = '$key' ";
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

		//Nur 1700018140
		//fungsi dibawah ini untuk mengupdate data yang salah pada materi jam dan tanggal
		
		public function update_data($materi_bimbingan,$tanggal_bimbingan,$jam,$id_logbook)
		{
			$query = "UPDATE `logbook_bimbingan` SET `materi_bimbingan`='$materi_bimbingan',`tanggal_bimbingan`='$tanggal_bimbingan',`jam`='$jam' WHERE logbook_bimbingan.id_logbook = $id_logbook";              // isi sesuai tugas fungsi masing masing

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
		public function update_skripsi($status,$nim,$semester)
		{
			$query = "UPDATE skripsi SET `jenis`='$status', `semester`='$semester' WHERE skripsi.nim = $nim";
			$this->eksekusi($query);
			return $this->result;
		}

		// danu 1700018168
		// fungsi untuk menampilkan semua data mahasiswa yang berada di tabel semprop untuk mengecek apakah sudah lulus metopen atau belum

		public function getDataSempropMetopen() 
		{
			$query = "SELECT mahasiswa_metopen.nama as nama,seminar_proposal.id_seminar as id_seminar, seminar_proposal.nim as nim,seminar_proposal.status as status,mahasiswa_metopen.topik as topik,case when month(curdate())BETWEEN '1' and '6' then 2*(year(curdate())-(SUBSTRING(mahasiswa_metopen.nim,1,2)+2000)) 
			else (2*(year(curdate()-1)-(SUBSTRING(mahasiswa_metopen.nim,1,2)+2000)))+1
			END AS semester FROM seminar_proposal join mahasiswa_metopen on seminar_proposal.nim = mahasiswa_metopen.nim";
			$this->eksekusi($query);
			return $this->result;
		}
		public function getHeaderLogbimbingan($nim)
		{
			$query = "SELECT mahasiswa_metopen.nama as nama, mahasiswa_metopen.nim as nim, dosen.nama_dosen as namdos FROM mahasiswa_metopen join dosen on mahasiswa_metopen.dosen = dosen.niy and mahasiswa_metopen.nim = $nim";
			$this->eksekusi($query);
			return $this->result;
		}

		// danu 1700018168
		// data untuk menampilkan data semua data mahasiswa di tabel metopen kemudian di kirim ke tabel skripsi dengan status metopen
		public function dataMetopen()
		{
			$query = "SELECT *,case when month(curdate())BETWEEN '1' and '6' then 2*(year(curdate())-(SUBSTRING(mahasiswa_metopen.nim,1,2)+2000)) 
			else (2*(year(curdate()-1)-(SUBSTRING(mahasiswa_metopen.nim,1,2)+2000)))+1
			END AS semester from mahasiswa_metopen";
			$this->eksekusi($query);
			return $this->result;
		}

		//dibuat oleh Arifaleo Nurdin (1700018158)
		public function mencari_data_log_melalui_kata_yang_ingin_dicari($nim, $materi_key)
		{
			$query = "SELECT *,logbook_bimbingan.jenis as model,logbook_bimbingan.id_logbook as id,mahasiswa_metopen.nama as namaa, mahasiswa_metopen.nim as Nm, dosen.nama_dosen as namdis from logbook_bimbingan join skripsi on logbook_bimbingan.id_skripsi = skripsi.id_skripsi join mahasiswa_metopen on mahasiswa_metopen.nim = skripsi.nim join dosen on dosen.niy = mahasiswa_metopen.Dosen WHERE mahasiswa_metopen.nim= $nim AND materi_bimbingan LIKE '%$materi_key%'";
			$this->eksekusi($query);
			return $this->result;
		}








	}
?>

