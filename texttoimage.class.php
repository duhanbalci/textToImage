<?php
/**
 * @name	   		textToImage
 * @version    		1.0
 * @author     		Duhan BALCI
 * @email			duhanbalci@msn.com
 * @link       		http://duhanbalci.com/
 * @since      		10.08.2017
 * @requirements	PHP5+, GD
 */
class textToImage{
	public $rows;
	public $x;
	public $y;
	public $byt;
	public $img;
	
	function __construct(){
		$this->byt = 5;
		$this->x = 5;
		$this->y = 5;
	}
	function calcWidth($ks){
		return $ks*$this->byt*2;
	}
	function calcHeight($byt){
		$s = false;
		if($byt == 5) $s = 10;
		if($byt == 4 || $byt == 3) $s = 8;
		if($byt == 2 || $byt == 1) $s = 6;
		if($s) return $s+10;
		return false;
	}
	function size($byt){
		$this->byt = $byt;
	}
	function add($row,$r = 0,$g = 0,$b = 255){
		$this->rows[] = ["row" => $row,"r" => $r ,"g" => $g ,"b" => $b];
	}
	function longestRow(){
		$maxx = 0;
		foreach($this->rows as $row){
			if(strlen($row['row'])>$maxx) $maxx = strlen($row['row']);
		}
		return $maxx;
	}
	function son(){
		$longestRow	= $this->longestRow();
		$height		= ($this->calcHeight($this->byt))*(count($this->rows))+5;
		$width		= $this->calcWidth($longestRow);
		$im = imagecreate($width, $height);
		$this->img = $im;
		$bg = imagecolorallocatealpha($im,0,0,0,127);
		foreach($this->rows as $row){
			$textcolor = imagecolorallocate($im, $row['r'], $row['g'], $row['b']);
			imagestring($im, $this->byt, $this->x, $this->y,$row['row'], $textcolor);
			$this->y	+= $this->calcHeight($this->byt);
		}
		return $im;
	}
	function kaydet($par,$q=90){
		imagepng($this->img,$par,$q);
	}
}