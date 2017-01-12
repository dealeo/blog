<?php
	
if(!function_exists('format_date')){
	function format_date($date) {
		return $date->format('j M Y - H:i');
	}
}