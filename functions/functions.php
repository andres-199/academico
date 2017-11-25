<?php namespace functions;

class functions {
	
	//convierte string a hexadecimal
	public static function strToHex($str){
		 $hex='';
    for ($i=0; $i < strlen($str); $i++){
        $hex .= dechex(ord($str[$i]));
    }
    return $hex;
	}
	//convierte hexadecimal a string
	public static function hexToStr($hex){
    $string='';
    for ($i=0; $i < strlen($hex)-1; $i+=2){
        $string .= chr(hexdec($hex[$i].$hex[$i+1]));
    }
    return $string;
}


}



?>
