<?php

namespace App\Helpers;
use DateTime;
use Carbon\Carbon;
class TimeFunction
{
    static function getTimestamp($format = 'Y/m/d H:i:s'){
        $dt = new DateTime();
        return $dt->format($format);
    }

    static function dateFormat($time = '', $type = null)
	{
		if($time == '' || $time == "null") return null;
		$dt = Carbon::parse($time);
		switch ($type) {
            case $type: return $dt->format($type);break;
			default: return $dt->format('Y/m/d');
		}

	}
	
	//null: YYYY/MM/DD HH:MM:SS
	static function datetimeFormat($time = '', $type=null)
	{
		if($time == '') return '';
		$dt = Carbon::parse($time);
		switch ($type) {
			case 'time-short': return $dt->format('H:i');
			default: return $dt->format('Y/m/d H:i:s');
		}
	}
}