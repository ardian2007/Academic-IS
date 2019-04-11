<?php
	$variable = $car->getDataSempropMetopen();
	$newV = $car->dataMetopen();
	foreach ($newV as $ke) {
		$cek = $car->getDataSkripsiFromSemprop("$ke[nim]","$ke[topik]","sedang_skripsi","$ke[semester]","$ke[nim]","metopen");
	}

	foreach ($variable as $key) {
		if("$key[status]"=="lulus")
		{
			$car->update_skripsi("skripsi","$key[nim]","$key[semester]");	
		}
	}
?>