<?php

if (!function_exists('uniqueProfileUrl')) {
	function uniqueProfileUrl($length_of_string)
	{
		$alpha = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
		$mix = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$code1 = substr(str_shuffle($alpha), 0, $length_of_string); 
		$code2 = substr(str_shuffle($mix), 0, $length_of_string); 
		return $code1 . $code2; 
	}
}
/*if (!function_exists('authorizePermissionTo')) {
	function authorizePermissionTo($permissionName, $obj, $preview = 1)
	{ 
		$objData = $obj;
	}
}
if (!function_exists('checkAthorizeSideBar')) {
	function checkAthorizeSideBar($permissionName)
	{
		try {
			return ( backpack_user()->hasRole('Super Admin') || backpack_user()->hasPermissionTo($permissionName . '.create','web') || backpack_user()->hasPermissionTo($permissionName . '.delete','web') || backpack_user()->hasPermissionTo($permissionName . '.preview','web') );
		} catch (Exception $e) {
			return false;
		}
	}
}*/