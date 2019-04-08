<?php
	include 'database.php';
	$var = new Database();
	$var->connect();

	$variable = $var->getDataSempropMetopen();
	foreach ($variable as $key) {
		if("$key[status]"=="lulus")
		{
			$cek = $var->getDataSkripsiFromSemprop("$key[id_seminar]","$key[topik]","sedang_skripsi",7,"$key[nim]","skripsi");

			if(!$cek)
			{
				$var->update_skripsi("skripsi");
			}
		}
		else
		{
			$var->getDataSkripsiFromSemprop("$key[id_seminar]","$key[topik]","sedang_skripsi",7,"$key[nim]","metopen");
		}
	}
?>