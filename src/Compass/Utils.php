<?php

declare(strict_types=1);

namespace Compass;

class Utils{
	
	/** @var array */
	private static $compass;
	public static function init() : void{
		$hash = "YToyMTY6e2k6MDtzOjg6IsKnNlMgwqdyIjtpOjE7czoyOiJ8ICI7aToyO3M6MjoifCAiO2k6MztzOjI6InwgIjtpOjQ7czoyOiJ8ICI7aTo1O3M6MjoifCAiO2k6NjtzOjI6InwgIjtpOjc7czoyOiJ8ICI7aTo4O3M6MjoifCAiO2k6OTtzOjQ6IsKnNlMiO2k6MTA7czo1OiJXIMKnciI7aToxMTtzOjI6InwgIjtpOjEyO3M6MjoifCAiO2k6MTM7czoyOiJ8ICI7aToxNDtzOjI6InwgIjtpOjE1O3M6MjoifCAiO2k6MTY7czoyOiJ8ICI7aToxNztzOjI6InwgIjtpOjE4O3M6ODoiwqc2VyDCp3IiO2k6MTk7czoyOiJ8ICI7aToyMDtzOjI6InwgIjtpOjIxO3M6MjoifCAiO2k6MjI7czoyOiJ8ICI7aToyMztzOjI6InwgIjtpOjI0O3M6MjoifCAiO2k6MjU7czoyOiJ8ICI7aToyNjtzOjI6InwgIjtpOjI3O3M6NDoiwqc2TiI7aToyODtzOjU6IlcgwqdyIjtpOjI5O3M6MjoifCAiO2k6MzA7czoyOiJ8ICI7aTozMTtzOjI6InwgIjtpOjMyO3M6MjoifCAiO2k6MzM7czoyOiJ8ICI7aTozNDtzOjI6InwgIjtpOjM1O3M6MjoifCAiO2k6MzY7czo4OiLCpzZOIMKnciI7aTozNztzOjI6InwgIjtpOjM4O3M6MjoifCAiO2k6Mzk7czoyOiJ8ICI7aTo0MDtzOjI6InwgIjtpOjQxO3M6MjoifCAiO2k6NDI7czoyOiJ8ICI7aTo0MztzOjI6InwgIjtpOjQ0O3M6MjoifCAiO2k6NDU7czo0OiLCpzZOIjtpOjQ2O3M6NToiRSDCp3IiO2k6NDc7czoyOiJ8ICI7aTo0ODtzOjI6InwgIjtpOjQ5O3M6MjoifCAiO2k6NTA7czoyOiJ8ICI7aTo1MTtzOjI6InwgIjtpOjUyO3M6MjoifCAiO2k6NTM7czoyOiJ8ICI7aTo1NDtzOjg6IsKnNkUgwqdyIjtpOjU1O3M6MjoifCAiO2k6NTY7czoyOiJ8ICI7aTo1NztzOjI6InwgIjtpOjU4O3M6MjoifCAiO2k6NTk7czoyOiJ8ICI7aTo2MDtzOjI6InwgIjtpOjYxO3M6MjoifCAiO2k6NjI7czoyOiJ8ICI7aTo2MztzOjQ6IsKnNlMiO2k6NjQ7czo1OiJFIMKnciI7aTo2NTtzOjI6InwgIjtpOjY2O3M6MjoifCAiO2k6Njc7czoyOiJ8ICI7aTo2ODtzOjI6InwgIjtpOjY5O3M6MjoifCAiO2k6NzA7czoyOiJ8ICI7aTo3MTtzOjI6InwgIjtpOjcyO3M6ODoiwqc2UyDCp3IiO2k6NzM7czoyOiJ8ICI7aTo3NDtzOjI6InwgIjtpOjc1O3M6MjoifCAiO2k6NzY7czoyOiJ8ICI7aTo3NztzOjI6InwgIjtpOjc4O3M6MjoifCAiO2k6Nzk7czoyOiJ8ICI7aTo4MDtzOjI6InwgIjtpOjgxO3M6NDoiwqc2UyI7aTo4MjtzOjU6IlcgwqdyIjtpOjgzO3M6MjoifCAiO2k6ODQ7czoyOiJ8ICI7aTo4NTtzOjI6InwgIjtpOjg2O3M6MjoifCAiO2k6ODc7czoyOiJ8ICI7aTo4ODtzOjI6InwgIjtpOjg5O3M6MjoifCAiO2k6OTA7czo4OiLCpzZXIMKnciI7aTo5MTtzOjI6InwgIjtpOjkyO3M6MjoifCAiO2k6OTM7czoyOiJ8ICI7aTo5NDtzOjI6InwgIjtpOjk1O3M6MjoifCAiO2k6OTY7czoyOiJ8ICI7aTo5NztzOjI6InwgIjtpOjk4O3M6MjoifCAiO2k6OTk7czo0OiLCpzZOIjtpOjEwMDtzOjU6IlcgwqdyIjtpOjEwMTtzOjI6InwgIjtpOjEwMjtzOjI6InwgIjtpOjEwMztzOjI6InwgIjtpOjEwNDtzOjI6InwgIjtpOjEwNTtzOjI6InwgIjtpOjEwNjtzOjI6InwgIjtpOjEwNztzOjI6InwgIjtpOjEwODtzOjg6IsKnNk4gwqdyIjtpOjEwOTtzOjI6InwgIjtpOjExMDtzOjI6InwgIjtpOjExMTtzOjI6InwgIjtpOjExMjtzOjI6InwgIjtpOjExMztzOjI6InwgIjtpOjExNDtzOjI6InwgIjtpOjExNTtzOjI6InwgIjtpOjExNjtzOjI6InwgIjtpOjExNztzOjQ6IsKnNk4iO2k6MTE4O3M6NToiRSDCp3IiO2k6MTE5O3M6MjoifCAiO2k6MTIwO3M6MjoifCAiO2k6MTIxO3M6MjoifCAiO2k6MTIyO3M6MjoifCAiO2k6MTIzO3M6MjoifCAiO2k6MTI0O3M6MjoifCAiO2k6MTI1O3M6MjoifCAiO2k6MTI2O3M6ODoiwqc2RSDCp3IiO2k6MTI3O3M6MjoifCAiO2k6MTI4O3M6MjoifCAiO2k6MTI5O3M6MjoifCAiO2k6MTMwO3M6MjoifCAiO2k6MTMxO3M6MjoifCAiO2k6MTMyO3M6MjoifCAiO2k6MTMzO3M6MjoifCAiO2k6MTM0O3M6MjoifCAiO2k6MTM1O3M6NDoiwqc2UyI7aToxMzY7czo1OiJFIMKnciI7aToxMzc7czoyOiJ8ICI7aToxMzg7czoyOiJ8ICI7aToxMzk7czoyOiJ8ICI7aToxNDA7czoyOiJ8ICI7aToxNDE7czoyOiJ8ICI7aToxNDI7czoyOiJ8ICI7aToxNDM7czoyOiJ8ICI7aToxNDQ7czo4OiLCpzZTIMKnciI7aToxNDU7czoyOiJ8ICI7aToxNDY7czoyOiJ8ICI7aToxNDc7czoyOiJ8ICI7aToxNDg7czoyOiJ8ICI7aToxNDk7czoyOiJ8ICI7aToxNTA7czoyOiJ8ICI7aToxNTE7czoyOiJ8ICI7aToxNTI7czoyOiJ8ICI7aToxNTM7czo0OiLCpzZTIjtpOjE1NDtzOjU6IlcgwqdyIjtpOjE1NTtzOjI6InwgIjtpOjE1NjtzOjI6InwgIjtpOjE1NztzOjI6InwgIjtpOjE1ODtzOjI6InwgIjtpOjE1OTtzOjI6InwgIjtpOjE2MDtzOjI6InwgIjtpOjE2MTtzOjI6InwgIjtpOjE2MjtzOjg6IsKnNlcgwqdyIjtpOjE2MztzOjI6InwgIjtpOjE2NDtzOjI6InwgIjtpOjE2NTtzOjI6InwgIjtpOjE2NjtzOjI6InwgIjtpOjE2NztzOjI6InwgIjtpOjE2ODtzOjI6InwgIjtpOjE2OTtzOjI6InwgIjtpOjE3MDtzOjI6InwgIjtpOjE3MTtzOjQ6IsKnNk4iO2k6MTcyO3M6NToiVyDCp3IiO2k6MTczO3M6MjoifCAiO2k6MTc0O3M6MjoifCAiO2k6MTc1O3M6MjoifCAiO2k6MTc2O3M6MjoifCAiO2k6MTc3O3M6MjoifCAiO2k6MTc4O3M6MjoifCAiO2k6MTc5O3M6MjoifCAiO2k6MTgwO3M6ODoiwqc2TiDCp3IiO2k6MTgxO3M6MjoifCAiO2k6MTgyO3M6MjoifCAiO2k6MTgzO3M6MjoifCAiO2k6MTg0O3M6MjoifCAiO2k6MTg1O3M6MjoifCAiO2k6MTg2O3M6MjoifCAiO2k6MTg3O3M6MjoifCAiO2k6MTg4O3M6MjoifCAiO2k6MTg5O3M6NDoiwqc2TiI7aToxOTA7czo1OiJFIMKnciI7aToxOTE7czoyOiJ8ICI7aToxOTI7czoyOiJ8ICI7aToxOTM7czoyOiJ8ICI7aToxOTQ7czoyOiJ8ICI7aToxOTU7czoyOiJ8ICI7aToxOTY7czoyOiJ8ICI7aToxOTc7czoyOiJ8ICI7aToxOTg7czo4OiLCpzZFIMKnciI7aToxOTk7czoyOiJ8ICI7aToyMDA7czoyOiJ8ICI7aToyMDE7czoyOiJ8ICI7aToyMDI7czoyOiJ8ICI7aToyMDM7czoyOiJ8ICI7aToyMDQ7czoyOiJ8ICI7aToyMDU7czoyOiJ8ICI7aToyMDY7czoyOiJ8ICI7aToyMDc7czo0OiLCpzZTIjtpOjIwODtzOjU6IkUgwqdyIjtpOjIwOTtzOjI6InwgIjtpOjIxMDtzOjI6InwgIjtpOjIxMTtzOjI6InwgIjtpOjIxMjtzOjI6InwgIjtpOjIxMztzOjI6InwgIjtpOjIxNDtzOjI6InwgIjtpOjIxNTtzOjI6InwgIjt9";
		self::$compass = unserialize(base64_decode($hash));
	}
	
	# BASED FROM MiNET (https://github.com/NiclasOlofsson/MiNET/blob/master/src/MiNET/TestPlugin/NiceLobby/NiceLobbyPlugin.cs)
	public static function wrap(float $angle){
		return ($angle + ceil(-$angle/360)*360);
	}
	
	public static function getCompass(float $direction, int $width = 25) : string{
		$direction = self::wrap($direction);
		$direction = $direction*2/10;
		$direction += 72;
		return implode(array_slice(self::$compass, (int) ($direction - floor($width/2)), $width));
	}
}
