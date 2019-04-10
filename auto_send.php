<?php
	$variable = $car->getDataSempropMetopen();
	foreach ($variable as $key) {
		if("$key[status]"=="lulus")
		{
		
			$cek = $car->getDataSkripsiFromSemprop("$key[id_seminar]","$key[topik]","sedang_skripsi",7,"$key[nim]","skripsi");

			if(!$cek)
			{
				//echo "$key[nama] lulus <br>";
				$car->update_skripsi("skripsi","$key[nim]");
			}
			else
			{
				//echo "$key[nama] lulus <br>";
			}
		}
		else if("$key[status]"=="tidak_lulus")
		{
			//echo "$key[nama] tidak lulus <br>";
			$car->getDataSkripsiFromSemprop("$key[id_seminar]","$key[topik]","sedang_skripsi",7,"$key[nim]","metopen");
		}
	}
?>