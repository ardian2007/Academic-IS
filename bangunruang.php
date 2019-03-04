<?php
class persegipanjang
{
	public $luas, $keliling;
	
	function luasPersegipanjang($panjang, $lebar){
		return $this->luas = $panjang * $lebar;
	}

	function kelilingPersegipanjang(){
		return $this->keliling = 2 * $this->luas;
	}

}

class segitiga
{
		public $luas;
		
		function luasAlasSegitiga($alas,$tinggi){
			return $this->luas = $alas * $tinggi / 2;
		}
}

class lingkaran
{

}

class kubus
{

}

class jajarangenjang
{

}
?>