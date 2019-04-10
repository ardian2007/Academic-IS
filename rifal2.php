

		//dibuat oleh Arifaleo Nurdin (1700018158)
		public function mencari_data_log_melalui_kata_yang_ingin_dicari($nim, $materi_key)
		{
			$query = "SELECT materi_bimbingan AS Materi, tanggal_bimbingan AS Tanggal, jam AS Jam FROM mahasiswa_metopen JOIN skripsi ON mahasiswa_metopen.nim=skripsi.nim JOIN logbook_bimbingan ON skripsi.id_skripsi=logbook_bimbingan.id_skripsi WHERE mahasiswa_metopen.nim= $nim AND materi_bimbingan LIKE '%$materi_key%'";
			$this->eksekusi($query);
			return $this->result;
		}
