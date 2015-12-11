<?php
class ArrayUtils
{
	/**
	 * Get key from array.  Return default if not found.
	 * @param mixed $array
	 * @param mixed $key
	 * @param mixed $default
	 * @return Ambigous <string, unknown>
	 */
	public static function get($array, $key, $default = null){
		return isset($array[$key]) ? $array[$key] : $default;
	}
	
}
?>