<?php

if ( ! function_exists('cRupiah'))
{
	function cRupiah($currency)
	{
		return "Rp " . number_format($currency,2,',','.');
	}
}

if ( ! function_exists('dateFormatID'))
{
	function dateFormatID($date)
	{
		return date_format(date_create($date),"d/m/Y");
	}
}
?>
